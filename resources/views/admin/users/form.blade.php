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
    
            {!! Form::myInput('text', 'national_id', 'رقم الهوية <span class=red>*</span>', ['required']) !!}
    
            {!! Form::mySelect('nationality_id', 'الجنسية <span class=red>*</span>', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']) !!}
            
            {!! Form::mySelect('gender', 'الجنس <span class=red>*</span>', config('variables.sexes')) !!}
    
            {!! Form::myInput('text', 'mobile1', 'جوال التواصل <span class=red>*</span>', ['required']) !!}
          </div>
          <div class="col-sm-6">
              {!! Form::myInput('text', 'mobile2', 'جوال الطوارئ') !!}

              {!! Form::myInput('text', 'phone', 'هاتف ثابت') !!}
      
              {!! Form::mySelect('status', 'الحالة', config('variables.status'), null, [auth()->user()->isNotAdmin ? 'disabled' : '']) !!}
      
              {!! Form::myTextArea('note', 'الملاحظات') !!}
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

        {!! Form::mySelect('role', 'الصلاحيات <span class=red>*</span>', config('variables.roles'), null, ['required' , auth()->user()->isNotAdmin ? 'disabled' : '']) !!}

        
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
    </div>

  </div>

</div>