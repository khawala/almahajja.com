@extends('site.new_default')

@section('content')
<!-- Start Login Section  -->

<section class="login-sec" style="margin-top:150px;margin-bottom:150px;">

    <form role="form" method="POST" action="{{ url('/register') }}">

        @csrf
        <div class="inputs item-center">
         
            @include('admin.commun.flash-message')
             @guest
                                    <!-- Start Col  -->
                                        <div class="col-10">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="name"  value="{{ old('name') }}" placeholder="الاسم الرباعي" required>
                                                @if ($errors->has('name'))
                                                    <p class="help-block"><small>{{ $errors->first('name') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                  <div class="col-10">
                                            <div class="form-group">
                                                <div class="lemail">
                                <input type="tel" id="telephone" min="9" max="11" class="form-control"  style="direction: ltr!important;"  value="{{ old('mobile1') }}" placeholder="الجوال  : 505555555" value="{{old('phone')}}" autocomplete="off"  titles="الرجاء إدخال رقمك">
                                <input type="hidden" id="phonevalue" name="mobile1" value="{{old('mobile1')}}">
                            </div>

                            @if ($errors->has('mobile1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('mobile1') }}</strong>
                                </span>
                            @endif
                                            </div>
                                
                                        </div>
                                              <div class="col-10">
                                            <div class="form-group">
                                         <label for="">شريحة الجوال</label>
                                                <select name="telecom_id" id="telecom_id" class="form-control" required>
                                                    @foreach(App\Telecom::pluck('name', 'id')->toArray() as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('telecom_id'))
                                                    <p class="help-block"><small>{{ $errors->first('telecom_id') }}</small></p>
                                                @endif
                                                     </div>
                                
                                        </div>
                                           <!-- Start Col  -->
                                        <div class="col-10">
                                            <div class="form-group">
                                         <div class="lemail has-feedback">
                               
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="الإيميل">
                            </div>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                              </div>
                                        </div>
                                           <div class="col-10">
                                            <div class="form-group">
                                             {!! Form::mySelect('gender', 'الجنس', config('variables.gender')) !!}
    </div>
                                        </div>
                                       
                                        <!-- End Col  -->
                                    <!-- Start Col  -->
                                        <div class="col-10">
                                            <div class="form-group">
                                              <label>الجنسية</label>
                                                <select name="nationality_id"  id="selectInput" class="form-control" required>
                                                    @foreach(App\Nationality::active()->pluck('name', 'id')->toArray() as $key => $value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('nationality_id'))
                                                    <p class="help-block"><small>{{ $errors->first('nationality_id') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                         <div class="col-10">
                                            <div class="form-group">
                                               
                                                <input type="text" class="form-control" name="username"  value="{{ old('username') }}" placeholder="اسم المستخدم" required>
                                                @if ($errors->has('username'))
                                                    <p class="help-block"><small>{{ $errors->first('username') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                            <div class="col-10">
                                            <div class="form-group">
                                               
                                                <input type="password" class="form-control" name="password"  value="{{ old('password') }}" placeholder="كلمة السر" required>
                                                @if ($errors->has('password'))
                                                    <p class="help-block"><small>{{ $errors->first('password') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                        <!-- Start Col  -->
                                        <div class="col-10">
                                            <div class="form-group">
                                             
                                                <input type="password" class="form-control" name="password_confirmation"  value="{{ old('password_confirmation') }}" placeholder="تأكيد كلمة السر" required>
                                                @if ($errors->has('password_confirmation'))
                                                    <p class="help-block"><small>{{ $errors->first('password_confirmation') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        </div>
       @endguest
       
            <div class="form-group">
                <input type="submit" class="btn btn-website" name="" value="تسجيل ">
            </div>
           <a class="nav-link" href="{{url('/login')}}">  لدي حساب تسجيل دخول </a>
        </div>

    </form>
</section>
<!-- End Jobs  -->
@endsection