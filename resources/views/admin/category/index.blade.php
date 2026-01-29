@extends('layouts.admin')

@section('content')
    <x-admin.page-header title="Category" :breadcrumb="[['label' => 'Dashboard', 'link' => route('admin.dashboard')], ['label' => 'Category']]" />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button onclick="CRUD.open()" class="btn btn-primary btn-sm add-btn">Add Category</button>
                    <x-admin.table :headers="['#', 'Name', 'Slug', 'Featured', 'Active', 'Actions']"></x-admin.table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        CRUD.setResource("category");

        const tableColumns = [{
                data: "id"
            },
            {
                data: "name"
            },
            {
                data: "slug"
            },

            CRUD.columnToggleStatus('is_featured'),

            CRUD.columnToggleStatus(),

            CRUD.columnActions(true, false),
        ];

        window.crudTable = CRUD.loadDataTable(tableColumns);
    </script>
@endpush
