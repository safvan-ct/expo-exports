@extends('layouts.web')

@section('content')
    <header class="contact-header">
        <div class="container">
            <h1 class="display-5 fw-bold">Get In Touch</h1>
            <p class="lead opacity-75">Ready to expand your business? We are here to help you export worldwide.</p>
        </div>
    </header>

    <section class="py-5">
        <div class="container py-4">
            <div class="row g-5">

                <div class="col-lg-7">
                    <div class="card contact-card p-4 p-md-5">
                        <h3 class="fw-bold mb-4 text-navy">Send us a Message</h3>
                        <form action="{{ route('web.contact.store') }}" method="POST" id="contactForm">
                            @csrf

                            <input type="hidden" name="contact_phone" id="contact_phone_full"
                                value="{{ old('contact_phone') }}">
                            <input type="hidden" name="country_code" id="country_code" value="{{ old('country_code') }}">

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        placeholder="John" name="first_name" required value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Doe" name="last_name"
                                        value="{{ old('last_name ') }}">
                                    @error('last_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-bold">Mobile Number</label>
                                    <input type="tel" id="contact_phone"
                                        class="form-control @error('contact_phone') is-invalid @enderror"
                                        value="{{ old('contact_phone') }}" required placeholder="00 000 0000"
                                        @error('contact_phone') autofocus @enderror />
                                    @error('contact_phone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="john@example.com" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Your Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" rows="5" placeholder="How can we help you?"
                                        name="message" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-navy btn-lg w-100 py-3 shadow">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="info-box shadow-lg">
                        <h3 class="fw-bold mb-4">Contact Information</h3>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <p class="mb-0 small text-white-50">Our Headquarters</p>
                                <p class="mb-0 fw-bold">{{ $generalSettings['address_1'] }}
                                    {{ $generalSettings['address_2'] }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <p class="mb-0 small text-white-50">Call Us</p>
                                <p class="mb-0 fw-bold">{{ formatPhoneNumber($generalSettings['primary_phone']) }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle"><i class="fas fa-envelope"></i></div>
                            <div>
                                <p class="mb-0 small text-white-50">Email Support</p>
                                <p class="mb-0 fw-bold">{{ $generalSettings['email'] }}</p>
                            </div>
                        </div>

                        <div class="mt-5 p-4 border border-secondary rounded-3 text-center">
                            <h5 class="fw-bold mb-3">Live Chat Support</h5>
                            <p class="small text-white-50 mb-3">Fastest response for export queries.</p>
                            <a href="ttps://wa.me/{{ $generalSettings['whatsapp'] }}?text={{ urlencode($generalSettings['whatsapp_message']) }}"
                                target="_blank" class="btn btn-success px-4 py-2">
                                <i class="fab fa-whatsapp me-2"></i>Message on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps?q={{ urlencode($generalSettings['address_1'] . ' ' . $generalSettings['address_2']) }}&output=embed"
                            width="100%" height="300" style="border:0;" loading="lazy" allowfullscreen>
                        </iframe>

                        {{-- <iframe src="https://www.google.com/maps?q=11.039523,76.376732&output=embed" width="100%"
                            height="300" style="border:0;" loading="lazy" allowfullscreen>
                        </iframe> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="module">
        const input = document.querySelector("#contact_phone");
        const contact_phoneFull = document.querySelector("#contact_phone_full");

        const iti = window.intlTelInput(input, {
            initialCountry: "in",
            separateDialCode: true,
            nationalMode: false,
            formatOnDisplay: true,
            loadUtils: () => import("https://cdn.jsdelivr.net/npm/intl-tel-input@25.13.3/build/js/utils.js"),
        });

        // update hidden input on change
        function updateCountryCode() {
            const data = iti.getSelectedCountryData();
            document.getElementById('country_code').value = data.dialCode;
        }

        // on load + when user changes country
        input.addEventListener("countrychange", updateCountryCode);

        input.addEventListener("blur", function() {
            updateCountryCode();

            if (iti.isValidNumber()) {
                contact_phoneFull.value = iti.getNumber(); // +971501234567
            } else {
                contact_phoneFull.value = "";
            }
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
