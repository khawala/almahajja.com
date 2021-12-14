@extends('site.new_default')
@section('css')
    <style>
        .box-img img {
            background: no-repeat;
            height: 150px;
            width: 200px;
            background-size: cover !important;
            display: inline-block;
        }
        .about-course .box-img img{
            width: 75%;
        }
    </style>
@endsection
@section('content')
    <!-- Start Section Title Main  -->
    <section class="title-main">
        <div class="container">
            <div class="all">
                <div class="text1">
                    <h3>{{ $ad->name }}</h3>
                    <h5>{!! nl2br($ad->short_description) !!}</h5>
                </div>
                <div class="box-img">
                    <img src="{{ $ad->photo }}" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Title Main  -->
    <!-- Start Tabs  -->
    <section class="tabs-sec">
        <div class="container">
            <!-- Start Title  -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الإعلانات</li>
                </ol>
            </nav>
            <!-- End Title  -->
            <!-- Start Tabs Content  -->
            <div class="tabs-content">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h4>{!! nl2br($ad->description) !!}</h4>
                    </div>
                </div>
            </div>
            <!-- End Tabs Content  -->
        </div>
    </section>
    <!-- End Tabs  -->
@endsection