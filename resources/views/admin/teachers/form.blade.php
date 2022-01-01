@php
  $title = isset($item) ? $item->name: "اضافة مستخدم جديد";
  $disabled = isset($item) ? 'readonly' : '';
@endphp

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">
        <div class="row">
     
          <div class="col-sm-6">
            {!! Form::myInput('text', 'name', 'الاسم الرباعي <span class=red>*</span>', ['required']) !!}

            {!! Form::myInput('email', 'email', 'البريد الالكتروني') !!}
    
            {!! Form::myInput('text', 'national_id', 'رقم الهوية ') !!}
    
            <!--{!! Form::mySelect('nationality_id', 'الجنسية <span >*</span>', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']) !!}-->
            
            {!! Form::mySelect('gender', 'الجنس <span class=red>*</span>', config('variables.sexes')) !!}
    
             {!! Form::myInput('text', 'address', ' مكان الإقامة ') !!}
          </div>
          
          <div class="col-sm-6">
               {!! Form::myInput('text', 'mobile1', 'جوال التواصل <span class=red>*</span>', ['required']) !!}
              {!! Form::myInput('text', 'bank_account', 'رقم الحساب البنكي') !!}
            {!! Form::myInput('textarea', 'cv_text', 'السيرة الذاتية  ') !!}
     
            {!! Form::mySelect('telecom_id', 'شريحة الجوال', ['' => ''] + App\Telecom::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
                  {!! Form::mySelect('department_id', ' القسم', ['' => ''] + App\Department::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']) !!}
      
              {!! Form::mySelect('status', 'الحالة', config('variables.status'), null, [auth()->user()->isNotAdmin ? 'disabled' : '']) !!}

          </div>
        </div>
        
        
        
      </div>
    </div>

  </div>

  <div class="col-sm-4">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> معلومات تسجيل الدخول </h3>
      </div>
      <div class="box-body">
        {!! Form::myInput('text', 'username', 'اسم المستخدم <span class=red>*</span>', ['required', $disabled]) !!}

        {!! Form::myInput('password', 'password', 'كلمة السر') !!}

        {!! Form::myInput('password', 'password_confirmation', 'تأكيد كلمة السر') !!}

        
      </div>
    </div>

    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-camera"></i> صورة المستخدم </h3>
      </div>
      <div class="box-body">
        {!! Form::myFile('photo', 'الصورة الشخصية') !!}

        <p><small>جميع الصور مع التمديد   
            <span class="btn btn-default btn-xs">JPG</span>
            <span class="btn btn-default btn-xs">JPEG</span>
            <span class="btn btn-default btn-xs">PNG</span></small></p>
      </div>

      @if (isset($item) && $item->photo)
        <div class="text-center">
          <img src="{{ $item->photo }}" alt="">
          <hr>
        </div>
      @endif


<div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-camera"></i> السيرة الذاتية </h3>
      </div>
      <div class="box-body">
        {!! Form::myFile('cv', ' السيرة الذاتية') !!}
      </div>

      @if (isset($item) && $item->cv)
        <div class="text-center">
       <a href="{{ $item->cv }}"> السيرة الذاتية </a>
          <hr>
        </div>
      @endif
    </div>
  

</div>