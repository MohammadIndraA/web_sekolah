@extends('frontend.layouts.main')'
@section('title', 'Event')
@section('content')
    <!-- Contact Start -->
    <div class="map-area">
        <!-- google-map-area start -->
        <div class="google-map-area">
            <!--  Map Section -->
            <div id="contacts" class="map-area">
                <div id="googleMap" style="width:100%;height:440px;"></div>
            </div>
        </div>
    </div>
    <div class="contact-area pt-150 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="contact-contents text-center">
                        <div class="single-contact mb-65">
                            <div class="contact-icon">
                                <img src="img/contact/contact1.png" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>address</h3>
                                <p>135, First Lane, City Street</p>
                                <p>New Yourk City, USA</p>
                            </div>
                        </div>
                        <div class="single-contact mb-65">
                            <div class="contact-icon">
                                <img src="img/contact/contact2.png" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>address</h3>
                                <p>135, First Lane, City Street</p>
                                <p>New Yourk City, USA</p>
                            </div>
                        </div>
                        <div class="single-contact">
                            <div class="contact-icon">
                                <img src="img/contact/contact3.png" alt="contact">
                            </div>
                            <div class="contact-add">
                                <h3>address</h3>
                                <p>135, First Lane, City Street</p>
                                <p>New Yourk City, USA</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="reply-area">
                        <h3>LEAVE A message</h3>
                        <p>I must explain to you how all this a mistaken idea of ncing great explorer of the rut the
                            is lder of human happinescias unde omnis iste natus error sit volptatem </p>
                        <form id="contact-form" action="mail.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Name</p>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div class="col-md-12">
                                    <p>Email</p>
                                    <input type="text" name="email" id="email">
                                </div>
                                <div class="col-md-12">
                                    <p>Subject</p>
                                    <input type="text" name="subject" id="subject">
                                    <p>Massage</p>
                                    <textarea name="message" id="message" cols="15" rows="10"></textarea>
                                </div>
                            </div>
                            <a class="reply-btn" href="#" data-text="send"><span>send message</span></a>
                            <p class="form-messege"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
