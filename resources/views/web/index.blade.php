@extends('layouts.web')

@section('content')
    <!-- Hero Section -->
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide hero-slide bg-amer">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 hero-text-content">
                            <span class="badge mb-3">GDRFA AUTHORIZED</span>
                            <h1 class="display-3 fw-bold">Amer <span class="text-gold">Visa</span> Services</h1>
                            <p class="lead">Complete residency, entry permit, and visa status solutions with rapid
                                processing times.</p>
                            <div class="hero-btns">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultantModal"
                                    data-source="hero_callback" class="btn btn-primary-hero">Book Now</a>
                                <a href="{{ route('web.about') }}" class="btn btn-outline-hero">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block text-center">
                            <i class="bi bi-passport hero-large-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide hero-slide bg-tasheel">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 hero-text-content">
                            <span class="badge mb-3">MOHRE SERVICES</span>
                            <h1 class="display-3 fw-bold">Tasheel <span class="text-gold">Labour</span> Card</h1>
                            <p class="lead">Professional management of work permits, labour contracts, and corporate
                                compliance.</p>
                            <div class="hero-btns">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultantModal"
                                    data-source="hero_callback" class="btn btn-primary-hero">Book Now</a>
                                <a href="{{ route('web.about') }}" class="btn btn-outline-hero">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block text-center">
                            <i class="bi bi-briefcase hero-large-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide hero-slide bg-ejari">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 hero-text-content">
                            <span class="badge mb-3">REAL ESTATE SERVICES</span>
                            <h1 class="display-3 fw-bold">Instant <span class="text-gold">Ejari</span> Registration</h1>
                            <p class="lead">Register your tenancy contracts officially with the Dubai Land Department in
                                minutes.</p>
                            <div class="hero-btns">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultantModal"
                                    data-source="hero_callback" class="btn btn-primary-hero">Book Now</a>
                                <a href="{{ route('web.about') }}" class="btn btn-outline-hero">Learn More</a>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block text-center">
                            <i class="bi bi-house-check hero-large-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="swiper-pagination"></div>
        <div class="hero-nav-next"><i class="bi bi-chevron-right"></i></div>
        <div class="hero-nav-prev"><i class="bi bi-chevron-left"></i></div>
    </div>

    <!-- News Ticker -->
    <div class="news-ticker-container">
        <div class="ticker-label">
            <span class="pulse-dot"></span>
            <span class="label-text">UPDATES</span>
        </div>

        <div class="ticker-wrap">
            <div class="ticker-move">
                <div class="ticker-item">
                    <span class="ticker-icon">⚡</span>
                    <span class="ticker-text">New Visa Regulations 2025: Fast track processing now available for 15+
                        countries!</span>
                </div>
                <div class="ticker-item">
                    <span class="ticker-icon">🌍</span>
                    <span class="ticker-text">Special discounts on European Student Visas for a limited time only.</span>
                </div>
                <div class="ticker-item">
                    <span class="ticker-icon">🛂</span>
                    <span class="ticker-text">Passport renewal services now integrated into our mobile app.</span>
                </div>
                <div class="ticker-item">
                    <span class="ticker-icon">⭐</span>
                    <span class="ticker-text">Over 10,000 successful visa approvals reached this month!</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Services -->
    <section class="client-carousel-section pt-5 {{ $posters->isEmpty() ? 'd-none' : '' }}">
        <div class="container">
            <div class="row text-center mb-2">
                <div class="col-12">
                    <h2 class="section-heading text-center">
                        <span class="section-heading-underline fw-bold text-uppercase">Our Services</span>
                    </h2>
                    <p class="text-muted">Professional solutions for all your UAE documentation needs</p>
                </div>
            </div>

            <div class="swiper PosterSwiper pb-5">
                <div class="swiper-wrapper">
                    @foreach ($posters as $poster)
                        <div class="swiper-slide">
                            <div class="service-poster-card shadow-sm">
                                <div class="poster-image-wrapper">
                                    <img src="{{ $poster->image_src }}" alt="{{ $poster->name }}" class="service-img">

                                    <div class="poster-overlay">
                                        <button class="creative-booking-btn" data-bs-toggle="modal"
                                            data-bs-target="#consultantModal" data-source="poster_callback">
                                            <i class="bi bi-calendar-check me-2"></i>BOOK NOW
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-nav-container">
                    <div class="swiper-button-prev custom-nav"></div>
                    <div class="swiper-button-next custom-nav"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Creative Hero Banner -->
    <div class="container">
        <div class="creative-hero-banner overflow-hidden rounded-4 shadow-lg position-relative">
            <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=1470"
                alt="Dubai Skyline" class="banner-img">
            <div class="banner-overlay"></div>

            <div class="row g-0 position-relative" style="z-index: 5;">
                <div class="col-lg-7 p-3 p-md-5 d-flex flex-column justify-content-center">
                    <div class="badge-wrapper mb-3">
                        <span class="creative-badge">
                            <span class="pulse-icon"></span> AUTHORIZED SERVICE PROVIDER
                        </span>
                    </div>

                    <h1 class="hero-title mb-3">
                        Expert Immigration & <br>
                        <span class="text-gradient">Emirates ID</span> Services
                    </h1>

                    <p class="hero-desc mb-0 mb-md-4">
                        Fast-track your residency with premium typing and document processing.
                        We handle the complex paperwork while you focus on your future.
                    </p>

                    <div class="row g-3 mb-4 d-none d-md-flex">
                        <div class="col-6 col-md-6">
                            <div class="service-pill"><i class="bi bi-patch-check"></i> New Visa</div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="service-pill"><i class="bi bi-card-heading"></i> ID Renewal</div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="service-pill"><i class="bi bi-heart-pulse"></i> Medical</div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="service-pill"><i class="bi bi-trophy"></i> Golden Visa</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 p-3 p-md-5 d-flex align-items-center justify-content-center bg-glass-mobile">
                    <div class="cta-floating-card p-3 p-md-4">
                        <div class="text-center">
                            <h4 class="fw-bold mb-1">Apply Online</h4>
                            <p class="small opacity-75">Processing in 24-48 Hours</p>
                            <hr class="border-white opacity-25">
                            <div class="price-tag my-3">
                                <span class="d-block small opacity-50">Starting From</span>
                                <span class="h2 fw-bold text-gold">AED 199</span>
                            </div>
                            <button class="btn btn-creative-gold w-100 mb-3" data-bs-toggle="modal"
                                data-bs-target="#consultantModal">
                                BOOK NOW <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                            <div class="d-flex justify-content-center gap-3 x-small">
                                <span><i class="bi bi-shield-lock"></i> Secure</span>
                                <span><i class="bi bi-headset"></i> 24/7 Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Authorized Services -->
    <div class="container py-4 py-md-5">
        <div class="row text-center mb-0">
            <div class="col-12">
                <h2 class="section-heading text-center">
                    <span class="section-heading-underline fw-bold text-uppercase">Authorized Services</span>
                </h2>
            </div>
        </div>

        <div class="swiper AuthorizedSwiper py-4">
            <div class="swiper-wrapper">
                @foreach ($govtCenters as $item)
                    <div class="swiper-slide h-auto">
                        <div class="gov-creative-card center-{{ $item->slug }}">
                            <div class="card-bg-decoration"></div>

                            <div class="card-content">
                                <div class="gov-badge">Authorized</div>
                                <h3 class="mt-3">{{ $item->name }}</h3>
                                <p class="tagline">{{ $item->tagline }}</p>

                                <div class="service-preview">
                                    <span class="dot"></span> Official Support
                                </div>

                                <a href="{{ route('web.center-details', $item->slug) }}" class="gov-action-btn">
                                    <span>Explore Services</span>
                                    <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination gov-pagination"></div>
        </div>
    </div>

    <!-- Labor Services -->
    <section class="labor-hero-section">
        <div class="hero-bg-overlay"></div>
        <img src="https://images.unsplash.com/photo-1541976590-713941681591?q=80&w=1470&auto=format&fit=crop"
            class="hero-img" alt="UAE Labor">

        <div class="container h-100 position-relative" style="z-index: 5;">
            <div class="row h-100 align-items-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="glass-service-card">
                        <div class="accent-line"></div>

                        <div class="card-body-content p-4 p-md-5">
                            <div class="auth-badge mb-3">
                                <i class="bi bi-patch-check-fill text-primary-uae"></i>
                                <span>MOHRE AUTHORIZED CENTER</span>
                            </div>

                            <h1 class="labor-hero-title mb-4">
                                Labour & Work <br>
                                <span class="labor-text-gradient">Contract Services</span>
                            </h1>

                            <div class="creative-labor-list">
                                <div class="labor-item">
                                    <div class="labor-icon"><i class="bi bi-file-earmark-medical"></i></div>
                                    <div class="labor-text">
                                        <h6>Offer Letter</h6>
                                        <p>Fast-track processing & legal submission</p>
                                    </div>
                                </div>
                                <div class="labor-item">
                                    <div class="labor-icon"><i class="bi bi-person-badge"></i></div>
                                    <div class="labor-text">
                                        <h6>Labour Card</h6>
                                        <p>New applications & seamless renewals</p>
                                    </div>
                                </div>
                                <div class="labor-item">
                                    <div class="labor-icon"><i class="bi bi-shield-lock"></i></div>
                                    <div class="labor-text">
                                        <h6>WPS Solutions</h6>
                                        <p>Wage Protection System compliance</p>
                                    </div>
                                </div>
                            </div>

                            <button class="btn-labor-action mt-4" data-bs-toggle="modal"
                                data-bs-target="#consultantModal">
                                <span>BOOK SERVICE NOW</span>
                                <i class="bi bi-arrow-right-short"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-none d-lg-block">
                    <div class="hero-visual-container">
                        <div class="floating-info-card card-top shadow-lg">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-circle bg-success-light">
                                    <i class="bi bi-check-lg"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 fw-bold">100% Success</h5>
                                    <p class="small text-muted mb-0">Contract Compliance</p>
                                </div>
                            </div>
                        </div>

                        <div class="main-graphic-box shadow-lg">
                            <div class="inner-content">
                                <i class="bi bi-shield-lock-fill display-4 text-primary-uae mb-3"></i>
                                <h4>UAE Labour Law <br>Expert Guidance</h4>
                                <p class="small opacity-75">We ensure all your corporate and domestic labour files are
                                    processed according to the latest 2025 MOHRE regulations.</p>
                                <div class="row g-2 mt-3">
                                    <div class="col-6"><span class="badge-mini"><i class="bi bi-zap-fill"></i>
                                            Express</span></div>
                                    <div class="col-6"><span class="badge-mini"><i class="bi bi-shield-fill"></i>
                                            Secure</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="floating-info-card card-bottom shadow-lg">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-circle bg-warning-light">
                                    <i class="bi bi-headset"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0 fw-bold">24/7 Status</h5>
                                    <p class="small text-muted mb-0">Track your application</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Specialized Services -->
    <section class="service-section pt-5">
        <div class="container">

            <div class="row mb-3">
                <div class="col-lg-8">
                    <h6 class="text-success fw-bold text-uppercase mb-2" style="letter-spacing: 1px; font-size: 0.8rem;">
                        Solutions
                    </h6>
                    <h2 class="fw-bold display-6 text-uppercase custom-underline">
                        Our Specialized Services
                    </h2>
                    <p class="text-muted">
                        Simplified document processing and liaison services across the UAE.
                    </p>
                </div>
            </div>

            <div class="row g-3">
                @foreach ($services as $item)
                    <div class="col-md-6">
                        <a href="{{ route('web.service-details', $item->slug) }}" class="service-link-wrapper">
                            <div class="service-strip">
                                <div class="d-flex align-items-center">
                                    <div class="strip-icon-box">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </div>
                                    <div class="strip-info">
                                        <h5>{{ $item->name }}</h5>
                                        <p>{{ $item->tagline }}</p>
                                    </div>
                                </div>
                                <div class="strip-chevron">
                                    <i class="bi bi-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <x-web.cta-banner />
        </div>
    </section>

    <!-- Visa Ad Banner -->
    @php
        $visaAds = [
            [
                'badge' => 'HOLIDAY SPECIAL',
                'title' => 'Global Visa Services',
                'desc' =>
                    'Get your Tourist, Business, or Work Visa processed in record time. Professional assistance for over 50+ countries.',
                'img' => 'https://images.unsplash.com/photo-1544016768-982d1554f0b9?auto=format&fit=crop&q=80&w=1200',
                'price' => '299.00',
                'features' => ['99% Success Rate', '24/7 Support', 'No Hidden Fees'],
            ],
            [
                'badge' => 'UAE RESIDENCY',
                'title' => 'UAE Golden Visa',
                'desc' => 'Secure your 10-year residency. Specialist assistance for investors and professionals.',
                'img' =>
                    'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&q=80&w=1200',
                'price' => '499.00',
                'features' => ['VIP Processing', 'Family Sponsorship'],
            ],
            [
                'badge' => 'CORPORATE',
                'title' => 'Business & Work Visas',
                'desc' => 'Global business entry visas and work permits for companies and entrepreneurs.',
                'img' =>
                    'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1200',
                'price' => '750.00',
                'features' => ['PRO Services', 'Bulk Processing'],
            ],
        ];
    @endphp
    <div class="container py-4 py-md-5">
        <div class="swiper VisaAdSwiper">
            <div class="swiper-wrapper">

                @foreach ($visaAds as $item)
                    <div class="swiper-slide">
                        <div class="visa-ad-banner position-relative overflow-hidden rounded-4 shadow-lg">
                            <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="banner-bg">

                            <div class="row g-0 align-items-center position-relative h-100 banner-content">
                                <div class="col-lg-7 p-3 p-md-5 text-white">
                                    <span class="badge bg-warning text-dark mb-3 px-3 py-2 rounded-pill fw-bold">
                                        {{ $item['badge'] }}
                                    </span>
                                    <h2 class="display-5 fw-bold mb-3">{{ $item['title'] }}</h2>
                                    <p class="lead mb-2 mb-md-4">{{ $item['desc'] }}</p>

                                    <ul class="list-unstyled d-flex flex-wrap gap-2 mb-0 mb-md-4 visa-features">
                                        @foreach ($item['features'] as $feature)
                                            <li><i class="bi bi-check-circle-fill text-info"></i> {{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-lg-5 p-3 p-md-4 text-center">
                                    <div class="glass-cta p-2 p-md-4 rounded-4">
                                        <h4 class="text-white mb-2">Starts At</h4>
                                        <div class="price-tag display-6 fw-bold text-warning mb-3">
                                            AED {{ $item['price'] }}
                                        </div>
                                        <button class="btn btn-light btn-lg w-100 rounded-pill fw-bold shadow hover-grow"
                                            data-bs-toggle="modal" data-bs-target="#consultantModal"
                                            data-source="visa_ad_callback">
                                            BOOK NOW <i class="bi bi-arrow-right-short"></i>
                                        </button>
                                        <p class="text-white-50 mt-3 small">
                                            *T&C Apply. Processing time varies by service.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination visa-pagination"></div>
        </div>
    </div>

    <!-- Our Clients -->
    <section class="py-4 bg-white">
        <x-web.clients :partners="$partners" />
    </section>
@endsection

@push('scripts')
    <script>
        new Swiper('.heroSwiper', {
            loop: true,
            effect: 'fade', // Smooth transition for Hero
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.hero-nav-next',
                prevEl: '.hero-nav-prev',
            }
        });

        new Swiper('.PosterSwiper', {
            loop: true,
            spaceBetween: 20,

            breakpoints: {
                0: {
                    slidesPerView: 1, // mobile
                },
                768: {
                    slidesPerView: 3, // desktop
                }
            },

            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        new Swiper('.AuthorizedSwiper', {
            loop: true,
            spaceBetween: 20,

            breakpoints: {
                0: {
                    slidesPerView: 1, // mobile
                },
                768: {
                    slidesPerView: 3, // desktop
                }
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }
        });

        const visaSwiper = new Swiper('.VisaAdSwiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
            effect: 'fade', // Optional: Use 'slide' or 'fade'
            fadeEffect: {
                crossFade: true
            },
        });
    </script>
@endpush
