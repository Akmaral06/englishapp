<?php $__env->startSection('content'); ?>

<div class="card">
    <div style="display:flex; align-items:center; gap:15px; flex-wrap:wrap;">
        <a href="/lessons/categories" style="color:var(--primary); text-decoration:none; font-size:0.9em;"><?php echo e(__('app.back_lessons')); ?></a>
        <h1 style="color:var(--primary); margin:0;"><?php echo e(__('app.phrases_title')); ?></h1>
    </div>
    <p style="color:#666; margin-top:10px;"><?php echo e(__('app.phrases_desc')); ?></p>
</div>

<?php
$sections = [
    [
        'title' => '👋 Greetings & Farewells',
        'color' => '#1565c0',
        'bg' => '#e3f2fd',
        'phrases' => [
            ['Hello!', 'Привет!'],
            ['Hi there!', 'Привет!'],
            ['Good morning!', 'Доброе утро!'],
            ['Good afternoon!', 'Добрый день!'],
            ['Good evening!', 'Добрый вечер!'],
            ['Goodbye!', 'До свидания!'],
            ['See you later!', 'До скорого!'],
            ['Have a nice day!', 'Хорошего дня!'],
        ]
    ],
    [
        'title' => '😊 Polite Expressions',
        'color' => '#4caf50',
        'bg' => '#e8f5e9',
        'phrases' => [
            ['Please.', 'Пожалуйста.'],
            ['Thank you!', 'Спасибо!'],
            ['You\'re welcome.', 'Пожалуйста (ответ).'],
            ['Excuse me.', 'Извините.'],
            ['I\'m sorry.', 'Прошу прощения.'],
            ['No problem.', 'Не проблема.'],
        ]
    ],
    [
        'title' => '🤝 Introductions',
        'color' => '#9c27b0',
        'bg' => '#f3e5f5',
        'phrases' => [
            ['What is your name?', 'Как вас зовут?'],
            ['My name is...', 'Меня зовут...'],
            ['Nice to meet you!', 'Приятно познакомиться!'],
            ['Where are you from?', 'Откуда вы?'],
            ['I am from Kazakhstan.', 'Я из Казахстана.'],
            ['How old are you?', 'Сколько вам лет?'],
            ['I am ... years old.', 'Мне ... лет.'],
        ]
    ],
    [
        'title' => '🛒 Shopping',
        'color' => '#ff9800',
        'bg' => '#fff3e0',
        'phrases' => [
            ['How much does it cost?', 'Сколько это стоит?'],
            ['Can I have this, please?', 'Можно мне это?'],
            ['I would like to buy...', 'Я хотел бы купить...'],
            ['Do you have this in another size?', 'Есть ли другой размер?'],
            ['Can I pay by card?', 'Могу я заплатить картой?'],
            ['Here is the money.', 'Вот деньги.'],
            ['Do you have a receipt?', 'Есть ли чек?'],
        ]
    ],
    [
        'title' => '🗺️ Asking for Directions',
        'color' => '#0288d1',
        'bg' => '#e1f5fe',
        'phrases' => [
            ['Where is the...?', 'Где находится...?'],
            ['How do I get to...?', 'Как добраться до...?'],
            ['Turn left / right.', 'Поверните налево / направо.'],
            ['Go straight ahead.', 'Идите прямо.'],
            ['It is near here.', 'Это близко.'],
            ['I am lost.', 'Я заблудился.'],
            ['Can you help me?', 'Вы можете мне помочь?'],
        ]
    ],
    [
        'title' => '❓ Asking Questions',
        'color' => '#dc3545',
        'bg' => '#ffebee',
        'phrases' => [
            ['What is this?', 'Что это?'],
            ['Where?', 'Где?'],
            ['When?', 'Когда?'],
            ['Who?', 'Кто?'],
            ['Why?', 'Почему?'],
            ['How?', 'Как?'],
            ['Can you repeat, please?', 'Повторите, пожалуйста?'],
            ['I don\'t understand.', 'Я не понимаю.'],
            ['Do you speak Russian?', 'Вы говорите по-русски?'],
        ]
    ],
];
?>

<?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card">
    <h2 style="color:<?php echo e($section['color']); ?>; margin-bottom:15px;"><?php echo e($section['title']); ?></h2>
    <div style="display:flex; flex-direction:column; gap:8px;">
        <?php $__currentLoopData = $section['phrases']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phrase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="display:flex; align-items:center; gap:15px; background:<?php echo e($section['bg']); ?>;
                    padding:12px 16px; border-radius:8px;">
            <span style="flex:1; font-weight:600; color:<?php echo e($section['color']); ?>;"><?php echo e($phrase[0]); ?></span>
            <span style="color:#777; font-size:0.9em;"><?php echo e($phrase[1]); ?></span>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="card" style="background:#e8f5e9; text-align:center;">
    <h3 style="color:#2e7d32;"><?php echo e(__('app.phrases_tip')); ?></h3>
    <p style="color:#555;"><?php echo e(__('app.phrases_tip_t')); ?></p>
    <a href="/exercises" class="btn" style="background:#4caf50; margin-top:10px;"><?php echo e(__('app.phrases_go_ex')); ?></a>
</div>


<?php echo $__env->make('partials.teacher_lessons', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/lessons/phrases.blade.php ENDPATH**/ ?>