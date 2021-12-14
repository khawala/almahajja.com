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
                    <h3>{{ $division->name }}</h3>
                    <h5>{{ nl2br($division->description) }}</h5>
                </div>
                <div class="box-img">
                    <img src="{{ $division->photo }}" />
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
                    <li class="breadcrumb-item active" aria-current="page">الأقسام</li>
                </ol>
            </nav>
            <!-- End Title  -->
            <!-- Start Tabs Content  -->
            <div class="tabs-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                           aria-selected="true">الخطة الدراسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                           aria-selected="false">التسجيل</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @foreach ($division->sections as $section)
                        <h6>{{ $section->name }}</h6>
                        <table class="table">
                            <tbody>
                            @foreach ($section->divisiontimes as $divisiontime)
                            <tr>
                                <td>{{ $divisiontime->description }}</td>
                                <td>{{ $divisiontime->start_date_format }}</td>
                                <td>{{ $divisiontime->end_date_format }}</td>
                                <td>
                                    @if ($division->type == 0)
                                        {{ $section->category }}
                                    @else
                                        {{ $section->track }}
                                    @endif
                                </td>
                                <td>{{ $divisiontime->semesterName }}</td>
                                <td>{{ $divisiontime->levelName }}</td>
                                <td>
                                    @if ($divisiontime->pdf_file)
                                    <a href="{{ $divisiontime->pdf_file }}">
                                            <i class="fas fa-download"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                          <hr>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="box-inputs">
                            <form method="post" action="{{route('division.store')}}">
                                @csrf
                                <div class="row">
                                @guest
                                    <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">الاسم الرباعي</label>
                                            <input type="text" class="form-control" name="name" placeholder="الاسم الرباعي" required>
                                            @if ($errors->has('name'))
                                                <p class="help-block"><small>{{ $errors->first('name') }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                @endguest
                                    <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">المسار</label>
                                            <select name="division_id" id="division_id" class="form-control" required>
                                                @foreach(App\Section::where('division_id', $division->id)->pluck('name', 'id')->toArray() as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('section_id'))
                                                <p class="help-block"><small>{{ $errors->first('section_id') }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                @guest
                                    <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">الجوال</label>
                                            <input type="text" class="form-control" name="mobile1" placeholder="الجوال" required>
                                            @if ($errors->has('mobile1'))
                                                <p class="help-block"><small>{{ $errors->first('mobile1') }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                @endguest
                                <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">المستوى</label>
                                            <select name="level" id="level" class="form-control" required>
                                                @foreach(config('variables.sections_level') as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('level'))
                                                <p class="help-block"><small>{{ $errors->first('level') }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                @guest
                                    <!-- Start Col  -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">الجنسية</label>
                                                <select name="nationality_id" id="nationality_id" class="form-control" required>
                                                    @foreach(App\Nationality::active()->pluck('name', 'id')->toArray() as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('nationality_id'))
                                                    <p class="help-block"><small>{{ $errors->first('nationality_id') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                @endguest
                                    <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            @if ($division->type == 0)
                                                <label for="">شريحة الجوال</label>
                                                <select name="telecom_id" id="telecom_id" class="form-control" required>
                                                    @foreach(App\Telecom::pluck('name', 'id')->toArray() as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('telecom_id'))
                                                    <p class="help-block"><small>{{ $errors->first('telecom_id') }}</small></p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                @guest
                                    <!-- Start Col  -->
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">اسم المستخدم</label>
                                                <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" required>
                                                @if ($errors->has('username'))
                                                    <p class="help-block"><small>{{ $errors->first('username') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                    @endguest
                                    <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            @if ($division->type == 0)
                                                <label for="">وقت التسميع</label>
                                                <select name="period_id" id="period_id" class="form-control" required>
                                                    @foreach(App\Period::pluck('name', 'id')->toArray() as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('period_id'))
                                                    <p class="help-block"><small>{{ $errors->first('period_id') }}</small></p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                @guest
                                    <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">كلمة السر</label>
                                            <input type="password" class="form-control" name="password" placeholder="كلمة السر" required>
                                            @if ($errors->has('password'))
                                                <p class="help-block"><small>{{ $errors->first('password') }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                    <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">تأكيد كلمة السر</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="تأكيد كلمة السر" required>
                                            @if ($errors->has('password_confirmation'))
                                                <p class="help-block"><small>{{ $errors->first('password_confirmation') }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                @endguest
                                    <!-- Start Col  -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-website" name="" value="سجل الآن">
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Tabs Content  -->
        </div>
    </section>
    <!-- End Tabs  -->
@endsection