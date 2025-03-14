@extends('layouts.main')

@section('title', 'Settings')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i>
                        Company Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" value="{{ $setting->id ?? '' }}">
                            <div class="mb-3">
                                <label for="companyname" class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $setting->name ?? '') }}" id="companyname"
                                    placeholder="Enter company name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cwebsite" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo" id="cwebsite"
                                    placeholder="Enter website url">
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone1" class="form-label">Nomor 1</label>
                                <input type="text" class="form-control"
                                    value="{{ old('phone_1', $setting->phone_1 ?? '') }}" name="phone_1" id="phone1"
                                    placeholder="+62 998887 77 0065 808">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone2" class="form-label">Nomor 2</label>
                                <input type="text" class="form-control"
                                    value="{{ old('phone_2', $setting->phone_2 ?? '') }}" name="phone_2" id="phone2"
                                    placeholder="+62 998887 77 0065 808">
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control"
                                    value="{{ old('address', $setting->address ?? '') }}" name="address" id="address"
                                    placeholder="Enter company name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ old('email', $setting->email ?? '') }}"
                                    name="email" id="email" placeholder="Company@email.text">
                            </div>
                        </div>
                    </div> <!-- end row -->
                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social
                    </h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-fb" class="form-label">Facebook</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ old('facebook', $setting->facebook ?? '') }}" id="social-fb"
                                        placeholder="Url">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-tw" class="form-label">Twitter</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                    <input type="text" class="form-control" name="twitter"
                                        value="{{ old('twitter', $setting->twitter ?? '') }}" id="social-tw"
                                        placeholder="Url">
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-insta" class="form-label">Instagram</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ old('instagram', $setting->instagram ?? '') }}" id="social-insta"
                                        placeholder="Url">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-yt" class="form-label">Youtube</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-youtube"></i></span>
                                    <input type="text" class="form-control" name="youtube"
                                        value="{{ old('youtube', $setting->youtube ?? '') }}" id="social-yt"
                                        placeholder="Url">
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-tiktok" class="form-label">Tiktok</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-tiktok"></i></span>
                                    <input type="text" class="form-control" name="tiktok"
                                        value="{{ old('tiktok', $setting->tiktok ?? '') }}" id="social-tiktok"
                                        placeholder="Url">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="social-threads" class="form-label">Threads</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-threads"></i></span>
                                    <input type="text" class="form-control" name="threads"
                                        value="{{ old('threads', $setting->threads ?? '') }}" id="social-threads"
                                        placeholder="Url">
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div class="text-end">
                        <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end row-->
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                <div class="col">
                    <h5 class="mb-4 text-uppercase">Logo</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('uploads/' . $setting->logo) }}" alt="Thumbnail" class="img-fluid"
                                width="200" height="200">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
