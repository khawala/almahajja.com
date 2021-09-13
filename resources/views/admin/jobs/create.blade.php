@extends('admin.default')

@section('page-header')
  الوظائف <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['JobController@store'],
            'files' => true
        ])
    !!}

    @include('admin.jobs.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop