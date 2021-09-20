@extends('admin.default')

@section('page-header')
    الحلقات والقاعات <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        <ul class="list-inline">
            <li><a class="btn btn-info" href="{{ route(ADMIN . '.classrooms.create') }}">{{ trans('app.add_button') }}</a></li>
            <li class="pull-left"> <a href="{{ route(ADMIN . '.classrooms.index',['export' => true]) }}" class="btn btn-info"><i class="fa fa-print"></i></a></li>
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
                        <th>إسم الحلقة</th>
                        <th>المسار</th>
                         <th>القسم</th>
                        <th>المعلمة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>إسم الحلقة</th>
                        <th>المسار</th>
                        <th>القسم</th>
                        <th>المعلمة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					@foreach ($items as $item)
						<tr>
                            <td><a href="{{ route(ADMIN . '.classrooms.edit', $item->id) }}">{{ $item->id }}</a></td>
                            <td><a href="{{ route(ADMIN . '.classrooms.edit', $item->id) }}">{{ $item->name }}</a></td>
	                        <td>{{ $item->section->name }}</td>
	                       <td>{{ $item->department->name }}</td>
                            <td>{{ $item->teacher->name }}</td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="{{ route(ADMIN . '.classrooms.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.classrooms.destroy', $item->id), 
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