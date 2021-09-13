@php
  $title = isset($item) ? $item->name: "إنشاء طلبات التوظيف"
@endphp

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">

        {!! Form::mySelect('job_id', 'الوظيفة  <span class=red>*</span>', ['' => 'الوظيفة'] + App\Job::pluck('name', 'id')->toArray(), null, ['required']) !!}

        {!! Form::myInput('text', 'name', 'الاسم الرباعي <span class=red>*</span>', ['required']) !!}

        {!! Form::myInput('text', 'mobile', 'الجوال <span class=red>*</span>', ['required']) !!}

        {!! Form::mySelect('nationality_id', 'الجنسية <span class=red>*</span>', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']) !!}

      </div>
    </div>

  </div>
  <div class="col-sm-4">
    <div class="box box-info">
      <div class="box-body">
          {!! Form::myTextArea('cv_description', 'السيرة الذاتية', ['rows' => 13]) !!}

          @isset($item)
              {!! Form::myInput('text', 'created_at', 'تاريخ الطلب', ['disabled'], $item->createdAtFormated) !!}
          @endisset

          {!! Form::mySelect('status', ' حالة الطلب', config('variables.jobs_status')) !!}
      </div>
    </div>
  </div>
      
</div>