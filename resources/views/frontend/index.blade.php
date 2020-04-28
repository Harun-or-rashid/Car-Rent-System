@extends('frontend.master')

@section('main_content')

    @include('frontend.partials.slider')

    <!--== Choose Car Area Start ==-->
    @include('frontend.partials.choose_car')
    <!--== Choose Car Area End ==-->

    <!--== About Us Area Start ==-->
    @include('frontend.partials.about')
    <!--== About Us Area End ==-->

@endsection
