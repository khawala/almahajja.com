@extends('site.default')

@section('content')
<section class="sub-page">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>{{ $classroom->name }}</h2>
                    <p>{{ nl2br($classroom->description) }}</p>
                </div>
                <div class="col-sm-3">
                    <img src="{{ $classroom->photo }}" alt="">
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="details">
            <div class="the-tab">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-01" aria-controls="tab-01" role="tab" data-toggle="tab"><i class="fa fa-book"></i> الخطة الدراسية</a></li>
                    <li role="presentation"><a href="#tab-02" aria-controls="tab-02" role="tab" data-toggle="tab"><i class="fa fa-user"></i> التسجيل</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
   
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab-02">
                        {!! Form::open([
                        'route' => 'division.store'
                        ]) !!}
                        <div class="row">
                            @guest
                            <div class="col-sm-6">

                                {!! Form::myInput('text', 'name', 'الاسم الرباعي', ['required']) !!}
                                @if ($errors->has('name'))
                                <p class="help-block"><small>{{ $errors->first('name') }}</small></p>
                                @endif

                                {!! Form::myInput('text', 'mobile1', 'الجوال', ['required']) !!}
                                @if ($errors->has('mobile1'))
                                <p class="help-block"><small>{{ $errors->first('mobile1') }}</small></p>
                                @endif

                                {!! Form::mySelect('nationality_id', 'الجنسية', ['' => ''] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']) !!}
                                @if ($errors->has('nationality_id'))
                                <p class="help-block"><small>{{ $errors->first('nationality_id') }}</small></p>
                                @endif

                                {!! Form::myInput('text', 'username', 'اسم المستخدم', ['required']) !!}
                                @if ($errors->has('username'))
                                <p class="help-block"><small>{{ $errors->first('username') }}</small></p>
                                @endif

                                {!! Form::myInput('password', 'password', 'كلمة السر', ['required']) !!}
                                @if ($errors->has('password'))
                                <p class="help-block"><small>{{ $errors->first('password') }}</small></p>
                                @endif

                                {!! Form::myInput('password', 'password_confirmation', 'تأكيد كلمة السر', ['required']) !!}
                                @if ($errors->has('password_confirmation'))
                                <p class="help-block"><small>{{ $errors->first('password_confirmation') }}</small></p>
                                @endif

                            </div>
                            @endguest

                            <div class="col-sm-6">
                                {!! Form::mySelect('section_id', 'المسار', ['' => ''] + App\Section::where('division_id', $classroom->id)->pluck('name', 'id')->toArray(), null, ['required']) !!}
                                @if ($errors->has('section_id'))
                                <p class="help-block"><small>{{ $errors->first('section_id') }}</small></p>
                                @endif

                                {!! Form::mySelect('level', 'المستوى', config('variables.sections_level')) !!}
                                @if ($errors->has(' level'))
                                <p class="help-block"><small>{{ $errors->first('level') }}</small></p>
                                @endif

                                @if ($classroom->type == 0)
                                {!! Form::mySelect('telecom_id', 'شريحة الجوال', ['' => ''] + App\Telecom::pluck('name', 'id')->toArray(), null, ['required']) !!}
                                @if ($errors->has('telecom_id'))
                                <p class="help-block"><small>{{ $errors->first('telecom_id') }}</small></p>
                                @endif

                                {!! Form::mySelect('period_id', 'وقت التسميع', ['' => ''] + App\Period::pluck('name', 'id')->toArray(), null, ['required']) !!}
                                @if ($errors->has('period_id'))
                                <p class="help-block"><small>{{ $errors->first('period_id') }}</small></p>
                                @endif
                                @endif

                                <div class="form-group">
                                    <br>
                                    <button class="btn btn-primary">سجلي الان</button>
                                </div>

                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection