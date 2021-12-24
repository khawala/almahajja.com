<?php
  $title = isset($item) ? $item->name: "إنشاء قسم "
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
    <br/>
         <?php
          $sections=App\Section::all();
          foreach($sections as $section){ ?>
      <input type="checkbox" name="section_id[]" value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></input><br/>
<?php } ?>
    </div>
    <?php else: ?>
     <div class="form-group">
     <label>المسارات</label>
    <br/>
         <?php
          $sections=App\Section::all();
          foreach($sections as $section){  ?>
      <input type="checkbox" name="section_id[]" value="<?php echo e($section->id); ?>" <?php if($item->sections->contains($section->id)): ?> checked <?php endif; ?>><?php echo e($section->name); ?></input><br/>
<?php } ?>
    </div>
<?php endif; ?>
        <?php echo Form::mySelect('supervisor_id', 'المشرفة/المدربه  <span class=red>*</span>', App\User::supervisor()->pluck('name', 'id')->toArray(),null, ['required', 'class' => 'form-control select']); ?>

        

      </div>
    </div>

  </div>
  <div class="col-sm-6">
    <div class="box box-info">
      <div class="box-body">

        <?php echo Form::mySelect('registeration_status', 'حالة التسجيل', config('variables.registeration_status'),null, ['required', 'class' => 'form-control select']); ?>


          <?php echo Form::mySelect('register_type', 'نوع التسجيل', config('variables.register_type'),null, ['required', 'class' => 'form-control select']); ?>


  <?php echo Form::mySelect('payment_type', 'نوع الدفع', config('variables.payment_type'),null, ['required', 'class' => 'form-control select']); ?>


         
          
      </div>
    </div>
  </div>
</div>