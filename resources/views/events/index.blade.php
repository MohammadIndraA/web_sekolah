@extends('layouts.main')
@section('title', 'Event')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                        <li class="breadcrumb-item active">Event</li>
                    </ol>
                </div>
                <h4 class="page-title">Event</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        {{-- @can('create-user') --}}
                        <div class="col-sm-4">
                            <a href="#" class="btn btn-primary mb-2"
                                onClick="addData('{{ route('event.store') }}')"><i class="mdi mdi-plus-circle me-2"></i>
                                Tambah Data</a>
                        </div>
                        {{-- @endcan --}}
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless" id="data-table">
                            <thead class="">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>Dilaksanakan</th>
                                    <th>Deskripsi</th>
                                    <th>Tempat Dilaksanakan</th>
                                    <th>Gambar</th>
                                    <th>Status</th>
                                    <th style="width: 20px" class="text-center"><i class="dripicons-gear"></i></th>
                                    {{-- <th style="width: 85px;">Action</th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    <x-modal>
        <div class="modal-body">
            <x-slot name="size">
                modal-lg
            </x-slot>
            <input type="hidden" name="id" id="id">
            <div class="row mb-1">
                <label for="name" class="col-3 col-form-label">Nama Event <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                        placeholder="MA Negeri 1">
                </div>
            </div>
            <div class="row mb-1">
                <label for="deskripsi" class="col-3 col-form-label">Deskripsi <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ old('deskripsi') }}"
                        placeholder="MA Negeri 1"></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <label for="status" class="col-3 col-form-label">Status <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <div class="form-check form-check-inline">
                        <input type="radio" id="aktif" name="status" value="aktif" class="form-check-input">
                        <label class="form-check-label" for="aktif">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" id="nonaktif" name="status" value="tidak aktif" class="form-check-input">
                        <label class="form-check-label" for="nonaktif">Nonaktif</label>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <label for="date" class="col-3 col-form-label">Tanggal Dilaksanakan<sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}">
                </div>
            </div>
            <div class="row mb-2">
                <label for="alamat" class="col-3 col-form-label">Tempat Dilaksanakan<sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{ old('alamat') }}"
                        placeholder="MA AL-HIKMAH">
                </div>
            </div>
            <div class="row mb-2">
                <label for="image" class="col-3 col-form-label">Gambar<sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <input type="file" class="form-control" name="image" id="image"
                        value="{{ old('image') }}" placeholder="MA AL-HIKMAH">
                </div>
            </div>
        </div>
    </x-modal>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            // ajax setup for csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('event.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    }, {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return `<img src="storage/${row.image}" alt="Gambar" width="50" height="50">`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        render: function(data, type, row) {
                            if (data == 'aktif') {
                                return `<span class="badge bg-success">aktif</span>`;
                            } else {
                                return `<span class="badge bg-warning">tidak aktif</span>`;
                            }
                        }
                    },
                    {
                        data: 'action',
                        searchable: false,
                        sortable: false
                    }

                ]
            });
        });


        // trigger add modal
        function addData(url) {
            $('#myForm').attr('action', url);
            $('#myForm').data('type', 'add');
            $('#myForm').trigger("reset");
            $('#myForm').find('.is-invalid').removeClass('is-invalid'); // Remove validation errors
            $('#myForm').find('.invalid-feedback').text(''); // Clear validation error messages
            $('#modal-title').text("Tambah Data Kategori");
            $('#modal-form').modal('show');
            $('#id').val('');
        }

        // trigger edit modal
        function editFunc(id) {
            $('#myForm').trigger("reset");
            $('#myForm').find('.is-invalid').removeClass('is-invalid'); // Remove validation errors
            $('#myForm').find('.invalid-feedback').text(''); // Clear validation error messages
            $('#modal-title').text("Tambah Data Kategori");
            $('#modal-form').modal('show');
            // url action to update
            let url = `{{ route('event.update', 'id') }}`
            $('#myForm').attr('action', url.replace('id', id));
            $('#myForm').data('type', 'edit');

            $.ajax({
                type: "GET",
                url: "{{ route('event.edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#modal-title').html("Edit Data");
                    $('#modal-form').modal('show');
                    $('#id').val(res.data.id);
                    $('#name').val(res.data.name);
                    $('#date').val(res.data.date);
                    $('#alamat').val(res.data.alamat);
                    $('#deskripsi').val(res.data.deskripsi);
                    if (res.data.status == 'aktif') {
                        $('#aktif').prop('checked', true);
                    } else {
                        $('#nonaktif').prop('checked', true);
                    }
                },
                error: function(data) {
                    console.log(data.errors);

                    alertNotify('error', data.responseJSON.message);
                }
            });
        }

        // trigger delete
        function deleteFunc(id) {
            if (confirm("Delete Record?") == true) {
                var id = id;

                // ajax
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('event.delete') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        alertNotify('success', data.message);
                        var oTable = $('#data-table').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function(data) {
                        alertNotify('error', data.responseJSON.message);
                    }
                });
            }
        }

        // submit form with ajax
        $('#myForm').submit(function(e) {
            $("#btnSave").html(`
            <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                     </div> Loading...
            `);
            $("#btnSave").attr("disabled", true);
            e.preventDefault();
            var formData = new FormData(this);

            if ($('#myForm').data('type') == 'edit') {
                formData.append('_method', 'PUT')
            }
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#modal-form").modal('hide');
                    var oTable = $('#data-table').dataTable();
                    oTable.fnDraw(false);
                    $("#btnSave").html("Simpan");
                    $("#btnSave").attr("disabled", false);
                    alertNotify('success', data.message);
                },
                error: function(data) {
                    $("#btnSave").html("Simpan");
                    $("#btnSave").attr("disabled", false);
                    loopErrors(data.responseJSON.errors);
                    alertNotify('danger', data.responseJSON.message);
                }
            });
        });
    </script>
@endsection
