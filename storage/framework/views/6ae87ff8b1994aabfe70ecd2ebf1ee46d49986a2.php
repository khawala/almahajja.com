<?php $__env->startSection('page-header'); ?>
    الاعلانات <small><?php echo e(trans('app.manage')); ?></small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="filter-area">
        <div class="row">
            <div class="col-sm-10">
                <ul class="list-inline">
                    <li><a class="btn btn-info" href="<?php echo e(route(ADMIN . '.advertisements.create')); ?>"><?php echo e(trans('app.add_button')); ?></a></li>
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
                        <th>عنوان الاعلان</th>
                        <th>مختصر الاعلان</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>عنوان الاعلان</th>
                        <th>مختصر الاعلان</th>
                        <th>الحالة</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
                            <td><a href="<?php echo e(route(ADMIN . '.advertisements.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
	                        <td><a href="<?php echo e(route(ADMIN . '.advertisements.edit', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td><?php echo e($item->short_description); ?></td>
                            <td><?php echo e($item->statusName); ?></td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="<?php echo e(route(ADMIN . '.advertisements.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        <?php echo Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.advertisements.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]); ?>


                                            <button class="btn btn-danger btn-xs" title="<?php echo e(trans('app.delete_title')); ?>"><i class="fa fa-trash"></i></button>
                                            
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
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>