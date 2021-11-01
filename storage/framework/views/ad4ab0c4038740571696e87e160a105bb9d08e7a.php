
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">المسجلات حسب المسارات</h3>
    </div>
    <div class="box-body">
        <table class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>اسم المسار</th>
                    <th>المسجلات</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>اسم المسار</th>
                    <th>المسجلات</th>
                </tr>
            </tfoot>
            
            <tbody>
                <?php $__currentLoopData = $registrationsBySection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->section->name); ?></td>
                        <td><?php echo e($item->count); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
