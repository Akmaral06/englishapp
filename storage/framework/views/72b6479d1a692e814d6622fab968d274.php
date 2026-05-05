<?php $__env->startSection('content'); ?>

<div class="card">
    <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
        <a href="/lessons/categories" style="color:var(--primary); text-decoration:none; font-size:0.9em;"><?php echo e(__('app.back_lessons')); ?></a>
        <h1 style="color:var(--primary); margin:0;"><?php echo e(__('app.gram_title')); ?></h1>
    </div>
    <p style="color:#666; margin-top:10px;"><?php echo e(__('app.gram_desc')); ?></p>
</div>


<div class="card">
    <h2 style="color:var(--primary);">1. Basic Sentence Structure</h2>
    <p style="color:#555;">A basic English sentence follows this order: <strong>Subject + Verb + Object</strong></p>
    <div style="background:#e3f2fd; border-left:4px solid #1565c0; padding:15px; border-radius:0 8px 8px 0; margin-top:10px;">
        <p style="margin:5px 0; font-size:1.05em;">👤 <strong>I</strong> (Subject) &nbsp; 🏃 <strong>eat</strong> (Verb) &nbsp; 🍎 <strong>an apple</strong> (Object)</p>
        <p style="margin:5px 0; font-size:1.05em;">👤 <strong>She</strong> reads a book.</p>
        <p style="margin:5px 0; font-size:1.05em;">👤 <strong>They</strong> play football.</p>
    </div>
</div>


<div class="card">
    <h2 style="color:#4caf50;">2. Personal Pronouns</h2>
    <p style="color:#555; margin-bottom:15px;">Pronouns replace names of people or things:</p>
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:0.95em;">
            <thead>
                <tr style="background:#e8f5e9; text-align:left;">
                    <th style="padding:12px;">Pronoun</th>
                    <th style="padding:12px;">Meaning</th>
                    <th style="padding:12px;">Example</th>
                </tr>
            </thead>
            <tbody>
                <?php $pronouns = [
                    ['I','me (myself)','I am a student.'],
                    ['You','you','You are my friend.'],
                    ['He','a man / boy','He is tall.'],
                    ['She','a woman / girl','She is kind.'],
                    ['It','a thing or animal','It is a cat.'],
                    ['We','me + others','We are happy.'],
                    ['They','other people/things','They live here.'],
                ]; ?>
                <?php $__currentLoopData = $pronouns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="border-bottom:1px solid #eee;">
                    <td style="padding:12px; font-weight:bold; color:#1565c0;"><?php echo e($p[0]); ?></td>
                    <td style="padding:12px; color:#555;"><?php echo e($p[1]); ?></td>
                    <td style="padding:12px; font-style:italic; color:#333;"><?php echo e($p[2]); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


<div class="card">
    <h2 style="color:#ff9800;">3. The Verb "To Be" (am / is / are)</h2>
    <p style="color:#555; margin-bottom:15px;">This is the most important verb in English. Use it to describe things:</p>
    <div style="display:flex; gap:15px; flex-wrap:wrap;">
        <?php $tobe = [
            ['I','am','I am a beginner.','#1565c0'],
            ['He / She / It','is','She is happy.','#4caf50'],
            ['You / We / They','are','They are students.','#ff9800'],
        ]; ?>
        <?php $__currentLoopData = $tobe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="flex:1; min-width:180px; background:white; border:2px solid <?php echo e($t[3]); ?>; border-radius:10px; padding:15px; text-align:center;">
            <div style="font-size:1.1em; color:#555;"><?php echo e($t[0]); ?></div>
            <div style="font-size:2em; font-weight:bold; color:<?php echo e($t[3]); ?>;"><?php echo e($t[1]); ?></div>
            <div style="font-size:0.9em; font-style:italic; color:#777;"><?php echo e($t[2]); ?></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<div class="card">
    <h2 style="color:#9c27b0;">4. Asking Simple Questions</h2>
    <p style="color:#555; margin-bottom:10px;">To ask a question, move the verb <strong>before</strong> the subject:</p>
    <div style="background:#f3e5f5; padding:15px; border-radius:10px; line-height:2;">
        <p style="margin:4px 0;">✅ Statement: <em>She <strong>is</strong> a doctor.</em></p>
        <p style="margin:4px 0;">❓ Question: <em><strong>Is</strong> she a doctor?</em></p>
        <hr style="border:none; border-top:1px solid #ddd; margin:10px 0;">
        <p style="margin:4px 0;">✅ Statement: <em>You <strong>are</strong> ready.</em></p>
        <p style="margin:4px 0;">❓ Question: <em><strong>Are</strong> you ready?</em></p>
    </div>
</div>


<div class="card">
    <h2 style="color:#dc3545;">5. Negative Sentences</h2>
    <p style="color:#555; margin-bottom:10px;">Add <strong>not</strong> after "am / is / are" to make a negative:</p>
    <div style="background:#fff5f5; padding:15px; border-radius:10px; line-height:2;">
        <p style="margin:4px 0;">I am <strong style="color:#dc3545;">not</strong> tired. → I'm not tired.</p>
        <p style="margin:4px 0;">He is <strong style="color:#dc3545;">not</strong> here. → He isn't here.</p>
        <p style="margin:4px 0;">They are <strong style="color:#dc3545;">not</strong> late. → They aren't late.</p>
    </div>
</div>

<div class="card" style="background:#e8f5e9; text-align:center;">
    <h3 style="color:#2e7d32;"><?php echo e(__('app.gram_tip_title')); ?></h3>
    <p style="color:#555;"><?php echo e(__('app.gram_tip_text')); ?></p>
    <a href="/exercises" class="btn" style="background:#4caf50; margin-top:10px; font-size:1em;"><?php echo e(__('app.gram_go_ex')); ?></a>
</div>


<?php echo $__env->make('partials.teacher_lessons', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/lessons/grammar.blade.php ENDPATH**/ ?>