<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartRegistration extends Model
{
     protected $fillable = ['user_id', 'section_id', 'batch', 'telecom_id', 'period_id', 'activity_id', 'classroom_id', 'paid', 'level', 'status', 'created_by', 'updated_by', 'note','department_id','level_id','receipt_image','payment_data','reference_no','payment_type'];

    /*
    |------------------------------------------------------------------------------------
    | Validations
    |------------------------------------------------------------------------------------
    */
    public static function rules($update = false, $id=null)
    {
        $common = [
            'user_id'        => 'required',
            'section_id'     => 'required',
        ];

        return $common;
    }

}
