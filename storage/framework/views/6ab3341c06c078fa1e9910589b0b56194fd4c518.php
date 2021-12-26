
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
    <!-- Start Section Title Main  -->
    <section class="title-main">
        <div class="container">
            <div class="all">
                <div class="text1">
                    <h3><?php echo e($department->name); ?></h3>
                    <h5><?php echo e(nl2br($department->description)); ?></h5>
                </div>
                <div class="box-img">
                    <img src="<?php echo e($department->photo); ?>" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Title Main  -->
    <!-- Start Tabs  -->
    <section class="tabs-sec">
        <div class="container">
            <!-- Start Title  -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">الأقسام</li>
                </ol>
            </nav>

            <!-- End Title  -->
            <!-- Start Tabs Content  -->
            <div class="tabs-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                           aria-selected="true">الخطة الدراسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                           aria-selected="false">التسجيل</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?php $__currentLoopData = $department->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($section->status==1): ?>
                            <h6><?php echo e($section->name); ?></h6>
                            <table class="table">
                                <tbody>
                                <?php $__currentLoopData = $section->levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($level->name); ?></td>
                                        <td><?php echo e($level->description); ?></td>
                                        <td>
                                            <?php if($level->pivot->pdf_file): ?>
                                                <a href="<?php echo e(config('variables.level_sections_pdf_file.public').$level->pivot->pdf_file); ?>">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <hr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <?php if(auth()->guard()->check()): ?>
                      
                        <div class="box-inputs">
                            <form method="post" action="<?php echo e(route('department.store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                               
                                <!-- Start Col  -->
                                    <input type="hidden" name="department_id" value="<?php echo e($department->id); ?>">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">المسار</label>
                                                 
                                            <select name="section_id" id="section_id" class="form-control" required>
                                          
    <option value="">اختر المسار</option>
                                                <?php $__currentLoopData = $department->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($section->status==1): ?>
                                                    <option value="<?php echo e($section->id); ?>"><?php echo e($section->name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('section_id')): ?>
                                                <p class="help-block"><small><?php echo e($errors->first('section_id')); ?></small></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                               
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        
                                                <label for="">المستوى</label>
                                                <select name="level_id" id="level_id" class="form-control" required>
                                                 
                                                        <option value="">اختر المسار اولاً</option>
                                                 
                                                </select>
                                                <?php if($errors->has('level_id')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('level_id')); ?></small></p>
                                                <?php endif; ?>
                                        </div>
                                    </div>
                                <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <?php if($department->type == 0): ?>
                                                <label for="">شريحة الجوال</label>
                                                <select name="telecom_id" id="telecom_id" class="form-control" required>
                                                    <?php $__currentLoopData = App\Telecom::pluck('name', 'id')->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('telecom_id')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('telecom_id')); ?></small></p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                               
                                <!-- Start Col  -->
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <?php if($department->type == 0): ?>
                                                <label for="">وقت التسميع</label>
                                                <select name="period_id" id="period_id" class="form-control" required>
                                                    <?php $__currentLoopData = App\Period::pluck('name', 'id')->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('period_id')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('period_id')); ?></small></p>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- End Col  -->

                                    <!-- End Col  -->
<?php if( $department->price !=  0): ?>
                            <hr>
                            <hr class="space">
                           

                            <h4 class="marker">
                              وسيلة الدفع :
                            </h4>
                            <p>
                              اختر طريقة الدفع  التي تناسبك
                            </p>

                            <div>
                               
                                <div class="row border">
                                    
                                    <div class="col-lg-3">
                                      <div class="form-checkbox" >
                                           <label >
                                          <input type="radio"  name="payment_type" value="2"  checked>
                                
                                            تحويل بنكي
                                          </label>
                                      </div>
                                    </div>
                                    <div class="col-lg-9 ">

                                      إن كنت قد قمت بالدفع عن طريق التحويل للحساب الخاص بالمركز ففضلاً قم برفع صورة من التحويل الخاص بمبلغ القسم

                                        <br>
                                        انقر هنا لتحديد صورة من التحويل
                                        <input name="receipt_image" class="btn-text btn-xs" type="file" value="" accept="image/*"  >
                                        <div class="row">

                                          <div class="col-md-7 text-left">
                                              <?php $setting=App\Setting::find(4);?>
                                            <p>
                                       <hr>
                                      البيانات البنكية للمعهد
                                      :
                                          <?php echo e($setting->content); ?>

                                            </p>
                                          </div>
                                        
                                        </div>

                                  
                                      
                                    </div>
                                  </div>
                                  <hr class="space space-25">

                                  <div class="row border">
                                    <div class="col-lg-3">
                                      <div class="form-checkbox" >
                                           <label >
                                          <input type="radio"  name="payment_type" value="1"  checked  >
                                         
                                             الدفع الإلكتروني
                                          </label>
                                      </div>
                                    </div>
                                    <div class="col-lg-9">
                                      سيتم تحويلك لصفحة الدفع إلكتروني كوسيلة آمنة  ، هذه العملية تدعم كلاً من

                                      <img src="<?php echo e(asset('images/payment.png')); ?>" alt="payment">
                                    </div>
                                  </div>
                                  <hr class="space space-25">

                            </div>
<?php endif; ?>
                                <!-- Start Col  -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-website" name="" value="سجل الآن">
                                        </div>
                                    </div>
                                    <!-- End Col  -->
                                </div>
                            </form>
                        </div>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                           <a class="nav-link btn btn-danger btn-website" href="<?php echo e(url('login')); ?>">تسجيل دخول</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- End Tabs Content  -->
        </div>
    </section>
    <!-- End Tabs  -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
$(document).ready(function(){
 
    $('#section_id').on('change', function(){
        var sectionID = $(this).val();
        if(sectionID){

            $.ajax({
                 headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                type:'POST',

                url:"<?php echo e(route('department.sectionLevel')); ?>",
                data: { 'section_id':sectionID},
                success:function(html){
                    $('#level_id').html(html);
                }
            }); 
        }else{
            $('#level_id').html('<option value="">قم بإختيار المسار اولاً</option>');
        }
    });

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>