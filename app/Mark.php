<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model
{
    // use SoftDeletes;

    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */
    public function scopeNotes($q, $registration_id, $section_id)
    {
        $q->join('sections', 'marks.section_id', '=', 'sections.id')
            ->join('departments', 'marks.department_id', '=', 'departments.id')
            ->leftJoin('classrooms', 'classrooms.section_id', '=', 'sections.id')
            ->join('users', 'users.id', '=', 'classrooms.teacher_id')

            ->where('marks.registration_id', $registration_id)
            ->where('marks.section_id', $section_id)
            ->select(['marks.month', 'marks.semester', 'marks.level', 'marks.mark1', 'marks.mark2', 'marks.mark3', 'departments.name as departments_name', 'sections.name as sections_name', 'classrooms.name as classrooms_name', 'users.name as users_name']);
        ;
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getMonthNameAttribute()
    {
        return config('variables.months')[$this->month];
    }

    public function getSemesterNameAttribute()
    {
        return config('variables.semesters')[$this->semester];
    }
    public function getLevelNameAttribute()
    {
        return config('variables.sections_level')[$this->level];
    }
    public function getSumAttribute()
    {
        return  $this->mark1 + $this->mark2 + $this->mark3;
    }
}
