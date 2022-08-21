<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Division;
use App\Job;
use App\Configuration;
use App\Mail\Contact;
use Mail;
use App\General;
use App\JobRequest;
use Alert;
use Illuminate\Http\Request;
use App\User;
use App\Mark;
use App\Section;
use App\Classroom;
use App\Department;
use App\Registration;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $ads        = Advertisement::active()->get()->take(6);
        $divisions  = Division::forHome()->where('type', 1)->get();
        
        $jobs       = Job::active()->get();
        $departments = Department::where('registeration_status', 1)->get()->take(3);

        return view('site.index', compact('ads', 'divisions', 'departments', 'jobs'));
    }

    /**
     * Post mail
     */
    public function postContact()
    {
        Mail::to(config('mail.from.address'))->send(new Contact());

        alert('تم إرسال البريد الإلكتروني بنجاح', '', 'success');

        return back();
    }


    /**
     * Advertisements Page
     */
    public function advertisement($id)
    {
        $ad = Advertisement::findOrFail($id);

        return view('site.advertisement', compact('ad'));
    }

    /**
     * divisions Page
     */
    public function division($id)
    {
        $division = Division::findOrFail($id);

        return view('site.division', compact('division'));
    }
/**
     * teacher registration Page
     */
    public function teacherRegister()
    {

        return view('site.teacher_register');
    }

    /**
     * Post division
     */
    public function postDivision(Request $request)
    {
        if (auth()->guest()) {
            $user = User::where('username', request('username'))->first();

            if (! $user) { // create new user
                $user = User::create(request()->all());
            } else { // user exist
                alert('مستخدم موجود يرجى تسجيل الدخول.', '', 'خطأ');
               return back();
            }
        } else {
            $user = auth()->user();
        }

        if ($user->registrations()
                ->where('section_id', request('section_id'))
                ->whereYear('created_at', date('Y'))
                ->exists()) {
            alert('الطالبة لا تسجل في نفس المسار إلا مرة واحدة خلال السنة الحالية.', '', 'خطأ');
            return back();
        }

        $user->registrations()->create(request()->all());

        auth()->login($user);

        alert('تم ارسال طلب التسجيل والدخول التلقائي للحساب.', '', 'success');
        // alert('نعتذر عن قبول التسجيل.', '', 'خطأ');

        return redirect('/profile');
    }

 /**
     * divisions Page
     */
    public function department($id)
    {
        $department = Department::findOrFail($id);

        return view('site.department', compact('department'));
    }

 public function sectionLevel(Request $request)
    {
        $section=Section::find($request->section_id);
       
          if($section){ 
       if(count($section->levels)==0){ 
            echo '<option value="">لا توجد مستويات</option>'; 
       }
       echo '<option value=""></option>'; 
        foreach($section->levels as $level){  
            if($level->status==1)
            {
            echo '<option value="'.$level->id.'">'.$level->name.'</option>'; 
        }
        } 
    }else{ 
        echo '<option value="">لا توجد مستويات</option>'; 
    }  
    }
    /**
     * Post division
     */
    public function postDepartment(Request $request)
    {
        if (auth()->guest()) {
            $user = User::where('username', request('username'))->first();

            if (! $user) { // create new user
                $user = User::create(request()->all());
            } else { // user exist
                alert('مستخدم موجود يرجى تسجيل الدخول.', '', 'خطأ');
                return back();
            }
        } else {
            $user = auth()->user();
        }

        if ($user->registrations()
                ->where([['section_id', request('section_id')],['level_id', request('level_id')],['department_id', request('department_id')]])
                ->whereYear('created_at', date('Y'))
                ->exists()) {
                    
            alert('الطالبة لا تسجل في نفس المسار إلا مرة واحدة خلال السنة الحالية.', 'خطأ');
            return back();
        }
          if($request->payment_type==2){
              if (! ($request->hasFile('receipt_image'))) {
                  $this->validate($request, [
            'receipt_image' => 'required',
        ], ['receipt_image.required' => 'الرجاء ارفاق صورة إيصال التحويل'] );
 
 }  
            
          }
     
   $registration= $user->registrations()->create(request()->all());
     $subject='       '.$registration->department->name;
                $content='تم إستقبال طلبك للتسجيل في   '.$registration->department->name.'<br>';
                                $content1='تم إستقبال طلب تسجيل جديد  في   '.$registration->department->name.'<br>';
$supervisor=$registration->department->supervisor;
 if($registration->department->price==0){
        $registration->status=1;
        $registration->save();
             $content.='وسيتم مراجعة طلبك في اسرع وقت ';
           $content1.='ويجب عليك مراجعة الطلب ';
   
        alert('تم ارسال طلب التسجيل   بنجاح.', '', 'success');
  General::sendEmail($user,$content,$subject);
    General::sendEmail($supervisor,$content1,$subject);
     
     
        return redirect('/profile');
    }

if($request->payment_type==1&&($registration->department->price!=0)){


        $tapSecretAPIKey = "sk_live_lMCOm4XPgbkfdjBAQoD6LtIn";
      
        $key = "Bearer $tapSecretAPIKey";
      $amount=$registration->department->price;
   $curl = curl_init();
        $url = \Request::fullUrl();
        $url2 = route('tap.check');
        $currency ="SAR";
$cid=$registration->id;
$phone=$user->mobile1;
$email=$user->email;
$name=$user->name;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/charges",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"amount\":$amount,\"currency\":\"$currency\",\"threeDSecure\":true,\"save_card\":false,\"receipt\":{\"email\":false,\"sms\":true},\"reference\":{\"transaction\":\"$cid\",\"order\":\"$cid\"},\"customer\":{\"first_name\":\"$name\",\"last_name\":\"$name\",\"email\":\"$email\",\"phone\":{\"number\":\"$phone\"}},\"source\":{\"id\":\"src_all\"},\"post\":{\"url\":\"$url\"},\"redirect\":{\"url\":\"$url2\"}}",
            CURLOPT_HTTPHEADER => array(
                "authorization: $key",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $data = json_decode($response);

        $response = json_decode($response, true);

        curl_close($curl);

        if (isset($response['errors'])) {
            return back()->with('errors', $response['errors'][0]);
        }

        if ($err) {

            return back()->with('errors', 'حدث خطأ ما');
        } else {

            $redirectUrl = $data->transaction->url;
            return redirect($redirectUrl);
          }
}
             $content.='وسيتم مراجعة طلبك في اسرع وقت ';
           $content1.='ويجب عليك مراجعة الطلب ';
   
      General::sendEmail($user,$content,$subject);
    General::sendEmail($supervisor,$content1,$subject);
     
        return redirect('/profile');
    }
/**
     * Success payment
     *
     * @return \Illuminate\Http\Response
     */
    public function check(\Illuminate\Http\Request $request)
    {
        
         
  
           $tapSecretAPIKey = "sk_live_lMCOm4XPgbkfdjBAQoD6LtIn";
      
        $key = "Bearer $tapSecretAPIKey";
        
        $tap_id = $request->tap_id;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.tap.company/v2/charges/$tap_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
            CURLOPT_HTTPHEADER => array(
                "authorization: $key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $data = json_decode($response);
        $response = json_decode($response, true);
     
$registration=Registration::find($response['reference']['order']);
if(!$registration)
{
    return redirect('/profile')->with(
        'errors',
     ' حدث خطأ ما بعملية الدفع '
      );   
}
      
        curl_close($curl);
       $tap_id = $request->tap_id;
        if (isset($response['errors'])) {
             return redirect('/course_apply/'.$cid)->with(
        'errors', $response['errors'][0]);
        }
        if ($err) {

           return redirect('/profile')->with(
        'errors',
     ' حدث خطأ ما بعملية الدفع '
      );
        } else {

            if ($data->status == 'CAPTURED') {
       $registration->status=1;
         $registration->paid=$response['amount'];
          $registration->reference_no=$tap_id;
          $registration->payment_data=json_encode($data);
           $registration->save();
                $subject='    التسجيل في  '.$registration->department->name;
                $content='تم إستقبال طلبك للتسجيل في   '.$registration->department->name.'<br>';
                                $content1='تم إستقبال طلب تسجيل جديد  في   '.$registration->department->name.'<br>';
$supervisor=$registration->department->supervisor;
                 $content.='وتم قبولة ';
           $content1.='وتم قبولة ';
         $user = auth()->user();
      General::sendEmail($user,$content,$subject);
    General::sendEmail($supervisor,$content1,$subject);
     
    return redirect('/profile')->with(
        'success',
     '    تم التسجيل بنجاح  '
      );   
            }
        }
        }
    
    public function success()
    {
    }
    /**
     * job Page
     */
    public function job($id)
    {
        $job = Job::findOrFail($id);

        return view('site.job', compact('job'));
    }

    /**
     * Post job request
     */
    public function postJobRequest()
    {
        JobRequest::create(request()->all() + [
            'status' => 0,
            'user_id'=>auth()->user()->id
        ]);

        alert('تم استلام طلب التوظيف بنجاح', '', 'success');

        return back();
    }

    /**
     * Profile
     */
    public function profile()
    {
        $user = auth()->user();
        $user->load('registrations.section', 'registrations.telecom', 'registrations.period', 'registrations.classroom','registrations.level');
        return view('site.profile', compact('user'));
    }
    /**
     * Profile
     */
    public function editProfile()
    {
        $user = auth()->user();
        $user->load('registrations.section', 'registrations.telecom', 'registrations.period', 'registrations.classroom','registrations.level');
        return view('site.edit_profile', compact('user'));
    }
        /**
     * Profile
     */
    public function postProfile(Request $request)
    {
        
       $this->validate($request, User::rules(true, auth()->user()->id));

        $user = auth()->user();
        
        $user->update($request->all());
        
        alert('تم  التعديل بنجاح', 'success');

     
        return view('site.profile', compact('user'));
    }
    /**
     * Notes
     */
    public function marks($registration_id, $section_id)
    {
        $marks = Mark::notes($registration_id, $section_id)->get();
        $level = Registration::where('user_id', auth()->id())
                                ->latest('id')
                                ->first()->level;
   

        return view('site.marks', compact('marks', 'registration_id', 'level'));
    }
}
