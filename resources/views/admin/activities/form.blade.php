@php
  $title = isset($item) ? $item->name: "إنشاء النشاطات"
@endphp

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">

        {!! Form::myInput('text', 'name', 'اسم النشاط <span class=red>*</span>', ['required']) !!}

        {!! Form::myTextArea('description', 'وصف مختصر') !!}

        {!! Form::mySelect('status', 'الحالة', config('variables.status')) !!}

      </div>
    </div>

  </div>
</div>