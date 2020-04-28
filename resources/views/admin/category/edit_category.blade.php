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
                Edit
        </small>
    </h1>
@endsection

@section('main_content')
    <div class="space-6"></div>

    @include('admin.partials.session_messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="{{ route('admin.category.update', $category->slug) }}" method="post" class="form-horizontal" role="form"
                  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name : </label>
                    <div class="col-sm-9">
                        <input type="text" id="placeName" placeholder="Name" name="name"
                               class="col-xs-10 col-sm-5" required="" value="{{ $category->name }}"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle text-danger" id="Name_Show"> ** </span>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </span>
                    </div>
                </div>


                <div class="clearfix form-group">
                    <div class="col-md-offset-3 col-md-9">

                        <input type="submit" class="btn btn-info" value="Update Category">

                        &nbsp; &nbsp; &nbsp;
                        <button class="btn btn-danger" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>

                    </div>
                </div>
            </form>


        </div><!-- /.col -->
    </div><!-- /.row -->

@endsection


