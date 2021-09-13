<?php $__env->startSection('page-header'); ?>
    الدرجات الشهرية <small>إدارة</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-info">
        <div class="box-body table-responsive no-padding">
            <table class="table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>إسم الحلقة</th>
                        <th>المسار</th>
                        <th>المعلمة</th>
                        <th>الخيارات</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>إسم الحلقة</th>
                        <th>المسار</th>
                        <th>المعلمة</th>
                        <th>الخيارات</th>
                    </tr>
                </tfoot>
                
                <tbody>
                    <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($classroom->classroom_name); ?></td>
                            <td><?php echo e($classroom->section_name); ?></td>
                            <td><?php echo e($classroom->user_name); ?></td>
                            <td>
                                <form action="<?php echo e(route(ADMIN . '.marks.create')); ?>" target="_blank">
                                    <input type="hidden" name="classroom" value="<?php echo e($classroom->classroom_id); ?>">
                                    <?php echo Form::mySelect('month', '', config('variables.months')); ?>

                                    <?php echo Form::mySelect('semester', '', config('variables.semesters')); ?>

                                    <?php echo Form::mySelect('level', '', config('variables.sections_level'), null, ['required']); ?>

                                    <button class="btn btn-danger">رصد الدرجات</button>
                                </form>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php echo $classrooms->links(); ?>

        </div>
        <!-- /.box-body -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>