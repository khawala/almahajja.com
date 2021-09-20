@extends('admin.default')

@section('page-header')
   القسم <small>تعديل</small>
@stop

@section('content')
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab-01" data-toggle="tab">تفاصيل القسم</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
      {!! Form::model($item, [
        'action' => ['DepartmentController@update', $item->id],
        'method' => 'put', 
        'files' => true
        ])
      !!}

      @include('admin.departments.form')

      <div class="box-footer">
      <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
      </div>

      {!! Form::close() !!}
    </div>
   
  </div>

</div>

@stop

