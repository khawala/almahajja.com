<?php $__env->startSection('page-header'); ?>
    المستخدمين <small><?php echo e(trans('app.manage')); ?></small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <ul class="list-inline">
                <?php if(auth()->user()->role != 10): ?>
       
        <li><a class="btn btn-info" href="<?php echo e(route(ADMIN . '.teachers.create')); ?>"><?php echo e(trans('app.add_button')); ?></a></li>
        <?php endif; ?>
        <li class="pull-left">
            <a class="btn btn-success" href="<?php echo e(route(ADMIN . '.teachers.export')); ?>"><i class="fa fa-file-excel-o"></i></a>
        </li>
    </ul>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            <div class="user-stats">
                <ul class="list-inline">
                    <li><a href="#" class="btn btn-success">نشط <?php echo e(($stats->where('status', 1)->first() !== null) ? $stats->where('status', 1)->first()->count : 0); ?></a></li>
                    <li><a href="#" class="btn btn-danger">غير نشط <?php echo e(($stats->where('status', 0)->first() !== null) ? $stats->where('status', 0)->first()->count : 0); ?></a></li>
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
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
                            <td><a href="<?php echo e(route(ADMIN . '.teachers.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
	                        <td><a href="<?php echo e(route(ADMIN . '.teachers.edit', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                            <td><?php echo e($item->national_id); ?></td>
                            <td><?php echo e($item->nationality->name); ?></td>
                            <td><?php echo e($item->genderName); ?></td>
                            <td><?php echo e($item->mobile1); ?></td>
                            <td><?php echo e($item->roleName); ?></td>
                            <td><?php echo e($item->statusName); ?></td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="<?php echo e(route(ADMIN . '.teachers.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        <?php echo Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.teachers.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]); ?>


                                            <!--<button class="btn btn-danger btn-xs" title="<?php echo e(trans('app.delete_title')); ?>">حذف</button>-->
                                            
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