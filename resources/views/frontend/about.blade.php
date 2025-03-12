@extends('frontend.layouts.main')
@section('title', 'About')
@section('content')
    <!-- Banner Area Start -->
    <div class="banner-area-wrapper">
        <div class="banner-area text-center"
            style="background-image: url('{{ asset($about->banner ? 'storage/' . $about->banner : 'eduhome/img/slider/slider1.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>about us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->
    <!-- About Start -->
    <div class="about-area pt-145 pb-155">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-content">
                        <h2>TENTANG <span>MA PK AL-HIKMAH</span></h2>
                        <p>{{ $about->description ?? 'MA Al Hikmah adalah madrasah aliyah yang berkomitmen dalam memberikan pendidikan berkualitas berbasis nilai-nilai Islam. Dengan lingkungan belajar yang kondusif, tenaga pendidik profesional, serta program akademik dan keagamaan yang seimbang, MA Al Hikmah berupaya mencetak generasi unggul, berakhlak mulia, dan siap menghadapi tantangan masa depan. 🌿📚✨' }}
                        </p>
                        <a class="default-btn" href="#">selengkapnya</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="about-img">
                        <img src="{{ asset('storage/' . $about->thumbnail ?? 'eduhome/img/about/about.png') }}"
                            alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Teacher Start -->
    {{-- <div class="teacher-area pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title text-center">
                        <img src="{{ asset('eduhome/img/icon/section.png') }}" alt="title">
                        <h2>meet our teachers</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-teacher">
                        <div class="single-teacher-img">
                            <a href="teacher-details.html"><img src="{{ asset('eduhome/img/teacher/teacher1.jpg') }}"
                                    alt="teacher"></a>
                        </div>
                        <div class="single-teacher-content text-center">
                            <h2><a href="teacher-details.html">STUART KELVIN</a></h2>
                            <h4>Associate Professor</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://www.pinterest.com/devitemsllc/"><i class="zmdi zmdi-pinterest"></i></a>
                                </li>
                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                <li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-teacher">
                        <div class="single-teacher-img">
                            <a href="teacher-details.html"><img src="{{ asset('eduhome/img/teacher/teacher2.jpg') }}"
                                    alt="teacher"></a>
                        </div>
                        <div class="single-teacher-content text-center">
                            <h2><a href="teacher-details.html">eamily cristian</a></h2>
                            <h4>Associate Professor</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://www.pinterest.com/devitemsllc/"><i class="zmdi zmdi-pinterest"></i></a>
                                </li>
                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                <li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-teacher">
                        <div class="single-teacher-img">
                            <a href="teacher-details.html"><img src="{{ asset('eduhome/img/teacher/teacher3.jpg') }}"
                                    alt="teacher"></a>
                        </div>
                        <div class="single-teacher-content text-center">
                            <h2><a href="teacher-details.html">kevin williams</a></h2>
                            <h4>Associate Professor</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://www.pinterest.com/devitemsllc/"><i class="zmdi zmdi-pinterest"></i></a>
                                </li>
                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                <li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm col-xs-12">
                    <div class="single-teacher">
                        <div class="single-teacher-img">
                            <a href="teacher-details.html"><img src="{{ asset('eduhome/img/teacher/teacher4.jpg') }}"
                                    alt="teacher"></a>
                        </div>
                        <div class="single-teacher-content text-center">
                            <h2><a href="teacher-details.html">salina gomaze</a></h2>
                            <h4>Associate Professor</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://www.pinterest.com/devitemsllc/"><i class="zmdi zmdi-pinterest"></i></a>
                                </li>
                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                <li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-sm col-xs-12">
                    <div class="single-teacher">
                        <div class="single-teacher-img">
                            <a href="teacher-details.html"><img src="{{ asset('eduhome/img/teacher/teacher4.jpg') }}"
                                    alt="teacher"></a>
                        </div>
                        <div class="single-teacher-content text-center">
                            <h2><a href="teacher-details.html">salina gomaze</a></h2>
                            <h4>Associate Professor</h4>
                            <ul>
                                <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://www.pinterest.com/devitemsllc/"><i
                                            class="zmdi zmdi-pinterest"></i></a>
                                </li>
                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                <li><a href="https://twitter.com/devitemsllc"><i class="zmdi zmdi-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Teacher End -->
@endsection
