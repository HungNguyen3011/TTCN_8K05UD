<header class="site-header">
    <div class="site-nav">
        <a class="site-brand" href="{{ route('home') }}">
            <span class="brand-mark">B</span>
            <span class="brand-name">BẾP NHÀ</span>
        </a>

        <nav class="site-nav-links">
            <a class="active" href="{{ route('home') }}">Khám phá</a>
            <a href="{{ route('home') }}#bo-loc">Danh mục</a>

            @guest
                <a href="{{ route('login') }}">Chia sẻ công thức</a>
            @else
                <a href="{{ route('home') }}#cong-thuc">Chia sẻ công thức</a>
            @endguest
        </nav>

        <form class="site-search" action="{{ route('home') }}" method="GET">
            <span aria-hidden="true">⌕</span>
            <input
                type="search"
                name="q"
                value="{{ request('q') }}"
                placeholder="Tìm món ăn, nguyên liệu..."
                aria-label="Tìm món ăn, nguyên liệu"
            >
        </form>

        <div class="site-nav-actions">
            @guest
                <a class="nav-button nav-login" href="{{ route('login') }}">Đăng nhập</a>
                <a class="nav-button nav-register" href="{{ route('register') }}">Đăng ký</a>
            @else
                <a class="nav-button nav-saved" href="{{ route('home') }}#cong-thuc">
                    ♡ Đã lưu
                </a>

                <details class="account-menu">
                    <summary aria-label="Mở tài khoản">
                        {{ mb_strtoupper(mb_substr(auth()->user()->HOTEN, 0, 1)) }}
                    </summary>
                    <div class="account-dropdown">
                        <strong>{{ auth()->user()->HOTEN }}</strong>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Đăng xuất</button>
                        </form>
                    </div>
                </details>
            @endguest
        </div>
    </div>
</header>