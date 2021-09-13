@extends('admin.default')

@section('page-header')
  النشاطات <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['ActivityController@store'],
            'files' => true
        ])
    !!}

    @include('admin.activities.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop