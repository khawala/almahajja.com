<?php $__env->startSection('page-header'); ?>
    الطالبات <small><?php echo e(trans('app.manage')); ?></small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="filter-area">
        <ul class="list-inline">
            <li><a class="btn btn-info" href="<?php echo e(route(ADMIN . '.students.create')); ?>"><?php echo e(trans('app.add_button')); ?></a></li>
            <li class="pull-left"> <a href="<?php echo e(route(ADMIN . '.students.index',['export' => true])); ?>" class="btn btn-info"><i class="fa fa-print"></i></a></li>
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
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
                            <td><a href="<?php echo e(route(ADMIN . '.students.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
	                        <td><a href="<?php echo e(route(ADMIN . '.students.edit', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td><?php echo e($item->national_id); ?></td>
                            <td><?php echo e($item->genderName); ?></td>
                            <td><?php echo e($item->mobile1); ?></td>
                            <td><?php echo e($item->nationality->name); ?></td>
                            <td><?php echo e($item->statusName); ?></td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li>
                                        <button class="btn btn-default btn-xs" data-clipboard-text="<?php echo e($item->name); ?>"> <i class="fa fa-clipboard"></i> </button>
                                    </li>
                                    
                                    <li>
                                        <button class="btn btn-default btn-xs" data-clipboard-text="<?php echo e($item->mobile1); ?>"> <i class="fa fa-phone"></i> </button>
                                    </li>

                                    <li><a href="<?php echo e(route(ADMIN . '.students.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        <?php echo Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.students.destroy', $item->id), 
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
          
          <?php echo $items->links(); ?>

	      <!-- /.box-body -->
	    </div>
	    <!-- /.box -->
	  </div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>