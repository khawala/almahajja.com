<?php $__env->startSection('page-header'); ?>
  الحلقات والقاعات <small>إضافة</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open([
            'action' => ['ClassroomController@store'],
            'files' => true
        ]); ?>


    <?php echo $__env->make('admin.classrooms.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info"><?php echo e(trans('app.add_button')); ?></button>
  	</div>

  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$(document).ready(function(){
    $("#department").change(function(){
        var selectedVal = $( "#department option:selected" ).val();
         console.log(selectedVal);
        $("#hiddenmodelname").val(selectedVal);
    });
     document.getElementById('department').addEventListener('change', function() {
  console.log('You selected: ', this.value);
});
}); 
   
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>