
<?php $__env->startSection('content'); ?>
<div class="card" style="max-width: 400px; margin: auto;">
    <h2 style="text-align:center">Login</h2>
    <form action="/login" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn" style="width:100%">Sign In</button>
    </form>
    <p style="text-align:center; margin-top:15px;">
        New here? <a href="/register">Create an account</a>
    </p>

    <a href="<?php echo e(route('password.request')); ?>">Забыли пароль?</a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\example-app\resources\views/login.blade.php ENDPATH**/ ?>