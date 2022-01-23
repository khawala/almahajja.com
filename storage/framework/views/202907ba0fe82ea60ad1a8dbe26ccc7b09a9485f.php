<?php
  $title = isset($item) ? $item->name: "إنشاء طلبات التوظيف"
?>

<div class="row">
  <div class="col-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">


        <?php echo Form::mySelect('job_id', 'الوظيفة  <span class=red>*</span>', ['' => 'الوظيفة'] + App\Job::pluck('name', 'id')->toArray(), null, ['required','class' =>'form-control select']); ?>

        
        <?php echo Form::mySelect('department_id', 'القسم  ', ['' => 'القسم'] + App\Department::where('need_teacher',1)->pluck('name', 'id')->toArray(),null, ['class' =>'form-control select']); ?>

     <?php if(isset($item)): ?>
 <a class="nav-link " href="<?php echo e(route(ADMIN . '.teachers.edit', $item->user->id)); ?>">  بيانات مقدم الطلب:  <?php echo e($item->user->name); ?>  </a>
      <?php endif; ?>
        <!--<?php echo Form::myInput('text', 'name', 'الاسم الرباعي <span class=red>*</span>', ['required']); ?>-->

        <!--<?php echo Form::myInput('text', 'mobile', 'الجوال <span class=red>*</span>', ['required']); ?>-->

        <!--<?php echo Form::mySelect('nationality_id', 'الجنسية <span class=red>*</span>', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']); ?>-->
          <?php echo Form::myTextArea('note', 'الملاحظات', ['rows' => 13]); ?>


          <?php if(isset($item)): ?>
              <?php echo Form::myInput('text', 'created_at', 'تاريخ الطلب', ['disabled'], $item->createdAtFormated); ?>

          <?php endif; ?>

          <?php echo Form::mySelect('status', ' حالة الطلب', config('variables.jobs_status')); ?>

      </div>
    </div>
  </div>
      
</div>