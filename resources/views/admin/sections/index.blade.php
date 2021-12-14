

@extends('admin.default')

@section('page-header')
    المسارات <small>{{ trans('app.manage') }}</small>
@stop

@section('content')

    <section class="filter-area">
        <ul class="list-inline">
            <li><a class="btn btn-info" href="{{ route(ADMIN . '.sections.create') }}">{{ trans('app.add_button') }}</a></li>
            <li class="pull-left"> <a href="{{ route(ADMIN . '.sections.index',['export' => true]) }}" class="btn btn-info"><i class="fa fa-print"></i></a></li>
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
                    <th>اسم المسار</th>
                    <!--<th>القسم</th>-->
                    <!--<th>الفرع</th>-->
                    <th class="actions">اجراءات</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>اسم المسار</th>
                    <!--<th>القسم</th>-->
                    <!--<th>الفرع</th>-->
                    <th class="actions">اجراءات</th>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td><a href="{{ route(ADMIN . '.sections.edit', $item->id) }}">{{ $item->id }}</a></td>
                        <td><a href="{{ route(ADMIN . '.sections.edit', $item->id) }}">{{ $item->name }}</a></td>
                        <!--<td>{{ $item->category }}</td>-->
                        <!--<td>{{ $item->track }}</td>-->
                        <td class="actions">
                            <ul class="list-inline">
                                <li><a href="{{ route(ADMIN . '.sections.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                <li>
                                    {!! Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.sections.destroy', $item->id), 
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
