<?php

namespace App\Http\Controllers\CarOwner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class COController extends Controller
{
    //
    public function index()
    {
        return view('carOwner.index');
    }
}
