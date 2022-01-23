<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'username', 'password', 'email', 'national_id', 'nationality_id', 'gender', 'mobile1', 'mobile2', 'phone', 'status', 'photo', 'note', 'role','bank_account','cv','iban','name_account','address','telecom_id','cv_text','department_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $commun = [
            'name'        => 'required|max:255',
            'mobile1'    => 'required',
            'username'    => "max:20|alpha_num|unique:users,username,$id",
             'email' => "nullable|email|max:255|unique:users,email,$id",
            'password'    => 'nullable|confirmed',
            'contract'    => 'mimes:jpg,jpeg,png,pdf,doc,docs'
        ];

        if ($update) {
            return $commun;
        }

        return array_merge($commun, [
            'username'    => 'required|alpha_num|max:255|unique:users',
            'password'    => 'required|confirmed|min:6',
        ]);
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class)->withDefault();
    }
        public function telecom()
    {
        return $this->belongsTo(Telecom::class)->withDefault();
    }
            public function jobRequest()
    {
        return $this->hasMany(JobRequest::class,'user_id');
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
      public function departments()
    {
        return $this->hasMany(Department::class,'supervisor_id');
    }

      public function classrooms()
    {
        return $this->hasMany(Classroom::class,'teacher_id');
    }
    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */
    public function scopeStats($q, $data)
    {
        return $q->selectRaw('`' . $data . '` , count(*) as count')
                ->whereIn('role', array_keys(config('variables.roles')))
                ->groupBy($data)
                ->orderBy($data)
                ->get();
    }
    public function scopeTeacher($q)
    {
        $q->where('role', '5');
    }
    public function scopeSupervisor($q)
    {
        $q->where('role', '10');
    }
    public function scopeNotStudent($q)
    {
        $q->where('role', '!=', 0);
    }
    public function scopeStudents($q)
    {
        $q->where('role', 0);
    }
    public function scopeActive($q)
    {
        return $q->where('status', 1);
    }
    public function scopeListWithPhone($q)
    {
        return $q->select('users.id', DB::raw("concat(users.name, ' - ' , IFNULL(users.mobile, '')) as name"))
                ->pluck('name', 'id');
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getIsAdminAttribute()
    {
        return auth()->user()->role == 20;
    }
    public function getIsNotAdminAttribute()
    {
        return auth()->user()->role != 20;
    }
    public function getIsTeacherAttribute()
    {
        return auth()->user()->role == 5;
    }
        public function getIsSupervisorAttribute()
    {
        return auth()->user()->role == 10;
    }
    public function getIsStudentAttribute()
    {
        return auth()->user()->role == 0;
    }
    public function getRoleNameAttribute()
    {
        return config('variables.roles')[$this->role];
    }
    public function getGenderNameAttribute()
    {
        return config('variables.sexes')[$this->gender];
    }
    public function getStatusNameAttribute()
    {
        return config('variables.status')[$this->status];
    }
    public function setPasswordAttribute($value='')
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function getPhotoAttribute($value)
    {
        if (!$value) {
            return 'https://placehold.it/400x400';
        }

        return config('variables.users_photo.public').$value;
    }
    public function setPhotoAttribute($photo)
    {
        $this->attributes['photo'] = move_file($photo, 'users_photo.image');
    }
     public function getCvAttribute($value)
    {
        if (!$value) {
            return 'https://placehold.it/400x400';
        }

        return config('variables.users_photo.public').$value;
    }

 public function setCvAttribute($photo)
    {
        $this->attributes['cv'] = move_file($photo, 'users_photo');
    }
    /*
    |------------------------------------------------------------------------------------
    | Boot
    |------------------------------------------------------------------------------------
    */
    public static function boot()
    {
        parent::boot();
        static::updating(function ($user) {
            $original = $user->getOriginal();

            if (\Hash::check('', $user->password)) {
                $user->attributes['password'] = $original['password'];
            }
        });
    }
}
