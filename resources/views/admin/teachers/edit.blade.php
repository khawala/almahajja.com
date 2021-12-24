@extends('admin.default')

@section('page-header')
  مستخدم <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['TeacherController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

@php
  $title = isset($item) ? $item->name: "اضافة مستخدم جديد";
  $disabled = isset($item) ? 'readonly' : '';
@endphp

<div class="row">
  <div class="col-sm-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-6">
   
                        <p>الاسم الرباعي </p>
{{$item->name}}
<hr>
            <p>البريد الإلكتروني </p>
{{$item->email}}
<hr>
            <p>رقم الهوية</p>
{{$item->national_id}}
<hr>
                        <p> الجنس </p>
{{$item->gender}}
<hr>
            <p>مكان الإقامة  </p>
{{$item->address}}
<hr>
            <p>جوال  التواصل </p>
{{$item->mobile1}}
<hr>
                        <p> رقم الحساب البنكي </p>
{{$item->bank_account}}
<hr>
            <p>شريحة الجوال  </p>
{{$item->telecom_id}}
<hr>
            <p>رقم الهوية</p>
{{$item->national_id}}
<hr>
   
          <p>السيرة الذاتية </p>
          {{$item->cv_text}}
          @if (isset($item) && $item->cv)
        <div class="text-center">
       <a href="{{ $item->cv }}"> السيرة الذاتية </a>
          <hr>
        </div>
      @endif
<hr>

              {!! Form::mySelect('status', 'الحالة', config('variables.status'), null, [auth()->user()->isNotAdmin ? 'disabled' : '']) !!}

          </div>
        </div>
        
        
        
      </div>
    </div>
	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  </div>

<!--  <div class="col-sm-4">-->
<!--    <div class="box box-danger">-->
<!--      <div class="box-header with-border">-->
<!--        <h3 class="box-title"><i class="fa fa-user"></i> معلومات تسجيل الدخول </h3>-->
<!--      </div>-->
<!--      <div class="box-body">-->
<!--        {!! Form::myInput('text', 'username', 'اسم المستخدم <span class=red>*</span>', ['required', $disabled]) !!}-->

<!--        {!! Form::myInput('password', 'password', 'كلمة السر') !!}-->

<!--        {!! Form::myInput('password', 'password_confirmation', 'تأكيد كلمة السر') !!}-->

        
<!--      </div>-->
<!--    </div>-->

<!--    <div class="box box-warning">-->
<!--      <div class="box-header with-border">-->
<!--        <h3 class="box-title"><i class="fa fa-camera"></i> صورة المستخدم </h3>-->
<!--      </div>-->
<!--      <div class="box-body">-->
<!--        {!! Form::myFile('photo', 'الصورة الشخصية') !!}-->

<!--        <p><small>جميع الصور مع التمديد   -->
<!--            <span class="btn btn-default btn-xs">JPG</span>-->
<!--            <span class="btn btn-default btn-xs">JPEG</span>-->
<!--            <span class="btn btn-default btn-xs">PNG</span></small></p>-->
<!--      </div>-->

<!--      @if (isset($item) && $item->photo)-->
<!--        <div class="text-center">-->
<!--          <img src="{{ $item->photo }}" alt="">-->
<!--          <hr>-->
<!--        </div>-->
<!--      @endif-->


<!--<div class="box-header with-border">-->
<!--        <h3 class="box-title"><i class="fa fa-camera"></i> السيرة الذاتية </h3>-->
<!--      </div>-->
<!--      <div class="box-body">-->
<!--        {!! Form::myFile('cv', ' السيرة الذاتية') !!}-->
<!--      </div>-->

<!--      @if (isset($item) && $item->cv)-->
<!--        <div class="text-center">-->
<!--       <a href="{{ $item->cv }}"> السيرة الذاتية </a>-->
<!--          <hr>-->
<!--        </div>-->
<!--      @endif-->
<!--    </div>-->
  

<!--</div>-->

    
  {!! Form::close() !!}

@stop

