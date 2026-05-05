<?php $__env->startSection('content'); ?>
<div class="card">
    <div style="display:flex; align-items:center; gap:20px; flex-wrap:wrap;">
        
        <div style="flex-shrink:0;">
            <?php if(Auth::user()->avatar): ?>
                <img src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>"
                     alt="avatar"
                     style="width:80px;height:80px;border-radius:50%;object-fit:cover;border:3px solid var(--primary);">
            <?php else: ?>
                <div style="width:80px;height:80px;border-radius:50%;background:#1565c0;display:flex;align-items:center;justify-content:center;color:white;font-size:2em;font-weight:bold;">
                    <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                </div>
            <?php endif; ?>
        </div>
        <div>
            <h1 style="margin:0;"><?php echo e(__('app.profile_title')); ?>: <?php echo e(Auth::user()->name); ?></h1>
            <p style="margin:5px 0;"><?php echo e(__('app.profile_role')); ?>: <strong style="color:#1565c0;"><?php echo e(strtoupper(Auth::user()->roles->first()->name ?? 'No Role')); ?></strong></p>
        </div>
    </div>
    <hr style="margin:20px 0;">

    <div>
        <h3><?php echo e(__('app.profile_actions')); ?></h3>
        <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
            <a href="/lessons" class="btn" style="background:#6c757d;"><?php echo e(__('app.profile_view_lessons')); ?></a>
            <a href="/charts" class="btn" style="background:#17a2b8;">📊 Charts</a>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'teacher')): ?>
                <a href="/lessons/create" class="btn" style="background:#4caf50;"><?php echo e(__('app.profile_add_lesson')); ?></a>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                <a href="/admin/users" class="btn" style="background:#d32f2f;"><?php echo e(__('app.profile_manage_users')); ?></a>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
                <a href="/progress" class="btn" style="background:#1565c0;"><?php echo e(__('app.profile_progress')); ?></a>
            <?php endif; ?>

            <a href="/send-email" class="btn" style="background:#9c27b0;"><?php echo e(__('app.profile_email_btn')); ?></a>
            <button id="toggleUpload" class="btn" style="background:#ff9800;"><?php echo e(__('app.profile_upload_btn')); ?></button>
        </div>
    </div>

    <div id="uploadForm" style="display:none; margin-top:20px; padding:20px; background:#f8f9fa; border-radius:8px;">
        <h4><?php echo e(__('app.profile_upload_title')); ?></h4>
        <form action="/profile/upload-avatar" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <label style="font-weight:500;"><?php echo e(__('app.profile_upload_label')); ?></label>
            <input type="file" name="avatar" accept="image/*" required style="margin:10px 0;">
            <button type="submit" class="btn"><?php echo e(__('app.profile_upload_submit')); ?></button>
        </form>
    </div>
</div>

<?php if (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
<div class="card" style="margin-top:20px;">
    <h3><?php echo e(__('app.profile_activity')); ?></h3>
    <canvas id="myChart" style="max-height:200px;"></canvas>
</div>
<?php endif; ?>

<script>
$(document).ready(function(){
    $("#toggleUpload").click(function(){
        $("#uploadForm").slideToggle(400);
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    if(ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Study Minutes',
                    data: [30, 45, 15, 90, 40, 120, 60],
                    borderColor: '#1565c0',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(21,101,192,0.1)'
                }]
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/profile.blade.php ENDPATH**/ ?>