@extends('admin.default')

@section('page-header')
    احصائيات    
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            @include('admin.divisions.divisionsByStatus')
        </div>
        <div class="col-sm-6">
            @include('admin.divisions.divisionsByType')
        </div>
        <div class="col-sm-6">
            @include('admin.divisions.divisionsByGender')
        </div>
        <div class="col-sm-6">
            @include('admin.divisions.AdvertisementByStatus')
        </div>
    </div>
@endsection