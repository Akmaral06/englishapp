
<?php $__env->startSection('content'); ?>
<div class="card" style="max-width: 600px; margin: auto;">
    <h2>Track Your Progress</h2>
    <form action="/progress" method="POST">
        <?php echo csrf_field(); ?>
        <label>Select the last lesson you finished:</label>
        <select name="lesson" required>
            <option value="" disabled selected>-- Choose Lesson --</option>
            <?php $__currentLoopData = $allLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($l); ?>" <?php echo e((isset($currentLesson) && $currentLesson == $l) ? 'selected' : ''); ?>><?php echo e($l); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button type="submit" class="btn" style="width: 100%; margin-top: 10px;">Show What's Next</button>
    </form>

    <?php if(isset($remaining)): ?>
        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 20px;">
            <h3>Remaining Lessons:</h3>
            <?php if(count($remaining) > 0): ?>
                <ul>
                    <?php $__currentLoopData = $remaining; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li style="padding: 5px 0; color: #d32f2f; font-weight: bold;"><?php echo e($r); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php else: ?>
                <p style="color: green; font-weight: bold;">🎉 You have completed all lessons!</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/progress.blade.php ENDPATH**/ ?>