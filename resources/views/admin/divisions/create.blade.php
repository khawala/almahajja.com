@extends('admin.default')

@section('page-header')
  الدورات <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['DivisionController@store'],
            'files' => true
        ])
    !!}

    @include('admin.divisions.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop