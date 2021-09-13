<?php
  $title = isset($item) ? $item->name: "إنشاء الدورات"
?>

<div class="row">
  <div class="col-sm-8">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo e($title); ?></h3>
      </div>
      <div class="box-body">

        <?php echo Form::myInput('text', 'name', 'اسم الدورة <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myTextArea('description', 'نبذة عن الدورة <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('text', 'batch', 'انعقاد الدورة <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('number', 'price', 'رسوم التسجيل <span class=red>*</span>', ['required']); ?>


        <?php echo Form::myInput('text', 'activity', 'الانشطة'); ?>

        
      </div>
    </div>

  </div>

  <div class="col-sm-4">
      <div class="box box-warning">
          <div class="box-body">

            <?php echo Form::mySelect('gender', 'متاح لـ <span class=red>*</span>', config('variables.divisions_gender')); ?>

            
            <?php echo Form::mySelect('type', 'نوع الدورة <span class=red>*</span>', config('variables.divisions_type')); ?>

            
            <?php echo Form::mySelect('status', 'حالة التسجيل <span class=red>*</span>', config('variables.status')); ?>

            
            <?php echo Form::myTextArea('note', 'كمية الحفظ'); ?>


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