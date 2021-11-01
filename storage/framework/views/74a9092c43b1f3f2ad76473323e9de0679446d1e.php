<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title', config('app.name')); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" href="/css/admin-vendor.css">

    <style>
        body{background-color: #fff;}
    </style>

    <?php echo $__env->yieldContent('css'); ?>

</head>

<body>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php if(! config('app.debug', true)): ?>
        <script src="/js/admin-all.js"></script>
    <?php else: ?>
        <!-- Vendors -->
        <script src="/js/admin-vendor.js"></script>
        <script src="/js/admin-custom.js"></script>
    <?php endif; ?>

    
    <?php echo $__env->yieldContent('js'); ?>
    
    <script>
        window.print()
    </script>

</body>
</html>
