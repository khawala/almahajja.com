<?php
  $title = isset($item) ? $item->name: "إنشاء الوظائف"
?>

<div class="row">
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">

        <?php echo Form::myInput('text', 'name', 'المسمى الوظيفي <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myTextArea('description', 'الوصف الوظيفي <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('text', 'skills', 'المؤهلات المطلوبة <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('text', 'time', 'وقت الوظيفة <span class=red>*</span>', ['required']); ?>

        
      </div>
    </div>

  </div>
  <div class="col-sm-6">
      <div class="box box-info">
        <div class="box-body">
            <?php echo Form::myInput('text', 'salary', 'الراتب <span class=red>*</span>', ['required']); ?>

        
            <?php echo Form::mySelect('gender', 'الجنس', config('variables.gender')); ?>

            
            <?php echo Form::myInput('text', 'vacancies', 'الوظائف الشاغرة <span class=red>*</span>', ['required']); ?>

    
            <?php echo Form::mySelect('status', 'حالة الوظيفة', config('variables.status')); ?>

    
            <?php echo Form::myTextArea('note', 'الملاحظات'); ?>

        </div>
      </div>
  </div>
</div>