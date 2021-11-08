<?php $__env->startSection('page-header'); ?>
    كشف درجات طالبة
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e($registration->id); ?>_<?php echo e($registration->student->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $registration->marks->chunk(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
        <div class="wrapper">
            <img src="/img/mark.jpg" class="bg-print" alt="">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <p><strong>الطالبة </strong>: <?php echo e($registration->student->name); ?></p>
                    <p><strong>رقم التسجيل </strong>: <?php echo e($registration->id); ?></p>
                    <p><strong>الحلقة </strong>: <?php echo e($registration->classroom->name); ?></p>
                    <p><strong>المعلمة </strong>: <?php echo e($registration->classroom->teacher->name); ?></p>
                </div>
                <div class="col-xs-6 col-md-4">
                    <p><strong>الدورة </strong>: <?php echo e($registration->section->division->name); ?></p>
                    <p><strong>المسار </strong>: <?php echo e($registration->section->name); ?></p>
                    <p><strong>المستوى </strong>: <?php echo e($registration->levelName); ?></p>
                    <p><strong>كمية الحفظ </strong>: <?php echo e($registration->section->division->note); ?></p>
                </div>
            </div>
           
            <a href="<?php echo e(request()->fullUrl()); ?>&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>
            <hr>
        
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info">
                  <!-- /.box-header -->
                  <div class="box-body table-responsive">
                    
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
                            <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </div>

        <div class="pagebreak"></div>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
                
            body{margin: 0;}
            .wrapper{
                margin: auto;
                position: relative;
                padding: 9rem;
                padding-top: 440px;
                width: 1140px;
                height: 1612px;
            }
            .bg-print{
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
            }
            .content-wrapper{
                margin-left: 0!important;
            }
            section.content{
                margin-right: 90px;
            }
            .pagebreak { page-break-before: always; }

    </style>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.print', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>