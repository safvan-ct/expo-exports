@extends('layouts.web')

@section('content')
    @php
        $selected = request('categories') ? explode(',', request('categories')) : [];
    @endphp

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
                        <input class="form-check-input" type="checkbox" id="selectAll" @checked((count($selected) == count($categories) || count($selected) == 0))>
                        <label class="form-check-label" for="selectAll">All Products</label>
                    </div>
                    @foreach ($categories as $item)
                        <div class="form-check mb-2">
                            <input class="form-check-input cat-filter" type="checkbox" id="{{ $item->id }}"
                                @checked((in_array($item->slug, $selected)) || (count($selected) == 0)) value="{{ $item->slug }}">
                            <label class="form-check-label" for="{{ $item->id }}">{{ $item->name }}</label>
                        </div>
                    @endforeach

                    <button class="btn btn-navy w-100" id="applyFilters">Apply Filters</button>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row g-4">

                    @foreach ($products as $item)
                        <div class="col-md-6 col-xl-4">
                            <div class="card product-card shadow-sm h-100">
                                <div class="product-img-container">
                                    <img src="{{ $item->image_src }}" alt="{{ $item->name }}">
                                </div>
                                <div class="card-body">
                                    <span class="badge bg-success mb-2">{{ $item->category->name }}</span>
                                    <h5 class="card-title fw-bold">{{ $item->name }}</h5>
                                    <p class="card-text text-muted small">{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $products->withQueryString()->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const applyBtn = document.getElementById('applyFilters');
            const selectAll = document.getElementById('selectAll');

            applyBtn.addEventListener('click', function() {
                const checked = document.querySelectorAll('.cat-filter:checked');
                const values = Array.from(checked).map(cb => cb.value);
                console.log(values);

                let url = window.location.pathname;

                if (values.length) {
                    url += '?categories=' + values.join(',');
                }

                window.location.href = url; // 🔥 redirect
            });

            // Select All
            selectAll.addEventListener('change', function() {
                console.log('gg');

                document.querySelectorAll('.cat-filter')
                    .forEach(cb => cb.checked = this.checked);
            });

        });
    </script>
@endpush
