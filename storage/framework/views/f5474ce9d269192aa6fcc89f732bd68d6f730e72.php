<?php
  $title = isset($item) ? $item->name: "إنشاء الحلقات والقاعات"
?>

<div class="row">
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">

        <?php echo Form::myInput('text', 'name', 'إسم الحلقة <span class=red>*</span>', ['required']); ?>


        <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>',['' => ''] +  App\Section::pluck('name', 'id')->toArray()); ?>


        <?php echo Form::mySelect('teacher_id', 'المعلمة <span class=red>*</span>',['' => ''] +  App\User::where('role', 5)->pluck('name', 'id')->toArray()); ?>

          
        <?php echo Form::myInput('text', 'code', 'الرمز'); ?>


      </div>
    </div>

  </div>
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-body">

        <?php echo Form::mySelect('code', 'رصد الدرجات', config('variables.classrooms_code')); ?>


          <?php echo Form::myTextArea('description', 'معلومات اضافية'); ?>


          <?php echo Form::myTextArea('note', 'ملاحظات'); ?>


          <?php echo Form::myFile('pdf_file', 'ملف المسار'); ?>


          <?php if(isset($item) && $item->pdf_file): ?>
            <a href="<?php echo e($item->pdf_file); ?>" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>
          <?php endif; ?>
          
      </div>
    </div>
  </div>
</div>