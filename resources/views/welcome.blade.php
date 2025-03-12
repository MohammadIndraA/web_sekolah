<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eduhome - Educational HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{ asset('eduhome/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/et-line-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('eduhome/css/responsive.css') }}">
    <script src="{{ asset('eduhome/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Header Area Start -->
    <header class="top">
        <div class="header-area two header-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('eduhome/img/logo/logo2.png') }}"
                                    alt="eduhome" /></a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-6">
                        <div class="content-wrapper text-right">
                            <!-- Main Menu Start -->
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Home</a>
                                        </li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="event.html">event</a>
                                        </li>
                                        {{-- <li><a href="blog.html">blog</a>
                                            <ul>
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="blog-left-side-bar.html">blog left sidebar</a></li>
                                                <li><a href="blog-right-side-bar.html">blog righ sidebar</a></li>
                                                <li><a href="blog-details.html">blog details</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="contact.html">Contact</a></li>
                                        <li></li>
                                    </ul>
                                </nav>
                            </div>
                            <!--Search Form Start-->
                            <div class="search-btn">
                                <ul data-toggle="dropdown" class="header-search search-toggle">
                                    <li class="search-menu">
                                        <i class="fa fa-search"></i>
                                    </li>
                                </ul>
                                <div class="search">
                                    <div class="search-form">
                                        <form id="search-form" action="#">
                                            <input type="search" placeholder="Search here..." name="search" />
                                            <button type="submit">
                                                <span><i class="fa fa-search"></i></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--End of Search Form-->
                            <!-- Main Menu End -->
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="mobile-menu hidden-lg hidden-md hidden-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    <!-- Background Area Start -->
    <section id="slider-container" class="slider-area two">
        <div class="slider-owl owl-theme owl-carousel">
            <!-- Start Slingle Slide -->
            <div class="single-slide item"
                style="background-image: url({{ asset('eduhome/img/slider/sebagian.jpg') }})">
                <!-- Start Slider Content -->
                <div class="slider-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="slide-content-wrapper">
                                    <div class="slide-content text-center">
                                        <h2>EDUCATION MAKES HUMANITY </h2>
                                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and
                                            prsing pain was born and I will give you a complete account of the system
                                        </p>
                                        <a class="default-btn" href="about.html">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Slider Content -->
            </div>
            <!-- End Slingle Slide -->
            <!-- Start Slingle Slide -->
            <div class="single-slide item"
                style="background-image: url({{ asset('eduhome/img/slider/slider3.jpg') }})">
                <!-- Start Slider Content -->
                <div class="slider-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="slide-content-wrapper">
                                    <div class="slide-content text-center">
                                        <h2>EDUCATION MAKES HUMANITY </h2>
                                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and
                                            prsing pain was born and I will give you a complete account of the system
                                        </p>
                                        <a class="default-btn" href="about.html">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Slider Content -->
            </div>
            <!-- End Slingle Slide -->
            <!-- Start Slingle Slide -->
            <div class="single-slide item" style="background-image: url({{ asset('eduhome/lider/sebagian.jpg') }})">
                <!-- Start Slider Content -->
                <div class="slider-content-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="slide-content-wrapper">
                                    <div class="slide-content text-center">
                                        <h2>EDUCATION MAKES HUMANITY </h2>
                                        <p>I must explain to you how all this mistaken idea of denouncing pleasure and
                                            prsing pain was born and I will give you a complete account of the system
                                        </p>
                                        <a class="default-btn" href="about.html">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Slider Content -->
            </div>
            <!-- End Slingle Slide -->
        </div>
    </section>
    <!-- Background Area End -->
    <br>
    <br>
    <br>
    <!-- About Start -->
    <div class="about-area pb-155">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="about-content">
                        <h2>VISI <span>MISI</span></h2>
                        <p>I must explain to you how all this mistaken idea of denouncing pleure and prsing pain was
                            born and I will give you a complete account of the system, and expound the actual teachings
                            the master-builder of humanit happiness</p>
                        <p class="hidden-sm">I must explain to you how all this mistaken idea of denouncing pleure and
                            prsing pain was born and I will give you a complete account of the system</p>
                        <a class="default-btn" href="about.html">view courses</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="about-img">
                        <img src="{{ asset('eduhome/img/about/about.png') }}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Courses Area Start -->
    <div class="courses-area two pt-150 pb-150 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <img src="{{ asset('eduhome/img/icon/section1.png') }}" alt="section-title">
                        <h2>COURSES WE OFFER</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-course">
                        <div class="course-img">
                            <a href="course-details.html"><img src="{{ asset('eduhome/img/course/course1.jpg') }}"
                                    alt="course">
                                <div class="course-hover">
                                    <i class="fa fa-link"></i>
                                </div>
                            </a>
                        </div>
                        <div class="course-content">
                            <h3><a href="course-details.html">CSE ENGINEERING</a></h3>
                            <p>I must explain to you how all this a mistaken idea of denouncing great explorer of the
                                rut the is lder of human happiness</p>
                            <a class="default-btn" href="course-details.html">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-course">
                        <div class="course-img">
                            <a href="course-details.html"><img src="{{ asset('eduhome/img/course/course2.jpg') }}"
                                    alt="course">
                                <div class="course-hover">
                                    <i class="fa fa-link"></i>
                                </div>
                            </a>
                        </div>
                        <div class="course-content">
                            <h3><a href="course-details.html">political science</a></h3>
                            <p>I must explain to you how all this a mistaken idea of denouncing great explorer of the
                                rut the is lder of human happiness</p>
                            <a class="default-btn" href="course-details.html">read more</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm col-xs-12">
                    <div class="single-course">
                        <div class="course-img">
                            <a href="course-details.html"><img src="{{ asset('eduhome/img/course/course3.jpg') }}"
                                    alt="course">
                                <div class="course-hover">
                                    <i class="fa fa-link"></i>
                                </div>
                            </a>
                        </div>
                        <div class="course-content">
                            <h3><a href="course-details.html">micro biology</a></h3>
                            <p>I must explain to you how all this a mistaken idea of denouncing great explorer of the
                                rut the is lder of human happiness</p>
                            <a class="default-btn" href="course-details.html">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses Area End -->
    <!-- Notice Start -->
    <section class="notice-area two pt-140">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="notice-right-wrapper mb-25 pb-25">
                        <h3>TAKE A VIDEO TOUR</h3>
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
                        <h3>notice board</h3>
                        <div class="notice-left">
                            <div class="single-notice-left mb-23 pb-20">
                                <h4>5, June 2017</h4>
                                <p>I must explain to you how all this mistaken idea of denouncing plasure and praising
                                    pain was born and I will give you a complete </p>
                            </div>
                            <div class="single-notice-left hidden-sm mb-23 pb-20">
                                <h4>4, June 2017</h4>
                                <p>I must explain to you how all this mistaken idea of denouncing plasure and praising
                                    pain was born and I will give you a complete </p>
                            </div>
                            <div class="single-notice-left pb-70">
                                <h4>3, June 2017</h4>
                                <p>I must explain to you how all this mistaken idea of denouncing plasure and praising
                                    pain was born and I will give you a complete </p>
                            </div>
                            <div class="single-notice-left mb-23 pb-20">
                                <h4>5, June 2017</h4>
                                <p>I must explain to you how all this mistaken idea of denouncing plasure and praising
                                    pain was born and I will give you a complete </p>
                            </div>
                            <div class="single-notice-left hidden-sm mb-23 pb-20">
                                <h4>4, June 2017</h4>
                                <p>I must explain to you how all this mistaken idea of denouncing plasure and praising
                                    pain was born and I will give you a complete </p>
                            </div>
                            <div class="single-notice-left pb-70">
                                <h4>3, June 2017</h4>
                                <p>I must explain to you how all this mistaken idea of denouncing plasure and praising
                                    pain was born and I will give you a complete </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Notice End -->
    <!-- Event Area Start -->
    <div class="event-area two text-center pt-100 pb-145">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-title">
                        <img src="{{ asset('eduhome/') }}img/icon/section.png') }}" alt="section-title">
                        <h2>UPCOMMING EVENTS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-event mb-35">
                        <div class="event-img">
                            <a href="event-details.html"><img src="{{ asset('eduhome/img/event/event1.jpg') }}"
                                    alt="event"></a>
                        </div>
                        <div class="event-content text-left">
                            <h3>20 June 2017</h3>
                            <h4><a href="event-details.html">ADVANCE PHP WORKSHOP</a></h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>9.00 AM - 4.45 PM</li>
                                <li><i class="fa fa-map-marker"></i>New Yourk City</li>
                            </ul>
                            <div class="event-content-right">
                                <a class="default-btn" href="event-details.html">join now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-event hidden-sm hidden-xs">
                        <div class="event-img">
                            <a href="event-details.html"><img src="{{ asset('eduhome/img/event/event3.jpg') }}"
                                    alt="event"></a>
                        </div>
                        <div class="event-content text-left">
                            <h3>16 June 2017</h3>
                            <h4><a href="event-details.html">learning english history</a></h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>9.00 AM - 4.45 PM</li>
                                <li><i class="fa fa-map-marker"></i>New Yourk City</li>
                            </ul>
                            <div class="event-content-right">
                                <a class="default-btn" href="event-details.html">join now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-event mb-35">
                        <div class="event-img">
                            <a href="event-details.html"><img src="{{ asset('eduhome/img/event/event2.jpg') }}"
                                    alt="event"></a>
                        </div>
                        <div class="event-content text-left">
                            <h3>18 June 2017</h3>
                            <h4><a href="event-details.html">DIGITAL MARKETING ANALYSIS</a></h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>9.00 AM - 4.45 PM</li>
                                <li><i class="fa fa-map-marker"></i>New Yourk City</li>
                            </ul>
                            <div class="event-content-right">
                                <a class="default-btn" href="event-details.html">join now</a>
                            </div>
                        </div>
                    </div>
                    <div class="single-event hidden-sm hidden-xs">
                        <div class="event-img">
                            <a href="event-details.html"><img src="{{ asset('eduhome/img/event/event3.jpg') }}"
                                    alt="event"></a>
                        </div>
                        <div class="event-content text-left">
                            <h3>14 June 2017</h3>
                            <h4><a href="event-details.html">UI & UX DESIGNER MEETUP</a></h4>
                            <ul>
                                <li><i class="fa fa-clock-o"></i>9.00 AM - 4.45 PM</li>
                                <li><i class="fa fa-map-marker"></i>New Yourk City</li>
                            </ul>
                            <div class="event-content-right">
                                <a class="default-btn" href="event-details.html">join now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Area End -->
    <!-- Footer Start -->
    <footer class="footer-area">
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-widget pr-60">
                            <div class="footer-logo pb-25">
                                <a href="index.html"><img src="{{ asset('eduhome/img/logo/footer-logo.png') }}"
                                        alt="eduhome"></a>
                            </div>
                            <p>I must explain to you how all this mistaken idea of denoung pleure and praising pain was
                                born and give you a coete account of the system. </p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="https://www.facebook.com/devitems/?ref=bookmarks"><i
                                                class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="https://www.pinterest.com/devitemsllc/"><i
                                                class="zmdi zmdi-pinterest"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                    <li><a href="https://twitter.com/devitemsllc"><i
                                                class="zmdi zmdi-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="single-widget">
                            <h3>information</h3>
                            <ul>
                                <li><a href="#">addmission</a></li>
                                <li><a href="#">Academic Calender</a></li>
                                <li><a href="event.html">Event List</a></li>
                                <li><a href="#">Hostel &amp; Dinning</a></li>
                                <li><a href="#">TimeTable</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-widget">
                            <h3>useful links</h3>
                            <ul>
                                <li><a href="course.html">our courses</a></li>
                                <li><a href="about.html">about us</a></li>
                                <li><a href="teacher.html">teachers &amp; faculty</a></li>
                                <li><a href="#">teams &amp; conditions</a></li>
                                <li><a href="event.html">our events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="single-widget">
                            <h3>get in touch</h3>
                            <p>Your address goes here, Street<br>City, Roadno 785 New York</p>
                            <p>+880 548 986 898 87<br>+880 659 785 658 98</p>
                            <p>info@eduhome.com<br>www.eduhome.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p>Copyright © <a href="https://devitems.com/" target="_blank">HasTech</a> 2017. All Right
                            Reserved By Hastech.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <script src="{{ asset('eduhome/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('eduhome/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('eduhome/js/jquery.meanmenu.js') }}"></script>
    <script src="{{ asset('eduhome/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('eduhome/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('eduhome/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('eduhome/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('eduhome/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('eduhome/js/plugins.js') }}"></script>
    <script src="{{ asset('eduhome/js/main.js') }}"></script>
</body>

</html>
