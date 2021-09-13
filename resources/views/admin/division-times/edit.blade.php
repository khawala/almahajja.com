@extends('admin.default')

@section('page-header')
  أوقات الخطة والمنهج <small>تعديل</small>
@stop

@section('content')

    {!! Form::model($item, [
            'action' => ['DivisionTimeController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ])
    !!}

    <div class="row">
        <div class="col-sm-8">
          <div class="box box-info">
            <div class="box-body">
              @include('admin.division-times.form', ['section_id' => $item->section->division->sections->pluck('id')])
            </div>
          </div>
        </div>
    </div>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
  	</div>
    
  {!! Form::close() !!}

@stop

