<?php
  $title = isset($item) ? $item->name: "إنشاء النشاطات"
?>

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">

        <?php echo Form::myInput('text', 'name', 'اسم النشاط <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myTextArea('description', 'وصف مختصر'); ?>


        <?php echo Form::mySelect('status', 'الحالة', config('variables.status')); ?>


      </div>
    </div>

  </div>
</div>