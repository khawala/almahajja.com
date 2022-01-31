<?php $__env->startSection('page-header'); ?>
  طالبة <small>تعديل</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab-01" data-toggle="tab">تفاصيل الطالبة</a></li>
    <li role="presentation"><a href="#tab-02" data-toggle="tab">دورات الطالبة</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
      <?php echo Form::model($item, [
              'action' => ['StudentController@update', $item->id],
              'method' => 'put', 
              'files' => true
          ]); ?>

<?php
$title = isset($item) ? $item->name: "اضافة طالب جديد";
$disabled = isset($item) ? 'readonly' : '';
?>

<div class="row">
  <div class="col-sm-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
                                      <p>الاسم الرباعي </p>
<?php echo e($item->name); ?>

<hr>
            <p>البريد الإلكتروني </p>
<?php echo e($item->email); ?>

<hr>
            <p>رقم الهوية</p>
<?php echo e($item->national_id); ?>

<hr>
            <p>جوال  التواصل </p>
<?php echo e($item->mobile1); ?>

<hr>
                        <p> الجنس </p>
<?php echo e($item->gender); ?>

<hr>
                  <p> الجنسية </p>
<?php echo e($item->nationality_id); ?>

<hr>

              <?php echo Form::mySelect('status', 'الحالة', config('variables.status'), null, [auth()->user()->isNotAdmin ? 'disabled' : '']); ?>


            <p>جوال  الطوارئ </p>
<?php echo e($item->mobile2); ?>

<hr>
            <p>هاتف ثابت   </p>
<?php echo e($item->phone); ?>

<hr>
            <p>  ملاحظات </p>
<?php echo e($item->note); ?>

<hr>

 
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-4">
   

      <?php if(isset($item) && $item->photo): ?>
      <div class="text-center">
        <img src="<?php echo e($item->photo); ?>" alt="">
        <hr>
      </div>
      <?php endif; ?>
    </div>
  
</div>

      <div class="box-footer">
        <button type="submit" class="btn btn-info"><?php echo e(trans('app.edit_button')); ?></button>
      </div>

      <?php echo Form::close(); ?>

    </div>
    <div role="tabpanel" class="tab-pane fade" id="tab-02">
        <div class="box box-info">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <?php echo $__env->make('admin.registrations._table', ['items' => $item->registrations], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
  </div>

</div>
    

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>