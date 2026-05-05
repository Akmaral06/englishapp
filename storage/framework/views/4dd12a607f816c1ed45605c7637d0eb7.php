<?php $__env->startSection('content'); ?>
<div class="card" style="max-width:450px; margin:auto;">
    <h2 style="text-align:center;"><?php echo e(__('app.reg_title')); ?></h2>
    <form action="/register" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="login" placeholder="<?php echo e(__('app.reg_username')); ?>" required>
        <input type="email" name="email" placeholder="<?php echo e(__('app.reg_email')); ?>" required>
        <input type="password" name="password" placeholder="<?php echo e(__('app.reg_password')); ?>" required>
        <select name="role" required>
            <option value="" disabled selected><?php echo e(__('app.reg_role')); ?>...</option>
            <option value="student"><?php echo e(__('app.reg_student')); ?></option>
            <option value="teacher"><?php echo e(__('app.reg_teacher')); ?></option>
        </select>
        <button type="submit" class="btn" style="width:100%; margin-top:5px;"><?php echo e(__('app.reg_submit')); ?></button>
    </form>
    <p style="text-align:center; margin-top:15px;">
        <?php echo e(__('app.reg_have_acc')); ?> <a href="/login"><?php echo e(__('app.reg_login_link')); ?></a>
    </p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/register.blade.php ENDPATH**/ ?>