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
                        <h2>Our Cars</h2>
                        <span class="title-line"><i class="fa fa-car"></i></span>

                    </div>
                </div>
                <!-- Page Title End -->
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->


    <!--== Book A Car Area Start ==-->
    <div id="book-a-car">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <div class="booka-car-content">
                        <form action="">
                            @include('admin.partials.session_messages')
                            @include('admin.partials.all_error_messages')


                            <div class="car-choose bookinput-item">
                                <select class="custom-select" name="car_type">
                                    <option value="">Choose Car Type</option>
                                    @foreach($car_types as $car_type)
                                        <option value="{{ $car_type->id }}" {{ ($request->car_type==$car_type->id)?'selected':'' }}>{{$car_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="car-choose bookinput-item">

                                <select class="custom-select" name="car_model">
                                    <option value="">Choose Car Model</option>
                                    @foreach($car_models as $car_model)
                                        <option value="{{$car_model->id}}" {{ ($request->car_model==$car_model->id)?'selected':'' }}>{{$car_model->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="car-choose bookinput-item">

                                <select class="custom-select" name="min_seat">
                                    <option value="">{{ ($request->min_seat == true)? $request->min_seat:'Min Seat'}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>


                            <div class="car-choose bookinput-item">

                                <select class="custom-select" name="max_seat">
                                    <option value="">{{ ($request->max_seat == true)? $request->max_seat:'Max Seat'}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>

                            <div class="bookcar-btn bookinput-item">
                                <button type="submit">Search Car</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== Book A Car Area End ==-->


    <!--== Car List Area Start ==-->
    <section id="car-list-area" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Car List Content Start -->
                <div class="col-lg-12">


                    <div class="car-list-content">
                        <div class="row">

                        @foreach($cars as $car)
                            <!-- Single Car Start -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-car-wrap">
                                        <div class="car-list-thumb"
                                             style="background-image: url({{ OtherHelpers::car_image($car->image) }}"></div>
                                        <div class="car-list-info without-bar">
                                            <h2>
                                                <a href="{{ route('home.car_details', $car->id) }}">{{ $car->car_name }}</a>

                                            </h2><p> ({{$car->num_of_sits}} Seats)</p>
                                            <h5>BDT {{$car->price_per_km}} Rent /per km</h5>
                                            <p>{{ substr($car->car_details, 0, 100) }}...</p>
                                            <ul class="car-info-list">
                                                <li>{{ $car->car_type->name }}</li>
                                            </ul>

                                            <a href="#carBookModal" onclick="carIdInModal({{$car->id}})"
                                               data-toggle="modal"
                                               data-target="#carBookModal" class="rent-btn">Book It</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Car End -->
                            @endforeach

                        </div>
                    </div>

                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example">
                            {{ $cars->links() }}
                        </nav>
                    </div>

                    <!-- Page Pagination End -->
                </div>
                <!-- Car List Content End -->
            </div>
        </div>
    </section>
    <!--== Car List Area End ==-->

    @include('frontend.partials.car_book_modal')

@endsection



@section('custom_script')
    <script>
        function carIdInModal(car_id) {
            $("#car_id").val(car_id);
        }
    </script>
@endsection
