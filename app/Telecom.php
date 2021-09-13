<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telecom extends Model
{
    protected $fillable = [ 'name', 'description', 'status'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            'name'           => 'required',
        ];
    
        return $common;
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
}
