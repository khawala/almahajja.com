
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
          <section class="filter-area with-padding">
                <p>جدول الخطة والمنهج</p>
                <hr>
                @include('admin.division-times.create', ['division_id' => $item->id])
                <a href="{{ route(ADMIN . '.division-times.export', $item->id) }}" class="btn btn-info pull-left"><i class="fa fa-print"></i></a>
          </section>
	      <div class="box-body table-responsive no-padding">
	        <table class="table data-tables" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>المسار</th>
                        <th> المنهج (النصاب)</th>
                        <th>من تاريخ</th>
                        <th>الى تاريخ</th>
                        <th>الفصل الدراسي</th>
                        <th>المستوى</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>المسار</th>
                        <th> المنهج (النصاب)</th>
                        <th>من تاريخ</th>
                        <th>الى تاريخ</th>
                        <th>الفصل الدراسي</th>
                        <th>المستوى</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					@foreach ($items as $item)
						<tr>
                            <td><a href="{{ route(ADMIN . '.division-times.edit', $item->id) }}">{{ $item->id }}</a></td>
                            <td><a href="{{ route(ADMIN . '.division-times.edit', $item->id) }}">{{ $item->section->name }}</a></td>
	                        <td>{{ $item->description }}</td>
	                        <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>{{ $item->semesterName }}</td>
                            <td>{{ $item->levelName }}</td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="{{ route(ADMIN . '.division-times.edit', $item->id) }}" title="{{ trans('app.edit_title') }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        {!! Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.division-times.destroy', $item->id), 
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
	
