@extends('site.new_default')

@section('content')
    <section class="sub-page">
        <header>
            <div class="container">
                <h2>{{ $job->name }}</h2>
                <p>{{ nl2br($job->description) }}</p>
                <p> {{ $job->salary }}   {{ $job->time }}</p>
                
            </div>
        </header>
        <hr>
@auth
        <div class="container">
            <div class="details">
                {!! Form::open([
                    'route' => 'job.store'
                ]) !!}
                    <div class="row">
                        <div class="col-12">
                            {!! Form::hidden('job_id', $job->id) !!}

                            <!--{!! Form::myInput('text', 'name', 'الاسم الرباعي', ['required']) !!}-->

                            <!--{!! Form::myInput('text', 'mobile', 'الجوال', ['required']) !!}-->

                            {!! Form::mySelect('department_id', 'القسم', ['' => '']+ App\Department::where('need_teacher',1)->pluck('name', 'id')->toArray(), null) !!}
                        
                            {!! Form::myTextArea('note', 'الملاحظات ', ['rows' => 10]) !!}
                     
                        <label class="container">شروط الإنضمام:
                        <br>
                         {{ $job->skills }}
                         <br>
                         <hr>
                           <input type="checkbox" class="myinput large" name="terms" required>
                         قبول شروط الإنضمام
</label>
                    </div>

                    <button class="btn btn-danger btn-website">ارسال الطلب</button>

                {!! Form::close() !!}
            </div>
        </div>
        @endauth
        @guest
          <div class="container">
              <hr>
        <p>يجب ان تقوم بتسجيل الدخول اولاً من حساب معلم:</p>
    <span>    <a class="nav-link btn btn-danger btn-website" href="{{url('/teacher/register')}}">    تسجيل حساب جديد </a></span>
    <br>
        <a class="nav-link btn btn-danger btn-website" href="{{url('/login')}}">  لدي حساب تسجيل دخول </a>
        </div>
        @endguest
    </section>
@endsection