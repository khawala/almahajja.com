@extends('admin.default')

@section('page-header')
  التسجيل <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['RegistrationController@store'],
            'files' => true
        ])
    !!}

    @include('admin.registrations.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop