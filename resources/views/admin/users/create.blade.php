@extends('admin.default')

@section('page-header')
  مستخدم <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['UsersController@store'],
            'files' => true
        ])
    !!}

    @include('admin.users.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop