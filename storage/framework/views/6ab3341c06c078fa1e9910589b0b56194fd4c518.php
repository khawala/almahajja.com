

<?php $__env->startSection('content'); ?>
<section class="sub-page">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2><?php echo e($department->name); ?></h2>
                    <p><?php echo e(nl2br($department->description)); ?></p>
                </div>
                <div class="col-sm-3">
                    <img src="<?php echo e($department->photo); ?>" alt="">
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="details">
            <div class="the-tab">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-01" aria-controls="tab-01" role="tab" data-toggle="tab"><i class="fa fa-book"></i> الخطة الدراسية</a></li>
                    <li role="presentation"><a href="#tab-02" aria-controls="tab-02" role="tab" data-toggle="tab"><i class="fa fa-user"></i> التسجيل</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="tab-01">
                        <?php $__currentLoopData = $department->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h3><?php echo e($section->name); ?></h3>
                        <div class="table-responsive">
                            <table class="table">
                                <?php $__currentLoopData = $section->levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($level->name); ?></td>
                                    <td><?php echo e($level->description); ?></td>
                                    <td>
                                        <?php if($level->pivot->pdf_file): ?>
                                        <a class="btn btn-primary btn-xs" download href="<?php echo e(config('variables.level_sections_pdf_file.public').$level->pivot->pdf_file); ?>"><i class="fa fa-download"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </table>
                        </div>
                        <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab-02">
                        <?php echo Form::open([
                        'route' => 'department.store'
                        ]); ?>

                        <div class="row">
                            <?php if(auth()->guard()->guest()): ?>
                            <div class="col-sm-6">

                                <?php echo Form::myInput('text', 'name', 'الاسم الرباعي', ['required']); ?>

                                <?php if($errors->has('name')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('name')); ?></small></p>
                                <?php endif; ?>

                                <?php echo Form::myInput('text', 'mobile1', 'الجوال', ['required']); ?>

                                <?php if($errors->has('mobile1')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('mobile1')); ?></small></p>
                                <?php endif; ?>

                                <?php echo Form::mySelect('nationality_id', 'الجنسية', ['' => ''] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']); ?>

                                <?php if($errors->has('nationality_id')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('nationality_id')); ?></small></p>
                                <?php endif; ?>

                                <?php echo Form::myInput('text', 'username', 'اسم المستخدم', ['required']); ?>

                                <?php if($errors->has('username')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('username')); ?></small></p>
                                <?php endif; ?>

                                <?php echo Form::myInput('password', 'password', 'كلمة السر', ['required']); ?>

                                <?php if($errors->has('password')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('password')); ?></small></p>
                                <?php endif; ?>

                                <?php echo Form::myInput('password', 'password_confirmation', 'تأكيد كلمة السر', ['required']); ?>

                                <?php if($errors->has('password_confirmation')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('password_confirmation')); ?></small></p>
                                <?php endif; ?>

                            </div>
                            <?php endif; ?>
<input type="hidden" name="department_id" value="<?php echo e($department->id); ?>">
                            <div class="col-sm-6">
                                <?php echo Form::mySelect('section_id', 'المسار', ['' => ''] + App\Section::join('department_section', 'sections.id', '=', 'department_section.section_id')
                                ->where('department_section.department_id','=',$department->id)->pluck('sections.name', 'sections.id')->toArray(), null, ['required']); ?>

                                <?php if($errors->has('section_id')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('section_id')); ?></small></p>
                                <?php endif; ?>

                               
                            

                                <?php if($department->type == 0): ?>
                                <?php echo Form::mySelect('telecom_id', 'شريحة الجوال', ['' => ''] + App\Telecom::pluck('name', 'id')->toArray(), null, ['required']); ?>

                                <?php if($errors->has('telecom_id')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('telecom_id')); ?></small></p>
                                <?php endif; ?>

                                <?php echo Form::mySelect('period_id', 'وقت التسميع', ['' => ''] + App\Period::pluck('name', 'id')->toArray(), null, ['required']); ?>

                                <?php if($errors->has('period_id')): ?>
                                <p class="help-block"><small><?php echo e($errors->first('period_id')); ?></small></p>
                                <?php endif; ?>
                                <?php endif; ?>

                                <div class="form-group">
                                    <br>
                                    <button class="btn btn-primary">سجلي الان</button>
                                </div>

                            </div>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>