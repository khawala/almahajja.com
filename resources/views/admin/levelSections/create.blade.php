

@extends('admin.default')

@section('page-header')
 المستوى  والمسار<small>إضافة</small>
@stop

@section('content')

     {!! Form::open([
                'action' => ['LevelSectionController@store'],
                'files' => true
            ]) !!}

        <div class="box box-info">
          <div class="box-body">
            @include('admin.levelSections.form')
          </div>
        </div>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop