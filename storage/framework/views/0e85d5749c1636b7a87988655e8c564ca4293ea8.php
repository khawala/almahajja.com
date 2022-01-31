<?php
  $title = isset($item) ? $item->name: "إنشاء الاعلانات"
?>

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">

        <?php echo Form::myInput('text', 'name', 'عنوان الاعلان  <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myTextArea('short_description', 'مختصر الاعلان  <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myTextArea('description', 'نص الاعلان  <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('url', 'url', 'رابط خارجي'); ?>



      </div>
    </div>

  </div>

  <div class="col-sm-4">
    <div class="box box-warning">
      <div class="box-header with-border">
        <?php echo Form::mySelect('status', 'حالة الاعلان', config('variables.advertisements_status')); ?>


        <?php echo Form::myTextArea('note', 'الملاحظات'); ?>

      </div>
    </div>

    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-camera"></i> صورة الاعلان</h3>
      </div>
      <div class="box-body">
        <?php echo Form::myFile('photo', 'صورة الاعلان'); ?>


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