@extends('layouts.main')
@section('title', 'Berita')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                        <li class="breadcrumb-item active">Berita</li>
                    </ol>
                </div>
                <h4 class="page-title">Berita</h4>
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
                                onClick="addData('{{ route('berita.store') }}')"><i class="mdi mdi-plus-circle me-2"></i>
                                Tambah Data</a>
                        </div>
                        {{-- @endcan --}}
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless" id="data-table">
                            <thead class="">
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
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
            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
            <div class="row mb-1">
                <label for="title" class="col-3 col-form-label">Judul <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}"
                        placeholder="1">
                </div>
            </div>
            <div class="row mb-1">
                <label for="image" class="col-3 col-form-label">Gambar <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <input type="file" class="form-control" name="image" id="image" value="{{ old('image') }}"
                        placeholder="1">
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
            <div class="row mb-1">
                <label for="content" class="col-3 col-form-label">Deskripsi <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <div id="editor" style="height: 300px;" data-deskripsi="{{ old('content', $about->content ?? '') }}">
                    </div>
                    <input type="hidden" name="content" id="content-input"
                        value="{{ old('content', $about->content ?? '') }}">
                </div>
            </div>
            <!-- Single Select Sekolah-->
            <div class="row mb-1">
                <label for="kategori_berita_id" class="col-3 col-form-label">Kategori <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <select class="form-select" id="kategori_berita_id" name="kategori_berita_id">
                        <option disabled selected>Pilih Sekolah</option>
                        @foreach ($kategoris as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- Single Select Kategori-->
            <div class="row mb-1">
                <label for="tag_berita_id" class="col-3 col-form-label">Tag <sop class="text-danger">*</sop>
                </label>
                <div class="col-9">
                    <select class="form-select" id="tag_berita_id" name="tag_berita_id">
                        <option disabled selected>Pilih Kategori</option>
                        @foreach ($tags as $item)
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
                ajax: "{{ route('berita.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'content',
                        name: 'content',
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
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row) {
                            return `<img src="storage/${row.image}" alt="Gambar" width="50" height="50">`;
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

        // quil editor

        // Tambahkan event listener untuk sinkronisasi  
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Listener untuk update input hidden  
        quill.on('text-change', function() {
            var content = quill.root.innerHTML;
            document.getElementById('content-input').value = content;
        });

        // end


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
            let url = `{{ route('berita.update', 'id') }}`
            $('#myForm').attr('action', url.replace('id', id));
            $('#myForm').data('type', 'edit');

            $.ajax({
                type: "GET",
                url: "{{ route('berita.edit') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#modal-title').html("Edit Data");
                    $('#modal-form').modal('show');
                    $('#id').val(res.data.id);
                    $('#title').val(res.data.title);
                    quill.root.innerHTML = res.data.content;
                    if (res.data.status == 'aktif') {
                        $('#aktif').prop('checked', true);
                    } else {
                        $('#nonaktif').prop('checked', true);
                    }
                    $('#kategori_berita_id').val(res.data.kategori_berita_id);
                    $('#tag_berita_id').val(res.data.tag_berita_id);
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
                    url: "{{ route('berita.delete') }}",
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
