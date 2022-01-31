
<div class="box box-info">
    <div class="box-body table-responsive no-padding">
    
        <table class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>رقم التسجيل</th>
                    <th>الطالبة</th>
                    <th>المسار</th>
                    <th>شريحة الجوال</th>
                    <th>وقت التسميع</th>
                    <th>تاريخ التسجيل</th>
                    <th>المدفوع</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>رقم التسجيل</th>
                    <th>الطالبة</th>
                    <th>المسار</th>
                    <th>شريحة الجوال</th>
                    <th>وقت التسميع</th>
                    <th>تاريخ التسجيل</th>
                    <th>المدفوع</th>
                </tr>
            </tfoot>
            
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route(ADMIN . '.registrations.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
                        <td><a href="<?php echo e(route(ADMIN . '.registrations.edit', $item->id)); ?>"><?php echo e($item->student->name); ?></a></td>
                        <td><?php echo e($item->section->name); ?></td>
                        <td><?php echo e($item->telecom->name); ?></td>
                        <td><?php echo e($item->period->name); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td><?php echo e($item->paid); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>