@extends('layouts.web')

@section('content')
    <div class="bg-white py-4 border-bottom mb-5">
        <div class="container text-center">
            <h1 class="fw-bold">Export Product Catalog</h1>
            <p class="text-muted">High-quality agricultural and processed goods for global markets.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row g-4">

            <div class="col-lg-3">
                <div class="filter-section shadow-sm">
                    <h5 class="filter-title">Categories</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat1" checked>
                        <label class="form-check-label" for="cat1">All Products</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat2">
                        <label class="form-check-label" for="cat2">Vegetables</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat3">
                        <label class="form-check-label" for="cat3">Fruits</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="cat4">
                        <label class="form-check-label" for="cat4">Biscuits & Snacks</label>
                    </div>

                    <h5 class="filter-title mt-4">Origin</h5>
                    <select class="form-select mb-4">
                        <option selected>Select Country</option>
                        <option>India</option>
                        <option>USA</option>
                        <option>UAE</option>
                    </select>

                    <button class="btn btn-navy w-100">Apply Filters</button>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">

                    <div class="col-md-6 col-xl-4">
                        <div class="card product-card shadow-sm h-100">
                            <div class="product-img-container">
                                <img src="https://images.unsplash.com/photo-1518977676601-b53f82aba655?auto=format&fit=crop&q=80&w=600"
                                    alt="Onions">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Vegetables</span>
                                <h5 class="card-title fw-bold">Fresh Red Onions</h5>
                                <p class="card-text text-muted small">Grade A export quality onions. Available in mesh
                                    bags.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-navy">Bulk Only</span>
                                    <a href="product-detail.html" class="btn btn-sm btn-outline-dark">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card product-card shadow-sm h-100">
                            <div class="product-img-container">
                                <img src="https://images.unsplash.com/photo-1558961363-fa8fdf82db35?q=80&w=600"
                                    alt="Biscuits">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-primary mb-2">Biscuits</span>
                                <h5 class="card-title fw-bold">Premium Biscuits</h5>
                                <p class="card-text text-muted small">Assorted sweet and salty biscuits with long shelf
                                    life.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-navy">Bulk Only</span>
                                    <a href="#" class="btn btn-sm btn-outline-dark">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card product-card shadow-sm h-100">
                            <div class="product-img-container">
                                <img src="https://images.unsplash.com/photo-1619566636858-adf3ef46400b?q=80&w=600"
                                    alt="Mangoes">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-warning text-dark mb-2">Fruits</span>
                                <h5 class="card-title fw-bold">Alphonso Mangoes</h5>
                                <p class="card-text text-muted small">Global GAP certified premium mangoes for export.
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-navy">Bulk Only</span>
                                    <a href="#" class="btn btn-sm btn-outline-dark">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
                        <div class="card product-card shadow-sm h-100">
                            <div class="product-img-container">
                                <img src="https://images.unsplash.com/photo-1518977676601-b53f82aba655?q=80&w=600"
                                    alt="Potatoes">
                            </div>
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Vegetables</span>
                                <h5 class="card-title fw-bold">Organic Potatoes</h5>
                                <p class="card-text text-muted small">High-quality Dutch variety potatoes for global
                                    markets.</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="fw-bold text-navy">Bulk Only</span>
                                    <a href="#" class="btn btn-sm btn-outline-dark">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-4">
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

                    <div class="col-md-6 col-xl-4">
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
                </div>
            </div>
        </div>
    </div>
@endsection
