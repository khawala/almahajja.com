<?php $config = app('App\Configuration'); ?>

<?php
    $config = $config->first()
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-K9B3W2C');</script> 
    <!-- End Google Tag Manager -->
        
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>الموقع الرسمي لوقف المحجة البيضاء</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <?php if(! config('app.debug', true)): ?>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
        <link rel="stylesheet" href="<?php echo e(mix('/css/site-all.css')); ?>">
    <?php else: ?>
        <!-- Vendors -->
        <link rel="stylesheet" href="<?php echo e(mix('/css/site-vendor.css')); ?>">
        <link rel="stylesheet" href="/css/site-custom.css">
    <?php endif; ?>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


    <?php echo $__env->yieldContent('css'); ?>

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9B3W2C" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <header id="header">
        <nav class="navbar">
            <div class="container0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/img/newlogo.png" alt="">
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/#header">الرئيسية</a></li>
                        <li><a href="/#divisions">الدورات</a></li>
                        <li><a href="/#classrooms">الحلقات</a></li>
                        <li><a href="/#job-requests">التوظيف</a></li>
                        <li><a href="/#about">عن المحجة</a></li>
                        <li><a href="/#footer">راسلنا</a></li>
                    </ul>
                    <ul class="list-inline social">
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="#" data-toggle="modal" data-target="#userPopup"><i class="fa fa-user"></i></a></li>
                        <?php else: ?>
                            <li>أهلا، <?php echo e(auth()->user()->name); ?></li>
                            <li class="dropdown">
                                <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <?php if(auth()->user()->role > 0): ?>
                                        <li><a href="<?php echo e(route(ADMIN . '.dash')); ?>">صفحتي</a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo e(route('profile.show')); ?>">صفحتي</a></li>
                                    <?php endif; ?>
                                    <li><a href="/logout">تسجيل خروج</a></li>
                                </ul>
                                    
                            </li>
                        <?php endif; ?>
                            
                        <li><a target="_blank" href="<?php echo e($config->facebook); ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="<?php echo e($config->instagram); ?>"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="<?php echo e($config->twitter); ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="<?php echo e($config->snapchat); ?>"><i class="fa fa-snapchat-ghost"></i></a></li>
                        <li><a target="_blank" href="<?php echo e($config->youtube); ?>"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </header>

    <?php echo $__env->yieldContent('content'); ?>
    
    <section class="about" id="about" data-aos="fade-up">
        <div class="container">
            <img src="/img/logo.png" alt="">
            <div class="row">
                <div class="col-sm-6">
                    <h3>عن المحجة</h3>
                    <p><?php echo e($config->about_almahajja_waqf); ?></p>
                </div>
                <div class="col-sm-6">
                    <h3>عن الحلقات</h3>
                    <p><?php echo e($config->about_almahajja_project); ?></p>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <ul class="list-unstyled contact">
                        <li><i class="fa fa-mobile-phone"></i> الجوال : <?php echo e($config->mobile); ?></li>
                        <li><i class="fa fa-phone"></i> الهاتف : <?php echo e($config->phone); ?></li>
                        <li><i class="fa fa-phone"></i> الفاكس : <?php echo e($config->fax); ?></li>
                        <li><i class="fa fa-phone"></i> الرقم المجاني : <?php echo e($config->toll_free); ?></li>
                        <li><i class="fa fa-map-marker"></i> <?php echo e($config->address); ?></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <form action="<?php echo e(route('contact.store')); ?>" method="POST" class="contact-form">
                        <?php echo csrf_field(); ?>
                        <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                        <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" required>
                        <textarea name="message" id="" cols="10" rows="10" class="form-control" placeholder="الموضوع" required></textarea>
                        <div class="text-left">
                            <button class="btn btn-primary">ارسال</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                    
                    <iframe 
                        width="100%" 
                        height="360"
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://maps.google.com/maps?q=<?php echo e($config->lat); ?>,<?php echo e($config->lng); ?>&hl=es;z=14&amp;output=embed"
                        >
                        </iframe>
                </div>
            </div>
        </div>
        <div class="bottom">
            <p>جميع الحقوق محفوظة لوقف المحجة البيضاء 1440 - 2019‎ <br> تطوير واستضافة <a target="_blank" href="//www.hit.sa">HIT</a></p>
        </div>
    </footer>
    
    
    
    <?php if(! config('app.debug', true)): ?>
        <script src="<?php echo e(mix('/js/site-all.js')); ?>"></script>
    <?php else: ?>
        <!-- Vendors -->
        <script src="<?php echo e(mix('/js/site-vendor.js')); ?>"></script>
        <script src="/js/site-custom.js"></script>
    <?php endif; ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/bootstrap-swipe-carousel.min.js"></script>

    <script>
        AOS.init();
        $('.carousel').carousel().swipeCarousel({
            // low, medium or high
            // sensitivity: 'high'
        });

    </script>
    
    <?php echo $__env->yieldContent('js'); ?>

    
    <!-- Modal -->
    <div class="modal fade" id="userPopup" tabindex="-1" role="dialog" aria-labelledby="userPopupLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h4 class="modal-title" id="userPopupLabel">تسجيل دخول</h4>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <?php echo $__env->make('auth._login_form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>
    </div>
    
    
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
    
  </script>
    <?php echo $__env->yieldContent('script'); ?>;
</html>
