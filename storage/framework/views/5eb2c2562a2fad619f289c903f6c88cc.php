<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Learning App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --primary: #1565c0; }
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; margin: 0; }
        nav { background: white; padding: 1rem 2rem; display: flex; justify-content: space-between; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .nav-links { display: flex; gap: 20px; align-items: center; }
        .nav-links a { text-decoration: none; color: #333; font-weight: 500; }
        .container { max-width: 1000px; margin: 30px auto; padding: 0 20px; }
        .card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 20px; }
        .btn { padding: 10px 20px; border-radius: 8px; border: none; cursor: pointer; color: white; background: var(--primary); text-decoration: none; display: inline-block; }
        input, select, textarea { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 8px; box-sizing: border-box; }
        .alert { padding: 15px; border-radius: 8px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <nav>
        <div class="nav-links">
            <a href="/">EnglishApp</a>
            <?php if(auth()->guard()->check()): ?>
                <a href="/profile">Dashboard</a>
                <a href="/lessons">Lessons</a>
            <?php endif; ?>
        </div>
        <div class="nav-links">
            <?php if(auth()->guard()->check()): ?>
                <span><?php echo e(Auth::user()->name); ?></span>
                <a href="/logout" style="color: #dc3545;">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
                <a href="/register">Register</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <?php if(session('success')): ?> <div class="alert" style="background:#d4edda; color:#155724;"><?php echo e(session('success')); ?></div> <?php endif; ?>
        <?php if(session('error')): ?> <div class="alert" style="background:#f8d7da; color:#721c24;"><?php echo e(session('error')); ?></div> <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html><?php /**PATH D:\xam\htdocs\example-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>