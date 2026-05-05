<?php $__env->startSection('content'); ?>

<div class="card">
    <h1 style="color:var(--primary);"><?php echo e(__('app.ex_title')); ?></h1>
    <p style="color:#666;"><?php echo e(__('app.ex_sub')); ?></p>
</div>

<div style="display:flex; gap:8px; flex-wrap:wrap; margin-bottom:20px;">
    <?php $tabs = [
        ['id'=>'alphabet','label'=>'🔤 Alphabet','color'=>'#1565c0'],
        ['id'=>'vocab','label'=>'🗂️ Vocabulary','color'=>'#ff9800'],
        ['id'=>'grammar','label'=>'📖 Grammar','color'=>'#4caf50'],
        ['id'=>'phrases','label'=>'💬 Phrases','color'=>'#9c27b0'],
    ]; ?>
    <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <button onclick="showTab('<?php echo e($tab['id']); ?>')" id="tab-<?php echo e($tab['id']); ?>"
        style="padding:10px 20px; border:2px solid <?php echo e($tab['color']); ?>; border-radius:8px; cursor:pointer;
               font-weight:600; background:white; color:<?php echo e($tab['color']); ?>; font-size:0.95em; transition:all 0.2s;">
        <?php echo e($tab['label']); ?>

    </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div id="ex-alphabet" class="ex-section">
    <div class="card">
        <h2 style="color:#1565c0;">🔤 Alphabet Quiz — What letter is this?</h2>
        <p style="color:#666;">Pick the correct letter name for each symbol shown.</p>
        <div id="alphaScore" style="font-weight:bold; color:#1565c0; margin-bottom:10px;"></div>
        <?php
        $alphaQ = [
            ['letter'=>'A','options'=>['Ay','Bee','Cee','Dee'],'correct'=>0],
            ['letter'=>'H','options'=>['Gee','Aitch','Jay','El'],'correct'=>1],
            ['letter'=>'W','options'=>['Vee','You','Double-U','Ex'],'correct'=>2],
            ['letter'=>'Z','options'=>['Why','Zee','Ess','Em'],'correct'=>1],
            ['letter'=>'G','options'=>['Jay','Kay','Gee','Eff'],'correct'=>2],
        ];
        ?>
        <?php $__currentLoopData = $alphaQ; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qi => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="background:#f0f4ff; border-radius:10px; padding:18px; margin-bottom:15px;">
            <p style="font-weight:600; font-size:1.1em;"><?php echo e($qi+1); ?>. What is the name of the letter <strong style="font-size:1.6em; color:#1565c0;"><?php echo e($q['letter']); ?></strong>?</p>
            <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <?php $__currentLoopData = $q['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oi => $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button onclick="checkAlpha(this, <?php echo e($qi); ?>, <?php echo e($oi); ?>, <?php echo e($q['correct']); ?>)"
                    style="padding:10px 20px; border:2px solid #1565c0; border-radius:8px; background:white;
                           color:#1565c0; font-size:0.95em; cursor:pointer; font-weight:600;">
                    <?php echo e($opt); ?>

                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div id="alpha-result-<?php echo e($qi); ?>" style="margin-top:8px; font-weight:600;"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div id="ex-vocab" class="ex-section" style="display:none;">
    <div class="card">
        <h2 style="color:#ff9800;">🗂️ Vocabulary Quiz — Match the word</h2>
        <p style="color:#666;">Choose the correct English word for each picture/description.</p>
        <?php
        $vocabQ = [
            ['q'=>'🍎 This is a fruit, it is red or green.','options'=>['Apple','Bread','Milk','Chair'],'correct'=>0],
            ['q'=>'🐱 This is an animal that says "meow".','options'=>['Dog','Cat','Bird','Fish'],'correct'=>1],
            ['q'=>'📚 You read this. It has many pages.','options'=>['Phone','Table','Book','Window'],'correct'=>2],
            ['q'=>'☀️ This is a bright star in the sky during the day.','options'=>['Moon','Cloud','Sun','Star'],'correct'=>2],
            ['q'=>'👨 The male parent in a family.','options'=>['Mother','Sister','Brother','Father'],'correct'=>3],
        ];
        ?>
        <?php $__currentLoopData = $vocabQ; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qi => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="background:#fff8f0; border-radius:10px; padding:18px; margin-bottom:15px;">
            <p style="font-weight:600; font-size:1.05em;"><?php echo e($qi+1); ?>. <?php echo e($q['q']); ?></p>
            <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <?php $__currentLoopData = $q['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oi => $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button onclick="checkVocab(this, <?php echo e($qi); ?>, <?php echo e($oi); ?>, <?php echo e($q['correct']); ?>)"
                    style="padding:10px 20px; border:2px solid #ff9800; border-radius:8px; background:white;
                           color:#ff9800; font-size:0.95em; cursor:pointer; font-weight:600;">
                    <?php echo e($opt); ?>

                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div id="vocab-result-<?php echo e($qi); ?>" style="margin-top:8px; font-weight:600;"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div id="ex-grammar" class="ex-section" style="display:none;">
    <div class="card">
        <h2 style="color:#4caf50;">📖 Grammar Quiz — Fill in the blank</h2>
        <p style="color:#666;">Choose the correct word to complete each sentence.</p>
        <?php
        $gramQ = [
            ['q'=>'I ___ a student.','options'=>['am','is','are','be'],'correct'=>0],
            ['q'=>'She ___ my sister.','options'=>['am','are','is','be'],'correct'=>2],
            ['q'=>'They ___ happy today.','options'=>['am','is','are','was'],'correct'=>2],
            ['q'=>'___ you from Kazakhstan?','options'=>['Am','Is','Are','Be'],'correct'=>2],
            ['q'=>'He is ___ tired.','options'=>['very','many','much','more'],'correct'=>0],
        ];
        ?>
        <?php $__currentLoopData = $gramQ; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qi => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="background:#f0fff4; border-radius:10px; padding:18px; margin-bottom:15px;">
            <p style="font-weight:600; font-size:1.05em;"><?php echo e($qi+1); ?>. <?php echo e($q['q']); ?></p>
            <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <?php $__currentLoopData = $q['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oi => $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button onclick="checkGram(this, <?php echo e($qi); ?>, <?php echo e($oi); ?>, <?php echo e($q['correct']); ?>)"
                    style="padding:10px 20px; border:2px solid #4caf50; border-radius:8px; background:white;
                           color:#4caf50; font-size:0.95em; cursor:pointer; font-weight:600;">
                    <?php echo e($opt); ?>

                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div id="gram-result-<?php echo e($qi); ?>" style="margin-top:8px; font-weight:600;"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div id="ex-phrases" class="ex-section" style="display:none;">
    <div class="card">
        <h2 style="color:#9c27b0;">💬 Phrases Quiz — What do you say?</h2>
        <p style="color:#666;">Choose the correct phrase for each situation.</p>
        <?php
        $phraseQ = [
            ['q'=>'You meet someone for the first time. You say:','options'=>['Goodbye!','Nice to meet you!','I am sorry.','Thank you!'],'correct'=>1],
            ['q'=>'You want to know the price of something. You ask:','options'=>['Where is it?','Who is this?','How much does it cost?','When?'],'correct'=>2],
            ['q'=>'Someone helps you. You say:','options'=>['Excuse me.','Thank you!','I don\'t understand.','Goodbye!'],'correct'=>1],
            ['q'=>'You do not understand something. You say:','options'=>['I am fine.','Nice day!','I don\'t understand.','See you later!'],'correct'=>2],
            ['q'=>'You want to say good morning:','options'=>['Good night!','Good morning!','See you!','Bye!'],'correct'=>1],
        ];
        ?>
        <?php $__currentLoopData = $phraseQ; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qi => $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="background:#fdf0ff; border-radius:10px; padding:18px; margin-bottom:15px;">
            <p style="font-weight:600; font-size:1.05em;"><?php echo e($qi+1); ?>. <?php echo e($q['q']); ?></p>
            <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <?php $__currentLoopData = $q['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oi => $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button onclick="checkPhrase(this, <?php echo e($qi); ?>, <?php echo e($oi); ?>, <?php echo e($q['correct']); ?>)"
                    style="padding:10px 20px; border:2px solid #9c27b0; border-radius:8px; background:white;
                           color:#9c27b0; font-size:0.95em; cursor:pointer; font-weight:600;">
                    <?php echo e($opt); ?>

                </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div id="phrase-result-<?php echo e($qi); ?>" style="margin-top:8px; font-weight:600;"></div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<script>
function showTab(id) {
    document.querySelectorAll('.ex-section').forEach(el => el.style.display = 'none');
    document.getElementById('ex-' + id).style.display = 'block';
}

function markAnswer(btn, container, isCorrect, resultId) {
    btn.closest('div').querySelectorAll('button').forEach(b => b.disabled = true);
    var result = document.getElementById(resultId);
    if (isCorrect) {
        btn.style.background = '#28a745'; btn.style.borderColor = '#28a745'; btn.style.color = 'white';
        result.innerHTML = '✅ Correct!'; result.style.color = '#28a745';
    } else {
        btn.style.background = '#dc3545'; btn.style.borderColor = '#dc3545'; btn.style.color = 'white';
        result.innerHTML = '❌ Not quite — try the next one!'; result.style.color = '#dc3545';
    }
}

function checkAlpha(btn, qi, oi, correct) { markAnswer(btn, null, oi===correct, 'alpha-result-'+qi); }
function checkVocab(btn, qi, oi, correct) { markAnswer(btn, null, oi===correct, 'vocab-result-'+qi); }
function checkGram(btn, qi, oi, correct)  { markAnswer(btn, null, oi===correct, 'gram-result-'+qi); }
function checkPhrase(btn, qi, oi, correct){ markAnswer(btn, null, oi===correct, 'phrase-result-'+qi); }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/exercises.blade.php ENDPATH**/ ?>