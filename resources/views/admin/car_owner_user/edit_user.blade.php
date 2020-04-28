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
            Edit
        </small>
    </h1>
@endsection

@section('main_content')

    <div class="space-6"></div>

    @include('admin.partials.session_messages')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="form-horizontal"
                  role="form"
                  enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-company-1"> Company name : </label>

                    <div class="col-sm-9">
                        <input type="text" id="companyName" placeholder="Company name" name="company_name"
                               class="col-xs-10 col-sm-5" required="" value="{{ $user->company_name }}"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle text-danger" id="companyShow"> ** </span>

                            @if ($errors->has('company_name'))
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Name : </label>
                    <div class="col-sm-9">
                        <input type="text" id="ResellerName" placeholder="Name" name="name"
                               class="col-xs-10 col-sm-5" required="" value="{{ $user->name }}"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle text-danger" id="Name_Show"> ** </span>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-email-1"> Email : </label>
                    <div class="col-sm-9">
                        <input type="email" id="EmaileNumber" placeholder="Email" name="email"
                               class="col-xs-10 col-sm-5" required="" value="{{ $user->email }}"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle text-danger" id="Emailestate"> ** </span>
                            @if ($errors->has('email'))
                                <span class="text-danger retErrEmail">{{ $errors->first('email') }}</span>
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-phone-1"> Phone : </label>
                    <div class="col-sm-9">
                        <input type="text" id="mobileNumber" placeholder="Phone" name="phone"
                               class="col-xs-10 col-sm-5 input-mask-phone" value="{{ $user->phone }}" required=""/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle text-danger" id="status"> ** </span>
                            @if ($errors->has('phone'))
                                <span class="text-danger retErrPhone">{{ $errors->first('phone') }}</span>
                            @endif
                        </span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-pass-2"> Password : </label>

                    <div class="col-sm-9">
                        <input type="password" id="form-pass-2" placeholder="Password" name="password"
                               class="col-xs-10 col-sm-5" value="" required=""/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle text-danger"> ** </span>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-address-1"> Address : </label>

                    <div class="col-sm-9">
                        <input type="text" id="form-address-1" placeholder="Address" class="col-xs-10 col-sm-5"
                               name="address" value="{{ $user->address }}"/>
                        <span class="help-inline col-xs-12 col-sm-7">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-image-1"> Image : </label>

                    <div class="col-sm-9">
                        <input type="file" name="image" id="form-image-1">
                        <span>
                            <img src="{{ OtherHelpers::user_logo($user->logo) }}" style="height: 60px;">
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-designation-1"> Access type
                        : </label>
                    <div class="col-sm-9">
                        <div class="checkbox">
                            <label>
                                <input type="radio" class="ace" name="role"
                                       value="1" {{ ($user->role==1)?'checked':'' }} required="">
                                <span class="lbl"> Admin </span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="role"
                                       value="2" {{ ($user->role==2)?'checked':'' }} required="">
                                <span class="lbl"> Car Owner </span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="role"
                                       value="4" {{ ($user->role==4)?'checked':'' }} required="">
                                <span class="lbl"> User </span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="clearfix form-group">
                    <div class="col-md-offset-3 col-md-9">

                        <input type="submit" class="btn btn-info" value="Add User">

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

