<?php $__env->startSection('content'); ?>
<div class="card" style="max-width: 500px; margin: auto;">
    <h2 style="text-align:center;"><?php echo e(__('app.email_title')); ?></h2>

    <form action="/send-email" method="POST">
        <?php echo csrf_field(); ?>
        <label><?php echo e(__('app.email_receiver')); ?></label>
        <input type="text" name="receiver" placeholder="<?php echo e(__('app.email_receiver')); ?>" required>

        <label><?php echo e(__('app.email_address')); ?></label>
        <input type="email" name="address" placeholder="example@mail.com" required>

        <button type="submit" class="btn" style="width:100%; margin-top:10px;">
            <?php echo e(__('app.email_submit')); ?>

        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/email/form.blade.php ENDPATH**/ ?>