<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
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
            'supervisor_id'    => 'required',
          
            'registeration_status'    => 'required',
            'payment_type'    => 'required',
            'register_type'    => 'required',
        ];
    
        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id')->withDefault();
    }
    // public function section()
    // {
    //     return $this->belongsTo(Section::class);
    // }

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
                ->join('divisions', 'sections.division_id', '=', 'divisions.id')
                ->leftJoin('users', 'users.id', '=', 'classrooms.teacher_id')
                ->select('classrooms.id as classroom_id', 'classrooms.name as classroom_name', 'sections.name as section_name', 'users.name as user_name');

        if (auth()->user()->isTeacher) { // is teacher
            $q->where('classrooms.teacher_id', auth()->id());
        }

        return $q;
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
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault();
    }
    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by')->withDefault();
    }
}
