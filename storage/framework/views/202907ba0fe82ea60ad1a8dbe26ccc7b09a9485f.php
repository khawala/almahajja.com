<?php
  $title = isset($item) ? $item->name: "إنشاء طلبات التوظيف"
?>

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">

        <?php echo Form::mySelect('job_id', 'الوظيفة  <span class=red>*</span>', ['' => 'الوظيفة'] + App\Job::pluck('name', 'id')->toArray(), null, ['required']); ?>


        <?php echo Form::myInput('text', 'name', 'الاسم الرباعي <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('text', 'mobile', 'الجوال <span class=red>*</span>', ['required']); ?>


        <?php echo Form::mySelect('nationality_id', 'الجنسية <span class=red>*</span>', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']); ?>


      </div>
    </div>

  </div>
  <div class="col-sm-4">
    <div class="box box-info">
      <div class="box-body">
          <?php echo Form::myTextArea('cv_description', 'السيرة الذاتية', ['rows' => 13]); ?>


          <?php if(isset($item)): ?>
              <?php echo Form::myInput('text', 'created_at', 'تاريخ الطلب', ['disabled'], $item->createdAtFormated); ?>

          <?php endif; ?>

          <?php echo Form::mySelect('status', ' حالة الطلب', config('variables.jobs_status')); ?>

      </div>
    </div>
  </div>
      
</div>