@extends('admin.default')

@section('page-header')
  الحلقات والقاعات <small>إضافة</small>
@stop

@section('content')

    {!! Form::open([
            'action' => ['ClassroomController@store'],
            'files' => true
        ])
    !!}

    @include('admin.classrooms.form')

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info">{{ trans('app.add_button') }}</button>
  	</div>

  {!! Form::close() !!}

@stop
@section('js')
<script>
$(document).ready(function(){
    $("#department").change(function(){
        var selectedVal = $( "#department option:selected" ).val();
        //  console.log(selectedVal);
    });
   
}); 
   
    
</script>
@stop