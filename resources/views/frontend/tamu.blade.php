@extends('frontend.layouts.main')'
@section('title', 'Tamu')
@section('content')
    <div class="contact-area pt-150 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="contact-contents text-center">
                        <div class="single-contact mb-65">
                            <div class="contact-icon">
                                <img src="{{ asset('eduhome/img/contact/contact1.png') }}" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>address</h3>
                                <p>{{ $setting->address }}</p>
                            </div>
                        </div>
                        <div class="single-contact mb-65">
                            <div class="contact-icon">
                                <img src="{{ asset('eduhome/img/contact/contact2.png') }}" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>Phone</h3>
                                <p>{{ $setting->phone_1 }}</p>
                                <p>{{ $setting->phone_2 }}</p>
                            </div>
                        </div>
                        <div class="single-contact">
                            <div class="contact-icon">
                                <img src="{{ asset('eduhome/img/contact/contact3.png') }}" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>Surel</h3>
                                <p>-</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="reply-area">
                        <h3>LEAVE A message</h3>
                        <p>Dipersilahkan untuk isi daftar tamu di bawah ini</p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('tamu.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Name</p>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Nomor</p>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Utusan / Pesan</p>
                                    <textarea name="utusan" id="utusan" cols="15" rows="10" value="{{ old('utusan') }}"></textarea>
                                    @error('utusan')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button class="default-btn" type="submit">send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
