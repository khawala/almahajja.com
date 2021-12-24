<?php $__env->startSection('content'); ?>
<!-- Start Login Section  -->

<section class="login-sec" style="margin-top:150px;margin-bottom:150px;">

    <form role="form" method="POST" action="<?php echo e(url('/profile')); ?>">

        <?php echo csrf_field(); ?>
        <div class="inputs item-center">

                                    <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="name"  value="<?php echo e($user->name); ?>" placeholder="الاسم الرباعي" required>
                                                <?php if($errors->has('name')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('name')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                  <div class="col-12">
                                            <div class="form-group">
                                                <div class="lemail">
                                <input type="tel" id="telephone" min="9"  style="direction: ltr!important;" max="11" class="form-control"  value="<?php echo e($user->mobile1); ?>" placeholder="الجوال  : 505555555" autocomplete="off"  titles="الرجاء إدخال رقمك">
                                <input type="hidden" id="phonevalue" name="mobile1" value="<?php echo e($user->mobile1); ?>">
                            </div>

                            <?php if($errors->has('mobile1')): ?>
                                <span class="help-block">
                                <strong><?php echo e($errors->first('mobile1')); ?></strong>
                                </span>
                            <?php endif; ?>
                                            </div
                                
                                        </div>
                                           
                                           <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                         <div class="lemail has-feedback">
                               
                                <input type="email" class="form-control" name="email" value="<?php echo e($user->email); ?>" placeholder="الإيميل">
                            </div>

                            <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                              </div>
                                        </div>
                                           <div class="col-12">
                                            <div class="form-group">
                                                
                                                <label for=""> الجنس</label>
                                                <select name="gender" id="gender" class="form-control" required>

                                                        <option value="0" <?php if($user->gender==0): ?> selected <?php endif; ?>>ذكر</option>
                                                     <option value="1" <?php if($user->gender==1): ?> selected <?php endif; ?>>انثى</option>
                                                   
                                                </select>
                                                <?php if($errors->has('gender')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('gender')); ?></small></p>
                                                <?php endif; ?>
                                            
    </div>
                                        </div>
                                          <div class="col-12">
                                        <div class="form-group">
                                         
                                                <label for="">شريحة الجوال</label>
                                                <select name="telecom_id" id="telecom_id" class="form-control" required>
                                                    <?php $__currentLoopData = App\Telecom::pluck('name', 'id')->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>" <?php if($user->telecom_id==$key): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('telecom_id')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('telecom_id')); ?></small></p>
                                                <?php endif; ?>
                                       
                                        </div>
                                    </div>
                                        <!-- End Col  -->
                                    <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              <label>الجنسية</label>
                                                <select name="nationality_id"  id="selectInput" class="form-control" required>
                                                    <?php $__currentLoopData = App\Nationality::active()->pluck('name', 'id')->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($key); ?>" <?php if($user->nationality_id==$key): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('nationality_id')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('nationality_id')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                           <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="bank_account"  value="<?php echo e($user->bank_account); ?>" placeholder=" رقم الحساب" required>
                                                <?php if($errors->has('bank_account')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('bank_account')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                              
                                                <input type="text" class="form-control" name="address"  value="<?php echo e($user->address); ?>" placeholder=" مكان الإقامة" required>
                                                <?php if($errors->has('address')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('address')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- Start Col  -->
                                        <div class="col-12" >
                                            <div class="form-group">
                                              
                                                <textarea type="text" class="form-control" style="direction:rtl !important" name="cv_text" placeholder="السيرة الذاتية " required><?php echo e($user->cv_text); ?> </textarea>
                                                <?php if($errors->has('cv_text')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('cv_text')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                         <div class="col-12">
                                            <div class="form-group">
                                               
                                                <input type="text" class="form-control" name="username"  value="<?php echo e($user->username); ?>" placeholder="اسم المستخدم" required>
                                                <?php if($errors->has('username')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('username')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                            <div class="col-12">
                                            <div class="form-group">
                                               
                                                <input type="password" class="form-control" name="password" placeholder="كلمة السر" >
                                                <?php if($errors->has('password')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('password')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- End Col  -->
                                        <!-- Start Col  -->
                                        <div class="col-12">
                                            <div class="form-group">
                                             
                                                <input type="password" class="form-control" name="password_confirmation"   placeholder="تأكيد كلمة السر" >
                                                <?php if($errors->has('password_confirmation')): ?>
                                                    <p class="help-block"><small><?php echo e($errors->first('password_confirmation')); ?></small></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        </div>

       
            <div class="form-group">
                <input type="submit" class="btn btn-website" name="" value="حفظ ">
            </div>
          
        </div>

    </form>
</section>
<!-- End Jobs  -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>