@extends('layouts.web')

@section('content')
    <section class="about-hero text-white overflow-hidden">
        <div class="hero-circle-decoration"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-gold-uae mb-3 px-3 py-2 rounded-pill">ESTABLISHED 2018</span>
                    <h1 class="display-4 fw-bold mb-4">
                        Leading the Way in <br><span class="text-gold-uae">UAE PRO Services</span>
                    </h1>
                    <p class="lead opacity-75">
                        We simplify government procedures, allowing you to focus on growing your
                        business while we handle the paperwork.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-5 pb-3">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h6 class="text-gold-uae fw-bold text-uppercase">Our Story</h6>
                <h2 class="fw-bold mb-4 custom-underline">Reliable Partners for Success</h2>
                <p class="mb-4 text-secondary">Starting a journey in the UAE requires a partner who understands the
                    local laws and government landscape. Our center has spent over two decades building direct
                    relationships with ministries to provide you with the fastest results.</p>

                <div class="row g-4 mt-2">
                    <div class="col-md-6 d-flex gap-3">
                        <div class="feature-icon"><i class="bi bi-patch-check"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">MOHRE Authorized</h6>
                            <p class="small text-muted mb-0">Direct access to labour systems.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex gap-3">
                        <div class="feature-icon"><i class="bi bi-lightning-charge"></i></div>
                        <div>
                            <h6 class="fw-bold mb-1">Express Results</h6>
                            <p class="small text-muted mb-0">Same-day processing for many tasks.</p>
                        </div>
                    </div>
                </div>

                <div class="about-features mt-5">
                    <div class="d-flex gap-3 mb-4">
                        <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
                        <div>
                            <h5 class="fw-bold">Certified Expertise</h5>
                            <p class="small text-muted">Authorized by UAE government entities for official document
                                processing.</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="feature-icon"><i class="bi bi-clock-history"></i></div>
                        <div>
                            <h5 class="fw-bold">Time Efficiency</h5>
                            <p class="small text-muted">We cut down processing times by 40% through our direct
                                digital link with authorities.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-img-group position-relative">
                    <div class="main-img shadow-lg overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=1200"
                            class="img-fluid" alt="Team Office">
                    </div>
                    <div class="floating-stats shadow-lg rounded-4 p-4 animate-float">
                        <div class="text-center">
                            <h2 class="fw-bold text-primary mb-0">7+</h2>
                            <p class="small text-muted text-uppercase mb-0">Years Excellence</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="service-section">
        <div class="container">
            <div class="support-cta d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4">
                <div>
                    <h4 class="fw-bold mb-1">Not sure what you need?</h4>
                    <p class="mb-0 opacity-75">Our consultants are ready to guide you through the process.</p>
                </div>
                <a href="javascript:void(0);" class="btn btn-light btn-lg rounded-pill px-4 fw-bold"
                    data-bs-toggle="modal" data-bs-target="#consultantModal" data-source="specialised_services_callback">
                    <i class="bi bi-telephone-fill me-2"></i> Contact Us
                </a>
            </div>

        </div>
    </section>

    <section class="bg-light py-4">
        <div class="container">
            <div class="text-center mb-3">
                <h2 class="fw-bold">Our Core Values</h2>
                <div class="heading-line mx-auto"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 p-4 shadow-sm text-center">
                        <i class="bi bi-eye fs-1 text-primary-uae mb-3"></i>
                        <h4 class="fw-bold">Transparency</h4>
                        <p class="text-muted small">No hidden fees or unexpected delays. We provide clear tracking for every
                            application.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 p-4 shadow-sm text-center">
                        <i class="bi bi-lightning fs-1 text-primary-uae mb-3"></i>
                        <h4 class="fw-bold">Agility</h4>
                        <p class="text-muted small">Quick adaptation to new government laws and instant processing updates
                            for clients.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 p-4 shadow-sm text-center">
                        <i class="bi bi-heart fs-1 text-primary-uae mb-3"></i>
                        <h4 class="fw-bold">Integrity</h4>
                        <p class="text-muted small">Handling your sensitive legal and corporate documents with the highest
                            confidentiality.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <x-web.clients :partners="$partners" />
    </section>
@endsection
