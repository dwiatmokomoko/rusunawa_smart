@extends('app.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('bo/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bo/css/confirmjs.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card mt-4">
            <div class="card-body">
                <div class="card-body table-responsive">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <h5 class="card-title fw-semibold mb-4">Daftar Data Latih</h5>
                        </div>
                    </div>
                    <table class="table table-stripe sub-criteria_table">
                        <thead>
                            <tr>
                                <th class="text-center w-1">No</th>
                                <th class="text-start">Nama</th>
                                <th class="text-start">K1</th>
                                <th class="text-start">K2</th>
                                <th class="text-start">K3</th>
                                <th class="text-start">K4</th>
                                <th class="text-start">K5</th>
                                {{-- <th class="text-start">K6</th>
                                <th class="text-start">K7</th> --}}
                                <th class="text-start">Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Keterangan : </h5>
                            <ul>
                                <li>K1 : Penghasilan</li>
                                <li>K2 : Pekerjaan</li>
                                <li>K3 : Status Penempatan</li>
                                <li>K4 : Perkawinan</li>
                                <li>K5 : Calon Penghuni</li>
                                {{-- <li>K6 : Pekerjaan</li>
                                <li>K7 : Status Perkawinan</li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('bo/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bo/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('bo/js/confirmjs.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            var table = $('.sub-criteria_table').DataTable({
                language: {
                    paginate: {
                        next: "›",
                        previous: "‹"
                    }
                },
                processing: true,
                serverSide: true,
                ajax: "{{ route('data-trainings.data') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    // {
                    //     data: 'status_kependudukan',
                    //     name: 'status_kependudukan',
                    //     render: function(data) {
                    //         return data == 100 ? '1' : '0';
                    //     }
                    // },
                    // {
                    //     data: 'status_kepemilikan_rumah',
                    //     name: 'status_kepemilikan_rumah',
                    //     render: function(data) {
                    //         return data == 100 ? '1' : '0';
                    //     }
                    // },
                    {
                        data: 'penghasilan',
                        name: 'penghasilan',
                        render: function(data) {
                            if (data == 100) return '4';
                            if (data == 75) return '3';
                            if (data == 50) return '2';
                            if (data == 25) return '1';
                            return '0';
                        }
                    },

                     {
                        data: 'pekerjaan',
                        name: 'pekerjaan',
                        render: function(data) {
                            if (data == 100) return '4';
                            if (data == 75) return '3';
                            if (data == 50) return '2';
                            if (data == 25) return '1';
                            return '0';
                        }
                    },

                    {
                        data: 'status_penempatan',
                        name: 'status_penempatan',
                        render: function(data) {
                            if (data == 100) return '3';
                            if (data == 33) return '1';
                            return '0';
                        }
                    },



                    {
                        data: 'perkawinan',
                        name: 'perkawinan',
                        render: function(data) {
                            if (data == 100) return '3';
                            if (data == 67) return '2';
                            if (data == 33) return '1';
                            return '0';
                        }
                    },

                    {
                        data: 'calon_penghuni',
                        name: 'calon_penghuni',
                         render: function(data) {
                            if (data == 100) return '3';
                            if (data == 33) return '1';
                            return '0';
                        }
                    },

                    {
                        data: 'kelayakan',
                        name: 'kelayakan',

                    }
                ],
                columnDefs: [
                    { "targets": 0, "className": "text-center align-middle text-sm font-weight-normal", "width": "4%" },
                    { "targets": 1, "className": "ps-3 pt-0 pb-0 align-middle text-sm font-weight-normal" },
                    { "targets": 2, "className": "text-center align-middle text-sm font-weight-normal" },
                    { "targets": 3, "className": "text-center align-middle text-sm font-weight-normal" },
                    { "targets": 4, "className": "text-center align-middle text-sm font-weight-normal" },
                    { "targets": 5, "className": "text-center align-middle text-sm font-weight-normal" },
                    { "targets": 6, "className": "text-center align-middle text-sm font-weight-normal" },
                    { "targets": 7, "className": "text-center align-middle text-sm font-weight-normal" }

                    // ,
                    // { "targets": 8, "className": "text-center align-middle text-sm font-weight-normal" },
                    // { "targets": 9, "className": "text-center align-middle text-sm font-weight-normal" }

                ]
            });

            $(document).on('click', '#deleteRow', function(event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                $.confirm({
                    icon: 'fa fa-warning',
                    title: 'Yakin hapus data',
                    content: 'Kriteria ' + $(this).data('message').bold() + ' akan di hapus secara permanen',
                    type: 'orange',
                    typeAnimated: true,
                    buttons: {
                        delete: {
                            text: 'Hapus',
                            btnClass: 'btn-red',
                            action: function() {
                                form.submit();
                            }
                        },
                        batal: function() {}
                    }
                });
            });
        });
    </script>
@endpush
