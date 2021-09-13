@extends('admin.default')

@section('page-header')
    احصائيات    
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            @include('admin.stats.request-by-job')
        </div>
        <div class="col-sm-6">
            @include('admin.stats.request-by-status')
        </div>
        <div class="col-sm-6">
            @include('admin.stats.request-by-nationalities')
        </div>
        <div class="col-sm-6">
            @include('admin.stats.user-by-status')
        </div>
        <div class="col-sm-6">
            @include('admin.stats.user-by-role')
        </div>
        <div class="col-sm-6">
            @include('admin.stats.user-by-nationalities')
        </div>
        <div class="col-sm-6">
            @include('admin.stats.user-by-gender')
        </div>
    </div>
@endsection