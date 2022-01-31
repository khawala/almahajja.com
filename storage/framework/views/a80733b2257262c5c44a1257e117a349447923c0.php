
<?php $__env->startSection('css'); ?>
    <style>
        .box-img img {
            background: no-repeat;
            height: 150px;
            width: 200px;
            background-size: cover !important;
            display: inline-block;
        }
        .about-course .box-img img{
            width: 75%;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Start News Course  -->
    <section class="news-course bg-new">
        <div class="container">
            <!-- Start Title Sections -->
            <div class="title-section">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <p class="text-right">أحدث الدورات</p>
                    </div>
                    <!-- <div class="col-6">
                      <a href="#" class="btn-title">عرض المزيد</a>
                    </div> -->
                </div>
            </div>
            <!-- End Title Sections -->
            <!-- Start Content  -->
            <div class="row">
                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="box">
                        <img src="<?php echo e(url('images/news-courses/supporting-quran-memorization-workshops.png')); ?>" alt="">
                        <h4><?php echo e($item->name); ?>ً</h4>
                        <div class="row justify-content-between text-right">
                            <div class="col-6">
                                <div class="one">
                                    <h6>تاريخ البدء</h6>
                                    <p><?php echo e($item->start_date); ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="one">
                                    <h6>تاريخ الانتهاء</h6>
                                    <p><?php echo e($item->end_date); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cost">
                            <span>رسوم التسجيل</span>  <?php if($item->price): ?> <?php echo e($item->price); ?> ريال <?php else: ?> مجانا <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- End Content  -->
            <!-- Start Pagination  -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php echo e($items->links()); ?>






                </ul>
            </nav>
            <!-- End Pagination  -->
        </div>
    </section>
    <!-- End News Course  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>