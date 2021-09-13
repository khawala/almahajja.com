<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Classroom extends Model
{
    protected $fillable = [ 'name', 'code', 'description', 'section_id', 'teacher_id', 'pdf_file', 'note', ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
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
}
