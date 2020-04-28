@extends('admin.master')

@section('dashboard_menu_class','active')
@section('page_location')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
    </ul><!-- /.breadcrumb -->
@endsection


@section('page_header')
    <h1>
        Dashboard
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            overview &amp; stats
        </small>
    </h1>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="widget-box transparent">
                <div class="widget-header widget-header-flat">
                    <h4>Messages</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <table class="table table-bordered table-responsive" id="virtual-number-table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th><a href="" title="view car">Name</a></th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php($serial=1)
                            @foreach($messages as $message)
                                <tr class="{{ ($message->status=='0')?'success':'' }}">
                                    <td>{{ $serial++ }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->phone_number }}</td>
                                    <td>{{ str_limit($message->message, 50) }}</td>
                                    <td>
                                        <div class="hidden-sm hidden-xs action-buttons">
                                            <a class="btn btn-success"
                                               href="{{ route('admin.message.details', $message->id) }}" title="View Order">
                                                <span class="text-primary" style="font-size: 14px;color: #fff;">view</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div><!-- /.widget-main -->
                </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
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
