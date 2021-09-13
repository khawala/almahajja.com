@extends('admin.default')

@section('page-header')
    الطالبات <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        <ul class="list-inline">
            <li><a class="btn btn-info" href="{{ route(ADMIN . '.students.create') }}">{{ trans('app.add_button') }}</a></li>
            <li class="pull-left"> <a href="{{ route(ADMIN . '.students.index',['export' => true]) }}" class="btn btn-info"><i class="fa fa-print"></i></a></li>
        </ul>
    </section>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            
	        <table class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم الرباعي</th>
                        <th>رقم الهوية</th>
                        <th>الجنس</th>
                        <th>الجوال</th>
                        <th>الجنسية</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>الاسم الرباعي</th>
                        <th>رقم الهوية</th>
                        <th>الجنس</th>
                        <th>الجوال</th>
                        <th>الجنسية</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					@foreach ($items as $item)
						<tr>
                            <td><a href="{{ route(ADMIN . '.students.edit', $item->id) }}">{{ $item->id }}</a></td>
	                        <td><a href="{{ route(ADMIN . '.students.edit', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->national_id }}</td>
                            <td>{{ $item->genderName }}</td>
                            <td>{{ $item->mobile1 }}</td>
                            <td>{{ $item->nationality->name }}</td>
                            <td>{{ $item->statusName }}</td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li>
                                        <button class="btn btn-default btn-xs" data-clipboard-text="{{ $item->name }}"> <i class="fa fa-clipboard"></i> </button>
                                    </li>
                                    
                                    <li>
                                        <button class="btn btn-default btn-xs" data-clipboard-text="{{ $item->mobile1 }}"> <i class="fa fa-phone"></i> </button>
                                    </li>

                                    <li><a href="{{ route(ADMIN . '.students.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.students.destroy', $item->id), 
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
          
          {!! $items->links() !!}
	      <!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	  </div>
	</div>
	
@stop