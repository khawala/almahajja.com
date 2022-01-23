<?php
    $months    = config('variables.months');
    $semesters = config('variables.semesters');
    $levels    = config('variables.sections_level');
?>
<?php $__env->startSection('content'); ?>
    <section class="sub-page">
        <header>
            <div class="container">
                <?php if($marks->isNotEmpty()): ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>القسم: <?php echo e($marks->first()->departments_name); ?></p>
                            <p>المسار: <?php echo e($marks->first()->sections_name); ?></p>
                        </div>
                        <div class="col-sm-6">
                            <p>الحلقة: <?php echo e($marks->first()->registration->classroom->name); ?></p>
                            <p>المعلمة: <?php echo e($marks->first()->users_name); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <div class="container">
            <div class="details">
                <a href="<?php echo e(route('registration.marks', ['id' => $registration_id, 'level' => $level])); ?>&print=1" target="_blank" class="btn btn-success no-print pull-left"><i class="fa fa-print"></i></a>

                <h2>الدورات والحلقات</h2>


                <div class="table-responsive">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>الشهر</th>
                                <th>الفصل الدراسي</th>
                                <th>المستوى</th>
                                <th>المجموع</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($months[$mark->month]); ?></td>
                                    <td><?php echo e($semesters[$mark->semester]); ?></td>
                                    <td><?php echo e($mark->leveln->name); ?></td>
                                    <!--<td><?php echo e($mark->mark1); ?></td>-->
                                    <!--<td><?php echo e($mark->mark2); ?></td>-->
                                    <!--<td><?php echo e($mark->mark3); ?></td>-->
                                    <td><?php echo e($mark->total); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <style>
        @media  print {
            @page  {
                size: portrait;
            }
        }
    </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>