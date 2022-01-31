        <div class="col-sm-6">
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
                <?php $__currentLoopData = $registrationsByDepartment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->department->name); ?></td>
                        <td><?php echo e($item->count); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
</div>
        <div class="col-sm-6">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">احصائيات عامة</h3>
    </div>
    <div class="box-body">
        <table class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>الاسم </th>
                    <th>العدد</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>الاسم </th>
                    <th>العدد</th>
                </tr>
            </tfoot>
            
            <tbody>
             
                    <tr>
                        <td>عدد الاقسام</td>
                        <td><?php echo e(\App\Department::count()); ?></td>
                    </tr>
                     <tr>
                        <td>عدد الحلقات</td>
                        <td><?php echo e(\App\Classroom::count()); ?></td>
                    </tr>
               <tr>
                        <td>عدد المسارات</td>
                        <td><?php echo e(\App\Section::count()); ?></td>
                    </tr>
                     <tr>
                        <td>عدد المستويات</td>
                        <td><?php echo e(\App\Level::count()); ?></td>
                    </tr>
                     <tr>
                        <td>عدد الإداريات</td>
                        <td><?php echo e(\App\User::where('role','20')->count()); ?></td>
                    </tr>
                     <tr>
                        <td>عدد المشرفات</td>
                        <td><?php echo e(\App\User::where('role','10')->count()); ?></td>
                    </tr>
                     <tr>
                        <td>عدد المعلمات</td>
                        <td><?php echo e(\App\User::where('role','5')->count()); ?></td>
                    </tr>
                     <tr>
                        <td>عدد الطالباات</td>
                        <td><?php echo e(\App\User::where('role','0')->count()); ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
</div>





