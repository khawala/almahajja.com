@extends('admin.default')

@section('page-header')
    التسجيل <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        <form action="" class="form-inline">
            <ul class="list-inline">
                <li><a class="btn btn-info" href="{{ route(ADMIN . '.registrations.create') }}">{{ trans('app.add_button') }}</a></li>
                <li style="float: left">
                  <button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button>
                  <a href="{{ route(ADMIN . '.registrations.index') }}" class="btn btn-primary btn-xs"><i class="fa fa-close"></i></a>
                  <a href="{{ route(ADMIN . '.registrations.index',['export' => true]) }}" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
                </li>
            </ul>
          
            {!! Form::mySelect('section_id', '', [''=>'المسار'] + App\Section::ListGroup(), request('section_id'), ['class' => 'form-control select']) !!}

            {!! Form::mySelect('telecom_id', '', [''=>'شريحة الجوال'] + App\Telecom::pluck('name', 'id')->toArray(), request('telecom_id'), ['class' => 'form-control select']) !!}

            {!! Form::mySelect('period_id', '', [''=>'وقت التسميع'] + App\Period::pluck('name', 'id')->toArray(), request('period_id'), ['class' => 'form-control select']) !!}
            
            {!! Form::mySelect('status', '', ['' => "إختر الحالة"] + config('variables.registrations_status'), request('status'), ['class' => 'form-control select']) !!}
            
        </form>
    </section>
    <br>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            @include('admin.registrations._table', ['items' => $items])
	      </div>

	    </div>
        {!! $items->appends(request()->input())->links() !!}
	  </div>
	</div>
	
@stop