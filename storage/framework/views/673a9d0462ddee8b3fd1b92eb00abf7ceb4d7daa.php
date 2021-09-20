<?php $__env->startSection('page-header'); ?>
    احصائيات    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6">
            <?php echo $__env->make('admin.divisions.divisionsByStatus', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.divisions.divisionsByType', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.divisions.divisionsByGender', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $__env->make('admin.divisions.AdvertisementByStatus', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>