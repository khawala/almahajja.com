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
<section class="divisions" id="divisions" data-aos="fade-up">
    <div class="container">
        <div id="divisions-slide" data-interval="false" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item <?php echo e($loop->first ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('division.show', $division)); ?>">
                        <h3 class="title"><?php echo e($division->name); ?></h3>
                    </a>
                    <p><?php echo e($division->description); ?></p>
                    <p class="the-date"><?php echo e($division->batch); ?> <span><?php echo e($division->price); ?> ريال سعودي</span></p>
                    <a class="btn btn-primary" href="<?php echo e(route('division.show', $division)); ?>">تفاصيل التدريب</a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-target="#divisions-slide" data-slide-to="<?php echo e($loop->index); ?>" <?php echo e($loop->first ? 'class=active' : ''); ?>></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="classrooms" id="classrooms" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="/img/coran2.png" alt="">
            </div>

            <div class="col-sm-8">
                <div class="wrapper">
                    <div id="classrooms-slide" data-interval="false" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item <?php echo e($loop->first ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('division.show', $classroom)); ?>">
                                    <h3><?php echo e($classroom->name); ?></h3>
                                </a>
                                <p><?php echo e($classroom->description); ?></p>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i> انعقاد الدورة : <?php echo e($classroom->batch); ?></li>
                                            <li>
                                                <i class="fa fa-money" aria-hidden="true"></i> رسوم التسجيل :
                                                <?php if($classroom->price): ?>
                                                <?php echo e($classroom->price); ?> ريال
                                                <?php else: ?>
                                                مجانا
                                                <?php endif; ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <a class="btn btn-success btn-block" href="<?php echo e(route('division.show', $classroom)); ?>">الخطة الدراسية</a>
                                    </div>
                                </div>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php $__currentLoopData = $classrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li data-target="#classrooms-slide" data-slide-to="<?php echo e($loop->index); ?>" <?php echo e($loop->first ? 'class=active' : ''); ?>></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>
                        <a class="left carousel-control" href="#classrooms-slide" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#classrooms-slide" role="button" data-slide="next">
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