<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelSection extends Model
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
            'level_id'        => 'required',
            
            'section_id'        => 'required',
        ];
    
        return $common;
    }
        public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
     public function getPdfFileAttribute($value)
    {
        if ($value) {
            return url(config('variables.level_sections_pdf_file.public').$value);
        }
    }
    public function setPdfFileAttribute($photo)
    {
        $this->attributes['pdf_file'] = move_file($photo, 'level_sections_pdf_file');
    }
}
