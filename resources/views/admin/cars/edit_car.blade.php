@extends('admin.master')

@section('car_menu_class','open')
@section('car_list_menu_class', 'active')
@section('page_location')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="active">Cars</li>
    </ul><!-- /.breadcrumb -->
@endsection


@section('page_header')
    <h1>
        Cars
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Edit
        </small>
    </h1>
@endsection



@section('main_content')

    <div class="space-6"></div>

    @include('admin.partials.session_messages')


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-container">

                <form action="{{ route('admin.cars.update', $carDetail->id) }}" method="post" class="form-horizontal"
                      role="form" enctype="multipart/form-data">

                    @csrf
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="form-group">
                            <label for="form-field-select-3">Car Name</label>

                            <input type="text" name="car_name" value="{{ $carDetail->car_name }}"
                                   class="form-control" placeholder="Car Name"
                                   maxlength="100" required="">
                            @if($errors->has('car_name'))
                                <span class="text-danger">{{ $errors->first('car_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="form-field-select-3">Car No</label>

                            <input type="text" name="car_no" value="{{ $carDetail->car_no }}"
                                   class="form-control" placeholder="Car No"
                                   maxlength="100" required="">
                            @if($errors->has('car_no'))
                                <span class="text-danger">{{ $errors->first('car_no') }}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="form-field-select-3"> Category </label>
                            <br/>
                            <select class="chosen-select form-control" id="form-field-select-3"
                                    data-placeholder="Category name.." name="category" required="">
                                <option value=""></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($category->id==$carDetail->category_id)?'selected':'' }}> {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="form-field-select-3">Car Type</label>

                            <br/>
                            <select class="chosen-select form-control" id="form-field-select-3"
                                    data-placeholder="Car Type" name="car_type" required="">
                                <option value=""></option>
                                @foreach($car_types as $car_type)
                                    <option value="{{ $car_type->id }}" {{ ($car_type->id==$carDetail->car_type_id)?'selected':'' }}> {{ $car_type->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="form-field-select-3">Number of Sits</label>

                            <input type="number" name="num_of_sits" value="{{ $carDetail->num_of_sits }}"
                                   class="form-control" placeholder="Number of Sits"
                                   max="100" required="">
                            @if($errors->has('num_of_sits'))
                                <span class="text-danger">{{ $errors->first('num_of_sits') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="form-field-select-3">Price Per k.m.</label>

                            <input type="number" max="500" name="price_per_km" value="{{ $carDetail->price_per_km }}"
                                   class="form-control" placeholder="Price Per k.m."
                                   required="">
                            @if($errors->has('price_per_km'))
                                <span class="text-danger">{{ $errors->first('price_per_km') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="form-field-select-3">Car Details</label>

                            <textarea name="car_details" id="" cols="" rows="7" class="form-control">{{ $carDetail->car_details }}</textarea>
                            @if($errors->has('car_details'))
                                <span class="text-danger">{{ $errors->first('car_details') }}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label class=" control-label no-padding-right" for="form-image-1"> Car Image : </label>

                            <div class="">
                                <input type="file" name="car_image" class="form-control" id="form-image-1">
                                <span><img src="{{ OtherHelpers::car_image($carDetail->image) }}" style="max-height: 60px;" alt=""></span>
                            </div>
                        </div>

                        <div class="clearfix form-group">

                            <input type="submit" class="btn btn-info" value="Update">
                            &nbsp; &nbsp; &nbsp;
                            <button class="btn btn-danger" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                </form>
            </div><!-- end bg-container-->
        </div>
    </div><!-- /.row -->


@endsection




@section('custom_style')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/chosen.min.css"/>
@endsection

@section('custom_script')
    <script src="{{ asset('assets') }}/js/chosen.jquery.min.js"></script>
    <script type="text/javascript">
        $('.chosen-select').chosen({allow_single_deselect: true});
    </script>
@endsection
