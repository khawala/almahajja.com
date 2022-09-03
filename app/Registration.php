<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Registration extends Model
{
    protected $fillable = ['user_id', 'section_id', 'batch', 'telecom_id', 'period_id', 'activity_id', 'classroom_id', 'paid', 'level', 'status', 'created_by', 'updated_by', 'note','department_id','level_id','receipt_image','payment_data','reference_no','payment_type'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            'user_id'        => 'required',
            'section_id'     => 'required',
        ];

        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class)->withDefault();
    }
    public function level()
    {
        return $this->belongsTo(Level::class)->withDefault();
    }
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
    public function section()
    {
        return $this->belongsTo(Section::class)->withDefault();
    }
    public function department()
    {
        return $this->belongsTo(Department::class)->withDefault();
    }
    public function telecom()
    {
        return $this->belongsTo(Telecom::class)->withDefault();
    }
    public function period()
    {
        return $this->belongsTo(Period::class)->withDefault();
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class)->withDefault();
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault();
    }
    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by')->withDefault();
    }

    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */
    public function scopeTotalMarks($q, $id, $level)
    {
        
        return DB::select("SELECT *
                            FROM `marks`
                            WHERE (`registration_id` = $id) and (level=$level->id)
        ");
        
    }

    public function scopeStatsByNAtionality($q)
    {
        return $q->leftJoin('users', 'users.id', '=', 'registrations.user_id')
            ->leftJoin('nationalities', 'nationalities.id', '=', 'users.nationality_id')
            ->where('users.role', 0) // Role
            ->groupBy('users.nationality_id')
            ->selectRaw('count(registrations.id) as count, nationalities.name');
    }
    public function scopeStats($q, $data)
    {
        return $q->selectRaw('`' . $data . '` , count(*) as count')
            ->groupBy($data)
            ->orderBy($data);
    }
        public function getreceiptImageAttribute($value)
    {
        if ($value) {
            return url(config('variables.receipt_image.public').$value);
        }
    }
    public function setreceiptImageAttribute($photo)
    {
        $this->attributes['receipt_image'] = move_file($photo, 'receipt_image');
    }
    public function scopeStudentsForMark($q, $month = 1, $semester = 1, $level = 1)
    {
 if($level==0){
    return $q->join('classrooms', function ($join) {
            $join->on('classrooms.id', '=', 'registrations.classroom_id')
                ->on('classrooms.section_id', '=', 'registrations.section_id');
        })->join('users', 'users.id', '=', 'registrations.user_id')
            ->leftJoin('marks', function ($join) use ($month, $semester) {
                $join->on('marks.registration_id', '=', 'registrations.id')
                   
                    ->where('month', $month)
                    ->where('semester', $semester);
            })
            ->where('classrooms.id', request('classroom'))
            ->where('users.status', 1)
          
            
            ->select('registrations.id', 'users.name', 'registrations.level_id', 'marks.mark1', 'marks.mark2', 'marks.mark3' ,'marks.total', 'marks.separate_section');
            ;
 }
        return $q->join('classrooms', function ($join) {
            $join->on('classrooms.id', '=', 'registrations.classroom_id')
                ->on('classrooms.section_id', '=', 'registrations.section_id');
        })->join('users', 'users.id', '=', 'registrations.user_id')
            ->leftJoin('marks', function ($join) use ($month, $semester, $level) {
                $join->on('marks.registration_id', '=', 'registrations.id')
                    ->where('marks.level', $level)
                    ->where('month', $month)
                    ->where('semester', $semester);
            })
            ->where('classrooms.id', request('classroom'))
            ->where('users.status', 1)
            ->where('registrations.level_id', $level)
            // ->select('registrations.id', 'users.name', 'registrations.level_id');
            ->select('registrations.id', 'users.name', 'registrations.level_id', 'marks.mark1', 'marks.mark2', 'marks.mark3' ,'marks.total', 'marks.separate_section');
            ;
    }
    public function scopeSearch($q)
    {
        
        if (request('section')) {
            $q->whereHas('section', function ($q) {
                $q->where('name', 'like', '%' . request('section') . '%');
            });
        }
if (auth()->user()->isSupervisor) { // is supervisor
$q->whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            });
        }
        if (request('section_id')) {
            $q->whereHas('section', function ($q) {
                $q->where('id', request('section_id'));
            });
        }

        if (request('telecom')) {
            $q->whereHas('telecom', function ($q) {
                $q->where('name', 'like', '%' . request('telecom') . '%');
            });
        }

        if (request('telecom_id')) {
            $q->whereHas('telecom', function ($q) {
                $q->where('id', request('telecom_id'));
            });
        }

        if (request('period')) {
            $q->whereHas('period', function ($q) {
                $q->where('name', 'like', '%' . request('period') . '%');
            });
        }

        if (request('period_id')) {
            $q->whereHas('period', function ($q) {
                $q->where('id', request('period_id'));
            });
        }

        if (request('classroom')) {
            $q->whereHas('classroom', function ($q) {
                $q->where('name', 'like', '%' . request('classroom') . '%');
            });
        }

        if (request('classroom_id')) {
            $q->whereHas('classroom', function ($q) {
                $q->where('id', request('classroom_id'));
            });
        }

        if (! is_null(request('status', null))) {
            $q->where('status', request('status'));
        }
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getCreatedAtFormatedAttribute()
    {
        if ($this->created_at) {
            return $this->created_at->format('d-m-Y') . ', ' . $this->created_at->format('h:i A');
        }
    }

    public function getStatusNameAttribute()
    {
        return config('variables.registrations_status')[$this->status];
    }
   public function getPaymentTypeNameAttribute()
    {
        return config('variables.payment_type2')[$this->payment_type];
    }

    public function getLevelNameAttribute()
    {
        return config('variables.sections_level')[$this->level];
    }
}
