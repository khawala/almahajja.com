<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [ 'name', 'description', 'division_id', 'supervisor_id', 'category', 'track', 'pdf_file','period_id','status'];

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
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
        public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_section', 
      'section_id', 'department_id');
    }
    public function divisiontimes()
    {
        return $this->hasMany(DivisionTime::class);
    }
    public function levels()
    {
        return $this->belongsToMany(Level::class, 'level_sections', 
        'section_id', 'level_id')->withPivot('pdf_file','brief');
    }
    public function division()
    {
        return $this->belongsTo(Division::class)->withDefault();
    }
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id')->withDefault();
    }
       public function getStatusNameAttribute()
    {
        return config('variables.status')[$this->status];
    }

    /*
    |------------------------------------------------------------------------------------
    | scopes
    |------------------------------------------------------------------------------------
    */
    public function scopelistWithDivision($q)
    {
        return $q->select('sections.id', \DB::raw("concat(sections.name, ' - ', 
                    case 
                        when gender = 0 then 'رجال'
                        when gender = 1 then 'نساء'
                        when gender = 2 then 'متاح للكل'
                    end
                    , ' - ',divisions.name) as name"))
                ->leftJoin('divisions', 'divisions.id', '=', 'sections.division_id')
                ->pluck('name', 'id');
    }
    public function scopeListGroup($q)
    {
        $res = [];
        $departments = Department::with('sections')->get();
        foreach ($departments as $department) {
            foreach ($department->sections as $section) {
                if (auth()->user()->isTeacher) { // teaher
                    if (! $section->classrooms->where('teacher_id', auth()->id())->count()) {
                        continue;
                    }
                }
                $res[$department->name][$section->id] = $section->name . ' - ' . $department->name;
            }
        }
        return $res;
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getCountHoursAttribute()
    {
        $divisiontimes = $this->divisiontimes;
        return $divisiontimes->pluck('numberHours')->sum();
    }
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
