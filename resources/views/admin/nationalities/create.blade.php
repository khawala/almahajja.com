@extends('admin.default')

@section('page-header')
  الجنسيات <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['NationalityController@store'],
            'files' => true
        ])
    !!}

    @include('admin.nationalities.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop