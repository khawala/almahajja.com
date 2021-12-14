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
    <!-- Start News Course  -->
    <section class="news-course bg-new">
        <div class="container">
            <!-- Start Title Sections -->
            <div class="title-section">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <p class="text-right">أحدث الدورات</p>
                    </div>
                    <!-- <div class="col-6">
                      <a href="#" class="btn-title">عرض المزيد</a>
                    </div> -->
                </div>
            </div>
            <!-- End Title Sections -->
            <!-- Start Content  -->
            <div class="row">
                @foreach($items as $item)
                <div class="col-lg-4">
                    <div class="box">
                        <img src="{{url('images/news-courses/supporting-quran-memorization-workshops.png')}}" alt="">
                        <h4>{{$item->name}}ً</h4>
                        <div class="row justify-content-between text-right">
                            <div class="col-6">
                                <div class="one">
                                    <h6>تاريخ البدء</h6>
                                    <p>{{ $item->start_date }}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="one">
                                    <h6>تاريخ الانتهاء</h6>
                                    <p>{{ $item->end_date }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="cost">
                            <span>رسوم التسجيل</span>  @if ($item->price) {{ $item->price }} ريال @else مجانا @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- End Content  -->
            <!-- Start Pagination  -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{$items->links()}}
{{--                    <li class="page-item"><a class="page-link" href="#">السابق</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">التالي</a></li>--}}
                </ul>
            </nav>
            <!-- End Pagination  -->
        </div>
    </section>
    <!-- End News Course  -->
@endsection