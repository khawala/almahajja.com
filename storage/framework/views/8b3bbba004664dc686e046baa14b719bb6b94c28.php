
<div class="row">
    <div class="col-xs-12">
    <div class="box box-info">
        <section class="filter-area with-padding">
            <?php echo $__env->make('admin.sections.create', ['division_id' => $item->id], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <a href="<?php echo e(route(ADMIN . '.sections.export', $item->id)); ?>" class="btn btn-info pull-left"><i class="fa fa-print"></i></a>

        </section>

        <div class="box-body table-responsive no-padding">
        
        <table class="table data-tables" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="80">#</th>
                    <th>اسم المسار</th>
                    <th>القسم</th>
                    <th>الفرع</th>
                    <th class="actions">اجراءات</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>اسم المسار</th>
                    <th>القسم</th>
                    <th>الفرع</th>
                    <th class="actions">اجراءات</th>
                </tr>
            </tfoot>
            
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route(ADMIN . '.sections.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
                        <td><a href="<?php echo e(route(ADMIN . '.sections.edit', $item->id)); ?>"><?php echo e($item->name); ?></a></td>
                        <td><?php echo e($item->category); ?></td>
                        <td><?php echo e($item->track); ?></td>
                        <td class="actions">
                            <ul class="list-inline">
                                <li><a href="<?php echo e(route(ADMIN . '.sections.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                <li>
                                    <?php echo Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.sections.destroy', $item->id), 
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
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
</div>
