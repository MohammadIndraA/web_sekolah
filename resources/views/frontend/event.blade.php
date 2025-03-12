@extends('frontend.layouts.main')
@section('title', 'Event')
@section('content')
    <!-- Banner Area Start -->
    <div class="banner-area-wrapper">
        <div class="banner-area text-center" style="background-image: url({{ asset('eduhome/img/event.png') }})">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>Event</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
    <!-- Blog Start -->
    <div class="blog-area event-area three pt-60 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="blog-sidebar left">
                        <div class="single-blog-widget mb-50">
                            <h3>search</h3>
                            <div class="blog-search">
                                <form id="search" action="">
                                    <input type="search" placeholder="Search..." name="search" />
                                    <button type="submit">
                                        <span><i class="fa fa-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="single-blog-widget mb-30">
                            <form action="" method="get">
                                <h3><a href="{{ route('event') }}">SEKOLAH</a></h3>
                                <ul>
                                    @foreach ($sekolah as $item)
                                        <li><a href="{{ route('event') }}?sekolah_id={{ $item->id }}"
                                                name="{{ $item->name }}"
                                                value="{{ $item->id }}">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('event.confirmasi') }}" method="POST">
                        @csrf
                        @if ($daftarPeserta->count() > 0)
                            <div class="row">
                                @if (REQUEST()->has('sekolah_id'))
                                    <div class="subscribe-content section-title text-center">
                                        <h2>{{ $item->daftarSekolah->name ?? '' }}</h2>
                                    </div>
                                @endif
                                @foreach ($daftarPeserta as $item)
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="single-event mb-60">
                                            <div class="event-img">
                                                <a href="#">
                                                    <div class="course-hover">
                                                        <i class="fa fa-link"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="event-content text-left">
                                                <h4><a href="#">{{ $item->kategoriLomba->name }}</a></h4>
                                                <ul>
                                                    <li><span>Nomor Peserta :</span> {{ $item->no_perserta }}</li>
                                                    <li><span>Nama Sekolah :</span> {{ $item->daftarSekolah->name }}</li>
                                                </ul>
                                            </div>
                                            @if ($item->daftarSekolah == null)
                                                <div class="subscribe-content section-title text-center">
                                                    <h2>BELUM TERDAFTAR PESERTA LOMBA</h2>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="subscribe-content section-title text-center">
                                <h2>DATA TIDAK DITEMUKAN</h2>
                            </div>
                        @endif
                        {{ $daftarPeserta->links() }}

                        @if (REQUEST()->has('sekolah_id') && $item->daftarSekolah != null)
                            <!-- Subscribe Start -->
                            <div class="subscribe-area pt-60 pb-70 w-90">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 pl-0">
                                            @if ($item->daftarSekolah->status == 'tidak aktif')
                                                <div class="subscribe-content section-title text-center">
                                                    <h2>KONFIRMASI DAFTAR HADIR</h2>
                                                </div>
                                                <div class="newsletter-form mc_embed_signup">
                                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                                        <input type="hidden" name="sekolah_id"
                                                            value="{{ $item->daftarSekolah->id }}">
                                                        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="4" rows="4"
                                                            placeholder="Masukkan keterangan bila ada"></textarea>
                                                        <!-- Real people should not fill this in and expect good things - do not remove this or risk form bot signups -->
                                                        <button id="mc-embedded-subscribe" class="default-btn mt-3"
                                                            type="submit">
                                                            <span>Konfirmasi Daftar Hadir</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="subscribe-content section-title text-center">
                                                    <h2>TERIMAKASIH SUDAH DAFTAR ULANG</h2>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Subscribe End -->
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
