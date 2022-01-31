<?php $__env->startSection('page-header'); ?>
  التسجيل <small>تعديل</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::model($item, [
            'action' => ['RegistrationController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ]); ?>

    <fieldset <?php echo e((in_array($item->status, [3, 4])) ? 'disabled=disabled' : ''); ?>>
        <?php echo $__env->make('admin.registrations.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </fieldset>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info"><?php echo e(trans('app.edit_button')); ?></button>
  	</div>
    
  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>