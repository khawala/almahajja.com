<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
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
            'name'        => 'required',
                 'key'        => 'required',
       
        ];
    
        return $common;
    }
 public function getFileAttribute($value)
    {
        if (!$value) {
            return 'http://placehold.it/400x400';
        }
    
        return url(config('variables.settings_file.public').$value);
    }
    public function setFileAttribute($file)
    {
        $this->attributes['file'] = move_file($file, 'settings_file');
    }
}
