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

$(document).ready(function(){
 
    $('#department').on('change', function(){
        var department_id = $(this).val();
        if(department_id){

            $.ajax({
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                type:'POST',

                url:"{{route('admin.classrooms.sectionClassroom')}}",
                data: { 'department_id':department_id},
                success:function(html){
                    $('#section_id').html(html);
                }
            }); 
        }else{
            $('#section_id').html('<option value="">قم بإختيار القسم اولاً</option>');
        }
    });
$('#section_id').on('change', function(){
        var sectionID = $(this).val();
        if(sectionID){

            $.ajax({
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                type:'POST',

                url:"{{route('admin.classrooms.sectionLevel')}}",
                data: { 'section_id':sectionID},
                success:function(html){
                    $('#level_id').html(html);
                }
            }); 
        }else{
            $('#level_id').html('<option value="">قم بإختيار المسار اولاً</option>');
        }
    });

}); 
</script>
@stop