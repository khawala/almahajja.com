<?php $__env->startSection('content'); ?>
    <section class="sub-page">
        <header>
            <div class="container">
                <h2><?php echo e($job->name); ?></h2>
                <p><?php echo e(nl2br($job->description)); ?></p>
                <p> <?php echo e($job->salary); ?> ريال : <?php echo e($job->time); ?></p>
            </div>
        </header>

        <div class="container">
            <div class="details">
                <?php echo Form::open([
                    'route' => 'job.store'
                ]); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <?php echo Form::hidden('job_id', $job->id); ?>


                            <?php echo Form::myInput('text', 'name', 'الاسم الرباعي', ['required']); ?>


                            <?php echo Form::myInput('text', 'mobile', 'الجوال', ['required']); ?>


                            <?php echo Form::mySelect('nationality_id', 'الجنسية', ['' => 'الجنسية'] + App\Nationality::active()->pluck('name', 'id')->toArray(), null, ['required']); ?>

                        </div>

                        <div class="col-sm-6">
                            <?php echo Form::myTextArea('cv_description', 'السيرة الذاتية', ['rows' => 10, 'required']); ?>

                        </div>
                    </div>

                    <button class="btn btn-primary">ارسال السيرة</button>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>