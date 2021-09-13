@extends('admin.default')

@section('page-header')
  طلبات التوظيف <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['JobRequestController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    @include('admin.job-requests.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

