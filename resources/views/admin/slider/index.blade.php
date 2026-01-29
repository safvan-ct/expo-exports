@extends('layouts.admin')

@section('content')
    <x-admin.page-header title="Sliders" :breadcrumb="[['label' => 'Dashboard', 'link' => route('admin.dashboard')], ['label' => 'Sliders']]" />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button onclick="CRUD.open(0)" class="btn btn-primary btn-sm add-btn">Add Slider</button>
                    <x-admin.table :headers="['#', 'Title', 'Description', 'Image', 'Active', 'Actions']"></x-admin.table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        CRUD.setResource("slider");

        const tableColumns = [{
                data: "id"
            },
            {
                data: "title"
            },
            {
                data: "description"
            },
            {
                data: "image_src",
                orderable: false,
                searchable: false,
                render: (url) => {
                    return url ?
                        `<img src="${url}" width="40" height="40" class="rounded">` :
                        '-';
                }
            },

            CRUD.columnToggleStatus(),
            CRUD.columnActions(true, false),
        ];

        window.crudTable = CRUD.loadDataTable(tableColumns);
    </script>
@endpush
