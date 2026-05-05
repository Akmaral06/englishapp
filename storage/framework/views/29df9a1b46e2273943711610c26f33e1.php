
<?php $__env->startSection('content'); ?>
<div class="card" style="max-width: 450px; margin: auto;">
    <h2 style="text-align:center">Register</h2>
    <form action="/register" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="login" placeholder="Choose Username" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password (min 6)" required>
        <select name="role" required>
            <option value="student">I am a Student</option>
            <option value="teacher">I am a Teacher</option>
        </select>
        <button type="submit" class="btn" style="width:100%">Join Now</button>
    </form>
    <p style="text-align:center; margin-top:15px;">
        Already registered? <a href="/login">Login here</a>
    </p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\example-app\resources\views/register.blade.php ENDPATH**/ ?>