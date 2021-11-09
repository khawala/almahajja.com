<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Classroom extends Model
{
   protected $guarded = []; 
    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            'name'    => 'required',
            'name'    => 'required',
            'name'    => 'required',
            'name'    => 'required',
            'name'    => 'required',
            'name'    => 'required',
            'name'    => 'required',
            'name'    => 'required',
            
        ];
    
        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id')->withDefault();
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
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
    public function scopeMyList($q)
    {
        if (auth()->user()->isTeacher) {
            $q->where('teacher_id', auth()->id());
        }
        
        return $q->pluck('name', 'id')->toArray();
    }
    public function scopeForMarks()
    {
        $q = DB::table('classrooms')
                ->join('sections', 'classrooms.section_id', '=', 'sections.id')
                ->join('departments', 'classrooms.department_id', '=', 'departments.id')
                ->leftJoin('users', 'users.id', '=', 'classrooms.teacher_id')
                ->select('classrooms.id as classroom_id', 'classrooms.name as classroom_name', 'sections.name as section_name', 'users.name as user_name','departments.name as department_name');

        if (auth()->user()->isTeacher) { // is teacher
            $q->where('classrooms.teacher_id', auth()->id());
        }
if (auth()->user()->isSupervisor) { // is supervisor
            $q->where('departments.supervisor_id', auth()->id());
        }
        if (request('department_id')) {
            $q->where('classrooms.department_id','=',request('department_id'));
            
        }
        if (request('section_id')) {
            $q->where('classrooms.section_id','=',request('section_id'));
            
        }
        if (request('classroom_id')) {
            $q->where('classrooms.id','=',request('classroom_id'));
            
        }
        return $q;
    }

   
  
    public function scopeForHome($q)
    {
        $q->active()
            ->onlyWomen()
            ;
    }
    public function scopeOnlyWomen($q)
    {
        // $q->where('gender', 1);
    }
    public function scopeActive($q)
    {
        $q->where('status', 1);
    }
    public function scopeStats($q, $data)
    {
        return $q->selectRaw('`' . $data . '` , count(*) as count')
                ->groupBy($data)
                ->orderBy($data);
    }
    public function scopeListeWithGender($q)
    {
        $data = [];
        $items = $q->get();
        foreach ($items as $item) {
            $data[$item->id] = $item->name . '-' . $item->GenderName ;
        }
        return($data);
    }
    
    
    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getPdfFileAttribute($value)
    {
        if ($value) {
            return url(config('variables.sections_pdf_file.public').$value);
        }
    }
    public function setPdfFileAttribute($photo)
    {
        $this->attributes['pdf_file'] = move_file($photo, 'sections_pdf_file');
    }
        
    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getStatusNameAttribute()
    {
        return config('variables.status')[$this->status];
    }
    public function getDivistionTimesAttribute()
    {
        return $this->sections->pluck('divisiontimes')->collapse();
    }
    public function getTypeNameAttribute()
    {
        return config('variables.divisions_type')[$this->type];
    }
    public function getGenderNameAttribute()
    {
        return config('variables.divisions_gender')[$this->gender];
    }
    public function getPhotoAttribute($value)
    {
        if (!$value) {
            return 'http://placehold.it/400x400';
        }
    
        return url(config('variables.divisions_photo.public').$value);
    }
    public function setPhotoAttribute($photo)
    {
        $this->attributes['photo'] = move_file($photo, 'divisions_photo');
    }
}
