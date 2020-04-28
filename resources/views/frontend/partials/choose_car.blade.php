<section id="choose-car" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg-12">
                <div class="section-title  text-center">
                    <h2>Choose your Car</h2>
                    <span class="title-line"><i class="fa fa-car"></i></span>
                    <p>Search and choose car as your choice :)</p>
                </div>
            </div>
            <!-- Section Title End -->
        </div>

        <div class="row">
            <!-- Choose Area Content Start -->
            <div class="col-lg-12">
                <div class="choose-content-wrap">
                    <!-- Choose Area Tab content -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Popular Cars Tab Start -->
                        <div class="tab-pane fade show active" id="popular_cars" role="tabpanel" aria-labelledby="home-tab">
                            <!-- Popular Cars Content Wrapper Start -->
                            <div class="popular-cars-wrap">
                                <!-- Filtering Menu -->
                                <div class="popucar-menu text-center">
                                    <a href="#" data-filter="*" class="active">all</a>
                                    @foreach($categories as $category)
                                        <a href="#" data-filter=".{{ $category->slug }}">{{ $category->name }}</a>
                                    @endforeach
                                </div>

                                <!-- Filtering Menu -->

                                <!-- PopularCars Tab Content Start -->
                                <div class="row popular-car-gird">
                                    <!-- Single Popular Car Start -->
                                    @foreach($cars as $car)
                                    <div class="col-lg-4 col-md-6 {{ $car->category->slug }}">
                                        <div class="single-popular-car">
                                            <div class="p-car-thumbnails">
                                                <a class="car-hover" href="{{ OtherHelpers::car_image($car->image) }}">
                                                    <img src="{{ OtherHelpers::car_image($car->image) }}" alt="{{ $car->car_name }}">
                                                </a>
                                            </div>

                                            <div class="p-car-content">
                                                <h3>
                                                    <a href="{{ route('home.car_details', $car->id) }}">{{ $car->car_name }}</a>
                                                    <span class="price"><i class="fa fa-tag"></i> BDT {{$car->price_per_km}}/KM</span>
                                                </h3>

                                                <h5>{{ $car->category->name }}</h5><p> ({{$car->num_of_sits}} Seats)</p>

                                                <div class="p-car-feature">
                                                    <a href="#">{{ $car->car_type->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Popular Car End -->
                                    @endforeach

                                </div>

                                <div class="row">
                                    <div class="col-md-4" style="float: left;"></div>
                                    <div class="col-md-4" style="float: left;">
                                        <a href="{{route('home.search')}}" class="view-all-btn">
                                            View All
                                        </a>
                                    </div>
                                </div>
                                <!-- PopularCars Tab Content End -->
                            </div>
                            <!-- Popular Cars Content Wrapper End -->
                        </div>
                        <!-- Popular Cars Tab End -->

                    </div>
                    <!-- Choose Area Tab content -->
                </div>
            </div>
            <!-- Choose Area Content End -->
        </div>
    </div>
</section>
