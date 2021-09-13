@extends('admin.default')

@section('page-header')
  النشاطات <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['ActivityController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    @include('admin.activities.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

