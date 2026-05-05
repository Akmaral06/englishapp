

<?php $__env->startSection('content'); ?>
<div class="card">
    <h1>Dashboard: <?php echo e(Auth::user()->name); ?></h1>
    <p>Your Role: <strong style="color:#1565c0;"><?php echo e(strtoupper(Auth::user()->roles->first()->name ?? 'No Role')); ?></strong></p>
    <hr style="margin: 20px 0;">

    <div style="margin-top:25px;">
        <h3>Available Actions:</h3>
        <div style="display:flex; gap:10px; flex-wrap: wrap;">
            <a href="/lessons" class="btn" style="background:#6c757d;">📚 View Lessons</a>
            
            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'teacher')): ?>
                <a href="/lessons/create" class="btn" style="background:#4caf50;">➕ Add New Lesson</a>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
                <a href="/admin/users" class="btn" style="background:#d32f2f;">👥 Manage Users</a>
            <?php endif; ?>

            <?php if (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
                <a href="/progress" class="btn" style="background:#1565c0;">📊 My Progress</a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
<div class="card" style="margin-top:20px;">
    <h3>My Learning Activity</h3>
    <canvas id="myChart" style="max-height: 200px;"></canvas>
</div>

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
                    tension: 0.1
                }]
            }
        });
    }
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\example-app\resources\views/profile.blade.php ENDPATH**/ ?>