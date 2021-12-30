<?php $__env->startSection('page-header'); ?>
    الاقسام <small><?php echo e(trans('app.manage')); ?></small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="filter-area">
        <ul class="list-inline">
            <?php if(auth()->user()->role != 10): ?>
            <li><a class="btn btn-info" href="<?php echo e(route(ADMIN . '.departments.create')); ?>"><?php echo e(trans('app.add_button')); ?></a></li>
            <?php endif; ?>
            <li class="pull-left"> <a href="<?php echo e(route(ADMIN . '.departments.index',['export' => true])); ?>" class="btn btn-info"><i class="fa fa-print"></i></a></li>
            
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
                        <th>#</th>
                        <th>اسم القسم</th>
                         <th>اسماء المسارات</th>
                        <th>نوع الدفع</th>
                        <th>نوع التسجيل</th>
                        <th>المشرف</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                         <th>#</th>
                        <th>اسم القسم</th>
                        <th>اسماء المسارات</th>
                        <th>نوع الدفع</th>
                        <th>نوع التسجيل</th>
                        <th>المشرف</th>
                        <th class="actions">اجراءات</th>
                    </tr>
                </tfoot>
             
                <tbody>
					<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
                            <td><a href="<?php echo e(route(ADMIN . '.departments.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
                            <td><a href="<?php echo e(route(ADMIN . '.departments.edit', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
	                        <td>
	                            <?php $__currentLoopData = $item->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                            <?php echo e($section->name); ?>

	                                <br>
	                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        
	                            </td>
	                               <td><?php echo e(config('variables.payment_type.'.$item->payment_type)); ?></td>
	                               <td><?php echo e(config('variables.register_type.'.$item->register_type)); ?></td>
                            <td><?php echo e($item->supervisor->name); ?></td>
	                        <td class="actions">
                                <ul class="list-inline">
                                    <li><a href="<?php echo e(route(ADMIN . '.departments.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                    <li>
                                        <?php echo Form::open([
                                            'class'=>'delete',
                                            'url'  => route(ADMIN . '.departments.destroy', $item->id), 
                                            'method' => 'DELETE',
                                            ]); ?>


                                            <button class="btn btn-danger btn-xs" title="<?php echo e(trans('app.delete_title')); ?>">حذف</button>
                                            
                                        <?php echo Form::close(); ?>

                                    </li>
                                </ul>
                                 <a class="btn btn-success" href="<?php echo e(route(ADMIN . '.departments.report',$item->id)); ?>">تقرير شامل </a>
                                        <?php if(auth()->user()->role == 10): ?>
            <a class="btn btn-info" href="<?php echo e(route(ADMIN . '.departments.complete_mark',$item->id)); ?>">إرسال ايميل استكمال رصد الدرجات للقسم</a>
            <?php endif; ?>
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