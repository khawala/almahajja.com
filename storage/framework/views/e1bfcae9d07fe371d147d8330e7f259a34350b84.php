<?php if(Session::has('errors')): ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <ul class="list-unstyled">
        <?php $__currentLoopData = Session::get('errors')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<?php if(Session::has('warning')): ?>
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <?php echo e(Session::get('warning')); ?>

    </div>
<?php endif; ?>


<?php if(Session::has('info')): ?>
    <div class="alert alert-info" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <?php echo e(Session::get('info')); ?>

    </div>
<?php endif; ?>


<?php if(Session::has('success')): ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>