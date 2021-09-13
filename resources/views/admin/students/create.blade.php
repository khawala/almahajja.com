@extends('admin.default')

@section('page-header')
  طالبة <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['StudentController@store'],
            'files' => true
        ])
    !!}

    @include('admin.students.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop