<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <meta name="title" content="Expert Government & Corporate Services in UAE | {{ config('app.name') }}">
    <meta name="description"
        content="Authorized provider for UAE Visa services, Golden Visa assistance, MOHRE, and Amer services. Fast-track document processing and corporate PRO solutions in Dubai.">
    <meta name="keywords"
        content="UAE Visa, Golden Visa Dubai, PRO Services UAE, Amer Center Services, MOHRE services, Business Setup Dubai, Document Clearing">
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="robots" content="index, follow">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Expert Government & Corporate Services in UAE">
    <meta property="og:description"
        content="Get your Tourist, Business, or Golden Visa processed in record time with our authorized PRO services.">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Expert Government & Corporate Services in UAE">
    <meta property="twitter:description"
        content="Authorized provider for UAE Visa services and corporate PRO solutions.">
    <meta property="twitter:image" content="{{ asset('img/logo.png') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('img/android-chrome-512x512.png') }}">
    <link rel="manifest" href="{{ asset('img/site.webmanifest') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.13.3/build/css/intlTelInput.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet" href="{{ asset('web/css/custom.css') }}" />

    @php
        $seoData = [
            '@context' => 'https://schema.org',
            '@type' => 'GovernmentService',
            'name' => 'AL-AQSA',
            'alternateName' => 'UAE Visa & PRO Services',
            'description' => 'Authorized provider for UAE Golden Visa, Business Setup, and Corporate PRO services.',
            'logo' => asset('img/logo.png'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $generalSettings['address'] ?? '',
                'addressLocality' => 'Dubai',
                'addressRegion' => 'Dubai',
                'addressCountry' => 'AE',
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
    <!-- TOP BAR -->
    <div class="top-bar d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="social-icons">
                <a href="{{ $generalSettings['facebook'] ?? '#' }}" target="_blank"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="{{ $generalSettings['twitter'] ?? '#' }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                <a href="{{ $generalSettings['instagram'] ?? '#' }}" target="_blank"><i
                        class="fab fa-instagram"></i></a>
                <a href="{{ $generalSettings['linkedin'] ?? '#' }}" target="_blank"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>

            <div class="top-contact">
                <a href="tel:+{{ $generalSettings['primary_phone'] ?? '' }}">
                    <i class="fas fa-phone-alt"></i>
                    {{ formatUaePhone($generalSettings['primary_phone'] ?? '') }}
                </a>
                <a href="mailto:{{ $generalSettings['email'] ?? '' }}">
                    <i class="fas fa-envelope"></i>
                    {{ $generalSettings['email'] ?? '' }}
                </a>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header class="main-header sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-xl">

                <!-- LOGO -->
                <a href="{{ route('web.index') }}" class="navbar-brand">
                    <img src="{{ asset('img/logo.png') }}" alt="logo" class="logo-img">
                </a>

                <!-- TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- MENU -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('web.index') ? 'active' : '' }}"
                                aria-current="page"href="{{ route('web.index') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('web.about') ? 'active' : '' }}"
                                href="{{ route('web.about') }}">
                                About Us
                            </a>
                        </li>

                        @php $service = isset($service) ? $service : null; @endphp
                        @foreach ($sharedMenus as $menu)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ $menu->id == $service?->menu_id ? 'active' : '' }}"
                                    href="javascript:void(0)" id="navbarServicesDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $menu->name }}
                                </a>

                                @php
                                    $govtCenters = $menu->governmentCenters->map(function ($item) {
                                        $item->is_government_center = true;
                                        return $item;
                                    });

                                    $centerServices = $menu->centerServices->map(function ($item) {
                                        $item->is_government_center = false;
                                        return $item;
                                    });

                                    $items = $govtCenters->merge($centerServices);

                                    $useTwoColumns = $items->count() > 6;
                                @endphp

                                <ul class="dropdown-menu {{ $useTwoColumns ? 'dropdown-2cols' : '' }}">
                                    @foreach ($items as $item)
                                        @if ($item->is_government_center)
                                            @if ($item->centerServices->isEmpty())
                                                <li>
                                                    <a class="dropdown-item {{ $item->slug == $service?->slug ? 'active' : '' }}"
                                                        href="{{ route('web.center-details', $item->slug) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </li>
                                            @else
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item {{ $item->slug == $service?->slug ? 'active' : '' }}"
                                                        href="#" id="navbarBusinessSubDropdown" role="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{ $item->name }}
                                                        <i class="fas fa-chevron-right sub-arrow"
                                                            style="line-height: 1.7;"></i>
                                                    </a>

                                                    @php
                                                        $innerUseTwoColumns = $item->centerServices->count() > 6;
                                                    @endphp

                                                    <ul class="dropdown-menu submenu {{ $innerUseTwoColumns ? 'dropdown-2cols' : '' }}"
                                                        aria-labelledby="navbarBusinessSubDropdown">
                                                        @foreach ($item->centerServices as $cs)
                                                            <li>
                                                                <a class="dropdown-item {{ $cs->slug == $service?->slug ? 'active' : '' }}"
                                                                    href="{{ route('web.service-details', $cs->slug) }}">
                                                                    {{ $cs->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @else
                                            <li>
                                                <a class="dropdown-item {{ $item->slug == $service?->slug ? 'active' : '' }}"
                                                    href="{{ route('web.service-details', $item->slug) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('web.contact') ? 'active' : '' }}"
                                href="{{ route('web.contact') }}">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item ms-lg-3 mt-2">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultantModal"
                                data-source="navbar_callback" class="btn btn-gradient">
                                Book a Consultation!
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="text-center text-lg-start pt-4">
        <div class="container text-white">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase border-bottom border-danger pb-2 mb-3">About Us</h5>
                    <p class="text-white-50">{{ $generalSettings['about_us'] }}</p>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase border-bottom border-danger pb-2 mb-3">Useful Services</h5>
                    <ul class="list-unstyled mb-0">
                        @foreach ($usefulLinks as $item)
                            <li>
                                <a href="{{ route('web.service-details', $item->slug) }}">
                                    {{ $item->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase border-bottom border-danger pb-2 mb-3">Address</h5>
                    <p class="mb-1 text-white-50">Main Office: {{ $generalSettings['address'] ?? '' }}</p>
                    <p class="mb-1 text-white-50">
                        Email:
                        <a href="mailto:{{ $generalSettings['email'] ?? '' }}">
                            {{ $generalSettings['email'] ?? '' }}
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase border-bottom border-danger pb-2 mb-3">Drop Us A Line</h5>
                    <p class="mb-1 fw-bold">Call Us Now!</p>
                    <p class="mb-1">
                        <a href="tel:+{{ $generalSettings['primary_phone'] ?? '' }}">
                            {{ formatUaePhone($generalSettings['primary_phone'] ?? '') }}
                        </a>
                    </p>
                    <p class="mb-1">
                        <a href="tel:+{{ $generalSettings['secondary_phone'] ?? '' }}">
                            {{ formatUaePhone($generalSettings['secondary_phone'] ?? '') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center p-2 mt-3" style="background-color: rgba(0, 0, 0, 0.2);">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>

    <a href="https://wa.me/{{ $generalSettings['whatsapp'] }}?text={{ urlencode($generalSettings['whatsapp_message']) }}"
        target="_blank" class="whatsapp-float" aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <div class="page-loader" id="pageLoader">
        <div class="uae-spinner"></div>
    </div>

    <!-- Consultant Modal -->
    <div class="modal fade" id="consultantModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 overflow-hidden rounded-4 shadow-lg">

                <div class="row g-0">
                    <div class="col-lg-5 d-none d-lg-block modal-sidebar">
                        <div class="p-5 text-white h-100 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="fw-bold mb-3">Quick Booking</h3>
                                <p class="opacity-75">Your visa and document processing simplified. Our experts are
                                    ready to
                                    assist you.</p>
                            </div>

                            <div class="contact-info-list">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-clock-history me-3 fs-4"></i>
                                    <span>Fast Track: 24-48 hrs</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-shield-check me-3 fs-4"></i>
                                    <span>GDRFA Authorized</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 bg-white">
                        <div class="modal-header border-0 pb-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-2 px-md-5 pt-0">
                            <h2 class="fw-bold text-dark mb-4">Service Request</h2>

                            <form id="consultantForm" method="POST" action="{{ route('consultant.store') }}">
                                @csrf

                                <input type="hidden" name="opened_from" id="openedFrom"
                                    value="{{ old('opened_from') }}">
                                <input type="hidden" name="phone" id="phone_full" value="{{ old('phone') }}">

                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-uppercase text-muted">Full Name</label>
                                    <div class="input-group-custom">
                                        <i class="bi bi-person"></i>
                                        <input type="text" class="form-control" placeholder="Enter your name"
                                            required name="name" value="{{ old('name') }}"
                                            @error('name') autofocus @enderror>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label small fw-bold text-uppercase text-muted">Email
                                            Address</label>
                                        <div class="input-group-custom">
                                            <i class="bi bi-envelope"></i>
                                            <input type="email" class="form-control" placeholder="name@company.com"
                                                name="email" value="{{ old('email') }}" required
                                                @error('email') autofocus @enderror>
                                            @error('email')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label small fw-bold text-muted">PHONE NUMBER</label>
                                        <input type="tel" id="phone"
                                            class="form-control bg-light border-0 py-2 @error('phone') is-invalid @enderror"
                                            value="{{ old('phone') }}" required placeholder="00 000 0000"
                                            @error('phone') autofocus @enderror style="width: 100%;" />
                                        @error('phone')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-uppercase text-muted">Message / Service
                                        Details</label>
                                    <div class="input-group-custom align-items-start">
                                        <i class="bi bi-chat-left-text mt-2"></i>
                                        <textarea class="form-control @error('message') is-invalid @enderror" rows="4"
                                            placeholder="Describe the service you need..." name="message" required @error('message') autofocus @enderror>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-submit-booking w-100 py-3 rounded-3 shadow">
                                    CONFIRM BOOKING <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.13.3/build/js/intlTelInput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script type="module">
        const input = document.querySelector("#phone");
        const phoneFull = document.querySelector("#phone_full");

        const iti = window.intlTelInput(input, {
            initialCountry: "ae",
            separateDialCode: true,
            nationalMode: false,
            formatOnDisplay: true,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.13.3/build/js/utils.js"),
        });

        input.addEventListener("blur", function() {
            if (iti.isValidNumber()) {
                phoneFull.value = iti.getNumber(); // +971501234567
            } else {
                phoneFull.value = "";
            }
        });

        @if (session('success'))
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#009736', // UAE green
                });
            });
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if ($errors->any() && old('opened_from') != 'contact')
            document.addEventListener('DOMContentLoaded', function() {
                const modalEl = document.getElementById('consultantModal');
                const modal = new bootstrap.Modal(modalEl);

                modal.show();

                modalEl.addEventListener('shown.bs.modal', function() {
                    // Focus first invalid field
                    const firstInvalid = modalEl.querySelector(
                        '.is-invalid, input:invalid, textarea:invalid, select:invalid'
                    );

                    if (firstInvalid) {
                        firstInvalid.focus();
                    }
                }, {
                    once: true
                });
            });
        @endif

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.page-loader').style.display = 'none';

            document.querySelectorAll('.dropdown-submenu > a').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    if (window.innerWidth < 992) {
                        e.preventDefault();
                        e.stopPropagation();
                        let
                            parentListItem = this.closest('.dropdown-submenu');
                        parentListItem.classList.toggle('show');
                    }
                });
            });
        });

        const form = document.querySelector('#consultantForm');
        let isSubmitting = false;

        form.addEventListener('submit', function(e) {
            if (isSubmitting) return;

            e.preventDefault();
            isSubmitting = true;

            document.querySelector('.page-loader').style.display = 'flex';
            form.querySelector('button[type="submit"]').disabled = true;

            form.submit();
        });

        const consultantModal = document.getElementById('consultantModal');

        consultantModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            if (button) {
                const source = button.getAttribute('data-source');
                document.getElementById('openedFrom').value = source;
            }
        });

        const partnerSwiper = new Swiper('.partnerSwiper', {
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            slidesPerView: 2, // Default for mobile
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                // When window width is >= 768px (Tablet)
                768: {
                    slidesPerView: 2,
                },
                // When window width is >= 1024px (Desktop)
                1024: {
                    slidesPerView: 6,
                },
            },
        });
    </script>

    @stack('scripts')
</body>

</html>
