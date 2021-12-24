<?php $__env->startSection('page-header'); ?>
  مستخدم <small>تعديل</small>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::model($item, [
            'action' => ['TeacherController@update', $item->id],
            'method' => 'put', 
            'files' => true
        ]); ?>


<?php
  $title = isset($item) ? $item->name: "اضافة مستخدم جديد";
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
          <div class="col-sm-6">
   
                        <p>الاسم الرباعي </p>
<?php echo e($item->name); ?>

<hr>
            <p>البريد الإلكتروني </p>
<?php echo e($item->email); ?>

<hr>
            <p>رقم الهوية</p>
<?php echo e($item->national_id); ?>

<hr>
                        <p> الجنس </p>
<?php echo e($item->gender); ?>

<hr>
            <p>مكان الإقامة  </p>
<?php echo e($item->address); ?>

<hr>
            <p>جوال  التواصل </p>
<?php echo e($item->mobile1); ?>

<hr>
                        <p> رقم الحساب البنكي </p>
<?php echo e($item->bank_account); ?>

<hr>
            <p>شريحة الجوال  </p>
<?php echo e($item->telecom_id); ?>

<hr>
            <p>رقم الهوية</p>
<?php echo e($item->national_id); ?>

<hr>
   
          <p>السيرة الذاتية </p>
          <?php echo e($item->cv_text); ?>

          <?php if(isset($item) && $item->cv): ?>
        <div class="text-center">
       <a href="<?php echo e($item->cv); ?>"> السيرة الذاتية </a>
          <hr>
        </div>
      <?php endif; ?>
<hr>

              <?php echo Form::mySelect('status', 'الحالة', config('variables.status'), null, [auth()->user()->isNotAdmin ? 'disabled' : '']); ?>


          </div>
        </div>
        
        
        
      </div>
    </div>
	  <button type="submit" class="btn btn-info"><?php echo e(trans('app.edit_button')); ?></button>
  </div>

<!--  <div class="col-sm-4">-->
<!--    <div class="box box-danger">-->
<!--      <div class="box-header with-border">-->
<!--        <h3 class="box-title"><i class="fa fa-user"></i> معلومات تسجيل الدخول </h3>-->
<!--      </div>-->
<!--      <div class="box-body">-->
<!--        <?php echo Form::myInput('text', 'username', 'اسم المستخدم <span class=red>*</span>', ['required', $disabled]); ?>-->

<!--        <?php echo Form::myInput('password', 'password', 'كلمة السر'); ?>-->

<!--        <?php echo Form::myInput('password', 'password_confirmation', 'تأكيد كلمة السر'); ?>-->

        
<!--      </div>-->
<!--    </div>-->

<!--    <div class="box box-warning">-->
<!--      <div class="box-header with-border">-->
<!--        <h3 class="box-title"><i class="fa fa-camera"></i> صورة المستخدم </h3>-->
<!--      </div>-->
<!--      <div class="box-body">-->
<!--        <?php echo Form::myFile('photo', 'الصورة الشخصية'); ?>-->

<!--        <p><small>جميع الصور مع التمديد   -->
<!--            <span class="btn btn-default btn-xs">JPG</span>-->
<!--            <span class="btn btn-default btn-xs">JPEG</span>-->
<!--            <span class="btn btn-default btn-xs">PNG</span></small></p>-->
<!--      </div>-->

<!--      <?php if(isset($item) && $item->photo): ?>-->
<!--        <div class="text-center">-->
<!--          <img src="<?php echo e($item->photo); ?>" alt="">-->
<!--          <hr>-->
<!--        </div>-->
<!--      <?php endif; ?>-->


<!--<div class="box-header with-border">-->
<!--        <h3 class="box-title"><i class="fa fa-camera"></i> السيرة الذاتية </h3>-->
<!--      </div>-->
<!--      <div class="box-body">-->
<!--        <?php echo Form::myFile('cv', ' السيرة الذاتية'); ?>-->
<!--      </div>-->

<!--      <?php if(isset($item) && $item->cv): ?>-->
<!--        <div class="text-center">-->
<!--       <a href="<?php echo e($item->cv); ?>"> السيرة الذاتية </a>-->
<!--          <hr>-->
<!--        </div>-->
<!--      <?php endif; ?>-->
<!--    </div>-->
  

<!--</div>-->

    
  <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>