@extends('admin.default')

@section('page-header')
  الحلقات والقاعات <small>تعديل</small>
@stop

@section('content')
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab-01" data-toggle="tab">تفاصيل الحلقة</a></li>
    <li role="presentation"><a href="#tab-02" data-toggle="tab">التسجيل</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
      {!! Form::model($item, [
        'action' => ['ClassroomController@update', $item->id],
        'method' => 'put', 
        'files' => true
        ])
      !!}

      @include('admin.classrooms.form')

      <div class="box-footer">
      <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
      </div>

      {!! Form::close() !!}
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab-02">
      @include('admin.classrooms._registrations', ['items' => $item->registrations])
    </div>
  </div>

</div>

@stop

