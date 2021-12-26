@extends('admin.default')

@section('page-header')
    احصائيات    
@stop

@section('content')
    <div class="row">
        <div class="col-sm-6">
            @include('admin.registrations.registrationsBySection')
        </div>
        <div class="col-sm-6">
            @include('admin.registrations.registrationsByClassroom')
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            @include('admin.registrations.registrationsByStatus')
        </div>
        <div class="col-sm-6">
            @include('admin.registrations.registrationsByNationality')
        </div>
    </div>
        <div class="row">

            @include('admin.registrations.registrationsByDepartment')
       
    </div>
@endsection