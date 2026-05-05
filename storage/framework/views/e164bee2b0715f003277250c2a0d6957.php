<form action="<?php echo e(route('password.email')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="email" name="email" placeholder="Введите ваш Email" required>
    <button type="submit">Отправить ссылку для сброса</button>
</form><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>