@inject('config', 'App\Configuration')

@php
    $config = $config->first()
@endphp

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
    
    @if (! config('app.debug', true))
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
        <link rel="stylesheet" href="{{ mix('/css/site-all.css') }}">
    @else
        <!-- Vendors -->
        <link rel="stylesheet" href="{{ mix('/css/site-vendor.css') }}">
        <link rel="stylesheet" href="/css/site-custom.css">
    @endif

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    @yield('css')

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K9B3W2C" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    @include('sweetalert::alert')
    
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
                        @guest
                            <li><a href="#" data-toggle="modal" data-target="#userPopup"><i class="fa fa-user"></i></a></li>
                        @else
                            <li>أهلا، {{ auth()->user()->name }}</li>
                            <li class="dropdown">
                                <a id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    @if (auth()->user()->role > 0)
                                        <li><a href="{{ route(ADMIN . '.dash') }}">صفحتي</a></li>
                                    @else
                                        <li><a href="{{ route('profile.show') }}">صفحتي</a></li>
                                    @endif
                                    <li><a href="/logout">تسجيل خروج</a></li>
                                </ul>
                                    
                            </li>
                        @endguest
                            
                        <li><a target="_blank" href="{{ $config->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="{{ $config->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        <li><a target="_blank" href="{{ $config->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="{{ $config->snapchat }}"><i class="fa fa-snapchat-ghost"></i></a></li>
                        <li><a target="_blank" href="{{ $config->youtube }}"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </header>

    @yield('content')
    
    <section class="about" id="about" data-aos="fade-up">
        <div class="container">
            <img src="/img/logo.png" alt="">
            <div class="row">
                <div class="col-sm-6">
                    <h3>عن المحجة</h3>
                    <p>{{ $config->about_almahajja_waqf }}</p>
                </div>
                <div class="col-sm-6">
                    <h3>عن الحلقات</h3>
                    <p>{{ $config->about_almahajja_project }}</p>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <ul class="list-unstyled contact">
                        <li><i class="fa fa-mobile-phone"></i> الجوال : {{ $config->mobile }}</li>
                        <li><i class="fa fa-phone"></i> الهاتف : {{ $config->phone }}</li>
                        <li><i class="fa fa-phone"></i> الفاكس : {{ $config->fax }}</li>
                        <li><i class="fa fa-phone"></i> الرقم المجاني : {{ $config->toll_free }}</li>
                        <li><i class="fa fa-map-marker"></i> {{ $config->address }}</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                        @csrf
                        <input type="text" class="form-control" name="name" placeholder="الاسم" required>
                        <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" required>
                        <textarea name="message" id="" cols="10" rows="10" class="form-control" placeholder="الموضوع" required></textarea>
                        <div class="text-left">
                            <button class="btn btn-primary">ارسال</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4">
                    {{-- <iframe src="" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe> --}}
                    <iframe 
                        width="100%" 
                        height="360"
                        frameborder="0" 
                        scrolling="no" 
                        marginheight="0" 
                        marginwidth="0" 
                        src="https://maps.google.com/maps?q={{ $config->lat }},{{ $config->lng }}&hl=es;z=14&amp;output=embed"
                        >
                        </iframe>
                </div>
            </div>
        </div>
        <div class="bottom">
            <p>جميع الحقوق محفوظة لوقف المحجة البيضاء 1440 - 2019‎ <br> تطوير واستضافة <a target="_blank" href="//www.hit.sa">HIT</a></p>
        </div>
    </footer>
    
    
    
    @if (! config('app.debug', true))
        <script src="{{ mix('/js/site-all.js') }}"></script>
    @else
        <!-- Vendors -->
        <script src="{{ mix('/js/site-vendor.js') }}"></script>
        <script src="/js/site-custom.js"></script>
    @endif

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/js/bootstrap-swipe-carousel.min.js"></script>

    <script>
        AOS.init();
        $('.carousel').carousel().swipeCarousel({
            // low, medium or high
            // sensitivity: 'high'
        });

    </script>
    
    @yield('js')

    
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
                    @include('auth._login_form')
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>
