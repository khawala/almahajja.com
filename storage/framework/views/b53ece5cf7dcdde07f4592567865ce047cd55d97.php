<div class="row">
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">
          <?php if(isset($item)): ?>
            رقم التسجيل:	<?php echo e($item->id); ?>

          <?php else: ?>
            إنشاء تسجيل الطالبة
          <?php endif; ?>
        </h3>
      </div>
      <div class="box-body">

        <?php echo Form::mySelect('user_id', 'الطالبة <span class=red>*</span>', ['' => ''] + App\User::students()->active()->pluck('name', 'id')->toArray(), null, ['required', 'class' => 'chosen-rtl form-control']); ?>


        <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::ListGroup(), null, ['required', 'class' => 'chosen-rtl form-control']); ?>


        <?php echo Form::mySelect('telecom_id', 'شريحة الجوال', ['' => ''] + App\Telecom::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-control']); ?>


        <?php echo Form::mySelect('period_id', 'وقت التسميع', ['' => ''] + App\Period::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-control']); ?>


        <?php echo Form::mySelect('activity_id', 'الانشطة', ['' => ''] + App\Activity::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-control']); ?>

        
      </div>
    </div>

  </div>
  <div class="col-sm-6">
      <div class="box box-danger">
          <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> للإستخدام الإداري</h3>
            </div>

        <div class="box-body">

            <?php echo Form::mySelect('level', 'المستوى', config('variables.sections_level')); ?>

    
            <?php echo Form::mySelect('classroom_id', 'الحلقة', ['' => 'إختر حلقة ...'] + App\Classroom::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-control']); ?>


            <?php echo Form::mySelect('status', 'حالة التسجيل <span class=red>*</span>', config('variables.registrations_status')); ?>

            
            <?php echo Form::myInput('number', 'paid', 'المدفوع'); ?>

    
            <?php echo Form::myTextArea('note', 'الملاحظات'); ?>


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