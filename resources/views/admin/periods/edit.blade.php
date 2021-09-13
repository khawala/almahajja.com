@extends('admin.default')

@section('page-header')
  الفترات <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['PeriodController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    @include('admin.periods.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

