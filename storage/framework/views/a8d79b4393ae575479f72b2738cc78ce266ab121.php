<?php $__env->startComponent('mail::message'); ?>
# راسلنا

<p>الاسم: <?php echo e(request('name')); ?></p>
<p>البريد الالكتروني: <?php echo e(request('email')); ?></p>
<p>الموضوع: <?php echo e(request('message')); ?></p>


شكرا,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
