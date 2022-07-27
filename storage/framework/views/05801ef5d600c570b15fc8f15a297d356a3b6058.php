
<table class="table" id="dtDynamicVerticalScrollExample" cellspacing="0" width="auto">
    <thead>
        <tr>
            <th>رقم </th>
            <th>الطالبة</th>
            <th>القسم</th>

            <th>المسار</th>
            <th> الشريحة</th>
            <th>الوقت </th>
            <th>تاريخ التسجيل</th>
                     <th>طريقة الدفع</th>
           
            <th>المدفوع</th>
            <th>المستوى</th>
            <th>الحلقة</th>
         
            <th>الحالة</th>
            <th class="actions">اجراءات</th>
        </tr>
    </thead>
    
    <tfoot>
        <tr>
            <th>رقم </th>
            <th>الطالبة</th>
            <th>القسم</th>
            <th>المسار</th>
                <th> الشريحة</th>
            <th>الوقت </th>
            <th>تاريخ التسجيل</th>
                     <th>طريقة الدفع</th>
           
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
                
                <td><?php echo e($item->department->name); ?></td>
                <td><?php echo e($item->section->name); ?></td>
                <td><?php echo e($item->telecom->name); ?></td>
                <td><?php echo e($item->period->name); ?></td>
                <td><?php echo e($item->created_at); ?></td>
                     <td><?php echo e($item->PaymentTypeName); ?></td>
                <td><?php echo e($item->paid); ?></td>
                <td style="width:250 px;">
                    <?php echo Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]); ?>

                        <?php echo Form::mySelect('level_id', '', ['' => ''] + $item->section->levels->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select onchange', 'width' =>'FIT-CONTENT']); ?>

                    <?php echo Form::close(); ?>

                </td>
                <td width="130">
                    <?php echo Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]); ?>

                        <?php echo Form::mySelect('classroom_id', '', ['' => ''] + App\Classroom::where([['department_id','=',$item->department->id],['section_id','=',$item->section->id]])->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select onchange', 'width' => 200]); ?>


                    <?php echo Form::close(); ?>

                </td>
                <td width="150">
                    <?php echo Form::model($item, [
                        'url'  => route(ADMIN . '.registrations.update', $item->id), 
                        'method' => 'PUT',
                        ]); ?>

                        <?php echo Form::mySelect('status', '', config('variables.registrations_status'), null, ['class' => 'form-control select onchange', 'width' => 200]); ?>

                    <?php echo Form::close(); ?>

                </td>
                  
                <td class="actions">
                    <ul class="list-inline">
                        <li><a href="<?php echo e(route(ADMIN . '.registrations.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                       <?php if($item->status!=0 && $item->status!=2 && $item->department->price!=null && $item->department->price!=0): ?>
        
                         <li><a href="<?php echo e(route(ADMIN . '.registrations.invoivce', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-info btn-xs">الفاتورة</a></li>
                      <?php endif; ?>
                        <li>
                            <?php echo Form::open([
                                'class'=>'delete',
                                'url'  => route(ADMIN . '.registrations.destroy', $item->id), 
                                'method' => 'DELETE',
                                ]); ?>


                                <button class="btn btn-danger btn-xs" title="<?php echo e(trans('app.delete_title')); ?>">حذف</button>
                                
                            <?php echo Form::close(); ?>

                        </li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>