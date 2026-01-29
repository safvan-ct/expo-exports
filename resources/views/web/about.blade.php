@extends('layouts.web')

@section('content')
    <header class="about-header text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">{{ $about['about_header'] }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">
                        <a href="{{ route('web.index') }}" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </header>

    <section class="py-5">
        <div class="container py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="{{ $about['about_image'] ? asset('storage/' . $about['about_image']) : 'https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=1935' }}"
                        class="img-fluid rounded-4 shadow" alt="Our Warehouse"
                        style="max-height: 650px; width: 100%; object-fit: cover">
                </div>
                <div class="col-lg-6">
                    <h6 class="text-primary fw-bold text-uppercase">Who We Are</h6>

                    <h2 class="display-6 fw-bold mb-4">{{ $about['about_heading'] }}</h2>
                    <p class="text-muted mb-4">{{ $about['about_desc_1'] }}</p>
                    <p class="text-muted">{{ $about['about_desc_2'] }}</p>

                    <div class="row mt-4">
                        @php
                            $features = explode(',', $about['about_features']);
                        @endphp
                        @foreach ($features as $item)
                            <div class="col-6">
                                <h5 class="fw-bold">
                                    <i class="fas fa-check-circle text-success me-2"></i>{{ $item }}
                                </h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats-bg text-center">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 stat-item">
                    <h2>{{ $about['years_of_experience'] }}+</h2>
                    <p class="mb-0 opacity-75">Years Experience</p>
                </div>
                <div class="col-md-3 stat-item">
                    <h2>{{ $about['total_clients'] }}+</h2>
                    <p class="mb-0 opacity-75">Global Clients</p>
                </div>
                <div class="col-md-3 stat-item">
                    <h2>{{ $about['tons_exported'] }}K</h2>
                    <p class="mb-0 opacity-75">Tons Exported</p>
                </div>
                <div class="col-md-3 stat-item">
                    <h2>{{ $about['countries_served'] }}+</h2>
                    <p class="mb-0 opacity-75">Countries Served</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card mv-card h-100 p-4">
                        <div class="card-body text-center">
                            <div class="icon-box mb-3 text-primary"><i class="fas fa-eye fa-3x"></i></div>
                            <h3 class="fw-bold">Our Vision</h3>
                            <p class="text-muted">{{ $about['vision'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mv-card h-100 p-4">
                        <div class="card-body text-center">
                            <div class="icon-box mb-3 text-primary"><i class="fas fa-rocket fa-3x"></i></div>
                            <h3 class="fw-bold">Our Mission</h3>
                            <p class="text-muted">{{ $about['mission'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
