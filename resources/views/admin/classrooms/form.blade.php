@php
  $title = isset($item) ? $item->name: "إنشاء الحلقات والقاعات"
@endphp

<div class="row">
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">

        {!! Form::myInput('text', 'name', 'إسم الحلقة <span class=red>*</span>', ['required']) !!}

        {!! Form::mySelect('section_id', 'المسار <span class=red>*</span>',['' => ''] +  App\Section::pluck('name', 'id')->toArray()) !!}

        {!! Form::mySelect('teacher_id', 'المعلمة <span class=red>*</span>',['' => ''] +  App\User::where('role', 5)->pluck('name', 'id')->toArray()) !!}
          
        {!! Form::myInput('text', 'code', 'الرمز') !!}

      </div>
    </div>

  </div>
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-body">

        {!! Form::mySelect('code', 'رصد الدرجات', config('variables.classrooms_code')) !!}

          {!! Form::myTextArea('description', 'معلومات اضافية') !!}

          {!! Form::myTextArea('note', 'ملاحظات') !!}

          {!! Form::myFile('pdf_file', 'ملف المسار') !!}

          @if (isset($item) && $item->pdf_file)
            <a href="{{ $item->pdf_file }}" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>
          @endif
          
      </div>
    </div>
  </div>
</div>