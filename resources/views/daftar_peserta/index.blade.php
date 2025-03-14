@extends('layouts.main')
@section('title', 'Daftar Peserta')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                        <li class="breadcrumb-item active">Daftar Peserta</li>
                    </ol>
                </div>
                <h4 class="page-title">Daftar Peserta</h4>
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
                                onClick="addData('{{ route('daftar-peserta.store') }}')"><i
                                    class="mdi mdi-plus-circle me-2"></i>
                                Tambah Data</a>
                        </div>
                        {{-- @endcan --}}
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless" id="data-table">
                            <thead class="">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nomor Peserta</th>
                                    <th>Nama Sekolah</th>
                                    <th>Kategori Lomba</th>
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
                <label for="no_perserta" class="col-3 col-form-label">Nomor Peserta <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <input type="text" class="form-control" name="no_perserta" id="no_perserta"
                        value="{{ old('no_perserta') }}" placeholder="1">
                </div>
            </div>
            <!-- Single Select Sekolah-->
            <div class="row mb-1">
                <label for="daftar_sekolah_id" class="col-3 col-form-label">Nama Sekolah <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <select class="form-select" id="daftar_sekolah_id" name="daftar_sekolah_id">
                        <option disabled selected>Pilih Sekolah</option>
                        @foreach ($daftarSekolah as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Single Select Kategori-->
            <div class="row mb-1">
                <label for="kategori_lomba_id" class="col-3 col-form-label">Nama Kategori <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <select class="form-select" id="kategori_lomba_id" name="kategori_lomba_id">
                        <option disabled selected>Pilih Kategori</option>
                        @foreach ($daftarKategori as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
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
                ajax: "{{ route('daftar-peserta.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'no_perserta',
                        name: 'no_perserta',
                    },
                    {
                        data: 'daftar_sekolah_id',
                        name: 'daftar_sekolah_id',
                    },
                    {
                        data: 'kategori_lomba_id',
                        name: 'kategori_lomba_id',
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
            $('#modal-title').text("Tambah Data Sekolah");
            $('#modal-form').modal('show');
            $('#id').val('');
        }

        // trigger edit modal
        function editFunc(id) {
            $('#myForm').trigger("reset");
            $('#myForm').find('.is-invalid').removeClass('is-invalid'); // Remove validation errors
            $('#myForm').find('.invalid-feedback').text(''); // Clear validation error messages
            $('#modal-title').text("Tambah Data Sekolah");
            $('#modal-form').modal('show');
            // url action to update
            let url = `{{ route('daftar-peserta.update', 'ids') }}`
            $('#myForm').attr('action', url.replace('ids', id));
            $('#myForm').data('type', 'edit');

            $.ajax({
                type: "GET",
                url: "{{ route('daftar-peserta.edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#modal-title').html("Edit Data");
                    $('#modal-form').modal('show');
                    $('#id').val(res.data.id);
                    $('#no_perserta').val(res.data.no_perserta);
                    $('#daftar_sekolah_id').val(res.data.daftar_sekolah_id);
                    $('#kategori_lomba_id').val(res.data.kategori_lomba_id);
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
                    url: "{{ route('daftar-peserta.delete') }}",
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
