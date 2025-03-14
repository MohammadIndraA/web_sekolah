<header class="top">
    <div class="header-area two header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ asset($setting->logo ? 'uploads/' . $setting->logo : 'eduhome/img/logo/2.png') }}"
                                alt="alhikmah" />
                        </a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-6">
                    <div class="content-wrapper text-right">
                        <!-- Main Menu Start -->
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="/">Home</a>
                                    </li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="#">PSB</a>
                                        <ul>
                                            <li><a href="/siswa-baru">PESERTA DIDIK BARU</a></li>
                                            <li><a href="/siswa-pindahan">PESSERTA PINDAHAN</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/event">event</a>
                                    <li><a href="/berita">Berita</a>
                                    <li><a href="/tamu">Tamu</a>
                                    </li>
                                    <li><a href="#">Profile</a>
                                        <ul>
                                            <li><a href="#">SEJARAH</a></li>
                                            <li><a href="#">VISI DAN MISI</a></li>
                                            <li><a href="#">GALERI</a></li>
                                        </ul>
                                    </li>
                                    {{-- <li><a href="/contak">Contact</a></li> --}}
                                    <li><a href="/login">Login</a>
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
