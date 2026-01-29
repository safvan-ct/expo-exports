@extends('layouts.web')

@section('content')
    <header class="swiper heroSwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-section text-center">
                <div class="container">
                    <h1 class="display-3 fw-bold mb-4">Global Export Solutions You Can Trust</h1>
                    <p class="lead mb-5">Delivering Quality Products Worldwide.</p>
                    <div class="dropdown">
                        <button class="btn btn-quote btn-lg px-5" type="button">
                            View Products
                        </button>
                    </div>
                </div>
            </div>

            <div class="swiper-slide hero-section"
                style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?q=80&w=2070');">
                <div class="container text-center text-white">
                    <h1 class="display-3 fw-bold mb-4">Global Export Solutions</h1>
                    <p class="lead mb-5">Trusted logistics and cargo handling for international trade.</p>
                    <div class="dropdown">
                        <button class="btn btn-quote btn-lg px-5" type="button">
                            View Products
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
        <div class="swiper-pagination"></div>
    </header>

    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&q=80&w=1469"
                        alt="Shipping" class="img-fluid split-image">
                </div>
                <div class="col-md-6 ps-md-5">
                    <h2 class="fw-bold mb-4">We are a trusted exporting company</h2>
                    <p class="fs-5 text-muted italic">"Delivering high quality products across the global market. Our
                        focus on quality, timely delivery, and long-term partnerships."</p>
                </div>
            </div>
        </div>
    </section>

    <section class="why-us">
        <div class="container text-center">
            <h2 class="mb-5 fw-bold">Why Choose Us</h2>
            <div class="row g-4">
                <div class="col-md-4 feature-card">
                    <i class="fas fa-globe-americas fa-3x mb-3 text-info"></i>
                    <h4>Global Reach</h4>
                </div>
                <div class="col-md-4 feature-card">
                    <i class="fas fa-check-circle fa-3x mb-3 text-info"></i>
                    <h4>Quality Assurance</h4>
                </div>
                <div class="col-md-4 feature-card">
                    <i class="fas fa-shipping-fast fa-3x mb-3 text-info"></i>
                    <h4>On-Time Delivery</h4>
                </div>
                <div class="col-md-6 col-lg-4 offset-lg-2 feature-card">
                    <i class="fas fa-box-open fa-3x mb-3 text-info"></i>
                    <h4>Secure Packing</h4>
                </div>
                <div class="col-md-6 col-lg-4 feature-card">
                    <i class="fas fa-handshake fa-3x mb-3 text-info"></i>
                    <h4>Trusted Partners</h4>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">Countries We Export To</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-2">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <img src="https://flagcdn.com/us.svg" width="60" alt="USA" class="mb-2">
                        <p class="fw-bold mb-0">USA</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <img src="https://flagcdn.com/ae.svg" width="60" alt="UAE" class="mb-2">
                        <p class="fw-bold mb-0">UAE</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <img src="https://flagcdn.com/gb.svg" width="60" alt="UK" class="mb-2">
                        <p class="fw-bold mb-0">UK</p>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="p-3 border rounded shadow-sm h-100">
                        <img src="https://flagcdn.com/de.svg" width="60" alt="Germany" class="mb-2">
                        <p class="fw-bold mb-0">Germany</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5" id="products">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Our Export Portfolio</h2>
                <p class="text-muted">High-quality products sourced directly from the best farms and manufacturers.</p>
                <div class="mt-4">
                    <button class="btn btn-outline-dark active m-1">All Products</button>
                    <button class="btn btn-outline-dark m-1">Vegetables</button>
                    <button class="btn btn-outline-dark m-1">Fruits</button>
                    <button class="btn btn-outline-dark m-1">Food Items</button>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm product-card">

                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1619566636858-adf3ef46400b?auto=format&fit=crop&q=80&w=600"
                                class="card-img-top" alt="Fresh Vegetables">
                        </div>

                        <div class="card-body">
                            <span class="badge bg-success mb-2">Vegetables</span>
                            <h5 class="card-title fw-bold">Fresh Red Onions</h5>
                            <p class="card-text text-muted small">Grade A export quality, available in bulk 25kg/50kg
                                mesh bags.</p>
                            <a href="#" class="btn btn-navy btn-sm w-100 mt-2">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm product-card">

                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1619566636858-adf3ef46400b?auto=format&fit=crop&q=80&w=600"
                                class="card-img-top" alt="Mangoes">
                        </div>

                        <div class="card-body">
                            <span class="badge bg-warning text-dark mb-2">Fruits</span>
                            <h5 class="card-title fw-bold">Alphonso Mangoes</h5>
                            <p class="card-text text-muted small">Premium seasonal mangoes with global GAP
                                certification.</p>
                            <a href="#" class="btn btn-navy btn-sm w-100 mt-2">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm product-card">

                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?auto=format&fit=crop&q=80&w=600"
                                class="card-img-top" alt="Biscuits">
                        </div>
                        <div class="card-body">
                            <span class="badge bg-primary mb-2">Food Items</span>
                            <h5 class="card-title fw-bold">Assorted Biscuits</h5>
                            <p class="card-text text-muted small">Crispy, long-shelf-life biscuits in various export
                                packaging.</p>
                            <a href="#" class="btn btn-navy btn-sm w-100 mt-2">Get Quote</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm product-card">

                        <div class="product-img-container">
                            <img src="https://images.unsplash.com/photo-1518977676601-b53f82aba655?auto=format&fit=crop&q=80&w=600"
                                class="card-img-top" alt="Potatoes">
                        </div>

                        <div class="card-body">
                            <span class="badge bg-success mb-2">Vegetables</span>
                            <h5 class="card-title fw-bold">Premium Potatoes</h5>
                            <p class="card-text text-muted small">Uniform size, high starch content, ideal for global
                                markets.</p>
                            <a href="#" class="btn btn-navy btn-sm w-100 mt-2">Get Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">What Our Customers Say</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="card-text text-muted">"Excellent quality of products and very reliable shipping.
                                Highly recommend for international trade."</p>
                            <hr>
                            <div class="d-flex align-items-center">
                                <div class="bg-navy rounded-circle p-2 text-white me-3"
                                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #001f3f;">
                                    JD</div>
                                <h6 class="mb-0">John Doe, NY</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="card-text text-muted">"Excellent quality of products and very reliable shipping.
                                Highly recommend for international trade."</p>
                            <hr>
                            <div class="d-flex align-items-center">
                                <div class="bg-navy rounded-circle p-2 text-white me-3"
                                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #001f3f;">
                                    JD</div>
                                <h6 class="mb-0">John Doe, NY</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100 p-3">
                        <div class="card-body">
                            <div class="text-warning mb-2">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                    class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <p class="card-text text-muted">"Excellent quality of products and very reliable shipping.
                                Highly recommend for international trade."</p>
                            <hr>
                            <div class="d-flex align-items-center">
                                <div class="bg-navy rounded-circle p-2 text-white me-3"
                                    style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: #001f3f;">
                                    JD</div>
                                <h6 class="mb-0">John Doe, NY</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
