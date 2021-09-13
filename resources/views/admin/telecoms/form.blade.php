@php
  $title = isset($item) ? $item->name: "إنشاء المكالمات"
@endphp

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">

        {!! Form::myInput('text', 'name', 'المكالمة <span class=red>*</span>', ['required']) !!}

        {!! Form::myTextArea('description', 'تكلفة الاتصال') !!}

        {!! Form::mySelect('status', 'الحالة', config('variables.status')) !!}

      </div>
    </div>

  </div>
</div>