@php
  $title = isset($item) ? $item->name: "إنشاء طلبات التوظيف"
@endphp

<div class="row">
  <div class="col-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
      </div>
      <div class="box-body">


        {!! Form::mySelect('job_id', 'الوظيفة  <span class=red>*</span>', ['' => 'الوظيفة'] + App\Job::pluck('name', 'id')->toArray(), null, ['required','class' =>'form-control select']) !!}
        
        {!! Form::mySelect('department_id', 'القسم  ', ['' => 'القسم'] + App\Department::where('need_teacher',1)->pluck('name', 'id')->toArray(),null, ['class' =>'form-control select']) !!}
     @isset($item)
 <a class="nav-link " href="{{ route(ADMIN . '.teachers.edit', $item->user->id) }}">  بيانات مقدم الطلب:  {{$item->user->name}}  </a>
      @endisset
        <!--{!! Form::myInput('text', 'name', 'الاسم الرباعي <span class=red>*</span>', ['required']) !!}-->

        <!--{!! Form::myInput('text', 'mobile', 'الجوال <span class=red>*</span>', ['required']) !!}-->

        <!--{!! Form::mySelect('nationality_id', 'الجنسية <span class=red>*</span>', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']) !!}-->
          {!! Form::myTextArea('note', 'الملاحظات', ['rows' => 13]) !!}

          @isset($item)
              {!! Form::myInput('text', 'created_at', 'تاريخ الطلب', ['disabled'], $item->createdAtFormated) !!}
          @endisset

          {!! Form::mySelect('status', ' حالة الطلب', config('variables.jobs_status')) !!}
      </div>
    </div>
  </div>
      
</div>