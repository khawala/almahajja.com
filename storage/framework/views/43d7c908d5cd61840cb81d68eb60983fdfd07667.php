<?php
    $allStatus = config('variables.advertisements_status');
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">الاعلانات حسب الحالة</h3>
    </div>
    <div class="box-body">
        <canvas id="AdvertisementByStatus" width="200" height="100"></canvas>
    </div>
</div>

<?php $__env->startSection('js'); ?>
##parent-placeholder-93f8bb0eb2c659b85694486c41717eaf0fe23cd4##
<script>
    var ctx = document.getElementById("AdvertisementByStatus");
    var AdvertisementByStatus = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                <?php $__currentLoopData = $AdvertisementByStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e($allStatus[$e->status]); ?> (<?php echo e($e->count); ?>)", 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [{
                data: [
                <?php $__currentLoopData = $AdvertisementByStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e($e->count); ?>", 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
            }]
        }
    });
</script>

<?php $__env->stopSection(); ?>