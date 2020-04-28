<?php

use App\User;

class OtherHelpers
{

    /*if user logo set then get this logo or show default image*/
    public static function user_logo($file_address)
    {
        if (file_exists('assets/uploads/User_Logo/' . $file_address)) {
            $file_path = asset('assets') . '/uploads/User_Logo/' . $file_address;
        } else {
            $file_path = asset('assets') . '/uploads/User_Logo/avatar.jpg';
        }
        return $file_path;
    }


    /*if car image set then get this image or show default image*/
    public static function car_image($file_address)
    {
        if (file_exists('assets/uploads/Cars/' . $file_address)) {
            $file_path = asset('assets') . '/uploads/Cars/' . $file_address;
        } else {
            $file_path = asset('assets') . '/uploads/Cars/default.png';
        }
        return $file_path;
    }

}
