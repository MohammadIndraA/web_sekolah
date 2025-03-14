@extends('frontend.layouts.main')'
@section('title', 'Perserta Didik Pindahan')
@section('style')
    <style>
        .contact-add {
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 20px auto;
            font-family: 'Arial', sans-serif;
        }

        .contact-add h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
            text-align: center;
        }

        .contact-add ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .contact-add ul li {
            padding: 10px 15px;
            border-radius: 5px;
            color: #444;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .contact-add ul li:hover {
            background-color: #f1f1f1;
        }

        .contact-add ul li::before {
            content: "•";
            color: #007bff;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
    </style>
@endsection
@section('content')
    <div class="contact-area pt-150 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="contact-contents text-center">
                        <div class="single-contact">
                            <div class="contact-add">
                                <h3>SYARAT & KETENTUAN</h3>
                                <ul>
                                    <li>SURAT PINDAH</li>
                                    <li>RAPORT</li>
                                    <li>FC IJAZAH SMP/MTs</li>
                                    <li>FC NISN</li>
                                    <li>FC AKTA KELAHIRAN</li>
                                    <li>FC KARTU KELUARGA</li>
                                    <li>PASS FOTO LATAR MERAH</li>
                                    <li>UKURAN 3X4 (3 LEMBAR)</li>
                                    <li>UKURAN 4X6 (3 LEMBAR)</li>
                                    <li>FC KIP/KIS/PHK (bila ada)</li>
                                    <li>MATERAI 10.000 (2 LEMBAR)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="reply-area">
                        <h3>FORM CALON PESERTA DIDIK PINDAHAN</h3>
                        <p>Formulir untuk mengumpulkan data calon siswa pindahan, mencakup informasi pribadi, riwayat
                            pendidikan.</p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('siswa.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Name Calon Peserta Didik</p>
                                    <input type="hidden" name="kategori" id="kategori" value="Siswa/i Pindahan">
                                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Jenis Kelamin</p>
                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                        class="form-control mb-20 @error('jenis_kelamin') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option> <!-- Opsi default -->
                                        <option value="Laki-laki"
                                            {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Tempat Lahir</p>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Tanggal Lahir</p>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Alamat Sekarang</p>
                                    <textarea name="alamat" id="alamat" cols="5" rows="5" value="{{ old('alamat') }}">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Asal Sekolah</p>
                                    <input type="text" name="asal_sekolah" id="asal_sekolah"
                                        value="{{ old('asal_sekolah') }}">
                                    @error('asal_sekolah')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Nama Orang Tua</p>
                                    <input type="text" name="nama_ortu" id="nama_ortu" value="{{ old('nama_ortu') }}">
                                    @error('nama_ortu')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>No Telepon / Whatsapp / Hp</p>
                                    <input type="text" name="nomor" id="nomor" value="{{ old('nomor') }}">
                                    @error('nomor')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Email</p>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <p>Perestasi Sekolah (Jika Ada)</p>
                                    <textarea name="prestasi" id="prestasi" cols="10" rows="7" value="{{ old('prestasi') }}">{{ old('prestasi') }}</textarea>
                                    @error('prestasi')
                                        <div class="invalid-feedback text-danger -mt-5 mb-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button class="default-btn" type="submit">mendaftar sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
