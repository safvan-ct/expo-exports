@extends('layouts.admin')

@section('content')
    <x-admin.page-header title="Products" :breadcrumb="[['label' => 'Dashboard', 'link' => route('admin.dashboard')], ['label' => 'Products']]" />

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <select class="form-select selectFilter form-select-sm w-auto" id="getFilter">
                        <option value="all">All Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                    <button onclick="CRUD.open()" class="btn btn-primary btn-sm add-btn">Add Product</button>
                    <x-admin.table :headers="['#', 'Category', 'Name', 'Description', 'Active', 'Actions']"></x-admin.table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery.repeater/jquery.repeater.min.js"></script>

    <script>
        $('#documentsRepeater').repeater({
            initEmpty: false,
            defaultValues: {
                'name': '',
                'note': ''
            }
        });

        let oldData =
            "Applicant OriginalPassport@@@Applicant Visacopy@@@Sponsor Visa Copy";

        oldData.split('@@@').forEach(item => {
            $('#documentsRepeater [data-repeater-create]').click();
            let last = $('#documentsRepeater [data-repeater-item]').last();
            last.find('[name="name"]').val(item);
        });
    </script>

    <script>
        CRUD.setResource("product");

        if (localStorage.getItem("MenuFilter")) {
            $('#getFilter').val(localStorage.getItem("MenuFilter"));
        }

        const tableColumns = [{
                data: "id"
            },
            {
                data: "category.name"
            },
            {
                data: "name"
            },
            {
                data: "description",
                orderable: false,
            },

            // CRUD.columnToggleStatus('key_service'),
            // CRUD.columnToggleStatus('useful_service'),
            CRUD.columnToggleStatus(),
            CRUD.columnActions(true, false),
        ];

        window.crudTable = CRUD.loadDataTable(tableColumns);

        $('#getFilter').on('change', function() {
            localStorage.setItem("MenuFilter", $(this).val());
            crudTable.ajax.reload(null, false);
        });

        $(document).ready(function() {
            $('#crudModal').on('shown.bs.modal', function() {
                $(this).find('.modal-dialog')
                    .removeClass('modal-sm modal-lg')
                    .addClass('modal-lg');
            });
        });
    </script>
@endpush
