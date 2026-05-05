<?php $__env->startSection('content'); ?>
<div class="card" style="max-width:400px; margin:auto;">
    <h2 style="text-align:center;"><?php echo e(__('app.login_title')); ?></h2>

    <?php if(session('message')): ?>
        <div class="alert" style="background:#f8d7da; color:#721c24; border-radius:8px; padding:12px; margin-bottom:15px;">
            ❌ <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <form action="/login" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="username" placeholder="<?php echo e(__('app.login_username')); ?>" required>
        <input type="password" name="password" placeholder="<?php echo e(__('app.login_password')); ?>" required>
        <button type="submit" class="btn" style="width:100%; margin-top:5px;"><?php echo e(__('app.login_submit')); ?></button>
    </form>
    <p style="text-align:center; margin-top:15px;">
        <?php echo e(__('app.login_no_acc')); ?> <a href="/register"><?php echo e(__('app.login_create')); ?></a>
    </p>
    <p style="text-align:center;">
        <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('app.login_forgot')); ?></a>
    </p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/login.blade.php ENDPATH**/ ?>