
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
            <th>المستوى</th>
            <th>الحلقة</th>
            <th>الحالة</th>
            <th class="actions">اجراءات</th>
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
            <th>المستوى</th>
            <th>الحلقة</th>
            <th>الحالة</th>
            <th class="actions">اجراءات</th>
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
                <td width="170">
                    <?php echo Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]); ?>

                        <?php echo Form::mySelect('level', '', config('variables.sections_level'), null, ['class' => 'form-control onchange', 'width' => 300]); ?>

                    <?php echo Form::close(); ?>

                </td>
                <td width="130">
                    <?php echo Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]); ?>

                        <?php echo Form::mySelect('classroom_id', '', ['' => ''] + App\Classroom::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-control onchange', 'width' => 200]); ?>


                    <?php echo Form::close(); ?>

                </td>
                <td width="150">
                    <?php echo Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]); ?>

                        <?php echo Form::mySelect('status', '', config('variables.registrations_status'), null, ['class' => 'form-control onchange', 'width' => 200]); ?>

                    <?php echo Form::close(); ?>

                </td>
                <td class="actions">
                    <ul class="list-inline">
                        <li><a href="<?php echo e(route(ADMIN . '.registrations.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                        <li>
                            <?php echo Form::open([
                                'class'=>'delete',
                                'url'  => route(ADMIN . '.registrations.destroy', $item->id), 
                                'method' => 'DELETE',
                                ]); ?>


                                <button class="btn btn-danger btn-xs" title="<?php echo e(trans('app.delete_title')); ?>"><i class="fa fa-trash"></i></button>
                                
                            <?php echo Form::close(); ?>

                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>