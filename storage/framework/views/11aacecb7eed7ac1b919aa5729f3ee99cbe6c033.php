
	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
          <section class="filter-area with-padding">
                <p>جدول الخطة والمنهج</p>
                <hr>
                <?php echo $__env->make('admin.division-times.create', ['division_id' => $item->id], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <a href="<?php echo e(route(ADMIN . '.division-times.export', $item->id)); ?>" class="btn btn-info pull-left"><i class="fa fa-print"></i></a>
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
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
                            <td><a href="<?php echo e(route(ADMIN . '.division-times.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
                            <td><a href="<?php echo e(route(ADMIN . '.division-times.edit', $item->id)); ?>"><?php echo e($item->section->name); ?></a></td>
	                        <td><?php echo e($item->description); ?></td>
	                        <td><?php echo e($item->start_date); ?></td>
                            <td><?php echo e($item->end_date); ?></td>
                            <td><?php echo e($item->semesterName); ?></td>
                            <td><?php echo e($item->levelName); ?></td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="<?php echo e(route(ADMIN . '.division-times.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        <?php echo Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.division-times.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]); ?>


                                            <button class="btn btn-danger btn-xs" title="<?php echo e(trans('app.delete_title')); ?>">حذف</button>
                                            
                                        <?php echo Form::close(); ?>

                                    </li>
                                </ul>
                            </td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
	      </div>
	      <!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	  </div>
	</div>
	
