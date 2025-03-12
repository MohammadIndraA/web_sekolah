@extends('layouts.main')
@section('title', 'About')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page</a></li>
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> About</h5>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="{{ $about->id ?? '' }}">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <div id="editor" style="height: 300px;"
                                    data-deskripsi="{{ old('deskripsi', $about->deskripsi ?? '') }}">
                                </div>
                                <input type="hidden" name="deskripsi" id="deskripsi-input"
                                    value="{{ old('deskripsi', $about->deskripsi ?? '') }}">
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="banner" class="form-label">Banner</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('banner') is-invalid @enderror"
                                        name="banner" id="banner">
                                    @error('banner')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Thumbnail</label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                        name="thumbnail" id="thumbnail">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="text-end">
                        <button type="submit" class="btn btn-success mt-2">
                            <i class="mdi mdi-content-save"></i> Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                <div class="col">
                    <h5 class="mb-4 text-uppercase">Banner | Thumbnail</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . $about->banner) }}" alt="Banner" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('storage/' . $about->thumbnail) }}" alt="Thumbnail" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Tambahkan event listener untuk sinkronisasi  
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Listener untuk update input hidden  
        quill.on('text-change', function() {
            var content = quill.root.innerHTML;
            document.getElementById('deskripsi-input').value = content;
        });

        // Set konten dari backend jika ada  
        @if ($about->deskripsi ?? '')
            quill.root.innerHTML = `{!! $about->deskripsi !!}`;
        @endif
    </script>

@endsection
