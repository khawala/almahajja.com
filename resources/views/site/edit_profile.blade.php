@extends('site.new_default')

@section('content')
<!-- Start Login Section  -->

<section class="login-sec" style="height:auto!important;">

    <form role="form" method="POST" action="{{ url('/profile') }}">

        @csrf
        <div class="inputs item-center">

                                    <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="name"  value="{{$user->name}}" placeholder="الاسم الرباعي" required>
                                                @if ($errors->has('name'))
                                                    <p class="help-block"><small>{{ $errors->first('name') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                  <div class="col-12">
                                            <div class="form-group">
                                                <div class="lemail">
                                <input type="tel" id="telephone" min="9"  style="direction: ltr!important;" max="11" class="form-control"  value="{{$user->mobile1 }}" placeholder="الجوال  : 505555555" autocomplete="off"  titles="الرجاء إدخال رقمك">
                                <input type="hidden" id="phonevalue" name="mobile1" value="{{$user->mobile1}}">
                            </div>

                            @if ($errors->has('mobile1'))
                                <span class="help-block">
                                <strong>{{ $errors->first('mobile1') }}</strong>
                                </span>
                            @endif
                                            </div
                                
                                        </div>
                                           
                                           <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                         <div class="lemail has-feedback">
                               
                                <input type="email" class="form-control" name="email" value="{{$user->email }}" placeholder="الإيميل">
                            </div>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                              </div>
                                        </div>
                                           <div class="col-12">
                                            <div class="form-group">
                                                
                                                <label for=""> الجنس</label>
                                                <select name="gender" id="gender" class="form-control" required>

                                                        <option value="0" @if($user->gender==0) selected @endif>ذكر</option>
                                                     <option value="1" @if($user->gender==1) selected @endif>انثى</option>
                                                   
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <p class="help-block"><small>{{ $errors->first('gender') }}</small></p>
                                                @endif
                                            
    </div>
                                        </div>
                                          <div class="col-12">
                                        <div class="form-group">
                                         
                                                <label for="">شريحة الجوال</label>
                                                <select name="telecom_id" id="telecom_id" class="form-control" required>
                                                    @foreach(App\Telecom::pluck('name', 'id')->toArray() as $key => $value)
                                                        <option value="{{$key}}" @if($user->telecom_id==$key) selected @endif>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('telecom_id'))
                                                    <p class="help-block"><small>{{ $errors->first('telecom_id') }}</small></p>
                                                @endif
                                       
                                        </div>
                                    </div>
                                        <!-- End Col  -->
                                    <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              <label>الجنسية</label>
                                                <select name="nationality_id"  id="selectInput" class="form-control" required>
                                                    @foreach(App\Nationality::active()->pluck('name', 'id')->toArray() as $key => $value)
                                                        <option value="{{$key}}" @if($user->nationality_id==$key) selected @endif>{{$value}}</option>
                                                        
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('nationality_id'))
                                                    <p class="help-block"><small>{{ $errors->first('nationality_id') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        @if(\Auth::user()->role==5)
                                           <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="bank_account"  value="{{ $user->bank_account }}" placeholder=" رقم الحساب" required>
                                                @if ($errors->has('bank_account'))
                                                    <p class="help-block"><small>{{ $errors->first('bank_account') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                 <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="iban"  value="{{ $user->iban }}" placeholder=" رقم الايبان" required>
                                                @if ($errors->has('iban'))
                                                    <p class="help-block"><small>{{ $errors->first('iban') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                         <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="name_account"  value="{{ $user->name_account }}" placeholder="  اسم صاحب الحساب" required>
                                                @if ($errors->has('name_account'))
                                                    <p class="help-block"><small>{{ $errors->first('name_account') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="address"  value="{{ $user->address }}" placeholder=" مكان الإقامة" required>
                                                @if ($errors->has('address'))
                                                    <p class="help-block"><small>{{ $errors->first('address') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- Start Col  -->
                                        <div class="col-12" >
                                            <div class="form-group">
                                                <label>السيرة الذاتية</label>
                                                
                                                <textarea type="text" class="form-control" style="direction:rtl !important" name="cv_text" placeholder="السيرة الذاتية " required>{{ $user->cv_text }} </textarea>
                                                @if ($errors->has('cv_text'))
                                                    <p class="help-block"><small>{{ $errors->first('cv_text') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                         <div class="col-12">
                                            <div class="form-group">
                                               
                                                <input type="text" class="form-control" name="username"  value="{{$user->username }}" placeholder="اسم المستخدم" required>
                                                @if ($errors->has('username'))
                                                    <p class="help-block"><small>{{ $errors->first('username') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                            <div class="col-12">
                                            <div class="form-group">
                                               
                                                <input type="password" class="form-control" name="password" placeholder="كلمة السر" >
                                                @if ($errors->has('password'))
                                                    <p class="help-block"><small>{{ $errors->first('password') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                        <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                             
                                                <input type="password" class="form-control" name="password_confirmation"   placeholder="تأكيد كلمة السر" >
                                                @if ($errors->has('password_confirmation'))
                                                    <p class="help-block"><small>{{ $errors->first('password_confirmation') }}</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        </div>

       
            <div class="form-group">
                <input type="submit" class="btn btn-website" name="" value="حفظ ">
            </div>
          
        </div>

    </form>
</section>
<!-- End Jobs  -->
@endsection