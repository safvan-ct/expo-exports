@extends('layouts.web')

@section('content')
    <div class="page-banner">
        <div class="page-banner-bg"></div>

        <div class="page-banner-overlay"></div>

        <div class="page-banner-content">
            <h1>{{ $service->name }}</h1>
            <div class="breadcrumb-nav">
                <a href="{{ route('web.index') }}">Home</a>
                <span>/</span>
                <span class="current-page">{{ $service->name }}</span>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row g-3">
            <div class="col-lg-9">
                <div class="service-card-modern">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12 mb-3 mb-lg-0">
                            <span class="service-category">{{ $service->governmentCenter?->name }}</span>
                            <h1 class="service-title fw-bold mb-2">{{ $service->name }}</h1>
                            <p class="m-0 service-desc">
                                {{ $service->tagline ?? $generalSettings['service_tagline'] }}
                            </p>
                        </div>

                        <div class="col-lg-4 col-md-12 text-lg-end">
                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#consultantModal"
                                data-source="{{ $service->name }}_callback" class="btn btn-apply px-4 py-2">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>

                @if ($service->desc_title)
                    <h3 class="py-4 border-bottom pb-1 fw-bold">{{ $service->desc_title }}</h3>
                @endif

                @if ($service->description)
                    <p class="{{ !$service->desc_title ? 'pt-4' : '' }}">{{ $service->description }}</p>
                @endif

                @if (optional($service->documents)->isNotEmpty() || optional($service->documentGroups)->isNotEmpty())
                    <h3 class="border-bottom mt-4 pb-2 text-danger ">Documents Required</h3>

                    @if (!$service->documents?->isEmpty())
                        <ul class="list-group list-group-flush documents-list mb-4 bg-white">
                            @foreach ($service->documents ?? [] as $item)
                                <li
                                    class="list-group-item d-flex align-items-{{ $item->notes ? 'start' : 'center' }} px-3">
                                    <i class="bi bi-check-circle-fill me-3 mt-1 fs-5 text-success"></i>
                                    <div>
                                        <p class="m-0 p-0">{{ $item->name }}</p>
                                        @if ($item->notes)
                                            <small class="text-muted">Note:- {{ $item->notes }}</small>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (!$service->documentGroups?->isEmpty())
                        @foreach ($service->documentGroups ?? [] as $data)
                            @if ($data->name != 'general')
                                <h5 class="pb-2 border-danger border-bottom fw-bold mt-4">{{ $data->name }}</h5>
                            @endif

                            <ul class="list-group list-group-flush documents-list">
                                @foreach ($data->documents as $item)
                                    <li
                                        class="list-group-item d-flex align-items-{{ $item->notes ? 'start' : 'center' }} px-3">
                                        <i class="bi bi-check-circle-fill me-3 mt-1 fs-5 text-success"></i>
                                        <div>
                                            <p class="m-0 p-0">{{ $item->name }}</p>
                                            @if ($item->notes)
                                                <small class="text-muted">Notes:- {{ $item->notes }}</small>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach

                                @if ($data->notes)
                                    <li class="list-group-item px-3 pb-2 pt-2">
                                        @php
                                            $notesArray = array_filter(explode('.', $data->notes));
                                        @endphp

                                        <small class="text-muted">Notes:-</small>
                                        @if (count($notesArray))
                                            <ul class="ps-3 mb-0">
                                                @foreach ($notesArray as $note)
                                                    <li><small class="text-muted"> {{ $note }}</small></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            </ul>
                        @endforeach
                    @endif
                @endif

                @if (optional($service->centerServices)->isNotEmpty())
                    <h3 class="border-bottom pb-2 text-danger mb-3">{{ $service->name }} & Required Documents</h3>

                    @php
                        $items = $service->centerServices;
                        $half = ceil($items->count() / 2);
                    @endphp

                    <div class="row">
                        <!-- LEFT COLUMN -->
                        <div class="col-12 col-md-6">
                            <div class="accordion accordion-flush" id="accordionLeft">
                                @foreach ($items->take($half) as $item)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="{{ $item->id }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $item->id }}" aria-expanded="false"
                                                aria-controls="flush-collapse{{ $item->id }}"> {{ $item->name }}
                                            </button>
                                        </h2>

                                        <div id="flush-collapse{{ $item->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="{{ $item->id }}" data-bs-parent="#accordionLeft">
                                            <div class="accordion-body">
                                                <p class="m-0 p-0 mb-1">{{ $item->tagline }}</p>
                                                <ul class="list-group list-group-flush documents-list bg-white">
                                                    @foreach ($item->documents as $doc)
                                                        <li class="list-group-item">
                                                            <i class="bi bi-check fs-6 text-success"></i>
                                                            <small>{{ $doc->name }}</small>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- RIGHT COLUMN -->
                        <div class="col-12 col-md-6">
                            <div class="accordion accordion-flush" id="accordionRight">
                                @foreach ($items->skip($half) as $item)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="{{ $item->id }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $item->id }}" aria-expanded="false"
                                                aria-controls="flush-collapse{{ $item->id }}"> {{ $item->name }}
                                            </button>
                                        </h2>

                                        <div id="flush-collapse{{ $item->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="{{ $item->id }}" data-bs-parent="#accordionRight">
                                            <div class="accordion-body">
                                                <p class="m-0 p-0 mb-1">{{ $item->tagline }}</p>
                                                <ul class="list-group list-group-flush documents-list bg-white">
                                                    @foreach ($item->documents as $doc)
                                                        <li class="list-group-item">
                                                            <i class="bi bi-check fs-6 text-success"></i>
                                                            <small>{{ $doc->name }}</small>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if ($service->notes)
                    <ul class="list-group list-group-flush documents-list mt-4 bg-white">
                        <li class="list-group-item px-3 pb-2 pt-2">
                            @php
                                $notesArray = array_filter(explode('.', $service->notes));
                            @endphp

                            <small class="text-muted">Notes:-</small>
                            @if (count($notesArray))
                                <ul class="ps-3 mb-0">
                                    @foreach ($notesArray as $note)
                                        <li><small class="text-muted"> {{ $note }}</small></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                @endif
            </div>

            <div class="col-lg-3">
                <h3 class="fw-bold mb-2 custom-underline">Related Services</h3>
                @foreach ($relatedServices as $item)
                    <a href="{{ route('web.' . $type . '-details', $item->slug) }}"
                        class="custom-card {{ $item->id == $service->id ? 'custom-card-active' : '' }}">
                        <span>{{ $item->name }}</span>
                        <i class="arrow-icon"></i>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container mb-3">
        <x-web.cta-banner />
    </div>
@endsection
