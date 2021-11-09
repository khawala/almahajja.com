<?php
$title = isset($item) ? $item->name: "اضافة طالب جديد";
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

            <?php echo Form::myInput('text', 'mobile1', 'جوال التواصل <span class=red>*</span>'); ?>

            <?php echo Form::mySelect('nationality_id', 'الجنسية <span class=red>*</span>', App\Nationality::active()->pluck('name', 'id')->toArray()); ?>

            <?php echo Form::mySelect('gender', 'الجنس <span class=red>*</span>', config('variables.sexes')); ?>

            <?php echo Form::mySelect('status', 'الحالة <span class=red>*</span>', config('variables.status')); ?>

          </div>
          <div class="col-sm-6">
            <?php echo Form::myInput('text', 'national_id', 'رقم الهوية'); ?>

            <?php echo Form::myInput('email', 'email', 'البريد الالكتروني'); ?>

            <?php echo Form::myInput('text', 'mobile2', 'جوال الطوارئ'); ?>

            <?php echo Form::myInput('text', 'phone', 'هاتف ثابت'); ?>

            <?php echo Form::myTextArea('note', 'الملاحظات'); ?>

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
        <?php echo Form::myInput('text', 'username', 'إسم المستخدم <span class=red>*</span>', ['required', $disabled]); ?>

        <?php echo Form::myInput('password', 'password', 'كلمة السر'); ?>

        <?php echo Form::myInput('password', 'password_confirmation', 'تأكيد كلمة السر'); ?>

      </div>
    </div>
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-camera"></i> صورة الطالب </h3>
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
    </div>
  </div>
</div>