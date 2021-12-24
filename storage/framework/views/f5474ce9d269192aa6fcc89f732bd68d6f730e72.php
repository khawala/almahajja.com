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


        <?php echo Form::mySelect('department_id', 'القسم <span class=red>*</span>',['' => ''] +  App\Department::pluck('name', 'id')->toArray(),null, ['class' => 'form-control select','id' => 'department']); ?>

        <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>',['' => ''] +  App\Section::pluck('name', 'id')->toArray(),null, ['class' => 'form-control select']); ?>


        <?php echo Form::mySelect('teacher_id', 'المعلمة <span class=red>*</span>',['' => ''] +  App\User::where('role', 5)->pluck('name', 'id')->toArray(),null, ['class' => 'form-control select']); ?>

          
        <!--<?php echo Form::myInput('text', 'code', 'الرمز'); ?>-->
         <?php echo Form::myTextArea('description', 'نبذة  <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('text', 'batch', 'انعقاد الدورة <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('number', 'price', 'رسوم التسجيل <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('text', 'activity', 'الانشطة'); ?>


      </div>
    </div>

  </div>
  <div class="col-sm-6">
      <div class="box box-warning">
          <div class="box-body">
 <?php echo Form::mySelect('code', 'رصد الدرجات', config('variables.classrooms_code'),null, ['class' => 'form-control select']); ?>


          <?php echo Form::myTextArea('description', 'معلومات اضافية'); ?>


          <?php echo Form::myTextArea('note', 'ملاحظات'); ?>


          <?php echo Form::myFile('pdf_file', 'ملف '); ?>


          <?php if(isset($item) && $item->pdf_file): ?>
            <a href="<?php echo e($item->pdf_file); ?>" download class="btn btn-lg btn-success btn-block"><i class="fa fa-file-pdf-o"></i></a>
          <?php endif; ?>
            <?php echo Form::mySelect('gender', 'متاح لـ <span class=red>*</span>', config('variables.divisions_gender')); ?>

            
            <?php echo Form::mySelect('status', 'حالة التسجيل <span class=red>*</span>', config('variables.status')); ?>

            

            <?php if(isset($item)): ?>
                <?php if($item->created_by): ?>
                    <?php echo Form::myInput('text', 'created_by', 'تسجيل بواسطة', ['disabled'], $item->creator->name); ?>

                <?php endif; ?>
                  <?php if($item->created_at): ?>
                    <?php echo Form::myInput('text', 'created_at', 'تاريخ التسجيل', ['disabled'], $item->created_at); ?>

                <?php endif; ?>
                <?php if($item->updated_by): ?>
                <?php echo Form::myInput('text', 'updated_by', 'تحديث بواسطة', ['disabled'], $item->updator->name); ?>

                <?php endif; ?>
                <?php if($item->updated_at): ?>
                    <?php echo Form::myInput('text', 'updated_at', 'تاريخ التحديث', ['disabled'], $item->updated_at); ?>

                <?php endif; ?>  
            <?php endif; ?>
          </div>
      </div>
      <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-camera"></i> صورة الدورة </h3>
          </div>
          <div class="box-body">
            <?php echo Form::myFile('photo', 'الصورة'); ?>

    
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