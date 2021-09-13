<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = [ 'about_almahajja_waqf', 'about_almahajja_project', 'vision', 'mission', 'values', 'goals', 'history', 'website', 'email', 'mobile', 'phone', 'fax', 'toll_free', 'twitter', 'instagram', 'facebook', 'youtube', 'snapchat', 'address', 'lat', 'lng', 'logo',];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false)
    {
        $commun = [
            
        ];

        return $commun;
    }

    /*
    |------------------------------------------------------------------------------------
    | Attributes
    |------------------------------------------------------------------------------------
    */
    public function getLogoAttribute($value)
    {
        if (!$value) {
            return 'https://placehold.it/600x600';
        }
    
        return config('variables.configurations_logo.public').$value;
    }
    public function setLogoAttribute($photo)
    {
        $this->attributes['logo'] = move_file($photo, 'configurations_logo.image');
    }
}
