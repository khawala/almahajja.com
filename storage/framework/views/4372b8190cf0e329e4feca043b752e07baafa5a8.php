<?php $__env->startSection('content'); ?>

<section class="slide" id="slide" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div id="home-slide" data-interval="false" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item <?php echo e($loop->first ? 'active' : ''); ?>">
                        <div class="col-sm-8">
                            <h4 class="title"><?php echo e($ad->name); ?></h4>
                            <p><?php echo e($ad->short_description); ?></p>
                        </div>
                        <div class="col-sm-4">
                            <img src="<?php echo e($ad->photo); ?>" alt="">
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <ol class="carousel-indicators">
                    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#home-slide" data-slide-to="<?php echo e($loop->index); ?>" <?php echo e($loop->first ? 'class=active' : ''); ?>></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
            </div>
        </div>
    </div>
</section>

<?php if(!$divisions->isEmpty()): ?>

<?php endif; ?>

<section class="departments" id="departments" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="/img/coran2.png" alt="">
            </div>

            <div class="col-sm-8">
                <div class="wrapper">
                    <div id="departments-slide" data-interval="false" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item <?php echo e($loop->first ? 'active' : ''); ?>">
                               
                                    <h3><?php echo e($department->name); ?></h3>
 
                                <p><?php echo e($department->description); ?></p>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i> تاريخ البدء  : <?php echo e($department->start_date); ?></li>
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i> تاريخ الانتهاء  : <?php echo e($department->end_date); ?></li>
                                            <li>
                                                <i class="fa fa-money" aria-hidden="true"></i> رسوم التسجيل :
                                                <?php if($department->price): ?>
                                                <?php echo e($department->price); ?> ريال
                                                <?php else: ?>
                                                مجانا
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">

                    <a class="btn btn-primary" href="<?php echo e(route('department.show', $department)); ?>">تفاصيل التدريب</a>
                                    </div>
                                    
                                </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-target="#departments-slide" data-slide-to="<?php echo e($loop->index); ?>" <?php echo e($loop->first ? 'class=active' : ''); ?>></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                        <a class="left carousel-control" href="#departments-slide" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#departments-slide" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="job-requests" id="job-requests" data-aos="fade-up">
    <div class="container">
        <h3 class="title">التوظيف</h3>
        <?php $__currentLoopData = $jobs->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
                <article>
                    <header>
                        <div class="circle">
                            <span class="big"><?php echo e($job->vacancies); ?></span>
                            <span class="price"><?php echo e($job->salary); ?></span>
                            <span class="currency">ريال سعودي</span>
                        </div>
                    </header>
                    <div class="wrapper">
                        <p><?php echo e($job->description); ?></p>
                        <p><?php echo e($job->skills); ?></p>
                        <a href="<?php echo e(route('job.show', $job)); ?>" class="btn btn-primary"><?php echo e($job->name); ?></a>
                    </div>
                </article>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>