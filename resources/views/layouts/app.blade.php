<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="container">
    <aside class="sidebar">
        <h2 class="logo">Task Reminder</h2>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('manage.index') }}">Manajemen Tugas</a></li>
            <li><a href="/tasks">Pengingat Tugas</a></li>
            <li><a href="/forums">Forum</a></li>
            <li><a href="/notes">Catatan</a></li>

            <!-- MENU PROFILE -->
            <li><a href="{{ route('profile') }}">Profile Pengguna</a></li>
        </ul>
    </aside>

    <main class="content">
        @yield('content')
    </main>
</div>

</body>
</html>
