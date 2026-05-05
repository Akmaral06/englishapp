<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
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
            @auth
                <a href="/profile">{{ __('app.nav_dashboard') }}</a>
                <a href="/charts">📊 Charts</a>
                @role('student')
                    <a href="/progress">{{ __('app.nav_progress') }}</a>
                @endrole
            @endauth
        </div>
        <div class="nav-links">
            <div class="lang-switcher">
                <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                <a href="{{ route('lang.switch', 'ru') }}" class="{{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
                <a href="{{ route('lang.switch', 'kz') }}" class="{{ app()->getLocale() == 'kz' ? 'active' : '' }}">KZ</a>
            </div>
            @auth
                <span style="color:#666; font-size:14px;">{{ Auth::user()->name }}</span>
                <a href="/logout" style="color:#dc3545;">{{ __('app.nav_logout') }}</a>
            @else
                <a href="/login">{{ __('app.nav_login') }}</a>
                <a href="/register">{{ __('app.nav_register') }}</a>
            @endauth
        </div>
    </nav>
    <div class="container">
        @if(session('success'))<div class="alert" style="background:#d4edda;color:#155724;">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="alert" style="background:#f8d7da;color:#721c24;">{{ session('error') }}</div>@endif
        @if($errors->any())
            <div class="alert" style="background:#f8d7da;color:#721c24;">
                <ul style="margin:0;padding-left:20px;">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
