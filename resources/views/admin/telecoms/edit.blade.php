@extends('admin.default')

@section('page-header')
  المكالمات <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['TelecomController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    @include('admin.telecoms.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

