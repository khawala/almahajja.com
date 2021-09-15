@extends('admin.default')

@section('page-header')
  المسار <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['SectionController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

        <div class="box box-info">
          <div class="box-body">
            @include('admin.sections.form')
          </div>
        </div>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

