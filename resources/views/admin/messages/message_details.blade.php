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
                    <h4>Message Details</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main no-padding">
                        <table class="table table-bordered table-responsive" id="virtual-number-table">
                            <tr>
                                <th style="width: 250px;">Name</th>
                                <td style="width: 30px;">&nbsp; : &nbsp;</td>
                                <td>{{ $message->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>&nbsp; : &nbsp;</td>
                                <td>{{ $message->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>&nbsp; : &nbsp;</td>
                                <td>{{ $message->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>&nbsp; : &nbsp;</td>
                                <td>{{ $message->message }}</td>
                            </tr>

                        </table>
                    </div><!-- /.widget-main -->
                </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
        </div><!-- /.col -->

    </div><!-- /.row -->

@endsection

