<?php $__env->startSection('content'); ?>
    <section class="sub-page">
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <h2><?php echo e($user->name); ?></h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>جوال التواصل: <?php echo e($user->mobile1); ?></p>
                                <p>البريد الالكتروني: <?php echo e($user->email); ?></p>
                                <p> الشريحة: <?php echo e($user->telecom->name); ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p>الجنس: <?php echo e($user->GenderName); ?></p>
                                <p>الجنسية: <?php echo e($user->nationality->name); ?></p>
                                <p>حالة الحساب: <?php echo e($user->statusName); ?></p>
                            </div>
                        </div>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="btn button-info" style="background-color:#7f999a;color:white;">تعديل</a>
                    </div>
                    <div class="col-sm-3">
                        <img src="<?php echo e($user->photo); ?>" alt="">
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="details">
                <h2>الدورات والحلقات</h2>

                <div class="table-responsive">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>رقم التسجيل</th>
                                    <th>القسم</th>
                                <th>المسار</th>
                                <th>وقت التسميع</th>
                                <th>المستوى</th>
                                <th>الحلقة</th>
                                <th width="270">الحالة</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php $__currentLoopData = $user->registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                      <td><?php echo e($item->department->name); ?></td>
                                    <td><?php echo e($item->section->name); ?></td>
                                
                                    <td><?php echo e($item->period->name); ?></td>
                                   
                                 
                                    <?php if($item->level): ?>
                                    <td><?php echo e($item->level->name); ?>

                                      <?php
                                            $file=App\LevelSection::where([['level_id',$item->level->id],['section_id',$item->section->id]])->first();
                                           
                                            if($file){  ?>
                                                <a href="<?php echo e($file->pdf_file); ?>" target="_blnck">
                                                    <i class="fas fa-download"></i> الخطة
                                                </a>
                                              <?php   } ?>
                                         </td>
                              
                                           
                                          
                                      
                                    <?php else: ?>
                                    <td>لم يحدد بعد</td>
                                    <?php endif; ?>
                                    <?php if($item->classroom): ?>
                                    <td><?php echo e($item->classroom->name); ?></td>
                                    <?php else: ?>
                                    <td>لم تحدد بعد</td>
                                    <?php endif; ?>
                                    <td>
                                        <ul class="list-inline">
                                            <li><?php echo e($item->statusName); ?></li>

                                            <?php if($item->level && $item->section): ?>
                                                <li><a class="btn btn-xs btn-info" href="<?php echo e(route('profile.marks', [$item->id, $item->section->id])); ?>">كشف الدرجات</a></li>
                                            <?php endif; ?>

                                            <?php if($item->status == 3||$item->status==5): ?>
                                                <li><a target="_blank" class="btn btn-xs btn-success" href="<?php echo e(route('certifications.print', $item)); ?>">طباعة الشهادة</a></li>
                                            <?php endif; ?>
 
                                            <?php $__currentLoopData = $item->section->divisiontimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divisiontime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($divisiontime->pdf_file): ?>
                                                    <a class="btn btn-primary btn-xs" download href="<?php echo e($divisiontime->pdf_file); ?>"><i class="fa fa-download"></i></a>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>