@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info dashnum-card dashnum-card-small text-white overflow-hidden">
                <span class="round bg-info small"></span>
                <span class="round bg-info big"></span>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar avtar-lg">
                            <i class="text-white ti ti-calendar"></i>
                        </div>
                        <div class="ms-2">
                            <h4 class="text-white mb-1">{{ $todayBooking }}</h4>
                            <p class="mb-0 opacity-75 text-sm">Today Enquiry</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success dashnum-card dashnum-card-small text-white overflow-hidden">
                <span class="round bg-success small"></span>
                <span class="round bg-success big"></span>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar avtar-lg">
                            <i class="text-white ti ti-calendar"></i>
                        </div>
                        <div class="ms-2">
                            <h4 class="text-white mb-1">{{ $totalBooking }}</h4>
                            <p class="mb-0 opacity-75 text-sm">Total Enquiry</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-12">
            <div class="card bg-primary-dark dashnum-card dashnum-card-small text-white overflow-hidden">
                <span class="round bg-primary small"></span>
                <span class="round bg-primary big"></span>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar avtar-lg">
                            <i class="text-white ti ti-credit-card"></i>
                        </div>
                        <div class="ms-2">
                            <h4 class="text-white mb-1">{{ $categoryCount }}</h4>
                            <p class="mb-0 opacity-75 text-sm">Total Category</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-12">
            <div class="card dashnum-card dashnum-card-small overflow-hidden">
                <span class="round bg-warning small"></span>
                <span class="round bg-warning big"></span>
                <div class="card-body p-3">
                    <div class="d-flex align-items-center">
                        <div class="avtar avtar-lg bg-light-warning">
                            <i class="text-warning ti ti-briefcase"></i>
                        </div>
                        <div class="ms-2">
                            <h4 class="mb-1">{{ $productCount }}</h4>
                            <p class="mb-0 opacity-75 text-sm">Total Product</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <h4 class="card-header">Recent Enquiry</h4>

                <div class="card-body">
                    <x-admin.table :headers="['#', 'Name', 'Email', 'Phone', 'Message']" class=''></x-admin.table>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .row-1 {
        background-color: #fff !important;
        /* light blue */
    }

    .row-2 {
        background-color: #fff3cd !important;
        /* light orange */
    }

    .row-3 {
        background-color: #d1e7dd !important;
        /* light green */
    }
</style>

@push('scripts')
    <script>
        CRUD.setResource("booking");

        if (localStorage.getItem("BookingFilter")) {
            $('#getFilter').val(localStorage.getItem("BookingFilter"));
        }

        const tableColumns = [{
                data: "id"
            },
            {
                data: "name"
            },
            {
                data: "email",
                render: function(data, type, row) {
                    return `<a href="mailto:${data}">${data}</a>`;
                }
            },
            {
                data: "phone",
                render: function(data, type, row) {
                    let display = formatPhoneNumberPretty(data, row.country_code);
                    let tel = data.replace(/\D/g, '');

                    if (tel.startsWith('0')) {
                        tel = '971' + tel.substring(1);
                    }

                    return `<a href="tel:+${tel}">${display}</a>`;
                }
            },
            {
                data: "message"
            },
        ];

        window.crudTable = CRUD.loadDataTable(tableColumns, "dataTable", true);

        $('#getFilter').on('change', function() {
            localStorage.setItem("BookingFilter", $(this).val());
            crudTable.ajax.reload(null, false);
        });

        // Status change AJAX
        $(document).on('change', '.status-change', function() {
            let bookingId = $(this).data('id');
            let status = $(this).val();

            $.ajax({
                url: "{{ route('admin.booking.status.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: bookingId,
                    status: status
                },
                success: function() {
                    toastr.success('Status updated successfully');
                    crudTable.ajax.reload(null, false);
                },
                error: function() {
                    toastr.error('Failed to update status');
                }
            });
        });

        function formatPhoneNumberPretty(phone, country_code) {
            if (!phone) return '';

            // remove everything except digits
            phone = phone.replace(/\D/g, '');

            // normalize to 971XXXXXXXXX
            // if (phone.startsWith('0')) {
            //     phone = '971' + phone.substring(1);
            // }

            // if (!phone.startsWith('971') || phone.length !== 12) {
            //     return phone; // fallback if invalid
            // }

            let count = country_code.length;
            let inc = count <= 2 ? 3 : 2;


            let country = phone.substring(0, count); // 91
            let operator = phone.substring(count, count + inc); // 50
            let part1 = phone.substring(count + inc, count + inc + 3); // 000
            let part2 = phone.substring(count + 6); // 4567

            return `+${country} ${operator} ${part1} ${part2}`;
        }
    </script>
@endpush
