<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>المحجة البيضاء- تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css_new/boostrap4.min.css">
    <link rel="stylesheet" href="css_new/all.min.css">
    <link rel="stylesheet" href="css_new/style.css">
    <link rel="stylesheet" href="css/style.css">



    <link rel="icon" type="image/png" href="images/logo-fav.png" sizes="32x32">
</head>

<body>

<!-- Start Login Section  -->
<section class="login-sec">

    <form role="form" method="POST" action="{{ url('/login') }}">

        @csrf
        <div class="inputs">
            <img src="images/logo.png" alt="">
            @include('admin.commun.flash-message')
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
<!-- End Login Section  -->


<script src="js/jquery.js"></script>
<script src="js/poper.js"></script>
<script src="js/bootstrap4.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/custome.js"></script>

</body>

</html>