@extends('site.default')

@section('content')
    <section class="sub-page">
        <header>
            <div class="container">
                <h2>{{ $job->name }}</h2>
                <p>{{ nl2br($job->description) }}</p>
                <p> {{ $job->salary }} ريال : {{ $job->time }}</p>
            </div>
        </header>

        <div class="container">
            <div class="details">
                {!! Form::open([
                    'route' => 'job.store'
                ]) !!}
                    <div class="row">
                        <div class="col-sm-6">
                            {!! Form::hidden('job_id', $job->id) !!}

                            {!! Form::myInput('text', 'name', 'الاسم الرباعي', ['required']) !!}

                            {!! Form::myInput('text', 'mobile', 'الجوال', ['required']) !!}

                            {!! Form::mySelect('nationality_id', 'الجنسية', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']) !!}
                        </div>

                        <div class="col-sm-6">
                            {!! Form::myTextArea('cv_description', 'السيرة الذاتية', ['rows' => 10, 'required']) !!}
                        </div>
                    </div>

                    <button class="btn btn-primary">ارسال السيرة</button>

                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection