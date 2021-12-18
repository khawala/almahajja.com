<?php $__env->startSection('content'); ?>
<!-- Start Main Slider  -->
<section class="main-slider">
    <div class="container">
        <div id="mainSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li data-target="#mainSlider" data-slide-to="<?php echo e($loop->index); ?>" <?php echo e($loop->first ? 'class=active' : ''); ?>></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>
            <div class="carousel-inner">
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
                        <img class="d-block w-100 back-img"
                             style="background: url(<?php echo e($ad->photo); ?>) no-repeat center center;">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo e($ad->name); ?></h5>
                            <p><?php echo e($ad->short_description); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <button class="carousel-control-prev" type="button" data-target="#mainSlider" data-slide="prev">
                <a href=""> <span class="carousel-control-prev-icon fas fa-chevron-left" aria-hidden="true"></span></a>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#mainSlider" data-slide="next">
                <a href=""> <span class="carousel-control-next-icon fas fa-chevron-right" aria-hidden="true"></span></a>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
</section>
<!-- End Main Slider  -->
<!-- Start Statices Section  -->
<section class="statices">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-4">
                <div class="box">
                    <div class="icon">
                        <svg id="Group_10217" data-name="Group 10217" xmlns="http://www.w3.org/2000/svg" width="36.084"
                             height="43.032" viewBox="0 0 36.084 43.032">
                            <g id="Layer_2_9_" transform="translate(0)">
                                <g id="Group_10216" data-name="Group 10216">
                                    <path id="Path_13315" data-name="Path 13315"
                                          d="M86.571,7.444c.415.234,3.211,1.585,4.562,2.235.005.524.017,1.431.035,1.446.149,1.3.4,2.741.478,3.148-.123.068-.754.481-.754,1.765l0,.021c0,.034,0,.068,0,.1.272,3.569,1.691,2.031,1.984,3.594a7.766,7.766,0,0,0,4.22,5.128,5.964,5.964,0,0,0,5.151,0,7.766,7.766,0,0,0,4.22-5.128c.293-1.563,1.712-.025,1.984-3.594,0-.035,0-.069,0-.1l0-.021c0-1.284-.631-1.7-.754-1.765.074-.407.33-1.85.478-3.148.018-.015.029-.922.035-1.446.742-.357,1.919-.926,2.9-1.4v3.45a.887.887,0,0,0-.09,1.5s-.394,2.213-.521,2.864,2.245.52,2.138,0-.521-2.864-.521-2.864a.888.888,0,0,0-.089-1.5v-3.9c.365-.181.637-.319.746-.38.294-.165.452-.377.419-.6.04-.229-.126-.476-.57-.693C109.445,4.6,101.352.639,100.552.258a1.635,1.635,0,0,0-1.762,0c-.8.382-8.893,4.342-12.068,5.9-.445.218-.611.464-.57.693C86.118,7.067,86.277,7.279,86.571,7.444Z"
                                          transform="translate(-81.629)" fill="#fff" />
                                    <path id="Path_13316" data-name="Path 13316"
                                          d="M66.268,297.054a39.8,39.8,0,0,1-4.538-2.33.78.78,0,0,0-1.1.343c-1.231,2.061-3.514,8.056-5.107,8.167l-.03,0-.03,0c-1.593-.111-3.876-6.106-5.107-8.167a.78.78,0,0,0-1.1-.343,39.806,39.806,0,0,1-4.538,2.33c-5.013,1.807-7.268,3.651-7.268,4.908v8.358H73.536v-8.358C73.536,300.7,71.281,298.861,66.268,297.054Z"
                                          transform="translate(-37.452 -267.288)" fill="#fff" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h3><?php echo e(App\User::where('role',0)->count()); ?></h3>
                    <p>الطلاب والطالبات </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box">
                    <div class="icon">
                        <svg id="Group_11452" data-name="Group 11452" xmlns="http://www.w3.org/2000/svg" width="45.887"
                             height="45.887" viewBox="0 0 45.887 45.887">
                            <g id="Group_11445" data-name="Group 11445" transform="translate(11.292)">
                                <path id="Path_13322" data-name="Path 13322"
                                      d="M190.34,103.585v3.585a7.17,7.17,0,0,1-14.34,0v-3.585h1.369a6.485,6.485,0,0,0,5.8-3.585,6.485,6.485,0,0,0,5.8,3.585Z"
                                      transform="translate(-171.519 -91.038)" fill="#fff" />
                                <g id="Group_11444" data-name="Group 11444">
                                    <g id="Group_11443" data-name="Group 11443" transform="translate(20.668)">
                                        <path id="Path_13323" data-name="Path 13323"
                                              d="M363.73,4.929A4.93,4.93,0,0,0,356.615.51a14.353,14.353,0,0,1,5.062,8.42A4.92,4.92,0,0,0,363.73,4.929Z"
                                              transform="translate(-356.615)" fill="#fff" />
                                    </g>
                                    <path id="Path_13324" data-name="Path 13324"
                                          d="M149.3,11.651a11.651,11.651,0,1,0-23.3.111,7.4,7.4,0,0,0,1.8,4.842c-.007-.156-.012-.314-.012-.472V12.547a2.689,2.689,0,0,1,2.689-2.689h1.369a3.776,3.776,0,0,0,3.4-2.1,2.689,2.689,0,0,1,4.81,0,3.776,3.776,0,0,0,3.4,2.1h1.369a2.689,2.689,0,0,1,2.689,2.689v3.585c0,.158,0,.316-.012.472a7.4,7.4,0,0,0,1.8-4.842Z"
                                          transform="translate(-126 0)" fill="#fff" />
                                </g>
                            </g>
                            <g id="Group_11451" data-name="Group 11451" transform="translate(0 5.158)">
                                <g id="Group_11447" data-name="Group 11447">
                                    <path id="Path_13325" data-name="Path 13325"
                                          d="M31.567,333.443l-.3-1.7a3.137,3.137,0,1,1,6.178-1.089l.3,1.7a3.137,3.137,0,1,1-6.178,1.089Z"
                                          transform="translate(-28.421 -303.821)" fill="#fff" />
                                    <g id="Group_11446" data-name="Group 11446">
                                        <path id="Path_13326" data-name="Path 13326"
                                              d="M5.939,79.106c.113,0,.225,0,.336.011L2.668,58.662a1.344,1.344,0,1,0-2.648.467L3.627,79.584a5.818,5.818,0,0,1,2.312-.478Z"
                                              transform="translate(0 -57.55)" fill="#fff" />
                                    </g>
                                </g>
                                <g id="Group_11448" data-name="Group 11448" transform="translate(8.989 20.687)">
                                    <path id="Path_13327" data-name="Path 13327"
                                          d="M122.5,288.377h-1.524v1.344a6.722,6.722,0,0,1-13.443,0v-1.344h-3.316a10.091,10.091,0,0,0-3.917.787l.188,1.064a5.814,5.814,0,0,1,2.5,3.832l.3,1.7a5.816,5.816,0,0,1,.072,1.46h7.315a7.623,7.623,0,0,1,3.585.9,7.623,7.623,0,0,1,3.585-.9h14.707A10.129,10.129,0,0,0,122.5,288.377Z"
                                          transform="translate(-100.298 -288.377)" fill="#fff" />
                                </g>
                                <g id="Group_11449" data-name="Group 11449" transform="translate(0 32.215)">
                                    <path id="Path_13328" data-name="Path 13328"
                                          d="M44.542,421.033H43.109v-2.689A1.344,1.344,0,0,0,41.764,417H26.528a4.915,4.915,0,0,0-3.585,1.551A4.915,4.915,0,0,0,19.359,417h-8.22a5.824,5.824,0,0,1-8.36,1.555v2.478H1.344a1.344,1.344,0,0,0,0,2.689H18.616a4.745,4.745,0,0,1,3.377,1.4,1.344,1.344,0,0,0,1.9,0,4.745,4.745,0,0,1,3.377-1.4H44.542a1.344,1.344,0,0,0,0-2.689Z"
                                          transform="translate(0 -417)" fill="#fff" />
                                </g>
                                <g id="Group_11450" data-name="Group 11450" transform="translate(18.91 19.97)">
                                    <path id="Path_13329" data-name="Path 13329"
                                          d="M211,280.368v2.062a4.033,4.033,0,0,0,8.066,0v-2.062a9.852,9.852,0,0,1-8.066,0Z"
                                          transform="translate(-211 -280.368)" fill="#fff" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h3><?php echo e(App\Registration::where('status',5)->count()); ?></h3>
                    <p>المتخرجات</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box">
                    <div class="icon">
                        <svg id="svgexport-6_7_" data-name="svgexport-6 (7)" xmlns="http://www.w3.org/2000/svg" width="44.037"
                             height="44.037" viewBox="0 0 44.037 44.037">
                            <path id="Path_13330" data-name="Path 13330"
                                  d="M40.866,18.006a19.275,19.275,0,0,0-2.691-6.478,4.115,4.115,0,0,0-5.667-5.667A19.275,19.275,0,0,0,26.03,3.171a4.123,4.123,0,0,0-8.024,0,19.275,19.275,0,0,0-6.478,2.691,4.115,4.115,0,0,0-5.667,5.667,19.275,19.275,0,0,0-2.691,6.478,4.123,4.123,0,0,0,0,8.024,19.276,19.276,0,0,0,2.691,6.478,4.115,4.115,0,0,0,5.667,5.667,19.275,19.275,0,0,0,6.478,2.691,4.123,4.123,0,0,0,8.024,0,19.276,19.276,0,0,0,6.477-2.691,4.115,4.115,0,0,0,5.667-5.667,19.275,19.275,0,0,0,2.691-6.478,4.123,4.123,0,0,0,0-8.024ZM31.749,31.749a4.122,4.122,0,0,0-.968,4.26,16.507,16.507,0,0,1-5.052,2.1,4.119,4.119,0,0,0-7.421,0,16.507,16.507,0,0,1-5.052-2.1A4.1,4.1,0,0,0,8.028,30.78a16.508,16.508,0,0,1-2.1-5.051,4.119,4.119,0,0,0,0-7.421,16.507,16.507,0,0,1,2.1-5.051,4.077,4.077,0,0,0,4.26-.969,4.122,4.122,0,0,0,.968-4.26,16.507,16.507,0,0,1,5.052-2.1,4.119,4.119,0,0,0,7.421,0,16.507,16.507,0,0,1,5.052,2.1,4.122,4.122,0,0,0,.969,4.26,4.076,4.076,0,0,0,4.26.968,16.507,16.507,0,0,1,2.1,5.051,4.119,4.119,0,0,0,0,7.421,16.507,16.507,0,0,1-2.1,5.051,4.122,4.122,0,0,0-4.26.969ZM35.641,8.395a1.376,1.376,0,1,1-1.946,0,1.376,1.376,0,0,1,1.946,0ZM22.018,2.752a1.376,1.376,0,1,1-1.376,1.376,1.376,1.376,0,0,1,1.376-1.376ZM8.395,8.4a1.376,1.376,0,1,1,0,1.946A1.376,1.376,0,0,1,8.395,8.4ZM4.128,20.642a1.376,1.376,0,1,1-1.376,1.376,1.376,1.376,0,0,1,1.376-1.376Zm4.267,15a1.376,1.376,0,1,1,1.946,0A1.376,1.376,0,0,1,8.4,35.642Zm13.623,5.643a1.376,1.376,0,1,1,1.376-1.376A1.376,1.376,0,0,1,22.018,41.284Zm13.623-5.643a1.376,1.376,0,1,1,0-1.946A1.376,1.376,0,0,1,35.642,35.641Zm4.267-12.247a1.376,1.376,0,1,1,1.376-1.376,1.376,1.376,0,0,1-1.376,1.376Z"
                                  fill="#fff" />
                        </svg>

                    </div>
                    <h3><?php echo e(App\Classroom::count()); ?></h3>
                    <p>الحلقات</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Statices Section  -->
<!-- Start News Course  -->
<section class="news-course" id="course">
    <div class="container">
        <!-- Start Title Sections -->
        <div id="divisions" class="title-section">
            <div class="row justify-content-between">
                <div class="col-6">
                    <p class="text-right">أحدث الدورات</p>
                </div>
                <div class="col-6">
                    <a href="<?php echo e(url('/departments/list')); ?>" class="btn-title">عرض المزيد</a>
                </div>
            </div>
        </div>
        <!-- End Title Sections -->
        <!-- Start Content  -->
        <div class="row">
            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="box">
                        <img src="<?php echo e(url('images/news-courses/supporting-quran-memorization-workshops.png')); ?>" alt="">
                        <h4><?php echo e($department->name); ?>ً</h4>
                        <div class="row justify-content-between text-right">
                            <div class="col-6">
                                <div class="one">
                                    <h6>تاريخ البدء</h6>
                                    <p><?php echo e($department->start_date); ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="one">
                                    <h6>تاريخ الانتهاء</h6>
                                    <p><?php echo e($department->end_date); ?></p>
                                </div>
                            </div>
                        </div>
                        <button class="cost" onclick="window.open('<?php echo e(route('department.show', $department)); ?> ')" style="width: 100%;cursor: pointer;border-style: solid;">
                            <span>رسوم التسجيل</span>  <?php if($department->price): ?> <?php echo e($department->price); ?> ريال <?php else: ?> مجانا <?php endif; ?>
                        </button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- End Content  -->
    </div>
</section>
<!-- End News Course  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content2'); ?>
<!-- Start Jobs  -->
<section class="jobs" id="job">
    <div class="container">
        <!-- Start Title Sections -->
        <div class="title-section">
            <div class="row justify-content-between">
                <div class="col-6">
                    <p class="text-right">الوظائف المتوفرة</p>
                </div>
                <div class="col-6">
                    <a href="<?php echo e(url('/job/list')); ?>" class="btn-title">عرض المزيد</a>
                </div>
            </div>
        </div>
        <!-- End Title Sections -->
        <!-- Start Content  -->
        <div class="row">
            <?php $__currentLoopData = $jobs->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4">
                        <div class="box">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="icon-box">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.46" height="28.843" viewBox="0 0 21.46 28.843">
                                            <g id="svgexport-6_1_" data-name="svgexport-6 (1)" transform="translate(-68.8)">
                                                <g id="Group_11434" data-name="Group 11434" transform="translate(68.8)">
                                                    <g id="Group_11433" data-name="Group 11433" transform="translate(0)">
                                                        <path id="Path_13319" data-name="Path 13319"
                                                              d="M119.921,16.868a22.377,22.377,0,0,0,4.061-.182,3.554,3.554,0,0,0,1.754-.005c3.965.193,7.055,1.314,7.055-6.755,0-5.478-3.557-9.925-7.946-9.925S116.9,4.448,116.9,9.925c0,4.4.842,6.116,2.21,6.712A2.933,2.933,0,0,0,119.921,16.868ZM118.654,6.83c.832,1.153,2.988.907,4.85-.553a7.092,7.092,0,0,0,1.218-1.223,1.074,1.074,0,0,1,.129.021,4.29,4.29,0,0,1,.537.156,4.934,4.934,0,0,1,.51.247,4.657,4.657,0,0,1,.467.306,4.281,4.281,0,0,1,.4.359,2.831,2.831,0,0,1,.316.37,3.637,3.637,0,0,1,.236.349,1.633,1.633,0,0,1,.161.29c.08.166.129.263.129.263s-.016-.1-.048-.29a2.661,2.661,0,0,0-.07-.333,2.781,2.781,0,0,0-.134-.429,4.123,4.123,0,0,0-.215-.488,5.528,5.528,0,0,0-.311-.52,6.008,6.008,0,0,0-.418-.51,5.36,5.36,0,0,0-.51-.472,5.338,5.338,0,0,0-.531-.349,4.192,4.192,0,0,0,.2-.5,6.306,6.306,0,0,1,1.889,1.223c1.991,1.99,1.207,4.3,2.742,2.774a4.126,4.126,0,0,0,.6-.746.678.678,0,0,1,.15.005.705.705,0,0,1,.418.343,1.823,1.823,0,0,1,.129,1.357A1.55,1.55,0,0,1,130.4,9.727l-.322.043-.086.317c-.762,2.763-2.817,5.7-5.14,5.7s-4.373-2.94-5.14-5.7l-.086-.317-.322-.043a1.575,1.575,0,0,1-1.084-1.245,1.823,1.823,0,0,1,.129-1.357A.722.722,0,0,1,118.654,6.83Z"
                                                              transform="translate(-114.319 0)" fill="#fff" />
                                                        <path id="Path_13320" data-name="Path 13320"
                                                              d="M85.3,327.9a6.075,6.075,0,0,1-2.3,2.452c-1.974,1.009-3.444,1.835-3.444,1.835l-.005-.005v-.016l-.016.011-.016-.011v.016l-.005.005s-1.465-.816-3.444-1.835a6.111,6.111,0,0,1-2.3-2.452c-2.924,1.191-4.963,3.916-4.963,6.3v4.947H90.26V334.2C90.26,331.822,88.216,329.091,85.3,327.9Z"
                                                              transform="translate(-68.8 -310.308)" fill="#fff" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="sub text-right">
                                        <h6 style="font-weight: bold;"><?php echo e($job->name); ?></h6>
                                        <p>
                                            <?php echo e($job->description); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="list text-right">
                                <h5>الشروط</h5>
                                <ul>
                                    <li><?php echo e($job->skills); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- End Content  -->
    </div>
</section>
<!-- End Jobs  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>