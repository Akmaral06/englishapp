
<?php $__env->startSection('content'); ?>
<div class="card">
    <a href="/lessons">← Back</a>
    <h1><?php echo e($lesson->title); ?></h1>
    <p>Author: <?php echo e($lesson->user->name); ?> | Status: <?php echo e($lesson->status); ?></p>
    <hr>
    
    <div style="margin-top:20px; font-size:1.2rem;">
        <?php echo e($lesson->content); ?>

    </div>

    
    <?php if($lesson->file_path): ?>
        <div style="margin-top: 30px; padding: 15px; background: #e3f2fd; border-radius: 8px; border: 1px solid #bbdefb;">
            <h4 style="margin-top: 0;">Attached Document:</h4>
            <a href="<?php echo e(asset('storage/' . $lesson->file_path)); ?>" target="_blank" class="btn" style="background: #1976d2; text-decoration: none;">
                📎 Open/Download File
            </a>
            <p style="font-size: 0.8rem; color: #666; margin-top: 5px;">Path: <?php echo e($lesson->file_path); ?></p>
        </div>
    <?php else: ?>
        <div style="margin-top: 20px; color: #999; font-style: italic;">
            No documents attached to this lesson.
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\example-app\resources\views/lessons/show.blade.php ENDPATH**/ ?>