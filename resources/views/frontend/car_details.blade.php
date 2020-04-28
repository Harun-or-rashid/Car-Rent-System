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
                        <h2>Car Details</h2>
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
                            <!-- OurCars Tab Menu start -->
                            <div class="col-lg-3">
                                <div class="ourcar-info text-center">
                                    <h2 style="">Car Owner</h2>
                                    <table class="our-table" style="max-width: 100%;">
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $car->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Company Name</td>
                                            <td>{{ $car->user->company_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td style="max-width: 40px;"><span><a
                                                            href="mailto:{{ $car->user->email }}">{{ $car->user->email }}</a></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><a href="tel:{{ $car->user->phone }}"
                                                   target="_blank">{{ $car->user->phone }}</a></td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                            <!-- OurCars Tab Menu End -->

                            <!-- OurCars Tab Content start -->
                            <div class="col-lg-9">
                                <div class="" id="ourcartabcontent">
                                    <!-- Single OurCars  start -->
                                    <div id="ourcar_1" role="tabpanel" aria-labelledby="ourcar_item_1">
                                        <div class="row">
                                            <div class="col-lg-8 text-center">
                                                <div class="display-table">
                                                    <div class="display-table-cell">
                                                        <div class="ourcar-pic">
                                                            <img src="{{OtherHelpers::car_image($car->image)}}" alt="JSOFT">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="ourcar-info text-center">
                                                    <h2>BDT {{ $car->price_per_km }}<span><br>Rent per KM</span></h2>
                                                    <table class="our-table">
                                                        <tr>
                                                            <td>Name</td>
                                                            <td>{{ $car->car_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No</td>
                                                            <td>{{ $car->car_no }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Model</td>
                                                            <td>{{ $car->category->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Seats</td>
                                                            <td>{{ $car->num_of_sits }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Car conditioning</td>
                                                            <td>{{ $car->car_type->name }}</td>
                                                        </tr>
                                                    </table>
                                                    <a href="#carBookModal" onclick="carIdInModal({{$car->id}})" data-toggle="modal"
                                                       data-target="#carBookModal" class="bookbtn">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single OurCars End -->
                                </div>
                            </div>
                            <!-- OurCars Tab Content End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4" style="float: left;"></div>
                <div class="col-lg-4" style="float: left;">
                    <p style="text-align: justify;">
                        {{ $car->car_details }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--== Our Cars Area End ==-->

    @include('frontend.partials.car_book_modal')

@endsection


@section('custom_script')
    <script>
        function carIdInModal(car_id){
            $("#car_id").val(car_id);
        }
    </script>
@endsection
