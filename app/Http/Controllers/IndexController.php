<?php

namespace FuelMeterWeb\Http\Controllers;

use Illuminate\Http\Request;

use FuelMeterWeb\Http\Requests;
use FuelMeterWeb\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function getIndex()
    {
        return view('web.index');
    }
}
