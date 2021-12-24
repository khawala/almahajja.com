<?php $__env->startSection('page-header'); ?>
    التسجيل <small><?php echo e(trans('app.manage')); ?></small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="filter-area">
        <form action="" class="form-inline">
            <ul class="list-inline">
                <li><a class="btn btn-info" href="<?php echo e(route(ADMIN . '.registrations.create')); ?>"><?php echo e(trans('app.add_button')); ?></a></li>
                <li style="float: left">
                  <button class="btn btn-success btn-xs"><i class="fa fa-search"></i></button>
                  <a href="<?php echo e(route(ADMIN . '.registrations.index')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-close"></i></a>
                  <a href="<?php echo e(route(ADMIN . '.registrations.index',['export' => true])); ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
                </li>
            </ul>
          
            <?php echo Form::mySelect('section_id', '', [''=>'المسار'] + App\Section::ListGroup(), request('section_id'), ['class' => 'form-control select']); ?>


            <?php echo Form::mySelect('telecom_id', '', [''=>'شريحة الجوال'] + App\Telecom::pluck('name', 'id')->toArray(), request('telecom_id'), ['class' => 'form-control select']); ?>


            <?php echo Form::mySelect('period_id', '', [''=>'وقت التسميع'] + App\Period::pluck('name', 'id')->toArray(), request('period_id'), ['class' => 'form-control select']); ?>

            
            <?php echo Form::mySelect('status', '', ['' => "إختر الحالة"] + config('variables.registrations_status'), request('status')); ?>

            
        </form>
    </section>
    <br>

	<div class="row">
	  <div class="col-xs-12">
	    <div class="box box-info">
	      <!-- /.box-header -->
	      <div class="box-body table-responsive no-padding">
            <?php echo $__env->make('admin.registrations._table', ['items' => $items], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	      </div>

	    </div>
        <?php echo $items->links(); ?>

	  </div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>