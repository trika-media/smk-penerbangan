<div class="container py-5">
    <style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }
    .article-content p {
        margin-bottom: 1.5rem;
    }
    .article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 1.5rem 0;
    }
</style>
    <!-- Hero Image Section -->
    <div class="row mb-4">
        <div class="col-12">
            <img src="{{ $berita?->imageUrl() }}" class="img-fluid rounded shadow-lg w-100" 
                alt="{{ $berita?->title }}"
                style="height: 400px; object-fit: cover" />
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-12 col-lg-8">
            <article>
                <!-- Article Header -->
                <header class="mb-4">
                    <h1 class="display-5 fw-bold mb-3">{{ $berita?->title }}</h1>
                    <div class="text-muted">
                        <i class="bx bx-calendar"></i>
                        <small>{{ $berita?->created_at?->format('d F Y') }}</small>
                    </div>
                    <div class="text-muted">
                        <i class="bx bx-user"></i>
                        <small>Author : {{ $berita?->author }}</small>
                    </div>
                </header>

                <!-- Article Content -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="article-content">
                            {!! $berita?->konten !!}
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-12 col-lg-4">
            <h5 class="fw-bold mb-3">Berita Terkait</h5>
            <div class="d-flex flex-column gap-3">
                @foreach ($available_berita as $a)
                    <a href="{{ route('berita.detail', $a?->slug) }}" 
                       class="text-decoration-none">
                        <div class="card border-0 shadow-sm hover-shadow transition">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img style="height: 100px; object-fit: cover; width: 100%" 
                                         class="rounded-start"
                                         src="{{ $a?->imageUrl() }}" 
                                         alt="{{ $a?->title }}" />
                                </div>
                                <div class="col-8">
                                    <div class="card-body p-3">
                                        <h6 class="card-title text-dark mb-1 fw-semibold">
                                            {{ Str::limit($a?->title, 50) }}
                                        </h6>
                                        <small class="text-muted d-block">
                                            {{ Str::words(strip_tags($a?->konten), 15, '...') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>