@extends('admin.default')

@section('page-header')
    المستخدمين <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <ul class="list-inline">
        <li><a class="btn btn-info" href="{{ route(ADMIN . '.teachers.create') }}">{{ trans('app.add_button') }}</a></li>
        <!--<li class="pull-left">-->
        <!--    <a class="btn btn-success" href="{{ route(ADMIN . '.teachers.export') }}"><i class="fa fa-file-excel-o"></i></a>-->
        <!--</li>-->
    </ul>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            <div class="user-stats">
                <ul class="list-inline">
                    <li><a href="#" class="btn btn-success">نشط {{ ($stats->where('status', 1)->first() !== null) ? $stats->where('status', 1)->first()->count : 0 }}</a></li>
                    <li><a href="#" class="btn btn-danger">غير نشط {{ ($stats->where('status', 0)->first() !== null) ? $stats->where('status', 0)->first()->count : 0 }}</a></li>
                </ul>
            </div>
	        <table class="table data-tables" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم الرباعي</th>
                        <th>رقم الهوية</th>
                        <th>الجنسية</th>
                        <th>الجنس</th>
                        <th>الجوال</th>
                        <th>الصلاحيات</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>الاسم الرباعي</th>
                        <th>رقم الهوية</th>
                        <th>الجنسية</th>
                        <th>الجنس</th>
                        <th>الجوال</th>
                        <th>الصلاحيات</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					@foreach ($items as $item)
						<tr>
                            <td><a href="{{ route(ADMIN . '.teachers.edit', $item->id) }}">{{ $item->id }}</a></td>
	                        <td><a href="{{ route(ADMIN . '.teachers.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->national_id }}</td>
                            <td>{{ $item->nationality->name }}</td>
                            <td>{{ $item->genderName }}</td>
                            <td>{{ $item->mobile1 }}</td>
                            <td>{{ $item->roleName }}</td>
                            <td>{{ $item->statusName }}</td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="{{ route(ADMIN . '.teachers.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.teachers.destroy', $item->id), 
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