<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>Bếp Nhà</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <header class="site-header">
        <div class="container nav-row">
            <a class="brand" href="{{ route('home') }}">Bếp Nhà</a>
            <a href="#cong-thuc">Công thức</a>
        </div>
    </header>

    <main>
        <section class="container hero">
            <p class="eyebrow">GÓC BẾP CỘNG ĐỒNG</p>
            <h1>Khám phá món ngon mỗi ngày</h1>

            <form class="filter-form" action="{{ route('home') }}" method="GET">
                <label>
                    Tên món
                    <input
                        type="search"
                        name="q"
                        value="{{ $filters['q'] ?? '' }}"
                        placeholder="Tìm kiếm..."
                    >
                </label>

                <label>
                    Danh mục
                    <select name="category">
                        <option value="">Tất cả danh mục</option>
                        @forelse ($categories as $category)
                            <option
                                value="{{ $category->MADANHMUC }}"
                                @selected(($filters['category'] ?? '') == $category->MADANHMUC)
                            >
                                {{ $category->TENDANHMUC }}
                            </option>
                        @empty
                            <option value="" disabled>Chưa có danh mục</option>
                        @endforelse
                    </select>
                </label>

                <label>
                    Thời gian tối đa
                    <input
                        type="number"
                        name="max_time"
                        min="1"
                        value="{{ $filters['max_time'] ?? '' }}"
                        placeholder="Ví dụ: 30"
                    >
                </label>

                <label>
                Độ khó
                <select name="difficulty">

                    <option value="Dễ" @selected(($filters['difficulty'] ?? '') === 'Dễ')>Dễ</option>
                    <option value="Trung bình" @selected(($filters['difficulty'] ?? '') === 'Trung bình')>Trung bình</option>
                    <option value="Khó" @selected(($filters['difficulty'] ?? '') === 'Khó')>Khó</option>
                </select>
                </label>

                <button type="submit">Lọc công thức</button>
                <a href="{{ route('home') }}">Xóa bộ lọc</a>
            </form>
        </section>

        <section class="container recipe-section" id="cong-thuc">
            <h2>Công thức đã được duyệt</h2>

            <div class="recipe-grid">
                @forelse ($recipes as $recipe)
                    <article class="recipe-card">
                        @if ($recipe->HINHANH)
                            <img
                                class="recipe-image"
                                src="{{ asset($recipe->HINHANH) }}"
                                alt="Ảnh {{ $recipe->TENCONGTHUC }}"
                            >
                        @else
                            <div class="recipe-image-placeholder">Chưa có ảnh</div>
                        @endif

                        <div class="recipe-content">
                            <p>{{ $recipe->category?->TENDANHMUC ?? 'Chưa có danh mục' }}</p>
                            <h3>{{ $recipe->TENCONGTHUC }}</h3>
                            <p>{{ $recipe->MOTA ?: 'Chưa có mô tả.' }}</p>
                            <p>
                                {{ $recipe->THOIGIANNAU }} phút
                                · Độ khó: {{ $recipe->DOKHO }}
                            </p>
                        </div>
                    </article>
                @empty
                    <p class="empty-state">
                        Chưa có công thức được duyệt. Hãy thử đổi bộ lọc hoặc quay lại sau.
                    </p>
                @endforelse
            </div>

            {{ $recipes->links() }}
        </section>
    </main>
</body>
</html>
