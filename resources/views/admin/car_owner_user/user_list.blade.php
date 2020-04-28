@extends('admin.master')

@section('user_menu_class','open')
@section('user_list_menu_class', 'active')
@section('page_location')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="active">User</li>
    </ul><!-- /.breadcrumb -->
@endsection


@section('page_header')
    <h1>
        User
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            List
        </small>
    </h1>
@endsection

@section('main_content')

    <div class="space-6"></div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">

            @include('admin.partials.session_messages')

            <table id="user-list-table" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>User Type</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <!-- reseller lists -->
                @php($serial=1)
                @foreach($users as $user)
                    <tr>
                        <td>{{ $serial++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->company_name }}</td>
                        <td><p style='color:#428BCA;'>
                                @if($user->role==1)
                                    Admin
                                @elseif($user->role==2)
                                    Car Owner
                                @elseif($user->role==3)
                                    Employee
                                @elseif($user->role==4)
                                    User
                                @endif
                            </p></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <div class="action-buttons">
                                <a class="green" href="{{ route('admin.users.edit', $user->id) }}" title="Edit">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red" onclick="return confirm('Are you sure to delete this?')"
                                   href="{{ route('admin.users.delete', $user->id) }}" title="Delete">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>


        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection


@section('custom_script')
    <script src="{{ asset('assets') }}/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#user-list-table').DataTable();
    </script>

@endsection
