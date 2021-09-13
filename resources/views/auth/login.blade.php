@extends('layouts.signin')

@section('content')

    <p class="login-box-msg">تسجيل الدخول</p>
    @include('admin.commun.flash-message')
    
    @include('auth._login_form')
    
@endsection
