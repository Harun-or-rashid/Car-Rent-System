<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    /*show dashboard home page*/
    public function index()
    {
        return view('admin.index');
    }
}
