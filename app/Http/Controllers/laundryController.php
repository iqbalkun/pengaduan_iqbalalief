<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class laundryController extends Controller
{

    public function index()
    {
        return view('laundry.index'); 
    }

}
