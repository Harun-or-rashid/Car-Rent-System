@extends('frontend.master')

@section('main_content')

    <!--== Page Title Area Start ==-->
    <section id="page-title-area" style="background-image: url({{ asset('assets') }}/frontend/img/page-title.jpg)"
             class="section-padding overlay">
        <div class="container">
            <div class="row">
                <!-- Page Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Car Rent BD</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>
                        <p> Let’s find a car for you. The trusted, <br/>smart and easy way to rent a car,
                            countrywide. <br/>The trusted, smart a car for you. </p>
                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->



    <!--== Our Cars Area Start ==-->
    <section id="our-cars" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Section Title Start -->
                <div class="col-lg-12">
                    <div class="section-title  text-center">
                        <h2>Contact Us</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>

                    </div>
                </div>
                <!-- Section Title End -->
            </div>

            <div class="row">
                <div class="col-lg-12">

                    @include('admin.partials.session_messages')
                    @include('admin.partials.all_error_messages')


                    <div class="team-content">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="col-md-2" style="float: left;"></div>
                                <div class="col-md-8" style="float: left;">
                                    <form action="{{ route('home.message') }}" method="post">
                                        @csrf
                                        <!--== Car Choose ==-->
                                        <div class="choose-car-type book-item">
                                            <h4>Name:</h4>
                                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Your Name"
                                                   class="form-control" required>
                                        </div>
                                        <!--== Car Choose ==-->

                                        <!--== Car Choose ==-->
                                        <div class="choose-car-type book-item">
                                            <h4>Email:</h4>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" class="form-control" required>
                                        </div>
                                        <!--== Car Choose ==-->

                                        <!--== Pick Up Location ==-->
                                        <div class="pickup-location book-item">
                                            <h4>Phone Number:</h4>
                                            <input type="text" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" class="form-control" required>
                                        </div>
                                        <div class="pickup-location book-item">
                                            <h4>Message:</h4>
                                            <textarea name="message" rows="10" class="form-control" required></textarea>
                                        </div>
                                        <!--== Pick Up Location ==-->

                                        <div class="book-button text-center">
                                            <button class="book-now-btn search-btn" type="submit">Send Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Our Cars Area End ==-->

    @include('frontend.partials.car_book_modal')

@endsection

