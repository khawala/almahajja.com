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
        .box{
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <!-- Start Jobs  -->
    <section class="jobs bg-new">
        <div class="container">
            <!-- Start Title Sections -->
            <div class="title-section">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <p class="text-right">الوظائف المتوفرة</p>
                    </div>
                    <!-- <div class="col-6">
                      <a href="#" class="btn-title">عرض المزيد</a>
                    </div> -->
                </div>
            </div>
            <!-- End Title Sections -->
            <!-- Start Content  -->
            <div class="row">
                @foreach ($items as $item)
                    <div class="col-lg-4">
                        <div class="box" onclick="location.href='{{url('job/' . $item->id)}}'";>
                            <div class="row">
                                <div class="col-lg">
                                    <div class="icon-box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.46" height="28.843" viewBox="0 0 21.46 28.843">
                                            <g id="svgexport-6_1_" data-name="svgexport-6 (1)" transform="translate(-68.8)">
                                                <g id="Group_11434" data-name="Group 11434" transform="translate(68.8)">
                                                    <g id="Group_11433" data-name="Group 11433" transform="translate(0)">
                                                        <path id="Path_13319" data-name="Path 13319"
                                                              d="M119.921,16.868a22.377,22.377,0,0,0,4.061-.182,3.554,3.554,0,0,0,1.754-.005c3.965.193,7.055,1.314,7.055-6.755,0-5.478-3.557-9.925-7.946-9.925S116.9,4.448,116.9,9.925c0,4.4.842,6.116,2.21,6.712A2.933,2.933,0,0,0,119.921,16.868ZM118.654,6.83c.832,1.153,2.988.907,4.85-.553a7.092,7.092,0,0,0,1.218-1.223,1.074,1.074,0,0,1,.129.021,4.29,4.29,0,0,1,.537.156,4.934,4.934,0,0,1,.51.247,4.657,4.657,0,0,1,.467.306,4.281,4.281,0,0,1,.4.359,2.831,2.831,0,0,1,.316.37,3.637,3.637,0,0,1,.236.349,1.633,1.633,0,0,1,.161.29c.08.166.129.263.129.263s-.016-.1-.048-.29a2.661,2.661,0,0,0-.07-.333,2.781,2.781,0,0,0-.134-.429,4.123,4.123,0,0,0-.215-.488,5.528,5.528,0,0,0-.311-.52,6.008,6.008,0,0,0-.418-.51,5.36,5.36,0,0,0-.51-.472,5.338,5.338,0,0,0-.531-.349,4.192,4.192,0,0,0,.2-.5,6.306,6.306,0,0,1,1.889,1.223c1.991,1.99,1.207,4.3,2.742,2.774a4.126,4.126,0,0,0,.6-.746.678.678,0,0,1,.15.005.705.705,0,0,1,.418.343,1.823,1.823,0,0,1,.129,1.357A1.55,1.55,0,0,1,130.4,9.727l-.322.043-.086.317c-.762,2.763-2.817,5.7-5.14,5.7s-4.373-2.94-5.14-5.7l-.086-.317-.322-.043a1.575,1.575,0,0,1-1.084-1.245,1.823,1.823,0,0,1,.129-1.357A.722.722,0,0,1,118.654,6.83Z"
                                                              transform="translate(-114.319 0)" fill="#fff" />
                                                        <path id="Path_13320" data-name="Path 13320"
                                                              d="M85.3,327.9a6.075,6.075,0,0,1-2.3,2.452c-1.974,1.009-3.444,1.835-3.444,1.835l-.005-.005v-.016l-.016.011-.016-.011v.016l-.005.005s-1.465-.816-3.444-1.835a6.111,6.111,0,0,1-2.3-2.452c-2.924,1.191-4.963,3.916-4.963,6.3v4.947H90.26V334.2C90.26,331.822,88.216,329.091,85.3,327.9Z"
                                                              transform="translate(-68.8 -310.308)" fill="#fff" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="sub text-right">
                                        <h6>{{ $item->name }}</h6>
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="list text-right">
                                <h5>الشروط</h5>
                                <ul>
                                    <li>{{ $item->skills }}</li>
                                </ul>
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
    <!-- End Jobs  -->
@endsection