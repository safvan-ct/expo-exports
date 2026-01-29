@extends('layouts.admin')

@section('content')
    <x-admin.page-header title="About Us" :breadcrumb="[['label' => 'Dashboard', 'link' => route('admin.dashboard')], ['label' => 'About Us']]" />

    <div class="card mt-3">
        <form class="card-body row" method="POST" action="{{ route('admin.about.store') }}" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="about_header" label="About Page Header"
                value="{{ old('about_header', $settings['about_header'] ?? null) }}" :class="'col-12 col-md-12'" />

            <div class="col-12">
                <h3 class="card-title border-bottom pb-2 border-danger">Home Page About Details</h3>
            </div>
            <x-admin.input name="home_about_heading" label="About Heading"
                value="{{ old('home_about_heading', $settings['home_about_heading'] ?? null) }}" :class="'col-12 col-md-12'" />

            <div class="form-floating col-12 col-md-12 mb-2">
                <textarea class="form-control" name="home_about_desc" id="home_about_desc" placeholder="Description"
                    style="height: 80px">{{ old('home_about_desc', $settings['home_about_desc'] ?? null) }}</textarea>
                <label for="home_about_desc">Description</label>
            </div>
            <div class="form-floating col-12 col-md-6 mb-2">
                <x-admin.input type="file" name="home_about_image" label="Image (650*450)" accept="image/*" />
            </div>
            <div class="form-floating col-12 col-md-6 mb-2">
                @if (isset($settings['home_about_image']) && !empty($settings['home_about_image']))
                    <img src="{{ asset('storage/' . $settings['home_about_image']) }}" class="img-thumbnail"
                        style="max-width: 100px;">
                @endif
            </div>

            <div class="col-12">
                <h3 class="card-title border-bottom pb-2 border-danger">About Page Details</h3>
            </div>
            <x-admin.input name="about_heading" label="About Heading"
                value="{{ old('about_heading', $settings['about_heading'] ?? null) }}" :class="'col-12 col-md-12'" />

            <div class="form-floating col-12 col-md-12 mb-2">
                <textarea class="form-control" name="about_desc_1" id="about_desc_1" placeholder="Description" style="height: 120px">{{ old('about_desc_1', $settings['about_desc_1'] ?? null) }}</textarea>
                <label for="about_desc_1">Description</label>
            </div>
            <div class="form-floating col-12 col-md-12 mb-2">
                <textarea class="form-control" name="about_desc_2" id="about_desc_2" placeholder="Description" style="height: 120px">{{ old('about_desc_2', $settings['about_desc_2'] ?? null) }}</textarea>
                <label for="about_desc_2">Description</label>
            </div>
            <div class="form-floating col-12 col-md-6 mb-2">
                <x-admin.input type="file" name="about_image" label="Image (650*650)" accept="image/*" />
            </div>
            <div class="form-floating col-12 col-md-6 mb-2">
                @if (isset($settings['about_image']) && !empty($settings['about_image']))
                    <img src="{{ asset('storage/' . $settings['about_image']) }}" class="img-thumbnail"
                        style="max-width: 100px;">
                @endif
            </div>
            <div class="form-floating col-12 col-md-12 mb-2">
                <textarea class="form-control" name="about_features" id="about_features" placeholder="Features (Seperate By Comma)"
                    rows="10">{{ old('about_features', $settings['about_features'] ?? null) }}</textarea>
                <label for="about_features">Features (Seperate By Comma)</label>
            </div>

            <div class="col-12 mt-3">
                <h3 class="card-title border-bottom pb-2 border-danger">Counts</h3>
            </div>
            <x-admin.input name="years_of_experience" label="Years of Experience"
                value="{{ old('years_of_experience', $settings['years_of_experience'] ?? null) }}" type="number"
                min="1" :class="'col-12 col-md-3'" />
            <x-admin.input name="total_clients" label="Total Clients"
                value="{{ old('total_clients', $settings['total_clients'] ?? null) }}" type="number" min="1"
                :class="'col-12 col-md-3'" />
            <x-admin.input name="tons_exported" label="Tons (K) Exported"
                value="{{ old('tons_exported', $settings['tons_exported'] ?? null) }}" type="number" min="1"
                :class="'col-12 col-md-3'" />
            <x-admin.input name="countries_served" label="Countries Served"
                value="{{ old('countries_served', $settings['countries_served'] ?? null) }}" type="number" min="1"
                :class="'col-12 col-md-3'" />

            <div class="col-12 mt-3">
                <h3 class="card-title border-bottom pb-2 border-danger">Vision & Mission Details</h3>
            </div>
            <div class="form-floating col-12 mb-2">
                <textarea class="form-control" name="vision" id="vision" placeholder="Vision" style="height: 80px">{{ old('vision', $settings['vision'] ?? null) }}</textarea>
                <label for="vision">Vision</label>
            </div>
            <div class="form-floating col-12 mb-2">
                <textarea class="form-control" name="mission" id="mission" placeholder="Mission" style="height: 80px">{{ old('mission', $settings['mission'] ?? null) }}</textarea>
                <label for="mission">Mission</label>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        document.addEventListener('DOMContentLoaded', function() {
            new Choices('#key_services', {
                removeItemButton: true,
                searchEnabled: true,
                placeholder: true,
                placeholderValue: 'Select key services',
                shouldSort: true,
            });

            new Choices('#useful_services', {
                removeItemButton: true,
                searchEnabled: true,
                placeholder: true,
                placeholderValue: 'Select useful services',
                shouldSort: true,
            });
        });
    </script>
@endpush
