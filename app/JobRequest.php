<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobRequest extends Model
{
    protected $fillable = [ 'job_id', 'name', 'mobile', 'nationality_id', 'cv_description', 'status','department_id','note','user_id' ];
    protected $with = ['job'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            // 'name'              => 'required',
            // 'mobile'            => 'required',
        ];
    
        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class)->withDefault();
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        public function department()
    {
        return $this->belongsTo(Department::class);
    }
    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */
    public function scopeStats($q, $data)
    {
        return $q->selectRaw('`' . $data . '` , count(*) as count')
                ->groupBy($data)
                ->orderBy($data);
    }
    
    
    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getStatusNameAttribute()
    {
        return config('variables.jobs_status')[$this->status];
    }
    public function getCreatedAtFormatedAttribute()
    {
        if ($this->created_at) {
            return $this->created_at->format('m/d/Y');
        }
    }
}
