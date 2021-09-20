<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Division;
use App\Job;
use App\Configuration;
use App\Mail\Contact;
use Mail;
use App\JobRequest;
use Alert;
use Illuminate\Http\Request;
use App\User;
use App\Mark;
use App\Classroom;
use App\Registration;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads        = Advertisement::active()->get();
        $divisions  = Division::forHome()->where('type', 1)->get();
        $classrooms = Classroom::forHome()->where('status', 1)->get();
        $jobs       = Job::active()->get();

        return view('site.index', compact('ads', 'divisions', 'classrooms', 'jobs'));
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
     * Post division
     */
    public function postDivision(Request $request)
    {
        if (auth()->guest()) {
            $user = User::where('username', request('username'))->first();

            if (! $user) { // create new user
                $user = User::create(request()->all());
            } else { // user exist
                alert('مستخدم موجود يرجى تسجيل الدخول.', '', 'error');
                return back();
            }
        } else {
            $user = auth()->user();
        }

        if ($user->registrations()
                ->where('section_id', request('section_id'))
                ->whereYear('created_at', date('Y'))
                ->exists()) {
            alert('الطالبة لا تسجل في نفس المسار إلا مرة واحدة خلال السنة الحالية.', '', 'error');
            return back();
        }

        $user->registrations()->create(request()->all());

        auth()->login($user);

        alert('تم ارسال طلب التسجيل والدخول التلقائي للحساب.', '', 'success');
        // alert('نعتذر عن قبول التسجيل.', '', 'error');

        return redirect('/profile');
    }

 /**
     * divisions Page
     */
    public function classroom($id)
    {
        $classroom = Classroom::findOrFail($id);

        return view('site.classroom', compact('classroom'));
    }

    /**
     * Post division
     */
    public function postClassroom(Request $request)
    {
        if (auth()->guest()) {
            $user = User::where('username', request('username'))->first();

            if (! $user) { // create new user
                $user = User::create(request()->all());
            } else { // user exist
                alert('مستخدم موجود يرجى تسجيل الدخول.', '', 'error');
                return back();
            }
        } else {
            $user = auth()->user();
        }

        if ($user->registrations()
                ->where('section_id', request('section_id'))
                ->whereYear('created_at', date('Y'))
                ->exists()) {
            alert('الطالبة لا تسجل في نفس المسار إلا مرة واحدة خلال السنة الحالية.', '', 'error');
            return back();
        }

        $user->registrations()->create(request()->all());

        auth()->login($user);

        alert('تم ارسال طلب التسجيل والدخول التلقائي للحساب.', '', 'success');
        // alert('نعتذر عن قبول التسجيل.', '', 'error');

        return redirect('/profile');
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
            'status' => 0
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
        $user->load('registrations.section', 'registrations.telecom', 'registrations.period', 'registrations.classroom');

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
        // dd($marks);

        return view('site.marks', compact('marks', 'registration_id', 'level'));
    }
}
