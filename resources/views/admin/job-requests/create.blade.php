@extends('admin.default')

@section('page-header')
  طلبات التوظيف <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['JobRequestController@store'],
            'files' => true
        ])
    !!}

    @include('admin.job-requests.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop