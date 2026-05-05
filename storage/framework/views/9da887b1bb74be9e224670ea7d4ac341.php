
<?php $__env->startSection('content'); ?>
<div style="text-align: center; padding: 50px 0;">
    <h1 style="font-size: 3.5em; color: var(--primary);">Learn English Fast & Easy</h1>
    <p style="font-size: 1.2em; color: #666;">The best platform for beginners to start their journey.</p>
    
    <div style="margin-top: 30px;">
        <?php if(auth()->guard()->guest()): ?>
            <a href="/register" class="btn" style="text-decoration: none; padding: 15px 40px; font-size: 1.2em;">Get Started for Free</a>
        <?php else: ?>
            <a href="/profile" class="btn" style="text-decoration: none; padding: 15px 40px; font-size: 1.2em;">Go to Dashboard</a>
        <?php endif; ?>
    </div>

    <div id="ad" style="margin-top: 50px; padding: 20px; background: #fff9c4; border: 2px dashed #fbc02d; border-radius: 10px; display: none;">
        <h3>🔥 Special Offer!</h3>
        <p>Premium grammar course is 50% OFF today!</p>
        <button id="hideAd" class="btn" style="background: #fbc02d; color: black;">Close</button>
    </div>
</div>

<script>
    $(document).ready(function(){
        // Эффект появления рекламы через 2 секунды
        setTimeout(function() {
            $("#ad").fadeIn(1000);
        }, 2000);

        $("#hideAd").click(function(){
            $("#ad").fadeOut();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\example-app\resources\views/home.blade.php ENDPATH**/ ?>