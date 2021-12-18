<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
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
        ];
    
        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
       public function getStatusNameAttribute()
    {
        return config('variables.status')[$this->status];
    }

        public function sections()
    {
        return $this->belongsToMany(Section::class, 'level_sections', 
        'level_id','section_id')->withPivot('pdf_file','brief');
    }
}
