@extends('admin.default')

@section('page-header')
  الفترات <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['PeriodController@store'],
            'files' => true
        ])
    !!}

    @include('admin.periods.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop