<?php $__env->startSection('content'); ?>

    <p class="login-box-msg">تسجيل الدخول</p>
    <?php echo $__env->make('admin.commun.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <?php echo $__env->make('auth._login_form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.signin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>