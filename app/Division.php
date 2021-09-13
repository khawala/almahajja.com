<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [ 'name', 'description', 'batch', 'price', 'status', 'gender', 'type', 'photo', 'activity', 'note', 'created_by' ,'updated_by'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            'name'        => 'required',
            'description' => 'required',
        ];
    
        return $common;
    }

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by')->withDefault();
    }
    public function updator()
    {
        return $this->belongsTo(User::class, 'updated_by')->withDefault();
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    
    /*
    |------------------------------------------------------------------------------------
    | scopes
    |------------------------------------------------------------------------------------
    */
    public function scopeForHome($q)
    {
        $q->active()
            ->onlyWomen()
            ;
    }
    public function scopeOnlyWomen($q)
    {
        $q->where('gender', 1);
    }
    public function scopeActive($q)
    {
        $q->where('status', 1);
    }
    public function scopeStats($q, $data)
    {
        return $q->selectRaw('`' . $data . '` , count(*) as count')
                ->groupBy($data)
                ->orderBy($data);
    }
    public function scopeListeWithGender($q)
    {
        $data = [];
        $items = $q->get();
        foreach ($items as $item) {
            $data[$item->id] = $item->name . '-' . $item->GenderName ;
        }
        return($data);
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
    public function getDivistionTimesAttribute()
    {
        return $this->sections->pluck('divisiontimes')->collapse();
    }
    public function getTypeNameAttribute()
    {
        return config('variables.divisions_type')[$this->type];
    }
    public function getGenderNameAttribute()
    {
        return config('variables.divisions_gender')[$this->gender];
    }
    public function getPhotoAttribute($value)
    {
        if (!$value) {
            return 'http://placehold.it/400x400';
        }
    
        return url(config('variables.divisions_photo.public').$value);
    }
    public function setPhotoAttribute($photo)
    {
        $this->attributes['photo'] = move_file($photo, 'divisions_photo');
    }
}
