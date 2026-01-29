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
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">First Name</label>
                                    <input type="text" class="form-control" placeholder="John">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Last Name</label>
                                    <input type="text" class="form-control" placeholder="Doe">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Email Address</label>
                                    <input type="email" class="form-control" placeholder="john@example.com">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Subject</label>
                                    <select class="form-select">
                                        <option selected>Bulk Order Inquiry</option>
                                        <option>Partnership Opportunity</option>
                                        <option>Shipping Query</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Your Message</label>
                                    <textarea class="form-control" rows="5" placeholder="How can we help you?"></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-navy btn-lg w-100 py-3 shadow">Send
                                        Message</button>
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
                                <p class="mb-0 fw-bold">123 Export Plaza, Logistics Park, Mumbai, India</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle"><i class="fas fa-phone-alt"></i></div>
                            <div>
                                <p class="mb-0 small text-white-50">Call Us</p>
                                <p class="mb-0 fw-bold">+91 98765 43210</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle"><i class="fas fa-envelope"></i></div>
                            <div>
                                <p class="mb-0 small text-white-50">Email Support</p>
                                <p class="mb-0 fw-bold">sales@expoglobal.com</p>
                            </div>
                        </div>

                        <div class="mt-5 p-4 border border-secondary rounded-3 text-center">
                            <h5 class="fw-bold mb-3">Live Chat Support</h5>
                            <p class="small text-white-50 mb-3">Fastest response for export queries.</p>
                            <a href="#" class="btn btn-success px-4 py-2"><i class="fab fa-whatsapp me-2"></i>Message
                                on
                                WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15282225.79979123!2d73.7250245393691!3d20.750301298393563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                            allowfullscreen="" loading="lazy"></iframe>
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
