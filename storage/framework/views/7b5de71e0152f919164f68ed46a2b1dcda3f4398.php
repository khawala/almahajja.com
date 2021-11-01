<?php
$title = isset($item) ? $item->name : 'إنشاء الحلقات والقاعات';
?>

<div class="row">
    <div class="col-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo e($title); ?></h3>
            </div>
            <div class="box-body">

                <?php echo Form::myInput('text', 'name', 'إسم الحلقة <span class=red>*</span>', ['required']); ?>


                <?php echo Form::mySelect('department_id', 'القسم <span class=red>*</span>', ['' => ''] + App\Department::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl   form-contro', 'id' => 'department']); ?>

                <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-contro']); ?>

                <?php echo Form::mySelect('level_id', 'المستوى <span class=red>*</span>', ['' => ''] + App\Level::pluck('name', 'id')->toArray(), null, ['class' => 'chosen-rtl form-contro']); ?>


                <?php echo Form::mySelect('teacher_id','المعلمة <span class=red>*</span>',['' => ''] +App\User::where('role', 5)->pluck('name', 'id')->toArray(),null,['class' => 'chosen-rtl form-contro']); ?>

                <?php echo Form::mySelect('code', 'رصد الدرجات', config('variables.classrooms_code'), null, ['class' => 'chosen-rtl form-contro']); ?>


               
                <?php echo Form::myTextArea('description', 'نبذة  <span class=red>*</span>', ['required']); ?>

                <?php echo Form::mySelect('type', 'نوع  <span class=red>*</span>', config('variables.divisions_type')); ?>


                

                

            </div>
        </div>

    </div>
    

</div>
