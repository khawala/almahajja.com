@extends('admin.default')

@section('page-header')
  الحلقات والقاعات <small>تعديل</small>
@stop

@section('content')
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab-01" data-toggle="tab">تفاصيل الحلقة</a></li>
    <li role="presentation"><a href="#tab-02" data-toggle="tab">التسجيل</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
      {!! Form::model($item, [
        'action' => ['ClassroomController@update', $item->id],
        'method' => 'put', 
        'files' => true
        ])
      !!}

      @include('admin.classrooms.form')

      <div class="box-footer">
      <button type="submit" class="btn btn-info">{{ trans('app.edit_button') }}</button>
      </div>

      {!! Form::close() !!}
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab-02">
      @include('admin.classrooms._registrations', ['items' => $item->registrations])
    </div>
  </div>

</div>

@stop

@section('js')
<script>
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