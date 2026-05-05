<?php $__env->startSection('content'); ?>

<h2 style="text-align:center; margin-bottom:30px;"><?php echo e(__('app.charts_title')); ?></h2>

<div style="display:flex; flex-wrap:wrap; gap:25px; justify-content:center;">

    <div class="card" style="flex:1; min-width:280px; max-width:450px;">
        <h3 style="text-align:center; color:#1565c0; margin-bottom:15px;">📊 <?php echo e(__('app.charts_bar')); ?></h3>
        <canvas id="barChart" style="max-height:250px;"></canvas>
    </div>

    <div class="card" style="flex:1; min-width:280px; max-width:450px;">
        <h3 style="text-align:center; color:#1565c0; margin-bottom:15px;">🥧 <?php echo e(__('app.charts_pie')); ?></h3>
        <canvas id="pieChart" style="max-height:250px;"></canvas>
    </div>

    <div class="card" style="flex:1; min-width:280px; max-width:450px;">
        <h3 style="text-align:center; color:#1565c0; margin-bottom:15px;">🎯 <?php echo e(__('app.charts_polar')); ?></h3>
        <canvas id="polarChart" style="max-height:250px;"></canvas>
    </div>

    <div class="card" style="flex:1; min-width:280px; max-width:450px;">
        <h3 style="text-align:center; color:#1565c0; margin-bottom:15px;">📈 <?php echo e(__('app.charts_line')); ?></h3>
        <canvas id="lineChart" style="max-height:250px;"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        datasets: [{
            label: 'Lessons Completed',
            data: [5, 8, 3, 12, 7, 15, 9],
            backgroundColor: [
                'rgba(21,101,192,0.7)', 'rgba(21,101,192,0.7)',
                'rgba(21,101,192,0.7)', 'rgba(21,101,192,0.7)',
                'rgba(21,101,192,0.7)', 'rgba(76,175,80,0.8)',
                'rgba(76,175,80,0.8)'
            ],
            borderColor: '#1565c0',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
        labels: ['Students', 'Teachers', 'Reviewers', 'Admins'],
        datasets: [{
            data: [65, 20, 10, 5],
            backgroundColor: ['#1565c0','#4caf50','#fbc02d','#dc3545'],
            borderWidth: 2,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
    }
});

new Chart(document.getElementById('polarChart'), {
    type: 'polarArea',
    data: {
        labels: ['Grammar', 'Vocabulary', 'Speaking', 'Listening', 'Writing', 'Reading'],
        datasets: [{
            data: [80, 65, 45, 70, 55, 90],
            backgroundColor: [
                'rgba(21,101,192,0.6)',
                'rgba(76,175,80,0.6)',
                'rgba(251,192,45,0.6)',
                'rgba(220,53,69,0.6)',
                'rgba(111,66,193,0.6)',
                'rgba(23,162,184,0.6)'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'bottom' } }
    }
});

new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun'],
        datasets: [
            {
                label: 'Students',
                data: [10, 25, 40, 55, 72, 90],
                borderColor: '#1565c0',
                backgroundColor: 'rgba(21,101,192,0.1)',
                fill: true,
                tension: 0.4
            },
            {
                label: 'Lessons',
                data: [5, 15, 22, 38, 50, 70],
                borderColor: '#4caf50',
                backgroundColor: 'rgba(76,175,80,0.1)',
                fill: true,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: { legend: { position: 'top' } },
        scales: { y: { beginAtZero: true } }
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/charts.blade.php ENDPATH**/ ?>