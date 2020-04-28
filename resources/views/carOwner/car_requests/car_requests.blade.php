@extends('carOwner.master')

@section('request_menu_class','open')
@section($addClass, 'active')
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
            {{ $type }}
        </small>
    </h1>
@endsection

@section('main_content')


    @include('carOwner.partials.session_messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-container">
                <hr>
                <h3>{{ $type }} Car Request</h3>
                <table class="table table-bordered table-responsive" id="virtual-number-table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th><a href="" title="view car">Car Name</a></th>
                        <th>Car No</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Pickup Location</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($serial=1)
                    @foreach($car_requests as $car_request)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td><a href="" title="view car" target="_blank">{{ $car_request->car->car_name }}</a></td>
                            <td><a href="" title="view car" target="_blank">{{ $car_request->car->car_no }}</a></td>
                            <td>{{ $car_request->name }}</td>
                            <td>{{ $car_request->email }}</td>
                            <td>{{ $car_request->phone }}</td>
                            <td>{{ $car_request->pickup_location }}</td>
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

                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">

                                    <a class="btn btn-success"
                                       href="{{ route('carOwner.car_request.details', $car_request->id) }}" title="View Order">
                                        <span class="text-primary" style="font-size: 14px;color: #fff;">view</span>
                                    </a>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div><!-- end bg-cntainer-->

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->


@endsection



@section('custom_script')
    <script src="{{ asset('assets') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#virtual-number-table').DataTable();
    </script>

@endsection
