@extends('layouts.web')

@section('content')
    <div class="page-banner">
        <div class="page-banner-bg"></div>

        <div class="page-banner-overlay"></div>

        <div class="page-banner-content">
            <h1>Contact US</h1>
            <div class="breadcrumb-nav">
                <a href="{{ route('web.index') }}">Home</a>
                <span>/</span>
                <span class="current-page">Contact US</span>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-7 mb-4">
                <div class="contact-form-card shadow p-4 p-md-5 bg-white">
                    <h2 class="fw-bold mb-2">Send us a <span style="color: var(--uae-green);">Message</span></h2>
                    <p class="text-muted mb-4">Fill out the form below and our team will get back to you within 24
                        hours.</p>

                    <form method="POST" action="{{ route('web.contact.store') }}" id="contactForm">
                        @csrf

                        <input type="hidden" name="contact_phone" id="contact_phone_full"
                            value="{{ old('contact_phone') }}">
                        <input type="hidden" name="opened_from" value="contact">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control @error('contact_name') is-invalid @enderror"
                                    placeholder="Enter your name" name="contact_name" required
                                    value="{{ old('contact_name') }}" @error('contact_name') autofocus @enderror>
                                @error('contact_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('contact_email') is-invalid @enderror"
                                    placeholder="Enter your email" name="contact_email" required
                                    value="{{ old('contact_email') }}" @error('contact_email') autofocus @enderror>
                                @error('contact_email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Mobile Number</label>
                                <input type="tel" id="contact_phone"
                                    class="form-control @error('contact_phone') is-invalid @enderror"
                                    value="{{ old('contact_phone') }}" required placeholder="00 000 0000"
                                    @error('contact_phone') autofocus @enderror />
                                @error('contact_phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Message</label>
                                <textarea class="form-control @error('contact_message') is-invalid @enderror" rows="5"
                                    placeholder="How can we help you?" name="contact_message" required @error('contact_message') autofocus @enderror>{{ old('contact_message') }}</textarea>
                                @error('contact_message')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-send shadow-sm mt-2">
                                    <i class="bi bi-send-fill me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-card shadow p-4 p-md-5">
                    <h3 class="fw-bold mb-4 border-bottom border-secondary pb-3">Contact Information</h3>

                    <div class="d-flex mb-4">
                        <div class="contact-icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Our Office</h6>
                            <p class="mb-0 opacity-75">{{ $generalSettings['address'] ?? '' }}</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="contact-icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Call Us</h6>
                            <p class="mb-0 opacity-75">{{ formatUaePhone($generalSettings['primary_phone'] ?? '') }}</p>
                            <p class="mb-0 opacity-75">{{ formatUaePhone($generalSettings['secondary_phone'] ?? '') }}</p>
                        </div>
                    </div>

                    <div class="d-flex mb-4">
                        <div class="contact-icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Email Us</h6>
                            <p class="mb-0 opacity-75">{{ $generalSettings['email'] ?? '' }}</p>
                        </div>
                    </div>

                    <div class="d-flex mb-5">
                        <div class="contact-icon-box" style="color: #25D366;">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <h6 class="mb-1 fw-bold">Chat on WhatsApp</h6>
                            <a href="https://wa.me/{{ $generalSettings['whatsapp'] }}?text={{ urlencode($generalSettings['whatsapp_message']) }}"
                                class="whatsapp-link">
                                {{ formatUaePhone($generalSettings['whatsapp']) }}
                            </a>
                        </div>
                    </div>

                    <div class="mt-auto">
                        <h6 class="fw-bold mb-3">Follow Us</h6>
                        <div class="social-links">
                            <a href="{{ $generalSettings['facebook'] ?? 'javascript:void(0)' }}">
                                <i class="bi bi-facebook"></i></a>
                            <a href="{{ $generalSettings['instagram'] ?? 'javascript:void(0)' }}">
                                <i class="bi bi-instagram"></i></a>
                            <a href="{{ $generalSettings['twitter'] ?? 'javascript:void(0)' }}">
                                <i class="bi bi-twitter-x"></i></a>
                            <a href="{{ $generalSettings['linkedin'] ?? 'javascript:void(0)' }}">
                                <i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        const input = document.querySelector("#contact_phone");
        const contact_phoneFull = document.querySelector("#contact_phone_full");

        const iti = window.intlTelInput(input, {
            initialCountry: "ae",
            separateDialCode: true,
            nationalMode: false,
            formatOnDisplay: true,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.13.3/build/js/utils.js"),
        });

        input.addEventListener("blur", function() {
            if (iti.isValidNumber()) {
                contact_phoneFull.value = iti.getNumber(); // +971501234567
            } else {
                contact_phoneFull.value = "";
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.page-loader').style.display = 'none';
        });

        const form = document.querySelector('#contactForm');
        let isSubmitting = false;

        form.addEventListener('submit', function(e) {
            if (isSubmitting) return;

            e.preventDefault();
            isSubmitting = true;

            document.querySelector('.page-loader').style.display = 'flex';
            form.querySelector('button[type="submit"]').disabled = true;

            form.submit();
        });
    </script>
@endpush
