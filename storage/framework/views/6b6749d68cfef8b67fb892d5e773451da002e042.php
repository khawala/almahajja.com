<?php $__env->startComponent('mail::message'); ?>
<div style="direction:rtl;float:right;">
<p><?php echo $content; ?></p>

شكرا,<br>
<?php echo e(config('app.name')); ?>

</div>
<?php echo $__env->renderComponent(); ?>
