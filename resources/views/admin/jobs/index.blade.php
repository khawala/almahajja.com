@extends('admin.default')

@section('page-header')
    الوظائف <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        <div class="row">
            <div class="col-sm-10">
                <ul class="list-inline">
                    <li><a class="btn btn-info" href="{{ route(ADMIN . '.jobs.create') }}">{{ trans('app.add_button') }}</a></li>
                </ul>
            </div>
        </div>
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
                        <th>المسمى الوظيفي</th>
                        <th>الوظائف الشاغرة</th>
                        <th>الجنس</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>المسمى الوظيفي</th>
                        <th>الوظائف الشاغرة</th>
                        <th>الجنس</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					@foreach ($items as $item)
						<tr>
                            <td><a href="{{ route(ADMIN . '.jobs.edit', $item->id) }}">{{ $item->id }}</a></td>
	                        <td><a href="{{ route(ADMIN . '.jobs.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->vacancies }}</td>
                            <td>{{ $item->genderName }}</td>
                            <td>{{ $item->statusName }}</td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="{{ route(ADMIN . '.jobs.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.jobs.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]) 
                                        !!}

                                            <button class="btn btn-danger btn-xs" title="{{ trans('app.delete_title') }}">حذف</button>
                                            
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