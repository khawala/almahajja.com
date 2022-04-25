<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>المحجة البيضاء</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo e(url('css_new/boostrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('css_new/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('css_new/style.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('tel-input/build/css/intlTelInput.css')); ?> ">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <script src="<?php echo e(asset('tel-input/build/js/intlTelInput.js')); ?>"></script>
    
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>

    <script src="<?php echo e(asset('tel-input/build/js/intlTelInput-jquery.min.js')); ?>"></script>

    <link rel="icon" type="image/png" href="<?php echo e(url('images/logo-fav.png')); ?>" sizes="32x32">
    <?php echo $__env->yieldContent('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .iti{display:block}
    label {
    color: #7f999a;
    float: right;
}
.select2-container {

    width: 100% !important;
  
}
.container {
    direction: rtl;
    text-align: right;
}
.myinput[type="checkbox"]:before {
  position: relative;
  display: block;
  width: 11px;
  height: 11px;
  border: 1px solid #808080;
  content: "";
  background: #FFF;
}

.myinput[type="checkbox"]:after {
  position: relative;
  display: block;
  left: 2px;
  top: -11px;
  width: 7px;
  height: 7px;
  border-width: 1px;
  border-style: solid;
  border-color: #B3B3B3 #dcddde #dcddde #B3B3B3;
  content: "";
  background-image: linear-gradient(135deg, #B1B6BE 0%, #FFF 100%);
  background-repeat: no-repeat;
  background-position: center;
}

.myinput[type="checkbox"]:checked:after {
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAQAAABuW59YAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAB2SURBVHjaAGkAlv8A3QDyAP0A/QD+Dam3W+kCAAD8APYAAgTVZaZCGwwA5wr0AvcA+Dh+7UX/x24AqK3Wg/8nt6w4/5q71wAAVP9g/7rTXf9n/+9N+AAAtpJa/zf/S//DhP8H/wAA4gzWj2P4lsf0JP0A/wADAHB0Ngka6UmKAAAAAElFTkSuQmCC'), linear-gradient(135deg, #B1B6BE 0%, #FFF 100%);
}

.myinput[type="checkbox"]:disabled:after {
  -webkit-filter: opacity(0.4);
}

.myinput[type="checkbox"]:not(:disabled):checked:hover:after {
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAQAAABuW59YAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAAB2SURBVHjaAGkAlv8A3QDyAP0A/QD+Dam3W+kCAAD8APYAAgTVZaZCGwwA5wr0AvcA+Dh+7UX/x24AqK3Wg/8nt6w4/5q71wAAVP9g/7rTXf9n/+9N+AAAtpJa/zf/S//DhP8H/wAA4gzWj2P4lsf0JP0A/wADAHB0Ngka6UmKAAAAAElFTkSuQmCC'), linear-gradient(135deg, #8BB0C2 0%, #FFF 100%);
}

.myinput[type="checkbox"]:not(:disabled):hover:after {
  background-image: linear-gradient(135deg, #8BB0C2 0%, #FFF 100%);
  border-color: #85A9BB #92C2DA #92C2DA #85A9BB;
}

.myinput[type="checkbox"]:not(:disabled):hover:before {
  border-color: #3D7591;
}

/* Large checkboxes */
.myinput.large {
  height: 22px;
  width: 22px;
}

.myinput.large[type="checkbox"]:before {
  width: 20px;
  height: 20px;
}

.myinput.large[type="checkbox"]:after {
  top: -20px;
  width: 16px;
  height: 16px;
}

/* Custom checkbox */
.myinput.large.custom[type="checkbox"]:checked:after {
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGHRFWHRBdXRob3IAbWluZWNyYWZ0aW5mby5jb23fZidLAAAAk0lEQVQ4y2P4//8/AyUYwcAD+OzN/oMwshjRBoA0Gr8+DcbIhhBlAEyz+qZZ/7WPryHNAGTNMOxpJvo/w0/uP0kGgGwGaZbrKgfTGnLc/0nyAgiDbEY2BCRGdCDCnA2yGeYVog0Aae5MV4c7Gzk6CRqAbDM2w/EaQEgzXgPQnU2SAcTYjNMAYm3GaQCxNuM0gFwMAPUKd8XyBVDcAAAAAElFTkSuQmCC'), linear-gradient(135deg, #B1B6BE 0%, #FFF 100%);
}

.myinput.large.custom[type="checkbox"]:not(:disabled):checked:hover:after {
  background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGHRFWHRBdXRob3IAbWluZWNyYWZ0aW5mby5jb23fZidLAAAAk0lEQVQ4y2P4//8/AyUYwcAD+OzN/oMwshjRBoA0Gr8+DcbIhhBlAEyz+qZZ/7WPryHNAGTNMOxpJvo/w0/uP0kGgGwGaZbrKgfTGnLc/0nyAgiDbEY2BCRGdCDCnA2yGeYVog0Aae5MV4c7Gzk6CRqAbDM2w/EaQEgzXgPQnU2SAcTYjNMAYm3GaQCxNuM0gFwMAPUKd8XyBVDcAAAAAElFTkSuQmCC'), linear-gradient(135deg, #8BB0C2 0%, #FFF 100%);
}
.swal2-container .select-wrapper{
display: none !important;
}
@media (min-width: 976px) {
.navbar-sec nav .navbar-brand {
    width: 115px;
    
}
}
@media (min-width: 992px)
{
.navbar-expand-lg .navbar-collapse {
margin-right:100px;
}
}
@media (max-width: 976px) {
.main-slider .carousel .carousel-item .back-img {
    background-size: contain !important;
    height: 250px;
}
.navbar-sec nav .navbar-brand {
    width: 70px;
    
}
}
.nav-text{
    
    display: inline-block;
    vertical-align: middle;
    padding: 0 5px;
        line-height: 1;
    font-size: 25px;
    color:black;
}
.nav-text2{
    font-size: 15px;

}
</style>
</head>

<body>
<?php $config = app('App\Configuration'); ?>

<?php
    $config = $config->first()
?>
<!-- Start Social Div  -->

<div class="social-div" id="header">
    <ul class="list-inline">
                                  <li class="list-inline-item"><a href="<?php echo e($config->whatsapp); ?>"><i class="fab fa-fw fa-whatsapp" target="_blank"></i></a></li>
        <li class="list-inline-item"><a href="<?php echo e($config->instagram); ?>" target="_blank"><i class="fab fa-fw fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="<?php echo e($config->twitter); ?>" target="_blank"><i class="fab fa-fw fa-twitter" ></i></a></li>
        <!--<li class="list-inline-item"><a href="#"><i class="fab fa-fw fa-youtube"></i></a></li>-->
        
          <li class="list-inline-item"><a href="<?php echo e($config->snapchat); ?>" target="_blank"><i class="fab fa-fw fa-snapchat"></i></a></li>
        <li class="list-inline-item"><a href="<?php echo e($config->facebook); ?>" target="_blank"><i class="fab fa-fw fa-telegram-plane"></i></a></li>
    </ul>
</div>
<!-- End Social Div  -->
<!-- Start Navbar  -->
<section class="navbar-sec">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?php echo e(url('/') . '#'); ?>"  style="margin-right: 0;">
                <img src="<?php echo e(url('images/logon.png')); ?>" alt="" width="100%">
                <span class="nav-text">المحجة البيضاء                
                </br>
                <span class="nav-text2">
                         لتحفيظ القران الكريم عن بعد
                      </span>  
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo e(url('/') . '#'); ?>">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/') . '#course'); ?>">الدورات</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/') . '#job'); ?>">التوظيف</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">عن المحجة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">تواصل معنا</a>
                    </li>

                </ul>
                <ul class="navbar-nav mr-auto">
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger btn-website" href="<?php echo e(url('login')); ?>">تسجيل دخول</a>
                        </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="btn btn-secondary btn-website dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> أهلا بك, <span><?php echo e(auth()->user()->name); ?></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <?php if(auth()->user()->role > 5): ?>
                                <a class="dropdown-item" href="<?php echo e(route(ADMIN . '.dash')); ?>">صفحتي</a>
                                <?php else: ?>
                                    <a class="dropdown-item" href="<?php echo e(route('profile.show')); ?>">صفحتي</a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">تسجيل خروج</a>
                            </div>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>

            </div>
        </nav>
    </div>
</section>
   <section class="content">
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
 <?php echo $__env->make('admin.commun.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 </section>
<!-- End Navbar  -->
<?php echo $__env->yieldContent('content'); ?>
<!-- Start About Course Section  -->
<section class="about-course" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg">
                <div class="content text-center">
                    <h3>عن المحجة</h3>
                    <p>
                        <?php echo e($config->about_almahajja_waqf); ?>

                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="text-center box-img">
                    <img class="img-fluid"  style="max-width: 80%;
    height: auto;" src="<?php echo e(url('images/center-img.png')); ?>" alt="">
                </div>
            </div>
            <div class="col-lg">
                <div class="content text-center">
                    <h3>عن الحلقات</h3>
                    <p>
                        <?php echo e($config->about_almahajja_project); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Course Section  -->

<?php echo $__env->yieldContent('content2'); ?>
<!-- Start contact Section  -->
<section class="contact-sec" id="contact">
    <div class="container">
        <div class="title-form text-right">
            أرسل لنا
        </div>
        <!-- Start Content  -->
        <div class="row">
            <div class="col-lg-6">
                <p class="right text-right">
                    تواصل معنا الان وارسل <br>
                    استفسارك او اقتراحك
                </p>
            </div>
            <div class="col-lg-6">
                <form action="<?php echo e(route('contact.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="left">
                        <div class="form-group text-right">
                            <label for="input1">الإسم بالكامل</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="اكتب اسمك هنا">
                        </div>
                        <!-- Start Sub Grid -->
                        <div class="row">
                            <div class="col">
                                <div class="form-group text-right">
                                    <label for="input2">البريد الإلكتروني</label>
                                    <input class="form-control" type="text" name="email" id="email" placeholder="user@example.com">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group text-right">
                                    <label for="input3">رقم الهاتف</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control addon-input text-right" name="phone" placeholder="+20 1099313888"
                                               aria-label="" aria-describedby="basic-addon1" value="+20 1099313888" id="phone">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30"
                                                     height="20" viewBox="0 0 30 20">
                                                    <defs>
                                                        <pattern id="pattern" preserveAspectRatio="xMidYMid slice" width="100%" height="100%"
                                                                 viewBox="0 0 450 300">
                                                            <image width="450" height="300"
                                                                   xlink:href="data:image/png;base64,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" />
                                                        </pattern>
                                                    </defs>
                                                    <rect id="saudiarabia" width="30" height="20" rx="2" fill="url(#pattern)" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Sub Grid -->
                        <div class="form-group text-right">
                            <label for="message">رسالتك</label>
                            <textarea name="message" id="message" class="form-control" placeholder="اترك رسالتك هنا"></textarea>
                        </div>
                        <div class="box-submit">
                            <input class="btn-website" type="submit" value="إرسال">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Content  -->
    </div>
</section>
<!-- End contact Section  -->
<!-- Start Footer  -->
<footer class="footer-sec">
    <div class="container">
        <div class="title-footer text-right">
            <img src="<?php echo e(url('images/logo-footer.png')); ?>" alt="">
        </div>
        <!-- Start Lists  -->
        <div class="row text-right">
            <!--<div class="col-lg-4">-->
            <!--    <ul class="list-unstyled">-->
                    <!--<li>-->
                    <!--    <h5>العنوان</h5>-->
                    <!--    <h6><?php echo e($config->address); ?></h6>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--    <h5>الرقم الموحد</h5>-->
                    <!--    <h6> <?php echo e($config->toll_free); ?>یمكنكم الاتصال بنا من الساعة 10:00 صباحا حتى 6:00 مساء</h6>-->
                    <!--</li>-->
            <!--    </ul>-->
            <!--</div>-->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li>
                        <h5>التواصل بالواتس اب</h5>
                        <h6><?php echo e($config->mobile); ?></h6>
                    </li>
                    <!--<li>-->
                    <!--    <h5>التواصل عبر الهاتف </h5>-->
                    <!--    <h6><?php echo e($config->phone); ?></h6>-->
                    <!--</li>-->
                    <li>
                        <h5>التواصل على البريد الالكتروني</h5>
                        <h6><?php echo e($config->email); ?></h6>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>المنصة</h4>
                <ul class="list-unstyled">
                    <li>
                        <h6>الدورات</h6>
                    </li>
                    <li>
                        <h6>الحلقات</h6>
                    </li>
                    <li>
                        <h6>التوظيف</h6>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>مساعدة & دعم</h4>
                <ul class="list-unstyled">
                    <li>
                        <h6>من نحن</h6>
                    </li>
                    <li>
                        <h6>اسئلة شائعة و اجابتها</h6>
                    </li>
                    <li>
                        <h6>الشروط والأحكام</h6>
                    </li>
                    <li>
                        <h6>الحسابات البنكية</h6>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Lists  -->
    </div>
</footer>

<!-- Start Social Footer  -->
<div class="social-footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xs-6">
                <div class="right text-right">
                    <ul class="list-inline">
                                  <li class="list-inline-item"><a href="<?php echo e($config->whatsapp); ?>"><i class="fab fa-fw fa-whatsapp" target="_blank"></i></a></li>
        <li class="list-inline-item"><a href="<?php echo e($config->instagram); ?>" target="_blank"><i class="fab fa-fw fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="<?php echo e($config->twitter); ?>" target="_blank"><i class="fab fa-fw fa-twitter" ></i></a></li>
        <!--<li class="list-inline-item"><a href="#"><i class="fab fa-fw fa-youtube"></i></a></li>-->
        
          <li class="list-inline-item"><a href="<?php echo e($config->snapchat); ?>" target="_blank"><i class="fab fa-fw fa-snapchat"></i></a></li>
        <li class="list-inline-item"><a href="<?php echo e($config->facebook); ?>" target="_blank"><i class="fab fa-fw fa-telegram-plane"></i></a></li>
   
                    </ul>
                </div>
            </div>
            <div class="col-xs-6">
                <h4>&copy;  جميع الحقوق محفوظة لــ المحجة البيضاء 
                                        <span> تطوير واستضافة <a target="_blank" href="http://wa.me/+966548313071">يلا نبدع</a></span>

           </h4> 
                
        </div>
        </div>
    </div>
</div>
<!-- End Social Footer  -->
<!-- End Footer  -->



<script src="<?php echo e(url('js/jquery.js')); ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo e(url('js/poper.js')); ?>"></script>
<script src="<?php echo e(url('js/bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('js/all.min.js')); ?>"></script>
<script src="<?php echo e(url('js/custome.js')); ?>"></script>
<script src="<?php echo e(url('js/intlphone.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function () {
  $(".form-group select").select2();
  
  });
  
  
  </script>
   <?php echo $__env->yieldContent('script'); ?>
</body>

</html>

