@extends('admin.default')

@section('page-header')
  الوظائف <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['JobController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    @include('admin.jobs.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

