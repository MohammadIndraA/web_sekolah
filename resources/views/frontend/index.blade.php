@extends('frontend.layouts.main')
@section('title', 'HOME')
@section('content')
    <!-- Background Area Start -->
    <section id="slider-container" class="slider-area two">
        <div class="slider-owl owl-theme owl-carousel">
            <!-- Start Slingle Slide -->
            @foreach ($banners as $item)
                <div class="single-slide item"
                    style="background-image: url('{{ asset($item->image ? 'storage/' . $item->image : 'eduhome/img/slider/slider1.jpg') }}');">
                    <!-- Start Slider Content -->
                    <div class="slider-content-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="slide-content-wrapper">
                                        <div class="slide-content text-left">
                                            <h2>{{ $item->name ?? 'MA AL HIKMAH - Membangun Generasi Berakhlak dan Berprestasi' }}
                                            </h2>
                                            <p>{{ $item->deskripsi ?? 'Bergabunglah dengan MA AL HIKMAH, tempat di mana ilmu pengetahuan dan akhlak mulia berpadu. Kami berkomitmen mencetak generasi yang unggul dalam akademik, kuat dalam karakter, dan siap menghadapi masa depan.' }}
                                            </p>
                                            <a class="default-btn" href="#">PELAJARI</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start Slider Content -->
                </div>
            @endforeach
            <!-- End Slingle Slide -->
        </div>
    </section>
    <!-- Background Area End -->
    <br>
    <br>
    <!-- About Start -->
    <div class="about-area pb-120 pt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-content">
                        <h2>VISI <span>MISI</span></h2>
                        Menjadi madrasah unggul dalam prestasi, berlandaskan nilai-nilai Islam, serta membentuk generasi
                        yang berakhlak mulia, cerdas, dan berdaya saing.</p>
                        <ul>
                            <li>Menyelenggarakan pendidikan berbasis keislaman yang modern dan berkualitas.</li>
                            <li>Membentuk karakter peserta didik yang berakhlakul karimah dan berwawasan luas.</li>
                        </ul>
                        <a class="default-btn" href="/about">Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="about-img">
                        <img src="{{ asset('eduhome/img/event/abot.jpeg') }}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Notice Start -->
    <section class="notice-area two pt-100 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="notice-right-wrapper mb-25 pb-25">
                        <h3>Dokukentasi</h3>
                        <div class="notice-video">
                            <div class="video-icon video-hover">
                                <a class="video-popup" href="https://www.youtube.com/watch?v=to6Ghf8UL7o">
                                    <i class="zmdi zmdi-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="notice-left-wrapper">
                        <h3>JURUSAN TERBAIK</h3>
                        <div class="notice-left">
                            @foreach ($jurusan as $item)
                                <div class="single-notice-left mb-23 pb-20">
                                    {{-- <h4>{{ date('j, F Y', strtotime($item->date)) }} </h4> --}}
                                    <h4>{{ $item->name }} </h4>
                                    <p>{{ $item->deskripsi }} </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Notice End -->
    <!-- Courses Area Start -->
    <div class="courses-area two pt-150 pb-150 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <img src="{{ asset('eduhome/img/icon/section1.png') }}" alt="section-title">
                        <h2>Events</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($events as $item)
                    <div class="col-md-4 hidden-sm col-xs-12">
                        <div class="single-course">
                            <div class="course-img">
                                <a href="/event"><img src="{{ asset('storage/' . $item->image) }}" alt="course">
                                    <div class="course-hover">
                                        <i class="fa fa-link"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="course-content">
                                <h3><a href="/event">{{ $item->name }}</a></h3>
                                <p>{{ $item->deskripsi }}</p>
                                <a class="default-btn" href="">read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses Area End -->
    <!-- Event Area Start -->
    <div class="event-area two text-center pt-100 pb-145">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <img src="{{ asset('eduhome/img/icon/section.png') }}" alt="section-title">
                        <h2>KATEGORI LOMBA</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($kategoriLomba as $key => $item)
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="single-event mb-35">
                            <div class="event-img" style="width: 214px; height: 195px; overflow: hidden;">
                                <a href="/event">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="event"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </a>
                            </div>

                            <style>
                                @media (max-width: 600px) {
                                    .event-img {
                                        width: 100% !important;
                                        height: auto !important;
                                    }

                                    .event-img img {
                                        width: 100% !important;
                                        height: auto !important;
                                    }
                                }
                            </style>

                            <div class="event-content text-left">
                                <h3>{{ date('j, F Y', strtotime($item->date)) }}</h3>
                                <h4><a href="/event">{{ $item->name }}</a></h4>
                                <ul>
                                    <li><i class="fa fa-clock-o"></i> {{ date('h.i A', strtotime($item->date)) }} / SD
                                    </li>
                                    <li><i class="fa fa-map-marker"></i> {{ $item->alamat }}</li>
                                </ul>
                                <div class="event-content-right">
                                    <a class="default-btn" href="/event">join now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Event Area End -->
    <!-- Testimonial Area Start -->
    <div class="pb-105 text-center">
        <div class="col-xs-12">
            <div class="section-title">
                <h2>BAGAN PERLOMBAAN</h2>
            </div>
        </div>
    </div>
    <div class="testimonial-area pt-110 pb-105 text-center"
        style="background-image: url({{ asset('eduhome/img/event/expo.jpeg') }})">
        <div class="container">
            <div class="row">
                <div class="testimonial-owl owl-theme owl-carousel">
                    @foreach ($imageLomba as $item)
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="single-testimonial">
                                <div class="course-img" size="cover">
                                    <a href="/event"><img src="{{ asset('storage/' . $item->gambar) }}" alt="course">
                                        <div class="course-hover">
                                            <i class="fa fa-link"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Area End -->
@endsection
