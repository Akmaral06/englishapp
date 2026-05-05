<?php $__env->startSection('content'); ?>

<div style="display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:50px 0; gap:20px;">
    <h1 style="font-size:3em; color:var(--primary); margin:0;"><?php echo e(__('app.home_title')); ?></h1>
    <p style="font-size:1.2em; color:#666; margin:0; max-width:600px;"><?php echo e(__('app.home_subtitle')); ?></p>

    <div style="display:flex; gap:15px; flex-wrap:wrap; justify-content:center; margin-top:10px;">
        <?php if(auth()->guard()->guest()): ?>
            <a href="/register" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none;"><?php echo e(__('app.home_cta')); ?></a>
            <a href="/login" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none; background:#4caf50;"><?php echo e(__('app.nav_login')); ?></a>
        <?php else: ?>
            <a href="/profile" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none;"><?php echo e(__('app.home_dashboard')); ?></a>
            <a href="/charts" class="btn" style="padding:15px 40px; font-size:1.1em; text-decoration:none; background:#6c757d;">📊 Charts</a>
        <?php endif; ?>
    </div>

    <div style="display:flex; gap:10px; margin-top:10px;">
        <button id="btnShowAd" class="btn" style="background:#fbc02d; color:#000; font-size:0.9em;"><?php echo e(__('app.ad_show')); ?></button>
        <button id="btnSlideAd" class="btn" style="background:#6c757d; font-size:0.9em;">Slide Toggle</button>
        <button id="btnAnimAd" class="btn" style="background:#9c27b0; font-size:0.9em;">Animate</button>
        <button id="btnStopAd" class="btn" style="background:#dc3545; font-size:0.9em;">Stop</button>
    </div>

    <div id="ad" style="margin-top:20px; padding:25px 40px; background:#fff9c4; border:2px dashed #fbc02d; border-radius:12px; display:none; max-width:500px; width:100%;">
        <h3 style="margin:0 0 10px; color:#e65100;"><?php echo e(__('app.ad_title')); ?></h3>
        <p style="color:#555; margin:0 0 15px;"><?php echo e(__('app.ad_text')); ?></p>
        <div style="display:flex; gap:10px; justify-content:center; flex-wrap:wrap;">
            <button id="hideAd" class="btn" style="background:#fbc02d; color:black;"><?php echo e(__('app.ad_close')); ?></button>
            <button id="fadeToAd" class="btn" style="background:#ff9800; color:white;">Fade to 30%</button>
            <button id="fadeFullAd" class="btn" style="background:#4caf50;">Fade to 100%</button>
        </div>
    </div>
</div>

<div style="display:flex; gap:20px; flex-wrap:wrap; justify-content:center; margin-top:20px;">
    <a href="/lessons/alphabet" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">🔤</div>
            <h3 style="color:var(--primary);"><?php echo e(__('app.cat_alphabet')); ?></h3>
            <p style="color:#666; font-size:0.9em;"><?php echo e(__('app.cat_alphabet_d')); ?></p>
        </div>
    </a>
    <a href="/lessons/grammar" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">📖</div>
            <h3 style="color:#4caf50;"><?php echo e(__('app.cat_grammar')); ?></h3>
            <p style="color:#666; font-size:0.9em;"><?php echo e(__('app.cat_grammar_d')); ?></p>
        </div>
    </a>
    <a href="/lessons/vocabulary" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">🗂️</div>
            <h3 style="color:#ff9800;"><?php echo e(__('app.cat_vocab')); ?></h3>
            <p style="color:#666; font-size:0.9em;"><?php echo e(__('app.cat_vocab_d')); ?></p>
        </div>
    </a>
    <a href="/lessons/phrases" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">💬</div>
            <h3 style="color:#9c27b0;"><?php echo e(__('app.cat_phrases')); ?></h3>
            <p style="color:#666; font-size:0.9em;"><?php echo e(__('app.cat_phrases_d')); ?></p>
        </div>
    </a>
    <a href="/exercises" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">🎯</div>
            <h3 style="color:#dc3545;"><?php echo e(__('app.ex_title')); ?></h3>
            <p style="color:#666; font-size:0.9em;"><?php echo e(__('app.ex_sub')); ?></p>
        </div>
    </a>
    <a href="/progress" style="flex:1; min-width:220px; max-width:280px; text-decoration:none;">
        <div class="card" style="text-align:center; height:100%;">
            <div style="font-size:2.5em;">📊</div>
            <h3 style="color:#1565c0;"><?php echo e(__('app.progress_title')); ?></h3>
            <p style="color:#666; font-size:0.9em;">Track your learning journey with detailed statistics.</p>
        </div>
    </a>
</div>

<script>
$(document).ready(function(){

    setTimeout(function(){
        $("#ad").fadeIn(1000);
    }, 2000);

    $("#hideAd").click(function(){
        $("#ad").hide(300);
    });

    $("#btnShowAd").click(function(){
        $("#ad").show(400);
    });

    $("#btnSlideAd").click(function(){
        if($("#ad").is(":visible")){
            $("#ad").slideUp(600);
        } else {
            $("#ad").slideDown(600);
        }
    });

    $("#fadeToAd").click(function(){
        $("#ad").fadeTo(800, 0.3);
    });

    $("#fadeFullAd").click(function(){
        $("#ad").fadeTo(800, 1.0);
    });

    $("#btnAnimAd").click(function(){
        $("#ad").stop(true).animate({
            paddingTop: "40px",
            paddingBottom: "40px",
            opacity: 0.85
        }, 700).animate({
            paddingTop: "25px",
            paddingBottom: "25px",
            opacity: 1
        }, 700);
    });

    $("#btnStopAd").click(function(){
        $("#ad").stop(true, true);
    });

});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/home.blade.php ENDPATH**/ ?>