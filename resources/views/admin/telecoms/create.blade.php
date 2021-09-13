@extends('admin.default')

@section('page-header')
  المكالمات <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['TelecomController@store'],
            'files' => true
        ])
    !!}

    @include('admin.telecoms.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop