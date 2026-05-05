

<?php $__env->startSection('content'); ?>
<div class="card">
    <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom: 20px;">
        <h2>User Management</h2>
        <span style="background: #eee; padding: 5px 15px; border-radius: 20px; font-size: 14px;">
            Total Users: <?php echo e($users->count()); ?>

        </span>
    </div>

    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:#f8f9fa; border-bottom: 2px solid #dee2e6;">
                <th style="padding:12px;">Name</th>
                <th style="padding:12px;">Email</th>
                <th style="padding:12px;">Role</th>
                <th style="padding:12px; text-align:right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="padding:12px;"><?php echo e($user->name); ?></td>
                <td style="padding:12px;"><?php echo e($user->email); ?></td>
                <td style="padding:12px;">
                    <span style="background: #e3f2fd; color: #0d47a1; padding: 3px 10px; border-radius: 5px; font-size: 12px; font-weight: bold;">
                        <?php echo e(strtoupper($user->roles->pluck('name')->implode(', '))); ?>

                    </span>
                </td>
                <td style="padding:12px; text-align:right;">
                    <?php if($user->id !== Auth::id()): ?>
                        <form action="/admin/users/<?php echo e($user->id); ?>" method="POST" onsubmit="return confirm('Permanently delete this user?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn" style="background:#dc3545; padding:6px 15px; font-size:12px;">Delete User</button>
                        </form>
                    <?php else: ?>
                        <span style="color:#999; font-size:12px; font-style: italic;">Your Account</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/admin/users.blade.php ENDPATH**/ ?>