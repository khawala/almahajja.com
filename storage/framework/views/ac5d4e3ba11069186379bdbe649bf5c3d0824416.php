<?php $__env->startSection('page-header'); ?>
  طلبات التوظيف <small>إضافة</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open([
            'action' => ['JobRequestController@store'],
            'files' => true
        ]); ?>


    <?php echo $__env->make('admin.job-requests.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  	<div class="box-footer">
  	  <button type="submit" class="btn btn-info"><?php echo e(trans('app.add_button')); ?></button>
  	</div>

  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>