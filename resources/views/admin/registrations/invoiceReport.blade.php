@extends('admin.default')

@section('page-header')
    تقرير الفواتير 
@stop

@section('content')

  
   {!! Form::open([
            'action' => ['RegistrationController@invoiceReportPost'],
            'files' => true
        ])
    !!}
          {{ Form::label('start_date','تاريخ البدء',['class' => 'control-label']) }}
               {!! Form::date('start_date',date('Y-m-d'),['required', 'class' => 'form-control']) !!} 
                
              {{ Form::label('end_date','تاريخ الإنتهاء',['class' => 'control-label']) }}
               {!! Form::date('end_date',date('Y-m-d'),['required', 'class' => 'form-control']) !!} 
          
            	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">بحث</button>
  	</div>

         {!! Form::close() !!}
    

	
	
@stop