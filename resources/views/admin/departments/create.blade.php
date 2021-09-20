@extends('admin.default')

@section('page-header')
   قسم <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['DepartmentController@store'],
            'files' => true
        ])
    !!}

    @include('admin.departments.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop