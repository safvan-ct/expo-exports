<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>
    <meta name="title" content="Global Export Solutions | {{ config('app.name') }}">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Global Export Solutions">
    <meta property="og:description" content="">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Global Export Solutions">
    <meta property="twitter:description" content="">
    <meta property="twitter:image" content="{{ asset('img/logo.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('img/android-chrome-512x512.png') }}">
    <link rel="manifest" href="{{ asset('img/site.webmanifest') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}" />

    @php
        $seoData = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'EXPO-EXPORTS',
            'alternateName' => 'Global Export Solutions',
            'description' => '',
            'logo' => asset('img/logo.png'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $generalSettings['address'] ?? '',
                'addressLocality' => 'Palakkad',
                'addressRegion' => 'Kerala',
                'addressCountry' => 'India',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 25.2048,
                'longitude' => 55.2708,
            ],
            'url' => url('/'),
            'telephone' => '+' . $generalSettings['primary_phone'],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                    'opens' => '08:00',
                    'closes' => '20:00',
                ],
            ],
        ];
    @endphp

    <script type="application/ld-json">
        {!! json_encode($seoData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
    </script>
</head>

<body>
    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('web.index') }}">
                <img src="{{ asset('img/logo.png') }}" height="50" alt="{{ config('app.name') }}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.index') ? 'active' : '' }}"
                            href="{{ route('web.index') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.about') ? 'active' : '' }}"
                            href="{{ route('web.about') }}">
                            About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.products') ? 'active' : '' }}"
                            href="{{ route('web.products') }}">
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('web.services') ? 'active' : '' }}" href="#">
                            Services
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light ms-lg-3 px-4 {{ request()->routeIs('web.contact') ? 'active' : '' }}"
                            href="{{ route('web.contact') }}">
                            Contact Us
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="{{ route('web.index') }}">
                        <img class="mb-3" src="{{ asset('img/logo.png') }}" height="50" alt="{{ config('app.name') }}">
                    </a>
                    <p>
                        Expo Exports specializes in sourcing and exporting quality products worldwide. We focus on
                        international standards, efficient logistics, and long-term global partnerships.
                    </p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold mb-3">Contact Info</h5>
                    <p class="m-1">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Expo Exports,
                        Business Park, MG Road,<br>
                        Kochi, Kerala, India – 682016
                    </p>
                    <p class="m-1"><i class="fas fa-phone me-2"></i> +123 456 7890</p>
                    <p class="m-1"><i class="fas fa-envelope me-2"></i> info@expoexports.com</p>
                    <button class="btn btn-success btn-sm mt-2"><i class="fab fa-whatsapp me-1"></i> WhatsApp
                        Us</button>
                </div>

                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold mb-3">Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook me-2"></i></a>
                        <a href="#"><i class="fab fa-instagram me-2"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <hr>
            <p class="text-center mb-0">&copy; Expo Exports. All rights reserved.</p>
        </div>
    </footer>

    <div class="page-loader" id="pageLoader">
        <div class="uae-spinner"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
