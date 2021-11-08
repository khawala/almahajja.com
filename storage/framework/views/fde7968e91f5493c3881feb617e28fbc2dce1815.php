<?php $__env->startSection('page-header'); ?>
   القسم <small>تعديل</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab-01" data-toggle="tab">تفاصيل القسم</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
      <?php echo Form::model($item, [
        'action' => ['DepartmentController@update', $item->id],
        'method' => 'put', 
        'files' => true
        ]); ?>


      <?php echo $__env->make('admin.departments.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <div class="box-footer">
      <button type="submit" class="btn btn-info"><?php echo e(trans('app.edit_button')); ?></button>
      </div>

      <?php echo Form::close(); ?>

    </div>
   
  </div>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>