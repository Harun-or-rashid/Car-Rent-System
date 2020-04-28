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
            List
        </small>
    </h1>
@endsection

@section('main_content')


    @include('admin.partials.session_messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding bg-container">
                <hr>
                <h3>All Car List</h3>
                <table class="table table-bordered table-responsive" id="virtual-number-table">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Car Type</th>
                        <th>PPKM</th>
                        <th>Car Owner</th>
                        <th>Car Added On</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($serial=1)
                    @foreach($cars as $car)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td>{{ $car->car_name }}</td>
                            <td>{{ $car->category->name }}</td>
                            <td>{{ $car->car_type->name }}</td>
                            <td>{{ $car->price_per_km }}</td>
                            <td>{{ $car->user->name }}</td>
                            <td>{{ $car->created_at->format('j M, Y') }}</td>

                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">

                                    <a class="green" href="{{ route('admin.cars.edit', $car->id) }}" title="Edit">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a> |
                                    <a class="red" onclick="return confirm('Are you sure to delete this?')"
                                       href="{{ route('admin.cars.delete', $car->id) }}" title="Delete">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
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
