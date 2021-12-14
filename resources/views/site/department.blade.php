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
                    <h3>{{ $department->name }}</h3>
                    <h5>{{ nl2br($department->description) }}</h5>
                </div>
                <div class="box-img">
                    <img src="{{ $department->photo }}" />
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
                        @foreach ($department->sections as $section)
                            <h6>{{ $section->name }}</h6>
                            <table class="table">
                                <tbody>
                                @foreach ($section->levels as $level)
                                    <tr>
                                        <td>{{ $level->name }}</td>
                                        <td>{{ $level->description }}</td>
                                        <td>
                                            @if ($level->pivot->pdf_file)
                                                <a href="{{ config('variables.level_sections_pdf_file.public').$level->pivot->pdf_file }}">
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
                            <form method="post" action="{{route('department.store')}}">
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
                                    <input type="hidden" name="department_id" value="{{ $department->id }}">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">المسار</label>
                                            <select name="division_id" id="division_id" class="form-control" required>
                                                @foreach(App\Section::join('department_section', 'sections.id', '=', 'department_section.section_id')
                                ->where('department_section.department_id','=',$department->id)->pluck('sections.name', 'sections.id')->toArray() as $key => $value)
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
                                            @if ($department->type == 0)
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
                                            @if ($department->type == 0)
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