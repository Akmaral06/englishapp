<?php $__env->startSection('content'); ?>
<div class="card">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; flex-wrap:wrap; gap:10px;">
        <h2 style="margin:0;"><?php echo e(__('app.lessons_title')); ?></h2>
        <?php if (\Illuminate\Support\Facades\Blade::check('role', 'teacher')): ?>
            <a href="/lessons/create" class="btn" style="background:#4caf50;"><?php echo e(__('app.lessons_add')); ?></a>
        <?php endif; ?>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f8f9fa; border-bottom:2px solid #dee2e6; text-align:left;">
                <th style="padding:12px;"><?php echo e(__('app.lessons_col_title')); ?></th>
                <th style="padding:12px;"><?php echo e(__('app.lessons_col_author')); ?></th>
                <th style="padding:12px;"><?php echo e(__('app.lessons_col_status')); ?></th>
                <th style="padding:12px; text-align:right;"><?php echo e(__('app.lessons_col_actions')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style="border-bottom:1px solid #eee;">
                <td style="padding:12px;">
                    <a href="/lessons/<?php echo e($lesson->id); ?>" style="font-weight:bold; color:#1565c0; text-decoration:none;">
                        <?php echo e($lesson->title); ?>

                    </a>
                </td>
                <td style="padding:12px;"><?php echo e($lesson->user->name ?? 'System'); ?></td>
                <td style="padding:12px;">
                    <span style="font-size:11px; padding:4px 8px; border-radius:12px; color:white; background:<?php echo e($lesson->status == 'approved' ? '#28a745' : ($lesson->status == 'rejected' ? '#dc3545' : '#ffc107')); ?>">
                        <?php echo e(strtoupper($lesson->status)); ?>

                    </span>
                </td>
                <td style="padding:12px; text-align:right;">
                    <?php if (\Illuminate\Support\Facades\Blade::check('role', 'reviewer')): ?>
                        <?php if($lesson->status == 'pending'): ?>
                            <a href="/lessons/<?php echo e($lesson->id); ?>/approve" class="btn" style="padding:5px 10px; font-size:11px; background:#28a745;"><?php echo e(__('app.lessons_approve')); ?></a>
                            <a href="/lessons/<?php echo e($lesson->id); ?>/reject" class="btn" style="padding:5px 10px; font-size:11px; background:#ffc107; color:black;"><?php echo e(__('app.lessons_reject')); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(Auth::id() == $lesson->user_id): ?>
                        <a href="/lessons/<?php echo e($lesson->id); ?>/edit" class="btn" style="padding:5px 10px; font-size:11px; background:#007bff;"><?php echo e(__('app.lessons_edit')); ?></a>
                    <?php endif; ?>

                    <?php if(Auth::id() == $lesson->user_id || Auth::user()->hasRole('admin')): ?>
                        <form action="/lessons/<?php echo e($lesson->id); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Delete this lesson?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn" style="padding:5px 10px; font-size:11px; background:#dc3545;"><?php echo e(__('app.lessons_delete')); ?></button>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/lessons/index.blade.php ENDPATH**/ ?>