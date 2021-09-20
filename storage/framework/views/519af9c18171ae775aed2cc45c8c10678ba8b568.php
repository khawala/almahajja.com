<?php $__env->startSection('page-header'); ?>
    المستويات والمسارات <small><?php echo e(trans('app.manage')); ?></small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="filter-area">
        <ul class="list-inline">
            <li><a class="btn btn-info" href="<?php echo e(route(ADMIN . '.levelSections.create')); ?>"><?php echo e(trans('app.add_button')); ?></a></li>
            <li class="pull-left"> <a href="<?php echo e(route(ADMIN . '.levelSections.index',['export' => true])); ?>" class="btn btn-info"><i class="fa fa-print"></i></a></li>
        </ul>
    </section>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            
	      <table class="table data-tables" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th width="80">#</th>
                    <th>اسم المستوى</th>
                    <th>اسم المسار</th>
                    <th class="actions">اجراءات</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>اسم المستوى</th>
                    <th>اسم المسار</th>
                    <th class="actions">اجراءات</th>
                </tr>
            </tfoot>
            
            <tbody>
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route(ADMIN . '.levelSections.edit', $item->id)); ?>"><?php echo e($item->id); ?></a></td>
                        <td><a href="<?php echo e(route(ADMIN . '.levelSections.edit', $item->id)); ?>"><?php echo e($item->level->name); ?></a></td>
                        <td><a href="<?php echo e(route(ADMIN . '.levelSections.edit', $item->id)); ?>"><?php echo e($item->section->name); ?></a></td>
                        <td class="actions">
                            <ul class="list-inline">
                                <li><a href="<?php echo e(route(ADMIN . '.levelSections.edit', $item->id)); ?>" title="<?php echo e(trans('app.edit_title')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></li>
                                <li>
                                    <?php echo Form::open([
                                        'class'=>'delete',
                                        'url'  => route(ADMIN . '.levelSections.destroy', $item->id), 
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
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>