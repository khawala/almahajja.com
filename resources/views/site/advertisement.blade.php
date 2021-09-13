@extends('site.default')

@section('content')
    <section class="sub-page">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <h2>{{ $ad->name }}</h2>
                        <p>{!! nl2br($ad->short_description) !!}</p>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ $ad->photo }}" target="_blank"><img src="{{ $ad->photo }}" alt=""></a>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="details">
                <p>{!! nl2br($ad->description) !!}</p>
            </div>
        </div>
    </section>
@endsection