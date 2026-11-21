<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng ký | Bếp Nhà</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="auth-page">
    <main class="auth-card">
        <a class="brand auth-brand" href="{{ route('home') }}">Bếp Nhà</a>

        <p class="eyebrow">THAM GIA CỘNG ĐỒNG</p>
        <h1>Tạo tài khoản</h1>
        <p class="auth-description">Đăng ký để chia sẻ công thức nấu ăn.</p>

        @if ($errors->any())
            <div class="auth-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('register.store') }}" class="auth-form">
            @csrf

            <label for="HOTEN">Họ và tên</label>
            <input
                id="HOTEN"
                type="text"
                name="HOTEN"
                value="{{ old('HOTEN') }}"
                maxlength="100"
                autocomplete="name"
                required
                autofocus
            >

            <label for="EMAIL">Email</label>
            <input
                id="EMAIL"
                type="email"
                name="EMAIL"
                value="{{ old('EMAIL') }}"
                maxlength="150"
                autocomplete="email"
                required
            >

            <label for="MATKHAU">Mật khẩu</label>
            <input
                id="MATKHAU"
                type="password"
                name="MATKHAU"
                autocomplete="new-password"
                required
            >

            <label for="MATKHAU_confirmation">Nhập lại mật khẩu</label>
            <input
                id="MATKHAU_confirmation"
                type="password"
                name="MATKHAU_confirmation"
                autocomplete="new-password"
                required
            >

            <button type="submit">Đăng ký</button>
        </form>

        <p class="auth-home-link">
            Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a>
        </p>
    </main>
</body>
</html>