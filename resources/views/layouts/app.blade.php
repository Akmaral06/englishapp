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

        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f7f6;
            margin: 0;
        }

        /* ===== NAV ===== */
        nav {
            background: white;
            padding: 0.8rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            flex-wrap: wrap;
            gap: 8px;
        }

        .nav-brand {
            font-weight: 700;
            font-size: 1.2em;
            color: var(--primary);
            text-decoration: none;
            flex-shrink: 0;
        }

        /* Hamburger button — скрыт на десктопе */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
        }
        .hamburger span {
            display: block;
            width: 25px;
            height: 2px;
            background: #333;
            border-radius: 2px;
            transition: all 0.3s;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .nav-links {
            display: flex;
            gap: 4px;
            align-items: center;
            flex-wrap: wrap;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 0.9em;
            padding: 6px 10px;
            border-radius: 6px;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .nav-links a:hover { color: var(--primary); background: #e3f2fd; }

        .lang-switcher { display: flex; gap: 4px; align-items: center; }
        .lang-switcher a {
            padding: 4px 9px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            color: #555;
            border: 1px solid #ddd;
            background: #f8f9fa;
        }
        .lang-switcher a:hover,
        .lang-switcher a.active { background: var(--primary); color: white; border-color: var(--primary); }

        /* ===== LAYOUT ===== */
        .container {
            max-width: 1000px;
            margin: 25px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            color: white;
            background: var(--primary);
            text-decoration: none;
            display: inline-block;
            font-size: 0.95em;
            transition: opacity 0.2s;
        }
        .btn:hover { opacity: 0.88; }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px; /* важно для iOS — предотвращает зум */
        }

        .alert { padding: 15px; border-radius: 8px; margin-bottom: 20px; }

        /* ===== MOBILE ===== */
        @media (max-width: 768px) {

            /* Навигация */
            nav {
                padding: 0.7rem 1rem;
                position: relative;
            }

            .nav-top-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
            }

            .hamburger {
                display: flex;
            }

            .nav-menu {
                display: none;
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
                padding-top: 10px;
                border-top: 1px solid #eee;
                margin-top: 8px;
                gap: 4px;
            }

            .nav-menu.open {
                display: flex;
            }

            .nav-links {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
                gap: 2px;
            }

            .nav-links a {
                width: 100%;
                padding: 10px 12px;
                font-size: 1em;
                border-radius: 8px;
            }

            .lang-switcher {
                padding: 6px 0;
            }

            /* Контент */
            .container {
                margin: 15px auto;
                padding: 0 12px;
            }

            .card {
                padding: 16px;
                border-radius: 10px;
            }

            h1 { font-size: 1.5em !important; }
            h2 { font-size: 1.25em !important; }
            h3 { font-size: 1.1em !important; }

            .btn {
                padding: 10px 16px;
                font-size: 0.9em;
            }

            /* Flex грид — столбиком на мобиле */
            .flex-row {
                flex-direction: column !important;
            }

            /* Таблицы */
            table {
                font-size: 0.85em;
            }

            /* Формы */
            input, select, textarea {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            h1 { font-size: 1.3em !important; }
            .card { padding: 14px; }
        }
    </style>
</head>
<body>
    <nav>
        <!-- Верхняя строка: лого + гамбургер -->
        <div class="nav-top-row">
            <a href="/" class="nav-brand">🎓 EnglishApp</a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Меню (скрывается на мобиле) -->
        <div class="nav-menu" id="navMenu">
            <div class="nav-links">
                <a href="/lessons/categories">📚 {{ __('app.nav_lessons') }}</a>
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

            <div class="nav-links" style="margin-top: 4px;">
                <div class="lang-switcher">
                    <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                    <a href="{{ route('lang.switch', 'ru') }}" class="{{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
                    <a href="{{ route('lang.switch', 'kz') }}" class="{{ app()->getLocale() == 'kz' ? 'active' : '' }}">KZ</a>
                </div>
                @auth
                    <span style="color:#666; font-size:14px; padding: 6px 10px;">{{ Auth::user()->name }}</span>
                    <a href="/logout" style="color:#dc3545;">{{ __('app.nav_logout') }}</a>
                @else
                    <a href="/login">{{ __('app.nav_login') }}</a>
                    <a href="/register" style="background: var(--primary); color: white; border-radius: 6px;">{{ __('app.nav_register') }}</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert" style="background:#d4edda;color:#155724;">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert" style="background:#f8d7da;color:#721c24;">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert" style="background:#f8d7da;color:#721c24;">
                <ul style="margin:0;padding-left:20px;">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <script>
        // Hamburger menu toggle
        const hamburger = document.getElementById('hamburger');
        const navMenu = document.getElementById('navMenu');

        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('open');
        });

        // Закрыть меню при клике на ссылку
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('open');
            });
        });
    </script>
</body>
</html>