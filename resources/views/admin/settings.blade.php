@extends('layouts.admin')

@section('content')
    <x-admin.page-header title="Settings" :breadcrumb="[['label' => 'Dashboard', 'link' => route('admin.dashboard')], ['label' => 'Settings']]" />

    <div class="card mt-3">
        <form class="card-body row" method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="col-12">
                <h3 class="card-title border-bottom pb-2 border-danger">Contact Details</h3>
            </div>
            <x-admin.input name="address_1" label="Address Line 1"
                value="{{ old('address_1', $settings['address_1'] ?? null) }}" :class="'col-12 col-md-6'" />
            <x-admin.input name="address_2" label="Address Line 2"
                value="{{ old('address_2', $settings['address_2'] ?? null) }}" :class="'col-12 col-md-6'" />

            <x-admin.input name="email" label="Email" value="{{ old('email', $settings['email'] ?? null) }}"
                :class="'col-12 col-md-4'" />
            <x-admin.input name="primary_phone" type="tel" label="Primary Phone"
                value="{{ old('primary_phone', $settings['primary_phone'] ?? null) }}" :class="'col-12 col-md-4'" />

            <x-admin.input name="whatsapp" type="tel" label="Whatsapp Phone"
                value="{{ old('whatsapp', $settings['whatsapp'] ?? null) }}" :class="'col-12 col-md-4'" />
            <x-admin.input name="whatsapp_message" label="WhatsApp Message"
                value="{{ old('whatsapp_message', $settings['whatsapp_message'] ?? null) }}" :class="'col-12 col-md-6'" />

            <div class="col-12 mt-3">
                <h3 class="card-title border-bottom pb-2 border-danger">Social Media</h3>
            </div>
            <x-admin.input name="instagram" label="Instagram" value="{{ old('instagram', $settings['instagram'] ?? null) }}"
                :class="'col-12 col-md-6'" />
            <x-admin.input name="facebook" label="Facebook" value="{{ old('facebook', $settings['facebook'] ?? null) }}"
                :class="'col-12 col-md-6'" />
            <x-admin.input name="linkedin" label="Linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? null) }}"
                :class="'col-12 col-md-6'" />
            <x-admin.input name="twitter" label="Twitter" value="{{ old('twitter', $settings['twitter'] ?? null) }}"
                :class="'col-12 col-md-6'" />

            <div class="col-12 mt-3">
                <h3 class="card-title border-bottom pb-2 border-danger">Footer Details</h3>
            </div>
            <div class="form-floating col-12 mb-2">
                <textarea class="form-control" name="about_us" id="about_us" placeholder="About us" rows="15">{{ old('about_us', $settings['about_us'] ?? null) }}</textarea>
                <label for="about_us">About us</label>
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
