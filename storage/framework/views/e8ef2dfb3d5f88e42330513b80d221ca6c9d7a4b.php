<?php $__env->startSection('page-header'); ?>
  الحلقات والقاعات <small>تعديل</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab-01" data-toggle="tab">تفاصيل الحلقة</a></li>
    <li role="presentation"><a href="#tab-02" data-toggle="tab">التسجيل</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
      <?php echo Form::model($item, [
        'action' => ['ClassroomController@update', $item->id],
        'method' => 'put', 
        'files' => true
        ]); ?>


      <?php echo $__env->make('admin.classrooms.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="box-footer">
      <button type="submit" class="btn btn-info"><?php echo e(trans('app.edit_button')); ?></button>
      </div>

      <?php echo Form::close(); ?>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab-02">
      <?php echo $__env->make('admin.classrooms._registrations', ['items' => $item->registrations], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
  </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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

                url:"<?php echo e(route('admin.classrooms.sectionClassroom')); ?>",
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

                url:"<?php echo e(route('admin.classrooms.sectionLevel')); ?>",
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>