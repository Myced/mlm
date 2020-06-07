@extends('layouts.site')

@section('title')
    {{ __('About Us') }}
@endsection

@section('content')
<div class="main-content shop-page about-page">
    <div class="container">
        <div class="breadcrumbs">
            <a href="#">Home</a> \ <span class="current">About us</span>
        </div>
        <div class="row about-info content-form">
            <div class="col-xs-12 col-sm-5 col-md-6">
                <img src="/site/images/banner24.jpg" alt="">
            </div>
            <div class="col-xs-12 col-sm-7 col-md-6">
                <div class="info">
                    <h3 class="main-title">Some works About Us</h3>
                    <p class="des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. </p>
                    <p class="des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                </div>
            </div>
        </div>
        <div class="about-content">
            <h4 class="title">Our member</h4>
            <p class="des">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. </p>
            <div class="owl-carousel" data-autoplay="false" data-nav="false" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="30"  data-responsive = '{"0":{"items":2}, "640":{"items":3}, "768":{"items":3}, "1024":{"items":4}, "1200":{"items":4}}'>
                <div class="character">
                    <div class="avata">
                        <img src="/site/images/avata1.jpg" alt="">
                    </div>
                    <div class="info">
                        <h4 class="position">Director</h4>
                        <h5 class="name">Michael Jordan's</h5>
                    </div>
                </div>
                <div class="character">
                    <div class="avata">
                        <img src="/site/images/avata2.jpg" alt="">
                    </div>
                    <div class="info">
                        <h4 class="position">Manager</h4>
                        <h5 class="name">Susan Mcsain</h5>
                    </div>
                </div>
                <div class="character">
                    <div class="avata">
                        <img src="/site/images/avata3.jpg" alt="">
                    </div>
                    <div class="info">
                        <h4 class="position">Ceo Founder</h4>
                        <h5 class="name">Join lopper</h5>
                    </div>
                </div>
                <div class="character">
                    <div class="avata">
                        <img src="/site/images/avata4.jpg" alt="">
                    </div>
                    <div class="info">
                        <h4 class="position">Tech Leader</h4>
                        <h5 class="name">Join Owen</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="row auto-clear">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="answer-question">
                            <h4 class="question">What we really do?</h4>
                            <p class="answer">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="answer-question">
                            <h4 class="question">Our Vision</h4>
                            <p class="answer">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="answer-question">
                            <h4 class="question">History of the Company</h4>
                            <p class="answer">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="answer-question">
                            <h4 class="question">Cooperate with Us!</h4>
                            <p class="answer">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <h4 class="question">What we can do for you</h4>
                <ul class="group-changed parent-content">
                    <li class="changed-item">
                        <a href="#" class="changed-button active"></a>
                        <div class="info">
                            <h5 class="title">Support 24/7</h5>
                            <p class="des-changed show-content">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
                            </p>
                        </div>
                    </li>
                    <li class="changed-item">
                        <a href="#" class="changed-button"></a>
                        <div class="info">
                            <h5 class="title">Best Quanlity</h5>
                            <p class="des-changed">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
                            </p>
                        </div>
                    </li>
                    <li class="changed-item">
                        <a href="#" class="changed-button"></a>
                        <div class="info">
                            <h5 class="title">Fastest Delivery</h5>
                            <p class="des-changed">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
                            </p>
                        </div>
                    </li>
                    <li class="changed-item">
                        <a href="#" class="changed-button"></a>
                        <div class="info">
                            <h5 class="title">Customer Care</h5>
                            <p class="des-changed">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="brand">
        <div class="container">
            <div class="owl-carousel" data-autoplay="false" data-nav="false" data-dots="false" data-loop="false" data-slidespeed="800" data-margin="30"  data-responsive = '{"0":{"items":2}, "640":{"items":3}, "768":{"items":3}, "1024":{"items":4}, "1200":{"items":5}}'>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
                <div class="brand-item"><a href="#"><img src="/site/images/brand1.jpg" alt=""></a></div>
            </div>
        </div>
    </div>
</div>
@endsection
