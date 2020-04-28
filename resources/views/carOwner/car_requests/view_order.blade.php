@extends('carOwner.master')

@section('request_menu_class','open')

@section('page_location')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('carOwner.index') }}">Dashboard</a>
        </li>
        <li class="active">Car Requests</li>
    </ul><!-- /.breadcrumb -->
@endsection


@section('page_header')
    <h1>
        Car Request
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            View Details
        </small>
    </h1>
@endsection

@section('main_content')


    @include('carOwner.partials.session_messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 padding bg-container">
                <hr>
                <h3>View Car Request</h3>
                <table class="table table-bordered table-responsive" id="virtual-number-table">
                    <tr>
                        <th style="width: 250px;">Car Name</th>
                        <td style="width: 30px;">&nbsp; : &nbsp;</td>
                        <td>{{ $car_request->car->car_name }}</td>
                    </tr>
                    <tr>
                        <th>Car No</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{ $car_request->car->car_no }}</td>
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{ $car_request->name }}</td>
                    </tr>
                    <tr>
                        <th>Customer Email</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{ $car_request->email }}</td>
                    </tr>
                    <tr>
                        <th>Customer Phone</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{ $car_request->phone }}</td>
                    </tr>
                    <tr>
                        <th>Pickup-location</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{ $car_request->pickup_location }}</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>
                            @if($car_request->order_status=='1')
                                <span class="text-warning">Pending</span>
                            @elseif($car_request->order_status=='2')
                                <span class="text-primary">Running</span>
                            @elseif($car_request->order_status=='3')
                                <span class="text-success">Completed</span>
                            @elseif($car_request->order_status=='0')
                                <span class="text-danger">Canceled</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Total Distance</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{ ($car_request->total_distance==true)?$car_request->total_distance:'0' }}</td>
                    </tr>
                    <tr>
                        <th>Total Price</th>
                        <td>&nbsp; : &nbsp;</td>
                        <td>{{ ($car_request->total_price==true)?$car_request->total_price:'0' }}</td>
                    </tr>

                </table>
            </div><!-- end bg-cntainer-->
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-2">
                <form action="{{ route('carOwner.car_request.update', $car_request->id) }}" method="post">
                    @csrf
                    @if($car_request->order_status!='3')

                        <select name="order_status" class="form-control" onchange="checkStatus()" id="status_id"
                                required>
                            <option value="">---Select---</option>

                            @if($car_request->order_status=='1')
                                <option value="0">Cancel</option>
                            @elseif($car_request->order_status=='0')
                                <option value="0" selected>Cancel</option>
                            @endif
                            <option value="1" {{ ($car_request->order_status=='1')? 'selected':'' }}>Pending
                            </option>
                            <option value="2" {{ ($car_request->order_status=='2')? 'selected':'' }}>Running
                            </option>
                            <option value="3" {{ ($car_request->order_status=='3')? 'selected':'' }}>Complete
                            </option>


                        </select><br>
                        <div id="cost_details" style="display: none;">
                            <input type="number" min="0" id="total_distance" onkeyup="count_price()"
                                   name="total_distance" class="form-control"
                                   placeholder="Enter Total Distance (K.M.)">
                            <div id="total_cost">
                                <span class="text-success" id="show_cost"> </span>
                            </div>
                        </div>

                        <br>
                        <input type="submit" class="btn btn-primary btn-lg" id="submit_btn" value="Save Status">
                        <br><br>
                    @else
                        <div class="alert alert-success text-center" id="report-alert">
                            Completed
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>


@endsection


@section('custom_script')
    <script>
        function checkStatus() {
            var changeVal = $("#status_id").val();
            if (changeVal == '3') {
                $("#cost_details").css({'display': 'block'});
                $("#submit_btn").val('Mark as Complete');
            } else {
                $("#cost_details").css({'display': 'none'});
                $("#submit_btn").val('Save Status');
            }
        }

        function count_price() {
            var total_distance = $("#total_distance").val();
            var cost_per_km = '{{ $car_request->car->price_per_km }}';
            var total_cost = parseFloat(total_distance) * parseFloat(cost_per_km);
            $("#show_cost").html('Total Cost: ' + total_cost + ' Tk.');
        }
    </script>
@endsection
