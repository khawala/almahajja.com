<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\Email;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/' ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
             'username' => 'required|alpha_num|unique:users',
                 'mobile1' => 'required',
            'password' => 'required|min:6|confirmed',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        

if(isset($data['bank_account']))
{
$data['role']=5;
}
                $user = User::create($data);
                $subject='بيانات الدخول الخاصة بك في '.env('APP_NAME');
                $content='رابط الدخول:'.url('login').'<br>';
     $content.='اسم المستخدم:'.$data['username'].'<br>'.'كلمة المرور: '.$data['password'];
      $this->sendEmail($user,$content,$subject);
        return $user;
    }
    
  public function sendEmail(User $user, $content ,$subject)
    {
try {
            \Mail::to($user->email)->send(new Email($content,$subject));
        } catch (\Exception $e) {
            \Log::info($e->getMessage() . ' for order error');
        }
    }
}
