<?php $__env->startSection('page-header'); ?>
الشهادات <small><?php echo e(trans('app.manage')); ?></small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="filter-area">
    <form action="" class="form-inline">
        <?php echo Form::mySelect('section_id', '', [''=>'المسار'] + App\Section::ListGroup(), request('section_id'), ['required', 'class' => 'chosen-rtl form-control']); ?>


        <?php echo Form::mySelect('classroom_id', '', [''=>'الحلقة'] + App\Classroom::myList(), request('classroom_id')); ?>


        <button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button>
        <a href="<?php echo e(route(ADMIN . '.certifications.index')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-close"></i></a>
        <a href="<?php echo e(route(ADMIN . '.certifications.index',['export' => true])); ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>

    </form>
</section>
<br>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

                <table class="table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>رقم التسجيل</th>
                            <th>الطالبة</th>
                            <th>المسار</th>
                            <th>تاريخ التسجيل</th>
                            <th>الحلقة</th>
                            <th>الشهادة</th>
                            <!--<th>كشف الدرجات</th>-->
                        </tr>
                    </thead>

                    <tfoot>
                        <tr>
                            <th>رقم التسجيل</th>
                            <th>الطالبة</th>
                            <th>المسار</th>
                            <th>تاريخ التسجيل</th>
                            <th>الحلقة</th>
                            <th>الشهادة</th>
                            <!--<th>كشف الدرجات</th>-->
                        </tr>
                    </tfoot>

                    <tbody>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->student->name); ?></td>
                            <td><?php echo e($item->section->name); ?></td>
                            <td><?php echo $item->created_at_formated; ?></td>
                            <td><?php echo e($item->classroom->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('certifications.print', $item)); ?>" target="_blank" class="btn btn-default" title="الشهادة"><i class="fa fa-print"></i></a>
                            </td>
                            {--<td>
                                <?php echo Form::open([
                                'class' => 'form-inline',
                                'method' => 'GET',
                                'target' => '_blank',
                                'route' => ADMIN . '.registrations.marks',
                                ]); ?>

                                <?php echo Form::hidden('id', $item->id); ?>

                                <?php echo Form::mySelect('level', '',App\Level::pluck('name', 'id')->toArray(), null, ['required']); ?>

                                <button class="btn btn-success btn-xs" title="الكشف"><i class="fa fa-print"></i></button>
                                <?php echo Form::close(); ?>

                            </td>--}
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>

        </div>
        <?php echo $items->links(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>