@extends('layouts.web')

@section('title', 'Home')

@section('content')
    <header class="swiper heroSwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $item)
                <div class="swiper-slide hero-section"
                    style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ $item->image_src }}');">
                    <div class="container text-center text-white">
                        <h1 class="display-3 fw-bold mb-4">{{ $item->title }}</h1>
                        <p class="lead mb-5">{{ $item->description }}</p>
                        <div class="dropdown">
                            <a href="{{ route('web.products') }}" class="btn btn-quote btn-lg px-5" type="button">
                                View Products
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
        <div class="swiper-pagination"></div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ $about['home_about_image'] ? asset('storage/' . $about['home_about_image']) : 'https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1469' }}"
                        alt="Shipping" class="img-fluid split-image">
                </div>
                <div class="col-md-6 ps-md-5">
                    <h2 class="fw-bold mb-4">{{ $about['home_about_heading'] }}</h2>
                    <p class="fs-5 italic">"{{ $about['home_about_desc'] }}"</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-3">
        <div class="container text-center">
            <h2 class="mb-4 fw-bold">Why Choose Us</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-globe-americas fa-3x"></i>
                        </div>
                        <h4>Global Reach</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-check-circle fa-3x"></i>
                        </div>
                        <h4>Quality Assurance</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-shipping-fast fa-3x"></i>
                        </div>
                        <h4>On-Time Delivery</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-box-open fa-3x"></i>
                        </div>
                        <h4>Secure Packing</h4>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="icon-box mb-3">
                            <i class="fas fa-handshake fa-3x"></i>
                        </div>
                        <h4>Trusted Partners</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $countries = [
            'us' => 'USA',
            'ae' => 'UAE',
            'gb' => 'UK',
            'mv' => 'Maldives',
            'es' => 'Spain',
        ];
    @endphp

    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Countries We Export To</h2>
            <div class="row g-4 justify-content-center">
                @foreach ($countries as $key => $item)
                    <div class="col-6 col-md-2">
                        <div class="p-3 border rounded shadow-sm h-100">
                            <img src="https://flagcdn.com/{{ $key }}.svg" width="60" alt="{{ $item }}"
                                class="mb-2">
                            <p class="fw-bold mb-0">{{ $item }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5" id="products">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold">Our Export Portfolio</h2>
                <p class="">High-quality products sourced directly from the best farms and manufacturers.</p>

                <ul class="nav nav-pills justify-content-center mt-3" id="productTabs" role="tablist">
                    @foreach ($categories as $index => $category)
                        <li class="nav-item" role="presentation">
                            <button class="me-1 btn btn-outline-dark {{ $index === 0 ? 'active' : '' }} text-white"
                                id="tab-{{ $category->id }}" data-bs-toggle="pill"
                                data-bs-target="#pane-{{ $category->id }}" type="button" role="tab">
                                {{ $category->name }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content">
                @foreach ($categories as $index => $category)
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="pane-{{ $category->id }}"
                        role="tabpanel">

                        <div class="row g-4">
                            @foreach ($category->products as $item)
                                <div class="col-md-4 col-lg-3">
                                    <div class="card h-100 shadow-sm product-card">
                                        <div class="product-img-container">
                                            <img src="{{ $item->image_src }}" class="card-img-top"
                                                alt="{{ $item->name }}">
                                        </div>

                                        <div class="card-body">
                                            <span class="badge bg-dark mb-2 ">{{ $category->name }} </span>
                                            <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                                            <p class="card-text text-muted small">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if ($clientReviews->count() > 0)
        <section class="py-5">
            <div class="container">
                <h2 class="text-center fw-bold mb-4">What Our Customers Say</h2>
                <div class="row g-4">
                    @foreach ($clientReviews as $item)
                        @php
                            $string = $item->name;
                            $words = explode(' ', $string);
                            $acronym = '';

                            foreach ($words as $word) {
                                $acronym .= strtoupper($word[0]);
                            }
                        @endphp

                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100 p-3">
                                <div class="card-body d-flex flex-column">

                                    <!-- Rating -->
                                    <div class="text-warning mb-2">
                                        @for ($i = 0; $i < $item->rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor

                                        @for ($i = $item->rating; $i < 5; $i++)
                                            <i class="far fa-star"></i>
                                        @endfor
                                    </div>

                                    <!-- Comment -->
                                    <p class="card-text text-muted">"{{ $item->comment }}"</p>

                                    <!-- Push footer to bottom -->
                                    <div class="mt-auto">
                                        <hr>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-navy rounded-circle text-white me-3"
                                                style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #001f3f;">
                                                {{ $acronym }}
                                            </div>
                                            <h6 class="mb-0">
                                                {{ $item->name }}, {{ $item->location }}
                                            </h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection

@push('scripts')
    <script>
        const swiper = new Swiper('.heroSwiper', {
            loop: true,
            effect: 'fade', // Smooth professional fade for B2B websites
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },

            // Pagination (Dots)
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            // Navigation (Arrows)
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
