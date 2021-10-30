<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent('title', config('app.name') . " | Admin"); ?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <?php if(! config('app.debug', true)): ?>
        <link rel="stylesheet" href="<?php echo e(mix('/css/admin-all.css')); ?>">
    <?php else: ?>
        <!-- Vendors -->
        <link rel="stylesheet" href="<?php echo e(mix('/css/admin-vendor.css')); ?>">
        <link rel="stylesheet" href="/css/admin-custom.css">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $__env->yieldContent('css'); ?>

</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->


            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php if(auth()->check() && auth()->user()->IsAdmin): ?>
                            <li>
                                <?php echo Form::open([
                                    'route' => [ADMIN . '.registrations.search']
                                ]); ?>

                                    <input type="search" class="form-control" name="q" placeholder="بحث برقم التسجيل">
                                    <button><i class="fa fa-search"></i></button>
                                <?php echo Form::close(); ?>

                            </li>
                        <?php endif; ?>

                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="<?php echo e(auth()->user()->photo); ?>" width="160" height="160" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo e(auth()->user()->name); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="<?php echo e(auth()->user()->photo); ?>" width="160" height="160" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo e(auth()->user()->name); ?>

                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo e(route(ADMIN . '.users.edit', auth()->id())); ?>" class="btn btn-default btn-flat">بيناتي</a>
                                    </div>
                                    <div class="pull-left">
                                        <?php echo Form::open(['url'=>'logout']); ?>

                                            <button type="submit" class="btn btn-default btn-flat">خروج</button>
                                        <?php echo Form::close(); ?>

                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <?php echo $__env->make('admin.commun.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?php echo $__env->yieldContent('page-header', 'page-header'); ?>
                </h1>
                
            </section>

            <!-- Main content -->
            <section class="content">

                <?php echo $__env->make('admin.commun.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer text-center">
            <strong>الموقع الرسمي لوقف المحجة البيضاء<br>
                جميع الحقوق محفوظة لوقف المحجة البيضاء1440هـ/2018م  <br>
                تطوير واستضافة <a target="_blank" href="//www.hit.sa">HIT</a>
             </strong>
        </footer>

    </div>
    <!-- ./wrapper -->

    <?php if(! config('app.debug', true)): ?>
        <script src="<?php echo e(mix('/js/admin-all.js')); ?>"></script>
    <?php else: ?>
        <!-- Vendors -->
        <script src="<?php echo e(mix('/js/admin-vendor.js')); ?>"></script>
        <script src="/js/admin-custom.js"></script>
    <?php endif; ?>

    <?php echo $__env->yieldContent('js'); ?>

</body>
</html>
