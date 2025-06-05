<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    //check
    public function check()
    {
        return view('pages.check-booking');
    }
}
