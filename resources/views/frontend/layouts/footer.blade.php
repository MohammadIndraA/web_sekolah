<footer class="footer-area">
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="single-widget pr-60">
                        <div class="footer-logo pb-25">
                            <a href="index.html"><img
                                    src="{{ asset($setting->logo ? 'uploads/' . $setting->logo : 'eduhome/img/logo/2.png') }}"
                                    alt="eduhome"></a>
                        </div>
                        <p>I must explain to you how all this mistaken idea of denoung pleure and praising pain was
                            born and give you a coete account of the system. </p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="{{ $setting->facebook ?? 'https://www.facebook.com/' }}"><i
                                            class="zmdi zmdi-facebook"></i></a></li>
                                <li><a href="{{ $setting->tiktok ?? 'https://www.tiktok.com/' }}"><i
                                            class="zmdi zmdi-pinterest"></i></a></li>
                                <li><a href="{{ $setting->instagram ?? 'https://www.instagram.com/' }}"><i
                                            class="zmdi zmdi-vimeo"></i></a></li>
                                <li><a href="{{ $setting->twitter ?? 'https://twitter.com/' }}"><i
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
                            <li><a href="/event">Event List</a></li>
                            <li><a href="#">Hostel &amp; Dinning</a></li>
                            <li><a href="#">TimeTable</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="single-widget">
                        <h3>useful links</h3>
                        <ul>
                            <li><a href="#">our courses</a></li>
                            <li><a href="/about">about us</a></li>
                            <li><a href="#">teachers &amp; faculty</a></li>
                            <li><a href="#">teams &amp; conditions</a></li>
                            <li><a href="/event">our events</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single-widget">
                        <h3>get in touch</h3>
                        <p>{{ $setting->address ??
                            'Jalan Raya Semenep Kel Mugarsari - Kec Tamansarai Kota
                                                                                                                                                    Tasikmalaya' }}
                        </p>
                        <p>{{ $setting->phone_1 ?? '+857 223 019 74' }}<br>{{ $setting->phone_2 ?? '+857 223 019 74' }}
                        </p>
                        <p>{{ $setting->email ?? 'info@eduhome.com' }}<br>www.eduhome.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright © <a href="#" target="_blank">{{ $setting->name ?? 'MA AL-HIKMAH' }}</a>
                        {{ date('Y') }}.
                        All Right
                        Reserved By {{ $setting->name ?? 'MA AL-HIKMAH' }}.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
