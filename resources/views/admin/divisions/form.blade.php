@php
  $title = isset($item) ? $item->name: "إنشاء الدورات"
@endphp

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">

        {!! Form::myInput('text', 'name', 'اسم الدورة <span class=red>*</span>', ['required']) !!}

        {!! Form::myTextArea('description', 'نبذة عن الدورة <span class=red>*</span>', ['required']) !!}

        {!! Form::myInput('text', 'batch', 'انعقاد الدورة <span class=red>*</span>', ['required']) !!}

        {!! Form::myInput('number', 'price', 'رسوم التسجيل <span class=red>*</span>', ['required']) !!}

        {!! Form::myInput('text', 'activity', 'الانشطة') !!}
        
      </div>
    </div>

  </div>

  <div class="col-sm-4">
      <div class="box box-warning">
          <div class="box-body">

            {!! Form::mySelect('gender', 'متاح لـ <span class=red>*</span>', config('variables.divisions_gender')) !!}
            
            {!! Form::mySelect('type', 'نوع الدورة <span class=red>*</span>', config('variables.divisions_type')) !!}
            
            {!! Form::mySelect('status', 'حالة التسجيل <span class=red>*</span>', config('variables.status')) !!}
            
            {!! Form::myTextArea('note', 'كمية الحفظ') !!}

            @isset($item)
                @if ($item->created_by)
                    {!! Form::myInput('text', 'created_by', 'تسجيل بواسطة', ['disabled'], $item->creator->name) !!}
                @endif
                @if ($item->created_at)
                    {!! Form::myInput('text', 'created_at', 'تاريخ التسجيل', ['disabled'], $item->created_at) !!}
                @endif
                @if ($item->updated_by)
                {!! Form::myInput('text', 'updated_by', 'تحديث بواسطة', ['disabled'], $item->updator->name) !!}
                @endif
                @if ($item->updated_at)
                    {!! Form::myInput('text', 'updated_at', 'تاريخ التحديث', ['disabled'], $item->updated_at) !!}
                @endif
            @endisset
          </div>
      </div>
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-camera"></i> صورة الدورة </h3>
          </div>
          <div class="box-body">
            {!! Form::myFile('photo', 'الصورة') !!}
    
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