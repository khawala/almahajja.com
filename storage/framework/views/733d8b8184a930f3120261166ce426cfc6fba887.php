<?php
$title = isset($item) ? $item->name : 'إنشاء قسم ';
?>

<div class="row">
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e($title); ?></h3>
            </div>
            <div class="box-body">

                <?php echo Form::myInput('text', 'name', 'إسم القسم <span class=red>*</span>', ['required']); ?>

                <?php if(!isset($item)): ?>
                    <div class="form-group">
                        <label>المسارات</label>
                        <br />
                        <?php
          $sections=App\Section::all();
          foreach($sections as $section){ ?>
                        <input type="checkbox" name="section_id[]"
                            value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></input><br />
                        <?php } ?>
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label>المسارات</label>
                        <br />
                        <?php
          $sections=App\Section::all();
          foreach($sections as $section){  ?>
                        <input type="checkbox" name="section_id[]" value="<?php echo e($section->id); ?>"
                            <?php if($item->sections->contains($section->id)): ?> checked <?php endif; ?>><?php echo e($section->name); ?></input><br />
                        <?php } ?>
                    </div>
                <?php endif; ?>
                <?php echo Form::mySelect('supervisor_id','المشرفة/المدربه  <span class=red>*</span>',App\User::supervisor()->pluck('name', 'id')->toArray(),null,['required', 'class' => 'form-control select']); ?>


                <?php echo Form::myTextArea('description', 'نبذة عن القسم'); ?>

        
                
                 
                 <?php if(isset($item) ): ?>
                 <?php echo e(Form::label('start_date','تاريخ البدء',['class' => 'control-label'])); ?>

                 <?php echo Form::date('start_date',$item->start_date,['required', 'class' => 'form-control']); ?> 
                
                 <?php echo e(Form::label('end_date','تاريخ الإنتهاء',['class' => 'control-label'])); ?>

                 <?php echo Form::date('end_date',$item->end_date,['required', 'class' => 'form-control']); ?>  
                 <?php else: ?>
                 <?php echo e(Form::label('start_date','تاريخ البدء',['class' => 'control-label'])); ?>

                 <?php echo Form::date('start_date',date('Y-m-d'),['required', 'class' => 'form-control']); ?> 
                  
                 <?php echo e(Form::label('end_date','تاريخ الإنتهاء',['class' => 'control-label'])); ?>

                 <?php echo Form::date('end_date',date('Y-m-d'),['required', 'class' => 'form-control']); ?>  
<?php endif; ?>
                 <?php echo Form::myInput('number', 'price', 'سعر الإشتراك <span class=red>*</span>', ['required']); ?>


            </div>
        </div>

    </div>
    <div class="col-sm-6">
        <div class="box box-info">
            <div class="box-body">

                <?php echo Form::mySelect('registeration_status', 'حالة التسجيل', config('variables.registeration_status'), null, ['required', 'class' => 'form-control select']); ?>


                <?php echo Form::mySelect('register_type', 'نوع التسجيل', config('variables.register_type'), null, ['required', 'class' => 'form-control select']); ?>


                <?php echo Form::mySelect('payment_type', 'نوع الدفع', config('variables.payment_type'), null, ['required', 'class' => 'form-control select']); ?>

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-camera"></i> صورة القسم </h3>
                    </div>

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
    </div>

</div>
