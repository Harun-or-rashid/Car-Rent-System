<section id="slider-area">
    <!--== slide Item One ==-->
    <div class="single-slide-item overlay" style="background-image: url({{asset('assets')}}/frontend/img/banner.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="book-a-car">
                        <form action="{{ route('home.search') }}" method="get">

                            <!--== Car Choose ==-->
                            <div class="choose-car-type book-item">
                                <h4>CHOOSE CAR TYPE:</h4>
                                <select class="custom-select" name="car_type">
                                    <option value="">Select</option>
                                    @foreach($car_types as $car_type)
                                        <option value="{{ $car_type->id }}">{{$car_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--== Car Choose ==-->

                            <!--== Car Choose ==-->
                            <div class="choose-car-type book-item">
                                <h4>CHOOSE Model:</h4>
                                <select class="custom-select" name="car_model">
                                    <option value="">Select</option>
                                    @foreach($car_models as $car_model)
                                        <option value="{{$car_model->id}}">{{$car_model->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--== Car Choose ==-->

                            <!--== Pick Up Location ==-->
                            <div class="pickup-location book-item">
                                <h4>MIN SEAT:</h4>
                                <select class="custom-select" name="min_seat">
                                    <option value="">Select</option>
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
                            <div class="pickup-location book-item">
                                <h4>MAX SEAT:</h4>
                                <select class="custom-select" name="max_seat">
                                    <option value="">Select</option>
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
                            <!--== Pick Up Location ==-->

                            <div class="book-button text-center">
                                <button class="book-now-btn search-btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-7 text-right">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="slider-right-text">
                                <h1>BOOK A CAR TODAY!</h1>
                                <p> Let’s find a car for you. The trusted, <br/>smart and easy way to rent a car,
                                    countrywide. <br/>The trusted, smart a car for you. </p>
                                <br>
                                <h2 style="color: #8EBF60;">Want to share your car?</h2>
                                <p>Just Leave us with a message. we will contact with you..</p>
                                <a href="{{ route('home.contact') }}" class="book-now-btn search-btn" >Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== slide Item One ==-->
</section>
