<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [ 'name', 'description', 'skills', 'time', 'salary', 'gender', 'vacancies', 'status', 'note', ];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            'name'           => 'required',
            'description'    => 'required',
            'skills'         => 'required',
            'time'           => 'required',
            'salary'         => 'required',
            'status'         => 'required',
        ];
    
        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */
    public function scopeActive($q)
    {
        $q->where('status', 1);
    }

    /*
    |------------------------------------------------------------------------------------
    | Attribtues
    |------------------------------------------------------------------------------------
    */
    public function getGenderNameAttribute()
    {
        return config('variables.gender')[$this->gender];
    }
    public function getStatusNameAttribute()
    {
        return config('variables.status')[$this->status];
    }
}
