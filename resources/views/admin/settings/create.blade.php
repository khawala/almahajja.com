

@extends('admin.default')

@section('page-header')
  المستوى <small>إضافة</small>
@stop

@section('content')

     {!! Form::open([
                'action' => ['SettingController@store'],
                'files' => true
            ]) !!}

        <div class="box box-info">
          <div class="box-body">
            @include('admin.settings.form')
          </div>
        </div>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop