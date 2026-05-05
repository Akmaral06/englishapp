<?php $__env->startSection('content'); ?>

<div class="card">
    <h1 style="color:var(--primary);"><?php echo e(__('app.faq_title')); ?></h1>
    <p style="color:#666;"><?php echo e(__('app.faq_sub')); ?></p>
</div>

<div class="card">
    <?php
    $faqs = [
        ['q' => 'Is EnglishApp completely free?',
         'a' => 'Yes! EnglishApp is 100% free to use. You can access all lessons, exercises, and track your progress without any payment.'],
        ['q' => 'Do I need any prior knowledge of English to start?',
         'a' => 'No, not at all. EnglishApp is designed for complete beginners. We start from the very basics — the alphabet, simple words, and short phrases.'],
        ['q' => 'How do I create an account?',
         'a' => 'Click the "Register" button at the top of the page. Fill in your username, email, and password, then choose whether you are a Student or Teacher. It takes less than a minute!'],
        ['q' => 'What lessons are available?',
         'a' => 'We offer lessons on the Alphabet, Basic Grammar, Vocabulary (everyday words), and Common Phrases. Each section has clear examples and explanations.'],
        ['q' => 'Can I track my learning progress?',
         'a' => 'Yes! Once you log in as a Student, you can access the Progress page where you can see how many lessons you have studied and your overall progress.'],
        ['q' => 'What are Exercises?',
         'a' => 'The Exercises page contains interactive tasks that help you practice what you have learned in the lessons — including vocabulary quizzes, alphabet practice, and phrase matching.'],
        ['q' => 'Can I switch the language of the website?',
         'a' => 'Yes! You can switch between English (EN), Russian (RU), and Kazakh (KZ) using the language buttons in the top navigation bar.'],
        ['q' => 'I forgot my password. What should I do?',
         'a' => 'Click "Forgot password?" on the login page, enter your email address, and we will send you a link to reset your password.'],
        ['q' => 'How do I contact support?',
         'a' => 'You can reach us through the Contact page. Fill in the form and we will get back to you as soon as possible.'],
        ['q' => 'Can teachers add new lessons?',
         'a' => 'Yes. If you register as a Teacher, you can create and submit new lessons. Lessons go through a review process before being published for students.'],
    ];
    ?>

    <div id="faqList">
        <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="border-bottom:1px solid #eee; padding:0;">
            <button onclick="toggleFaq(<?php echo e($i); ?>)"
                style="width:100%; text-align:left; background:none; border:none; padding:18px 10px; font-size:1em; font-weight:600; color:#333; cursor:pointer; display:flex; justify-content:space-between; align-items:center;">
                <span><?php echo e($faq['q']); ?></span>
                <span id="icon-<?php echo e($i); ?>" style="font-size:1.3em; color:var(--primary); transition:transform 0.3s;">+</span>
            </button>
            <div id="ans-<?php echo e($i); ?>" style="display:none; padding:0 10px 18px; color:#555; line-height:1.7;">
                <?php echo e($faq['a']); ?>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="card" style="text-align:center; background:#e3f2fd;">
    <h3 style="color:var(--primary);">Still have questions?</h3>
    <p style="color:#555; margin-bottom:15px;">Our support team is happy to help you.</p>
    <a href="/contact" class="btn">📩 Contact Us</a>
</div>

<script>
function toggleFaq(i) {
    var ans = document.getElementById('ans-' + i);
    var icon = document.getElementById('icon-' + i);
    if (ans.style.display === 'none') {
        ans.style.display = 'block';
        icon.textContent = '−';
        icon.style.transform = 'rotate(180deg)';
    } else {
        ans.style.display = 'none';
        icon.textContent = '+';
        icon.style.transform = 'rotate(0deg)';
    }
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/faq.blade.php ENDPATH**/ ?>