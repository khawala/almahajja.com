@extends('site.default')

@section('content')

<section class="slide" id="slide" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div id="home-slide" data-interval="false" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($ads as $ad)
                    <div class="item {{ $loop->first ? 'active' : '' }}">
                        <div class="col-sm-8">
                            <h4 class="title">{{ $ad->name }}</h4>
                            <p>{{ $ad->short_description }}</p>
                        </div>
                        <div class="col-sm-4">
                            <img src="{{ $ad->photo }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>

                <ol class="carousel-indicators">
                    @foreach ($ads as $ad)
                    <li data-target="#home-slide" data-slide-to="{{ $loop->index }}" {{ $loop->first ? 'class=active' : '' }}></li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>

@if (!$divisions->isEmpty())
<section class="divisions" id="divisions" data-aos="fade-up">
    <div class="container">
        <div id="divisions-slide" data-interval="false" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @foreach ($divisions as $division)
                <div class="item {{ $loop->first ? 'active' : '' }}">
                    <a href="{{ route('division.show', $division) }}">
                        <h3 class="title">{{ $division->name }}</h3>
                    </a>
                    <p>{{ $division->description }}</p>
                    <p class="the-date">{{ $division->batch }} <span>{{ $division->price }} ريال سعودي</span></p>
                    <a class="btn btn-primary" href="{{ route('division.show', $division) }}">تفاصيل التدريب</a>
                </div>
                @endforeach
            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($divisions as $division)
                <li data-target="#divisions-slide" data-slide-to="{{ $loop->index }}" {{ $loop->first ? 'class=active' : '' }}></li>
                @endforeach
            </ol>
        </div>
    </div>
</section>
@endif

<section class="classrooms" id="classrooms" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="/img/coran2.png" alt="">
            </div>

            <div class="col-sm-8">
                <div class="wrapper">
                    <div id="classrooms-slide" data-interval="false" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach ($classrooms as $classroom)
                            <div class="item {{ $loop->first ? 'active' : '' }}">
                                <a href="{{ route('division.show', $classroom) }}">
                                    <h3>{{ $classroom->name }}</h3>
                                </a>
                                <p>{{ $classroom->description }}</p>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i> انعقاد الدورة : {{ $classroom->batch }}</li>
                                            <li>
                                                <i class="fa fa-money" aria-hidden="true"></i> رسوم التسجيل :
                                                @if ($classroom->price)
                                                {{ $classroom->price }} ريال
                                                @else
                                                مجانا
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">

                    <a class="btn btn-primary" href="{{ route('classroom.show', $classroom) }}">تفاصيل التدريب</a>
                                    </div>
                                    
                                </div>

                            </div>
                            @endforeach
                        </div>

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach ($classrooms as $classroom)
                            <li data-target="#classrooms-slide" data-slide-to="{{ $loop->index }}" {{ $loop->first ? 'class=active' : '' }}></li>
                            @endforeach
                        </ol>
                        <a class="left carousel-control" href="#classrooms-slide" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#classrooms-slide" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="job-requests" id="job-requests" data-aos="fade-up">
    <div class="container">
        <h3 class="title">التوظيف</h3>
        @foreach ($jobs->chunk(3) as $row)
        <div class="row">
            @foreach ($row as $job)
            <div class="col-sm-4">
                <article>
                    <header>
                        <div class="circle">
                            <span class="big">{{ $job->vacancies }}</span>
                            <span class="price">{{ $job->salary }}</span>
                            <span class="currency">ريال سعودي</span>
                        </div>
                    </header>
                    <div class="wrapper">
                        <p>{{ $job->description }}</p>
                        <p>{{ $job->skills }}</p>
                        <a href="{{ route('job.show', $job) }}" class="btn btn-primary">{{ $job->name }}</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
@endsection