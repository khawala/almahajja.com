<?php $__env->startSection('page-header'); ?>
	أهلا بك
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>