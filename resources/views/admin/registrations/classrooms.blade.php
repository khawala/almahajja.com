@extends('admin.default')

@section('page-header')
    تخصيص حلقة <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        
        <form action="" class="form-inline">
            {!! Form::myInput('text', 'section', '', ['placeholder'=>'المسار'], request('section')) !!}
            {!! Form::myInput('text', 'telecom', '', ['placeholder'=>'شريحة الجوال'], request('telecom')) !!}
            {!! Form::myInput('text', 'period', '', ['placeholder'=>'وقت التسميع'], request('period')) !!}
            <button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button>
            <a href="{{ route(ADMIN . '.registrations.classrooms', ['status' => 1]) }}" class="btn btn-primary btn-xs"><i class="fa fa-close"></i></a>
        </form>
    </section>
    <br>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            
	        <table class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>رقم التسجيل</th>
                        <th>الطالبة</th>
                        <th>المسار</th>
                        <th>شريحة الجوال</th>
                        <th>وقت التسميع</th>
                        <th>تاريخ التسجيل</th>
                        <th>الحلقة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>رقم التسجيل</th>
                        <th>الطالبة</th>
                        <th>المسار</th>
                        <th>شريحة الجوال</th>
                        <th>وقت التسميع</th>
                        <th>تاريخ التسجيل</th>
                        <th>الحلقة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					@foreach ($items as $item)
						<tr>
                            <td><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}">{{ $item->id }}</a></td>
	                        <td><a href="{{ route(ADMIN . '.registrations.edit', $item->id) }}">{{ $item->student->name }}</a></td>
                            <td>{{ $item->section->name }}</td>
                            <td>{{ $item->telecom->name }}</td>
                            <td>{{ $item->period->name}}</td>
                            <td>{{ $item->created_at}}</td>
                            <td width="200">
                                {!! Form::model($item, [
                                    'url'  => route(ADMIN . '.registrations.update', $item->id), 
                                    'method' => 'PUT',
                                    ]) 
                                !!}
                                    {!! Form::mySelect('classroom_id', '', ['' => ''] + App\Classroom::pluck('name', 'id')->toArray(), null, ['class' => 'form-control onchange']) !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                <button class="btn btn-default btn-xs" data-clipboard-text="{{ $item->student->name }} {{ $item->student->mobile1 }}"> <i class="fa fa-clipboard"></i> </button>
                            </td>
                        </tr>
					@endforeach
                </tbody>
            </table>
            
	      </div>

	    </div>
        {!! $items->links() !!}
	  </div>
	</div>
	
@stop