<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pengguna</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-card {
            width: 560px;
            background: #ffffff;
            border-radius: 32px;
            box-shadow: 0 50px 100px rgba(0, 0, 0, 0.08);
            padding: 48px;
            animation: fadeUp 0.6s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header */
        .profile-header {
            text-align: center;
            margin-bottom: 44px;
        }

        .avatar {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 700;
            color: #111827;
            margin: 0 auto 18px;
        }

        .profile-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .profile-header p {
            margin-top: 6px;
            font-size: 14px;
            color: #6b7280;
        }

        /* Info */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 18px;
            margin-bottom: 44px;
        }

        .info-box {
            padding: 18px 20px;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
            background: #ffffff;
        }

        .info-label {
            font-size: 12px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 15px;
            color: #111827;
            font-weight: 500;
        }

        /* Center Action */
        .action-center {
            text-align: center;
            margin-bottom: 28px;
        }

        .btn-logout {
            padding: 16px 48px;
            border-radius: 999px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            color: #111827;
        }

        .btn-logout:hover {
            background: #f9fafb;
            box-shadow: 0 14px 32px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .back-link {
            display: block;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
            color: #111827;
        }
    </style>
</head>
<body>

    <div class="profile-card">

        <!-- Header -->
        <div class="profile-header">
            <div class="avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <h1>{{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->email }}</p>
        </div>

        <!-- Info -->
        <div class="info-grid">
            <div class="info-box">
                <div class="info-label">Nama Lengkap</div>
                <div class="info-value">{{ Auth::user()->name }}</div>
            </div>

            <div class="info-box">
                <div class="info-label">Email</div>
                <div class="info-value">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <!-- Logout Center -->
        <div class="action-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">
                    Logout
                </button>
            </form>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">
            ← Kembali ke Dashboard
        </a>

    </div>

</body>
</html>
