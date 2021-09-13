<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DivisionTime extends Model
{
    protected $fillable = [ 'section_id', 'description', 'start_date', 'end_date', 'semester', 'level', 'pdf_file'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            'description' => 'required',
        ];
    
        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getStartDateFormatAttribute()
    {
        $date = Carbon::parse($this->start_date);
        return $date->format('d-m-Y') . ', ' . $date->format('h:i A');
    }
    public function getEndDateFormatAttribute()
    {
        $date = Carbon::parse($this->start_date);
        return $date->format('d-m-Y') . ', ' . $date->format('h:i A');
    }
    public function getPdfFileAttribute($value)
    {
        if ($value) {
            return url(config('variables.division_times_pdf_file.public').$value);
        }
        return false;
    }
    public function setPdfFileAttribute($photo)
    {
        $this->attributes['pdf_file'] = move_file($photo, 'division_times_pdf_file');
    }
    public function getNumberHoursAttribute()
    {
        $start = Carbon::parse($this->start_date);
        $end   = Carbon::parse($this->end_date);
        
        return $end->diffInHours($start);
    }
    public function getStatusNameAttribute()
    {
        return config('variables.status')[$this->status];
    }
    public function getSemesterNameAttribute()
    {
        return config('variables.division_times_semester')[$this->semester];
    }
    public function getLevelNameAttribute()
    {
        return config('variables.sections_level')[$this->level];
    }
}
