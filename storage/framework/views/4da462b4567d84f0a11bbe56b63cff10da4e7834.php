<?php $__env->startSection('page-header'); ?>
    كشف درجات طالبة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e($registration->id); ?>_<?php echo e($registration->student->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xs-6 col-md-4">
            <p><strong>الطالبة </strong>: <?php echo e($registration->student->name); ?></p>
            <p><strong>رقم التسجيل </strong>: <?php echo e($registration->id); ?></p>
            <p><strong>الحلقة </strong>: <?php echo e($registration->classroom->name); ?></p>
            <p><strong>المعلمة </strong>: <?php echo e($registration->classroom->teacher->name); ?></p>
        </div>
        <div class="col-xs-6 col-md-4">
            <p><strong>القسم </strong>: <?php echo e($registration->department->name); ?></p>
            <p><strong>المسار </strong>: <?php echo e($registration->section->name); ?></p>
            
            
        </div>
    </div>

   
    <a href="<?php echo e(route('registration.marks', request()->all())); ?>&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>
    <hr>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            
	        <table class="table data-tables" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>الشهر</th>
                        <th>الفصل الدراسي</th>
                        <th>المستوى</th>
                        <th>المراجعة</th>
                        <th>التسميع</th>
                        <th>الإختبار الشهري</th>
                        <th>المجموع</th>
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>الشهر</th>
                        <th>الفصل الدراسي</th>
                        <th>المستوى</th>
                        <th>المراجعة</th>
                        <th>التسميع</th>
                        <th>الإختبار الشهري</th>
                        <th>المجموع</th>
                    </tr>
                </tfoot>
             
                <tbody>
                    <?php $__currentLoopData = $registration->marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($mark->monthName); ?></td>
                            <td><?php echo e($mark->semesterName); ?></td>
                            <td><?php echo e($mark->levelName); ?></td>
                            <td><?php echo e($mark->mark1); ?></td>
                            <td><?php echo e($mark->mark2); ?></td>
                            <td><?php echo e($mark->mark3); ?></td>
                            <td><?php echo e($mark->sum); ?></td>
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