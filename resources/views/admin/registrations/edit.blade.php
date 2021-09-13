@extends('admin.default')

@section('page-header')
  التسجيل <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['RegistrationController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}
    <fieldset {{ (in_array($item->status, [3, 4])) ? 'disabled=disabled' : '' }}>
        @include('admin.registrations.form')
    </fieldset>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

