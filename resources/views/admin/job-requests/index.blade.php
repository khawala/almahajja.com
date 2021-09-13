@extends('admin.default')

@section('page-header')
    طلبات التوظيف <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        <ul class="list-inline">
            <li><a class="btn btn-info" href="{{ route(ADMIN . '.job-requests.create') }}">{{ trans('app.add_button') }}</a></li>
            <li class="pull-left"> <a href="{{ route(ADMIN . '.job-requests.index',['export' => true]) }}" class="btn btn-info"><i class="fa fa-print"></i></a></li>
        </ul>
    </section>

   
    
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            
	        <table class="table data-tables" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الوظيفة</th>
                        <th>الاسم الرباعي</th>
                        <th>الجوال</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>الوظيفة</th>
                        <th>الاسم الرباعي</th>
                        <th>الجوال</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					@foreach ($items as $item)
						<tr>
                            <td><a href="{{ route(ADMIN . '.job-requests.edit', $item->id) }}">{{ $item->id }}</a></td>
	                        <td><a href="{{ route(ADMIN . '.job-requests.edit', $item->id) }}">{{ $item->job->name }}</a></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->mobile }}</td>
                            <td>{{ $item->statusName }}</td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="{{ route(ADMIN . '.job-requests.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.job-requests.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}

                                            <button class="btn btn-danger btn-xs" title="{{ trans('app.delete_title') }}"><i class="fa fa-trash"></i></button>
                                            
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </td>
						</tr>
					@endforeach
                </tbody>
            </table>
	      </div>
	      <!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	  </div>
	</div>
	
@stop