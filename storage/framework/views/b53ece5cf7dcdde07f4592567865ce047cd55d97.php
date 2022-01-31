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
  
          <?php echo Form::mySelect('user_id', 'الطالبة <span class=red>*</span>', ['' => ''] + App\User::students()->active()->pluck('name', 'id')->toArray(), null, ['required', 'class' => 'form-control select']); ?>

  
  
          <?php echo Form::mySelect('telecom_id', 'شريحة الجوال', ['' => ''] + App\Telecom::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

  
          <?php echo Form::mySelect('period_id', 'وقت التسميع', ['' => ''] + App\Period::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

  
          <?php echo Form::mySelect('payment_type', 'طريقة الدفع',  config('variables.payment_type2'), null, ['class' => 'form-control select']); ?>

        
          <?php echo Form::mySelect('activity_id', 'الانشطة', ['' => ''] + App\Activity::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

         <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-camera"></i> صورة الإيصال </h3>
                    </div>

                    <?php echo Form::myFile('receipt_image', 'الصورة'); ?>


                    <p><small>جميع الصور مع التمديد
                            <span class="btn btn-default btn-xs">JPG</span>
                            <span class="btn btn-default btn-xs">JPEG</span>
                            <span class="btn btn-default btn-xs">PNG</span></small></p>
                </div>

                <?php if(isset($item) && $item->receipt_image): ?>
                    <div class="text-center">
                        <img src="<?php echo e($item->receipt_image); ?>" alt="">
                        <hr>
                    </div>
                <?php endif; ?> 
        </div>
      </div>
  
    </div>
    <div class="col-sm-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-user"></i> للإستخدام الإداري</h3>
              </div>
  
          <div class="box-body">
            <?php if(auth()->user()->isSupervisor): ?> 
            <?php echo Form::mySelect('department_id', 'القسم <span class=red>*</span>', ['' => ''] + App\Department::where('supervisor_id',auth()->user()->id)->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select', 'id' => 'department']); ?>

                        <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::whereHas('departments', function ($q) {
                         $q->where('supervisor_id', auth()->id());
                     })->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

              <?php echo Form::mySelect('classroom_id', 'الحلقة', ['' => 'إختر حلقة ...'] + App\Classroom::whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            })->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

                        
                      <?php else: ?>   
              <?php echo Form::mySelect('department_id', 'القسم', ['' => 'إختر القسم ...'] + App\Department::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

              <?php echo Form::mySelect('classroom_id', 'الحلقة', ['' => 'إختر حلقة ...'] + App\Classroom::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

              <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::pluck('name', 'id')->toArray(), null, ['required', 'class' => 'form-control select']); ?>

             <?php endif; ?>
              <?php echo Form::mySelect('level_id', 'المستوى', ['' => 'إختر المستوى ...'] + App\Level::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

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