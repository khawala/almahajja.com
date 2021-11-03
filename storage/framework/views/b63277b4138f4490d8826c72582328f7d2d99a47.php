<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo e(config('app.name')); ?> | Admin</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
	<?php if(! config('app.debug', true)): ?>
		<link rel="stylesheet" href="/css/admin-all.css">
	<?php else: ?>
		<!-- Vendors -->
		<link rel="stylesheet" href="/css/admin-vendor.css">
		<link rel="stylesheet" href="/css/admin-custom.css">
	<?php endif; ?>

	<?php echo $__env->yieldContent('css'); ?>

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="/">برنامج الحلقات الهاتفية</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-bodys">

			<?php echo $__env->yieldContent('content'); ?>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<footer class="text-center">
        <strong>الموقع الرسمي لوقف المحجة البيضاء<br>
           جميع الحقوق محفوظة لوقف المحجة البيضاء1440هـ/2018م  <br>
           تطوير واستضافة <a target="_blank" href="//www.hit.sa">HIT</a>
        </strong>
    </footer>

	<script src="/js/admin-vendor.js"></script>

	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>
</body>
</html>