<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập | Bếp Nhà</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-page">
    <main class="auth-card">
        <a class="brand auth-brand" href="{{ route('home') }}">Bếp Nhà</a>

        <p class="eyebrow">CHÀO MỪNG BẠN TRỞ LẠI</p>
        <h1>Đăng nhập</h1>
        <p class="auth-description">Đăng nhập để chia sẻ và lưu lại công thức yêu thích.</p>

        @if ($errors->any())
            <div class="auth-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="auth-form">
            @csrf

            <label for="EMAIL">Email</label>
            <input
                id="EMAIL"
                type="email"
                name="EMAIL"
                value="{{ old('EMAIL') }}"
                autocomplete="username"
                required
                autofocus
            >

            <label for="MATKHAU">Mật khẩu</label>
            <input
                id="MATKHAU"
                type="password"
                name="MATKHAU"
                autocomplete="current-password"
                required
            >

            <button type="submit">Đăng nhập</button>
        </form>

        <a class="auth-home-link" href="{{ route('home') }}">Quay lại trang chủ</a>
        <p class="auth-home-link">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a>
</p>
    </main>
</body>
</html>