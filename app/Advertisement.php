<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['name', 'short_description', 'description', 'photo', 'url', 'status', 'note',];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id = null)
    {
        $common = [
         
            'photo'             => 'mimes:jpeg,jpg,png',
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
        return config('variables.advertisements_status')[$this->status];
    }
    public function getPhotoAttribute($value)
    {
        if (!$value) {
            return 'http://placehold.it/400x400';
        }

        return url(config('variables.advertissements_photo.public') . $value);
    }
    public function setPhotoAttribute($photo)
    {
        $this->attributes['photo'] = move_file($photo, 'advertissements_photo');
    }
}
