<?php $__env->startSection('page-header'); ?>
  الاعلانات <small>إضافة</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open([
            'action' => ['AdvertisementController@store'],
            'files' => true
        ]); ?>


    <?php echo $__env->make('admin.advertisements.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info"><?php echo e(trans('app.add_button')); ?></button>
  	</div>

  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>