<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library Management</title>
    <style>
        :root {
            --bg: #f5f7fa;
            --surface: #ffffff;
            --surface-2: #f8fafc;
            --primary: #2f6bfb;
            --primary-dark: #1d53e0;
            --text: #1f2937;
            --subtext: #61748f;
            --border: #e2e8f0;
            --danger: #dc2626;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(160deg, #f2f6ff 0%, #e6ecf7 100%);
            color: var(--text);
            min-height: 100vh;
        }

        a { text-decoration: none; color: inherit; }

        .topbar {
            border-bottom: 1px solid var(--border);
            background: var(--surface);
            box-shadow: 0 2px 8px #00000008;
            margin-bottom: 1rem;
        }

        .topbar .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .brand {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--primary);
        }

        .nav{
            display:flex; gap:0.75rem; flex-wrap:wrap;
        }

        .nav a,
        .nav button {
            padding: 0.45rem 0.85rem;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            border: 1px solid transparent;
            background: transparent;
            color: var(--text);
            cursor: pointer;
            transition: all 160ms ease-in-out;
        }

        .nav a:hover,
        .nav button:hover { background: #e9efff; color: var(--primary-dark); }

        .nav .active { font-weight: 700; color: var(--primary-dark); }

        .btn {
            display:inline-flex; align-items:center; gap:0.4rem;
            border: none; border-radius: 0.5rem; padding: 0.6rem 1rem;
            font-size: 0.9rem; font-weight: 600; cursor:pointer;
            background: var(--primary); color: #fff;
        }

        .btn:hover { background: var(--primary-dark); }

        .container {
            width: min(1200px, calc(100% - 2rem));
            margin: 0 auto;
        }

        .card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: 0.75rem; padding: 1rem; margin-bottom: 1rem;
            box-shadow: 0 1px 2px #00000008;
        }

        .card h1, .card h2 { margin:0 0 0.75rem; }

        .table {
            width:100%; border-collapse: collapse; margin-top:0.75rem;
        }
        .table th, .table td {
            text-align:left; border-bottom:1px solid var(--border); padding:0.7rem 0.65rem;
        }
        .table th { color: var(--subtext); font-weight:600;}

        .form-grid { display:grid; gap:0.875rem; }
        .form-field { display:grid; gap:0.25rem; font-size:0.9rem; }
        .form-field input { padding:0.6rem 0.75rem; border-radius:0.55rem; border:1px solid var(--border); }

        .alert { border-radius:0.55rem; padding:0.8rem 0.9rem; font-size:0.91rem; margin-bottom:1rem; }
        .alert.success { background:#eff8f1; color:#0f5d3c; border:1px solid #b8e6ca; }
        .alert.error { background:#fff1f2; color:#9f1d1f; border:1px solid #f4c6c7; }

        .footer { margin-top:2rem; text-align:center; color:var(--subtext); font-size:0.82rem; }

        @media (max-width: 768px) {
            .topbar .container { flex-direction: column; align-items: flex-start; }
            .table th, .table td { font-size:0.85rem; }
        }
    </style>
</head>
<body>
    <header class="topbar">
        <div class="container">
            <a href="{{ url('/') }}" class="brand">📚 Library Management</a>
            <nav class="nav">
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('profile') }}">Profile</a>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}">Admin</a>
                    @endif
                    @if(auth()->user()->isAdmin() || auth()->user()->isLibrarian())
                        <a href="{{ route('members.index') }}">Members</a>
                        <a href="{{ route('books.index') }}">Books</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button class="nav" type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container">
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert error">
                <ul style="margin:0; padding-left:1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

        <div class="footer">Built with Laravel - Simple library management UI</div>
    </main>
</body>
</html>
