<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Register;
use App\Mail\Email;


class General extends Model
{
 public static function sendEmail(User $user, $content ,$subject)
    {
try {
            \Mail::to($user->email)->send(new Email($content,$subject));
        } catch (\Exception $e) {
            \Log::info($e->getMessage() . ' for order error');
        }
    }
public static function sendEmail2($email, $content ,$subject)
    {
try {
            \Mail::to($email)->send(new Email($content,$subject));
        } catch (\Exception $e) {
            \Log::info($e->getMessage() . ' for order error');
        }
    }
   


}
