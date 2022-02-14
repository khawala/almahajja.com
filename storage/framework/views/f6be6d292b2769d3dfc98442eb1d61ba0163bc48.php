<?php $__env->startSection('content'); ?>
<!-- Start Login Section  -->


<!-- Start Login Section  -->
<section class="login-sec">

    <form role="form" method="POST" action="<?php echo e(url('/login')); ?>">

        <?php echo csrf_field(); ?>
        <div class="inputs">

            <div class="form-group <?php echo e($errors->has('username') ? ' has-error' : ''); ?> has-feedback">
                <input type="text" class="form-control" name="username" placeholder="اسم المستخدم" value="<?php echo e(old('username')); ?>" required>
            </div>
            <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?> has-feedback">
                <input type="password" class="form-control" name="password" placeholder="كلمة المرور" value="<?php echo e(old('password')); ?>" required>

            </div>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <?php if($errors->has('password')): ?>
                <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
            <div class="form-group">
                <input type="submit" class="btn btn-website" name="" value="تسجيل دخول">
                      <hr>
            <a class="btn btn-website" href="<?php echo e(url('/register')); ?>">  تسجيل حساب جديد</a>
                          <hr>
            <a class="btn btn-website" href="<?php echo e(url('teacher/register')); ?>">  تسجيل حساب جديد كمعلم</a>
           
            </div>

            <div class="description">
                <p>
                    الموقع الرسمي لوقف المحجة البيضاء
                </p>
                <p>
                    جميع الحقوق محفوظة لوقف المحجة البيضاء 1443هـ/2021م
                </p>
            </div>
        </div>

    </form>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.new_default', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>