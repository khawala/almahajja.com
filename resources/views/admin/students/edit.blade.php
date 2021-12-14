@extends('admin.default')

@section('page-header')
  طالبة <small>تعديل</small>
@stop

@section('content')

<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab-01" data-toggle="tab">تفاصيل الطالبة</a></li>
    <li role="presentation"><a href="#tab-02" data-toggle="tab">دورات الطالبة</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
      {!! Form::model($item, [
              'action' => ['StudentController@update', $item->id],
              'method' => 'put', 
              'files' => true
          ])
      !!}
@php
$title = isset($item) ? $item->name: "اضافة طالب جديد";
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
          <div class="col-sm-12">
                                      <p>الاسم الرباعي </p>
{{$item->name}}
<hr>
            <p>البريد الإلكتروني </p>
{{$item->email}}
<hr>
            <p>رقم الهوية</p>
{{$item->national_id}}
<hr>
            <p>جوال  التواصل </p>
{{$item->mobile1}}
<hr>
                        <p> الجنس </p>
{{$item->gender}}
<hr>
                  <p> الجنسية </p>
{{$item->nationality_id}}
<hr>

              {!! Form::mySelect('status', 'الحالة', config('variables.status'), null, [auth()->user()->isNotAdmin ? 'disabled' : '']) !!}

            <p>جوال  الطوارئ </p>
{{$item->mobile2}}
<hr>
            <p>هاتف ثابت   </p>
{{$item->phone}}
<hr>
            <p>  ملاحظات </p>
{{$item->note}}
<hr>

 
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
   

      @if (isset($item) && $item->photo)
      <div class="text-center">
        <img src="{{ $item->photo }}" alt="">
        <hr>
      </div>
      @endif
    </div>
  
</div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
      </div>

      {!! Form::close() !!}
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab-02">
        <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              @include('admin.registrations._table', ['items' => $item->registrations])
            </div>
        </div>
    </div>
  </div>

</div>
    

@stop

