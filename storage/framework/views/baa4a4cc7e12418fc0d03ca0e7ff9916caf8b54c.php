<?php $__env->startSection('content'); ?>
    <section class="sub-page">
        <header>
            <div class="container">
                <h2><?php echo e($job->name); ?></h2>
                <p><?php echo e(nl2br($job->description)); ?></p>
                <p> <?php echo e($job->salary); ?>   <?php echo e($job->time); ?></p>
                
            </div>
        </header>
        <hr>
<?php if(auth()->guard()->check()): ?>
        <div class="container">
            <div class="details">
                <?php echo Form::open([
                    'route' => 'job.store'
                ]); ?>

                    <div class="row">
                        <div class="col-12">
                            <?php echo Form::hidden('job_id', $job->id); ?>


                            <!--<?php echo Form::myInput('text', 'name', 'الاسم الرباعي', ['required']); ?>-->

                            <!--<?php echo Form::myInput('text', 'mobile', 'الجوال', ['required']); ?>-->

                            <?php echo Form::mySelect('department_id', 'القسم', ['' => '']+ App\Department::where('need_teacher',1)->pluck('name', 'id')->toArray(), null); ?>

                        
                            <?php echo Form::myTextArea('note', 'الملاحظات ', ['rows' => 10]); ?>

                     
                        <label class="container">شروط الإنضمام:
                        <br>
                         <?php echo e($job->skills); ?>

                         <br>
                         <hr>
                           <input type="checkbox" class="myinput large" name="terms" required>
                         قبول شروط الإنضمام
</label>
                    </div>

                    <button class="btn btn-danger btn-website">ارسال الطلب</button>

                <?php echo Form::close(); ?>

            </div>
        </div>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
          <div class="container">
              <hr>
        <p>يجب ان تقوم بتسجيل الدخول اولاً من حساب معلم:</p>
    <span>    <a class="nav-link btn btn-danger btn-website" href="<?php echo e(url('/teacher/register')); ?>">    تسجيل حساب جديد </a></span>
    <br>
        <a class="nav-link btn btn-danger btn-website" href="<?php echo e(url('/login')); ?>">  لدي حساب تسجيل دخول </a>
        </div>
        <?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>