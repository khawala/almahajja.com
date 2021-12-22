

@extends('admin.default')

@section('page-header')
    الإعدادات <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        <ul class="list-inline">
            <li><a class="btn btn-info" href="{{ route(ADMIN . '.settings.create') }}">{{ trans('app.add_button') }}</a></li>
            <li class="pull-left"> <a href="{{ route(ADMIN . '.settings.index',['export' => true]) }}" class="btn btn-info"><i class="fa fa-print"></i></a></li>
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
                    <th width="80">#</th>
                    <th>الاسم </th>
                    <th class="actions">اجراءات</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>الاسم </th>
                    <th class="actions">اجراءات</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.settings.edit', $item->id) }}">{{ $item->id }}</a></td>
                        <td><a href="{{ route(ADMIN . '.settings.edit', $item->id) }}">{{ $item->name }}</a></td>
                        <td class="actions">
                            <ul class="list-inline">
                                <li><a href="{{ route(ADMIN . '.settings.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                              
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
