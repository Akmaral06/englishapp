

<?php $__env->startSection('content'); ?>
<div class="card" style="max-width: 400px; margin: auto;">
    <h2>Create New Password</h2>
    <form action="<?php echo e(route('password.update')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="token" value="<?php echo e($token); ?>">
        <input type="email" name="email" placeholder="Confirm Email" required>
        <input type="password" name="password" placeholder="New Password" required>
        <input type="password" name="password_confirmation" placeholder="Repeat Password" required>
        <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Update Password</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\example-app\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>