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
                    <h5>{!!$department->description !!}</h5>
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
                         @if($section->status==1)
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
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @auth
                      
                        <div class="box-inputs">
                            <form method="post" action="{{route('department.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                               
                                <!-- Start Col  -->
                                    <input type="hidden" name="department_id" value="{{ $department->id }}">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">المسار</label>
                                                 
                                            <select name="section_id" id="section_id" class="form-control" required>
                                          
    <option value="">اختر المسار</option>
                                                @foreach($department->sections as $section)
                                                @if($section->status==1)
                                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('section_id'))
                                                <p class="help-block"><small>{{ $errors->first('section_id') }}</small></p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                               @if($department->separate_section!=1)
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        
                                                <label for="">المستوى</label>
                                                <select name="level_id" id="level_id" class="form-control" required>
                                                 
                                                        <option value="">اختر المسار اولاً</option>
                                                 
                                                </select>
                                                @if ($errors->has('level_id'))
                                                    <p class="help-block"><small>{{ $errors->first('level_id') }}</small></p>
                                                @endif
                                        </div>
                                    </div>
                                    @endif
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

                                    <!-- End Col  -->
@if( $department->price !=  0)
                            <hr>
                            <hr class="space">
                           

                            <h4 class="marker">
                              وسيلة الدفع :
                            </h4>
                            <p>
                              اختر طريقة الدفع  التي تناسبك
                            </p>

                            <div>
                               
                                <div class="row border">
                                    
                                    <div class="col-lg-3">
                                      <div class="form-checkbox" >
                                           <label >
                                          <input type="radio"  name="payment_type" value="2"  checked>
                                
                                            تحويل بنكي
                                          </label>
                                      </div>
                                    </div>
                                    <div class="col-lg-9 ">

                                      إن كنت قد قمت بالدفع عن طريق التحويل للحساب الخاص بالمركز ففضلاً قم برفع صورة من التحويل الخاص بمبلغ القسم

                                        <br>
                                        انقر هنا لتحديد صورة من التحويل
                                        <input name="receipt_image" class="btn-text btn-xs" type="file" value="" accept="image/*"  >
                                        <div class="row">

                                          <div class="col-md-7 text-left">
                                              <?php $setting=App\Setting::find(4);?>
                                            <p>
                                       <hr>
                                      البيانات البنكية للمعهد
                                      :
                                          {{$setting->content}}
                                            </p>
                                          </div>
                                        
                                        </div>

                                  
                                      
                                    </div>
                                  </div>
                                  <hr class="space space-25">

                                  <div class="row border">
                                    <div class="col-lg-3">
                                      <div class="form-checkbox" >
                                           <label >
                                          <input type="radio"  name="payment_type" value="1"  checked  >
                                         
                                             الدفع الإلكتروني
                                          </label>
                                      </div>
                                    </div>
                                    <div class="col-lg-9">
                                      سيتم تحويلك لصفحة الدفع إلكتروني كوسيلة آمنة  ، هذه العملية تدعم كلاً من

                                      <img src="{{asset('images/payment.png')}}" alt="payment">
                                       <img src="{{asset('images/apple.png')}}"width="80" height="50" alt="payment">
                                    </div>
                                  </div>
                                  <hr class="space space-25">

                            </div>
@endif
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
                        @endauth
                        @guest
                           <a class="nav-link btn btn-danger btn-website" href="{{url('login')}}">تسجيل دخول</a>
                        @endguest
                    </div>
                </div>
            </div>
            <!-- End Tabs Content  -->
        </div>
    </section>
    <!-- End Tabs  -->
@endsection
@section('script')
<script>
$(document).ready(function(){
 
    $('#section_id').on('change', function(){
        var sectionID = $(this).val();
        if(sectionID){

            $.ajax({
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                type:'POST',

                url:"{{route('department.sectionLevel')}}",
                data: { 'section_id':sectionID},
                success:function(html){
                    $('#level_id').html(html);
                }
            }); 
        }else{
            $('#level_id').html('<option value="">قم بإختيار المسار اولاً</option>');
        }
    });

});

</script>
@endsection