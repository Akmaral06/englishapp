

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Edit Lesson</h2>

    <form action="/lessons/<?php echo e($lesson->id); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> 
        
        <div class="form-group"> <label>Title:</label>
            <input type="text" name="title" value="<?php echo e($lesson->title); ?>" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="5" required><?php echo e($lesson->content); ?></textarea>
        </div>

        <div class="form-group" style="margin-top: 15px;">
            <label>Update Document (Current: <?php echo e($lesson->file_path ?? 'None'); ?>):</label>
            <input type="file" name="document" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-success" style="margin-top: 20px;">Update Lesson</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\example-app\resources\views/lessons/edit.blade.php ENDPATH**/ ?>