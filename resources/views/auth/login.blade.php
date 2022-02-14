@extends('site.new_default')

@section('content')
<!-- Start Login Section  -->


<!-- Start Login Section  -->
<section class="login-sec">

    <form role="form" method="POST" action="{{ url('/login') }}">

        @csrf
        <div class="inputs">

            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
                <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" value="{{ old('username') }}" required>
            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input type="password" class="form-control" name="password" placeholder="كلمة المرور" value="{{ old('password') }}" required>

            </div>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <input type="submit" class="btn btn-website" name="" value="تسجيل دخول">
                      <hr>
            <a class="btn btn-website" href="{{url('/register')}}">  تسجيل حساب جديد</a>
                          <hr>
            <a class="btn btn-website" href="{{url('teacher/register')}}">  تسجيل حساب جديد كمعلم</a>
           
            </div>

            <div class="description">
                <p>
                    الموقع الرسمي لوقف المحجة البيضاء
                </p>
                <p>
                    جميع الحقوق محفوظة لوقف المحجة البيضاء 1443هـ/2021م
                </p>
            </div>
        </div>

    </form>
</section>
@endsection