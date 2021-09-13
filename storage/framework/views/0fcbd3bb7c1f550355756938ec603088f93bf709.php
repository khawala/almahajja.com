<?php $__env->startSection('page-header'); ?>
    احصائيات    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $__env->make('admin.stats.request-by-job', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.stats.request-by-status', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.stats.request-by-nationalities', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.stats.user-by-status', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.stats.user-by-role', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.stats.user-by-nationalities', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.stats.user-by-gender', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>