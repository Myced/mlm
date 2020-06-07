@extends('layouts.site')


@section('title')
    Contact Us
@endsection

@section('content')
<div class="main-content shop-page contact-page">
    <div class="container">
        <div class="breadcrumbs">
            <a href="#">Home</a> \ <span class="current">contact</span>
        </div>
        <div class="row content-form ">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 map-content">
                <div class="map"><a href="#"><img src="images/map1.jpg" alt=""></a></div>
                <div class="information-form">
                    <h4 class=" main-title">Our Store</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="title">Store 1</h5>
                            <ul class="list-info">
                                <li>
                                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <div class="info">
                                        <h5 class="subtitle">Email</h5>
                                        <a href="#" class="des">Support1@TechStore.com</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <div class="info">
                                        <h5 class="subtitle">Phone</h5>
                                        <p class="des">0123-465-789-111</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                    <div class="info">
                                        <h5 class="subtitle">Mail Office</h5>
                                        <p class="des">Sed ut perspiciatis unde omnis  Street Name, Los Angeles</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <h5 class="title">Hours Of Operation</h5>
                            <ul class="time-work">
                                <li><div class="day">Monday:</div><div class="time">12-5 PM</div></li>
                                <li><div class="day">Tuesday:</div><div class="time">12-5 PM</div></li>
                                <li><div class="day">Wendnesday:</div><div class="time">12-5 PM</div></li>
                                <li><div class="day">Thursday:</div><div class="time">12-5 PM</div></li>
                                <li><div class="day">Friday:</div><div class="time">12-5 PM</div></li>
                                <li><div class="day">Saturday:</div><div class="time">12-5 PM</div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 info-content">
                <div class="contact-form">
                    <h4 class="main-title">Leave A Message</h4>
                    <p class="des">Maecenas dolor elit, semper a sem sed, pulvinar molestie lacus. Aliquam dignissim, elit non mattis ultrices, neque odio ultricies tellus, eu porttitor nisl ipsum eu massa.</p>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <span class="label-text">Your Name *</span>
                            <input type="text" class="input-info">
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <span class="label-text">Email Address *</span>
                            <input type="text" class="input-info">
                        </div>
                    </div>
                    <span class="label-text">Phone Number</span>
                    <input type="text" class="input-info">
                    <span class="label-text">Your Message *</span>
                    <textarea rows="8"  class="input-info input-note"></textarea>
                    <div class="group-button">
                        <a href="#" class="button submit">Send Message</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="brand">
        <div class="container">
            <div class="owl-carousel" data-autoplay="false" data-nav="false" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="30"  data-responsive = '{"0":{"items":2}, "640":{"items":3}, "768":{"items":3}, "1024":{"items":4}, "1200":{"items":5}}'>
                <div class="brand-item"><a href="#"><img src="images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="images/brand1.jpg" alt=""></a></div>
            </div>
        </div>
    </div>
</div>
@endsection
