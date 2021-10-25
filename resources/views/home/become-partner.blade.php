
@extends('layouts.main-home-layout')
@section('title')
Become Partner
@endsection
@section('content-area')
    <style>
        .header-04 .bottom-header {
            background: rgb(0, 0, 0);
            position: absolute;
            z-index: 9;
            width: 100%;
        }
        .section-iconbox:not(.fix-mtb) {
            padding: 0 0 64px;
            margin-top: 10rem;
        }
    </style>

      <section class="info-box parallax parallax_one change_text">
        <div class="container">
            <div class="wrapper-content pt-4">
                <h3 class="title mt-5">
                   Grow Your Business <br>
                    <span class="span">with Moray Limousines</span>
                </h3>
                <p class="content">Sign up to drive with Blacklane and begin earning more money.</p>
                <a href="" class="booking">Become A Partner<img src="{{asset('images/icon/arrow-white.png')}}" alt=""></a>
            </div>
        </div>
    </section>
    <!-- End Info Box -->
    <!-- Start About Box -->
    <!-- Start Template title -->
    <section class="template-title has-over text-up">
        <div class="container">
            <h3 class="title">WHO ARE WE?</h3>
            <p class="subtitle">Explore our first class limousine & car rental services</p>
        </div>
    </section>
    <!-- End Template title -->
    <!-- Start Section Iconbox -->
    <section class="section-iconbox fix-ts">
        <div class="container">
            <div class="row justify-content-around" >
                <div class="col-md-5 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <div style="opacity:1" class="style-jr50n2jm_comp-jr50pq1n style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50pq1nsvg">
                                <img src="{{asset('images/cms/home/globe-blue.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="iconbox-content">
                            <p>Moray Limousines provides professional ground transportation around the world. Through us, partners are connected to a new global client base.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                                <img src="{{asset('images/cms/home/car.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="iconbox-content">
                            <p>We partner with licensed and insured companies and chauffeurs to help them grow their business. How do we do this? By filling unused capacity and helping them make the most of their downtimes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top: 6rem;">
                    <h2 class="text-center">
                        WARUM MORAY LIMOUSINES?
                    </h2>
                </div>
                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center mt-5">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/cms/home/grow_your_business.svg')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">GROW YOUR BUSINESS WITH MORAY LIMOUSINESS</a>
                            </h3>
                            <p>Welche Fahrt Sie annehmen, liegt ganz bei Ihnen. Sie bestimmen inwieweit Sie unser Angebot nutzen möchten. Ihnen wird stets das Minimum an Verdienst pro Fahrt angezeigt - weitere Steuern oder Gebühren ziehen wir nicht ab.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center mt-5">
                        <div class="iconbox-icon">
                        <img src="{{asset('images/cms/home/complete_control.svg')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">COMPLETE CONTROL FROM YOUR SIDE</a>
                            </h3>
                            <p>Choosing which rides to accept is up to you — you have complete control of whether you wish to take advantage of our offers. The amount shown with each offer is the minimum that will be transferred to your account — we deduct no further fees or taxes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center mt-5">
                        <div class="iconbox-icon">
                            <img src="{{asset('images/cms/home/tools.svg')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">Tools to succeed</a>
                            </h3>
                            <p>Welche Fahrt Sie annehmen, liegt ganz bei Ihnen. Sie bestimmen inwieweit Sie unser Angebot nutzen möchten. Ihnen wird stets das Minimum an Verdienst pro Fahrt angezeigt - weitere Steuern oder Gebühren ziehen wir nicht ab.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center mt-5">
                        <div class="iconbox-icon">
                        <img src="{{asset('images/cms/home/responsive.svg')}}" alt="">
                        </div>
                        <div class="iconbox-content">
                            <h3>
                                <a href="#" title="">MORAY LIMOUSINES IS SIMPLE</a>
                            </h3>
                            <p>There's no hassle with Moray Limousines: Easy-to-use app, clear offers, no preferred partners, no registration fees, no journey forms to fill out, no need to carry cash. All you need to do is deliver a great customer experience and we will take care of the rest.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Section Iconbox -->
    <!-- End Section Iconbox -->

    <!-- Start Summary Bar Area -->
    <style>
        .btn-secondary:focus{
            background: #1e1e1e;
            color: white;
            font-weight: bold;
        }
    </style>

    <!-- End Summary Bar Area -->
    <!-- Start Booking Steps Area -->
    <!-- End Booking Steps Area -->
    <!-- Start Login Booking Area -->
    <!-- <section class="login-booking-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="login-booking">
                        <ul class="login">
                            <li class="active">Become a Partner</li>
                        </ul>
                        <div class="login-content">
                            <div id="tab-2" class="content-tab">
                                <div class="register-form">

                                    <form action="{{ route('register') }}" method="post" accept-charset="utf-8">
                                        @csrf

                                        <input type="hidden" name="user_type" value="partner">
                                        <div class="row">
                                            <div class="col-md-6 m-0">
                                                <div class="one-half w-100 first-name">
                                                    <label for="firstname">First Name </label>
                                                    <input type="text" name="first_name" id="firstname" placeholder="Enter First Name " value="{{ old('first_name') }}" required    >
                                                    @if ($errors->has('first_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                                                     </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half w-100 last-name">
                                                    <label for="lastname">Last Name</label>
                                                    <input type="text" name="last_name" id="lastname" placeholder="Enter Last Name" value="{{ old('last_name') }}" required>
                                                    @if ($errors->has('last_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                     </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half w-100 email">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" id="email" placeholder="Enter Email " value="{{ old('email') }}" required >
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                                                     </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half w-100 phone">
                                                    <label for="phone">Phone</label>
                                                    <input type="text" name="phone_number" id="phone" placeholder="(+90) 538 658 96 315" value="{{ old('phone_number') }}" required>
                                                    @if ($errors->has('phone_number'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                                                     </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half pass w-100">
                                                    <label for="pass">Password</label>
                                                    <input type="password" name="password" id="pass" value="{{ old('password') }}" required >
                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                                                     </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half w-100 re-pass">
                                                    <label for="re-pass">Repeat Password</label>
                                                    <input type="password" name="password_confirmation" id="re-pass">
                                                </div>
                                            </div>
                                            <div class="col-md-6 m-0">
                                                <div class="one-half mb-5 w-100 checkbox">
                                                    <input type="checkbox" name="accept" id="accept">
                                                    <label for="accept">Accept <span>terms & conditions</span> and the <span>privacy policy</span> </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right m-0">
                                                <div class="btn-submit-form mb-0 mr-2">
                                                    <button type="submit">Become Partner <img src="{{asset('images/icon/right-3.png')}}" alt=""></button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section> -->

    <!-- HOW IT WORKS -->
    
    <section class="section-iconbox fix-ts">
        <div class="container">
            <div class="row justify-content-around" >
                
                <div class="col-md-12" style="margin-top: 6rem;">
                    <h2 class="text-center">
                        HOW IT WORKS
                    </h2>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <div style="opacity:1" class="style-jr50n2jm_comp-jr50pq1n style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50pq1nsvg">
                                <img src="{{asset('images/cms/home/responsive.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="iconbox-content">
                            <p>Register for free on our website</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                                <img src="{{asset('images/cms/home/app.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="iconbox-content">
                            <p>Get familiar with the app and our policies</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                                <img src="{{asset('images/cms/home/earn_money.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="iconbox-content">
                            <p>Begin accepting rides and start earning money</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <iframe width="100%" height="700" src="https://www.youtube.com/embed/cU-cmfmbL2k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    
    <!-- ACCEPTING A RIDE -->

    <section class="section-iconbox fix-ts">
        <div class="container">
            <div class="row justify-content-around" >
                <div class="col-md-6 col-sm-6 col-xs-12 size-table">
                    <div class="partner-benefits row with-double-margin">
                        <div class="row with-double-margin">
                            <div class="span8 offset2">
                                <div class="span2 center" style="margin-right: 3rem;">
                                    <img data-ie-src="/assets/icons/smartphone.png" src="{{asset('images/cms/home/smartphone.svg')}}" alt="Smartphone">
                                </div>
                                <div class="span10">
                                    <h4>ACCEPTING A RIDE</h4>
                                    <p>Our technology connects guests and chauffeurs seamlessly via the Blacklane app and portal. Accept a ride and you will have all necessary details at hand, e.g. guests’ details, location, pickup and dropoff times.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row with-double-margin">
                            <div class="span8 offset2">
                                <div class="span2 center" style="margin-right: 3rem;">
                                    <img data-ie-src="/assets/icons/clock.png" src="{{asset('images/cms/home/clock.svg')}}" alt="Smartphone">
                                </div>
                                <div class="span10">
                                    <h4>ACCEPTING A RIDE</h4>
                                    <p>Our technology connects guests and chauffeurs seamlessly via the Blacklane app and portal. Accept a ride and you will have all necessary details at hand, e.g. guests’ details, location, pickup and dropoff times.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row with-double-margin">
                            <div class="span8 offset2">
                                <div class="span2 center" style="margin-right: 3rem;">
                                    <img data-ie-src="/assets/icons/dollarsign.png" src="{{asset('images/cms/home/dollarsign.svg')}}" max-width="100%" alt="Smartphone">
                                </div>
                                <div class="span10">
                                    <h4>ACCEPTING A RIDE</h4>
                                    <p>Our technology connects guests and chauffeurs seamlessly via the Blacklane app and portal. Accept a ride and you will have all necessary details at hand, e.g. guests’ details, location, pickup and dropoff times.</p>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                


            </div>
        </div>
    </section>

    <!-- WHAT WE REQUIRE FROM YOU -->
    
    <!-- <section class="section-iconbox fix-ts">
        <div class="container">
            <div class="row justify-content-around" >
                
                <div class="col-md-12" style="margin-top: 6rem;">
                    <h2 class="text-center" style="font-weight: bold;">
                        HOW IT WORKS
                    </h2>
                </div>
                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                    <div class="iconbox-content mt-5">
                            <h3 class="title">VEHICLE</h3>
                            <p class="mt-3">Partner vehicles must meet our standards, be clean, undamaged and smoke-free. Full compliance with local regulations, including licensing and insurance, is required.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-content mt-5">
                            <h3 class="title">CHAUFFEURS</h3>
                            <p class="mt-3">Partners must be dependable, motivated, professional and have a polished appearance.</p>
                        </div>
                    </div>
                </div>
                <div class="ccol-md-5 mt-4 col-sm-6 col-xs-12 size-table">
                    <div class="iconbox center">
                        <div class="iconbox-icon">
                            <div style="opacity:1" class="style-jr50n2jm_comp-jr50n29p style-jr50n2jm_non-scaling-stroke style-jr50n2jmsvg" id="comp-jr50n29psvg">
                                <img src="{{asset('images/cms/home/app.svg')}}" alt="">
                            </div>
                        </div>
                        <div class="iconbox-content">
                            <p>Get familiar with the app and our policies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- End Login Booking Area -->


@endsection




