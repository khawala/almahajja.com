<form role="form" method="POST" action="<?php echo e(url('/login')); ?>">
    <?php echo e(csrf_field()); ?>

    <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?> has-feedback">
        <input type="text" class="form-control" placeholder="اسم المستخدم" name="username" value="<?php echo e(old('username')); ?>" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> has-feedback">
        <input type="password" class="form-control" name="password" placeholder="كلمه السر">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if($errors->has('password')): ?>
                <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
        <?php endif; ?>
    </div>
    <div class="hidden">
        <input type="checkbox" name="remember" checked>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary  btn-flat">تسجيل دخول</button>
    </div>
</form>