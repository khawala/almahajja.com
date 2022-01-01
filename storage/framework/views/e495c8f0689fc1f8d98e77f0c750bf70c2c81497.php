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

                <?php if(auth()->user()->isSupervisor): ?> 
   <?php echo Form::mySelect('department_id', 'القسم <span class=red>*</span>', ['' => ''] + App\Department::where('supervisor_id',auth()->user()->id)->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select', 'id' => 'department']); ?>

    
             <?php else: ?>   
                <?php echo Form::mySelect('department_id', 'القسم <span class=red>*</span>', ['' => ''] + App\Department::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select', 'id' => 'department']); ?>

              
                <?php endif; ?>
<?php if(isset($item)): ?>
   <?php if(auth()->user()->isSupervisor): ?> 
           <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::whereHas('departments', function ($q) {
                $q->where('supervisor_id', auth()->id());})->pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

               <?php else: ?>
                    <?php echo Form::mySelect('section_id', 'المسار <span class=red>*</span>', ['' => ''] + App\Section::pluck('name', 'id')->toArray(), null, ['class' => 'form-control select']); ?>

                                     <?php endif; ?>
                                      <?php echo Form::mySelect('level_id', 'المستوى', ['' => ''] + App\Level::pluck('name', 'id')->toArray(), null, ['class' =>'form-control select']); ?>

          
                                        <?php else: ?>
                                        
                                        <div class="form-group">
                                        
                                                <label for="">المسار</label>
                                                <select name="section_id" id="section_id" class="form-control select" required>
                                                 
                                                        <option value="">اختر القسم اولاً</option>
                                                 
                                                </select>
                                                <?php if($errors->has('section_id')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('section_id')); ?></small></p>
                                                <?php endif; ?>
                                        </div>
                                    
                                        <div class="form-group">
                                        
                                                <label for="">المستوى</label>
                                                <select name="level_id" id="level_id" class="form-control select" required>
                                                 
                                                        <option value="">اختر المسار اولاً</option>
                                                 
                                                </select>
                                                <?php if($errors->has('level_id')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('level_id')); ?></small></p>
                                                <?php endif; ?>
                                        </div>
                                        
                           <?php endif; ?>  
                           
                            <?php if(auth()->user()->isSupervisor): ?> 
         <?php echo Form::mySelect('teacher_id','المعلمة <span class=red>*</span>',['' => ''] +App\User::where('role',5)->whereHas('classrooms', function ($q) {
                $q->whereHas('department', function ($q) {
                $q->where('supervisor_id', auth()->id());
            });
            })->orWhereIn('department_id',$departments)->pluck('name','id')->toArray(),null,['class' => 'form-control select']); ?>

             
<?php else: ?>
          
                <?php echo Form::mySelect('teacher_id','المعلمة <span class=red>*</span>',['' => ''] +App\User::where('role', 5)->pluck('name', 'id')->toArray(),null,['class' => 'form-control select']); ?>

               <?php endif; ?>
                <?php echo Form::mySelect('code', 'رصد الدرجات', config('variables.classrooms_code'), null, ['class' => 'form-control select']); ?>


               
                <?php echo Form::myTextArea('description', 'نبذة  <span class=red>*</span>', ['required']); ?>

                <?php echo Form::mySelect('type', 'نوع  <span class=red>*</span>', config('variables.divisions_type')); ?>


                

                

            </div>
        </div>

    </div>
    

</div>
