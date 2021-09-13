@extends('admin.default')

@section('page-header')
  الاعلانات <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['AdvertisementController@store'],
            'files' => true
        ])
    !!}

    @include('admin.advertisements.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop