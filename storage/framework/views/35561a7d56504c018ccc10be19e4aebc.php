<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnglishApp</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --primary: #1565c0; }
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; margin: 0; }
        nav { background: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .nav-links { display: flex; gap: 20px; align-items: center; }
        .nav-links a { text-decoration: none; color: #333; font-weight: 500; }
        .nav-links a:hover { color: var(--primary); }
        .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .btn { padding: 10px 20px; border-radius: 8px; border: none; cursor: pointer; color: white; background: var(--primary); text-decoration: none; display: inline-block; }
        input, select, textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .alert { padding: 15px; border-radius: 8px; margin-bottom: 20px; }
        .lang-switcher { display: flex; gap: 6px; align-items: center; }
        .lang-switcher a { padding: 4px 10px; border-radius: 5px; text-decoration: none; font-size: 13px; font-weight: 600; color: #555; border: 1px solid #ddd; background: #f8f9fa; }
        .lang-switcher a:hover, .lang-switcher a.active { background: var(--primary); color: white; border-color: var(--primary); }
    </style>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="/" style="font-weight:700; font-size:1.1em; color:var(--primary);">EnglishApp</a>
            <a href="/lessons/categories">📚 Lessons</a>
            <a href="/exercises">🎯 Exercises</a>
            <a href="/about">ℹ️ About</a>
            <a href="/faq">❓ FAQ</a>
            <a href="/contact">📩 Contact</a>
            <?php if(auth()->guard()->check()): ?>
                <a href="/profile"><?php echo e(__('app.nav_dashboard')); ?></a>
                <a href="/charts">📊 Charts</a>
                <?php if (\Illuminate\Support\Facades\Blade::check('role', 'student')): ?>
                    <a href="/progress"><?php echo e(__('app.nav_progress')); ?></a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="nav-links">
            <div class="lang-switcher">
                <a href="<?php echo e(route('lang.switch', 'en')); ?>" class="<?php echo e(app()->getLocale() == 'en' ? 'active' : ''); ?>">EN</a>
                <a href="<?php echo e(route('lang.switch', 'ru')); ?>" class="<?php echo e(app()->getLocale() == 'ru' ? 'active' : ''); ?>">RU</a>
                <a href="<?php echo e(route('lang.switch', 'kz')); ?>" class="<?php echo e(app()->getLocale() == 'kz' ? 'active' : ''); ?>">KZ</a>
            </div>
            <?php if(auth()->guard()->check()): ?>
                <span style="color:#666; font-size:14px;"><?php echo e(Auth::user()->name); ?></span>
                <a href="/logout" style="color:#dc3545;"><?php echo e(__('app.nav_logout')); ?></a>
            <?php else: ?>
                <a href="/login"><?php echo e(__('app.nav_login')); ?></a>
                <a href="/register"><?php echo e(__('app.nav_register')); ?></a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <?php if(session('success')): ?><div class="alert" style="background:#d4edda;color:#155724;"><?php echo e(session('success')); ?></div><?php endif; ?>
        <?php if(session('error')): ?><div class="alert" style="background:#f8d7da;color:#721c24;"><?php echo e(session('error')); ?></div><?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert" style="background:#f8d7da;color:#721c24;">
                <ul style="margin:0;padding-left:20px;"><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($e); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul>
            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/layouts/app.blade.php ENDPATH**/ ?>