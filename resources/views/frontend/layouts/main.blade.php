<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') | {{ $setting->name ?? 'MA AL-HIKMAH' }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('eduhome/img/logo.png') }}">
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
    @yield('style')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Header Area Start -->
    @include('frontend.layouts.header')
    <!-- Header Area End -->
    @yield('content')
    <!-- Footer Start -->
    @include('frontend.layouts.footer')
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSLSFRa0DyBj9VGzT7GM6SFbSMcG0YNBM "></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng(40.6700, -73.9400), // New York
                styles: [{
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e9e9e9"
                    }, {
                        "lightness": 17
                    }]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 17
                    }]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 29
                    }, {
                        "weight": 0.2
                    }]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 18
                    }]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dedede"
                    }, {
                        "lightness": 21
                    }]
                }, {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "visibility": "on"
                    }, {
                        "color": "#ffffff"
                    }, {
                        "lightness": 16
                    }]
                }, {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "saturation": 36
                    }, {
                        "color": "#333333"
                    }, {
                        "lightness": 40
                    }]
                }, {
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f2f2f2"
                    }, {
                        "lightness": 19
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{
                        "color": "#fefefe"
                    }, {
                        "lightness": 20
                    }]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                        "color": "#fefefe"
                    }, {
                        "lightness": 17
                    }, {
                        "weight": 1.2
                    }]
                }]
            };
            var mapElement = document.getElementById('googleMap');
            var map = new google.maps.Map(mapElement, mapOptions);
            var marker = new google.maps.Marker({
                position: map.getCenter(),
                animation: google.maps.Animation.BOUNCE,
                icon: 'img/map-marker.png',
                map: map
            });
        }
    </script>
    <script src="js/main.js"></script>
</body>

</html>
