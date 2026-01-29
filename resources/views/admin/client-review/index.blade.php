@extends('layouts.admin')

@section('content')
    <x-admin.page-header title="Client Reviews" :breadcrumb="[['label' => 'Dashboard', 'link' => route('admin.dashboard')], ['label' => 'Client Reviews']]" />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <button onclick="CRUD.open()" class="btn btn-primary btn-sm add-btn">Add Client Review</button>
                    <x-admin.table :headers="['#', 'Name', 'Comment', 'Rating', 'Active', 'Actions']"></x-admin.table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        CRUD.setResource("client-reviews");

        const tableColumns = [{
                data: "id"
            },
            {
                data: "name"
            },
            {
                data: "comment"
            },
            {
                data: "rating",
                render: function(data, type, row) {
                    // view stars
                    let stars = '';
                    for (let i = 0; i < data; i++) {
                        stars += '<i class="fas fa-star text-warning"></i>';
                    }
                    return stars;
                }
            },

            CRUD.columnToggleStatus(),
            CRUD.columnActions(true, false),
        ];

        window.crudTable = CRUD.loadDataTable(tableColumns);
    </script>
@endpush
