@extends('admin.master')

@section('category_menu_class','open')
@section('category_list_menu_class', 'active')

@section('page_location')
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="active">Category</li>
    </ul><!-- /.breadcrumb -->
@endsection


@section('page_header')
    <h1>
        Category
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            List
        </small>
    </h1>
@endsection

@section('main_content')

    <div class="space-6"></div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-lg-12 padding">

                {{--session and error messages--}}
                @include('admin.partials.all_error_messages')
                @include('admin.partials.session_messages')


                <table id="category_contact_details_table_list" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php($serial=1)
                    @foreach($categories as $category)

                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->status==1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td>
                                <label>
                                    <a href="{{ route('admin.category.edit', $category->slug) }}" class="CategoryPass_id btn-none-edit"> Edit </a>
                                </label>
                                | <a href="{{ route('admin.category.delete', $category->slug) }}"
                                     class="btn-none-delete"
                                     onclick="return confirm('Are you sure you want to delete ?');"> Delete </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            {{--start modal section--}}

        </div><!-- /.col -->
    </div>

@endsection

