<?php
  $title = isset($item) ? $item->name: "اضافة مستخدم جديد";
  $disabled = isset($item) ? 'readonly' : '';
?>

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-6">
            <?php echo Form::myInput('text', 'name', 'الاسم الرباعي <span class=red>*</span>', ['required']); ?>


            <?php echo Form::myInput('email', 'email', 'البريد الالكتروني'); ?>

    
            <?php echo Form::myInput('text', 'national_id', 'رقم الهوية '); ?>

    
            <!--<?php echo Form::mySelect('nationality_id', 'الجنسية <span >*</span>', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']); ?>-->
            
            <?php echo Form::mySelect('gender', 'الجنس <span class=red>*</span>', config('variables.sexes')); ?>

    
             <?php echo Form::myInput('text', 'address', ' مكان الإقامة '); ?>

          </div>
          <div class="col-sm-6">
               <?php echo Form::myInput('text', 'mobile1', 'جوال التواصل <span class=red>*</span>', ['required']); ?>

              <?php echo Form::myInput('text', 'bank_account', 'رقم الحساب البنكي'); ?>


            <?php echo Form::mySelect('telecom_id', 'شريحة الجوال', ['' => ''] + App\Telecom::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-control']); ?>

      
              <?php echo Form::mySelect('status', 'الحالة', config('variables.status'), null, [auth()->user()->isNotAdmin ? 'disabled' : '']); ?>


          </div>
        </div>
        
        
        
      </div>
    </div>

  </div>

  <div class="col-sm-4">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user"></i> معلومات تسجيل الدخول </h3>
      </div>
      <div class="box-body">
        <?php echo Form::myInput('text', 'username', 'اسم المستخدم <span class=red>*</span>', ['required', $disabled]); ?>


        <?php echo Form::myInput('password', 'password', 'كلمة السر'); ?>


        <?php echo Form::myInput('password', 'password_confirmation', 'تأكيد كلمة السر'); ?>


        
      </div>
    </div>

    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-camera"></i> صورة المستخدم </h3>
      </div>
      <div class="box-body">
        <?php echo Form::myFile('photo', 'الصورة الشخصية'); ?>


        <p><small>جميع الصور مع التمديد   
            <span class="btn btn-default btn-xs">JPG</span>
            <span class="btn btn-default btn-xs">JPEG</span>
            <span class="btn btn-default btn-xs">PNG</span></small></p>
      </div>

      <?php if(isset($item) && $item->photo): ?>
        <div class="text-center">
          <img src="<?php echo e($item->photo); ?>" alt="">
          <hr>
        </div>
      <?php endif; ?>


<div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-camera"></i> السيرة الذاتية </h3>
      </div>
      <div class="box-body">
        <?php echo Form::myFile('cv', ' السيرة الذاتية'); ?>

      </div>

      <?php if(isset($item) && $item->cv): ?>
        <div class="text-center">
       <a href="<?php echo e($item->cv); ?>"> السيرة الذاتية </a>
          <hr>
        </div>
      <?php endif; ?>
    </div>
  

</div>