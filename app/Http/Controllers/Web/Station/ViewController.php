<?php

namespace FuelMeterWeb\Http\Controllers\Web\Station;

use Illuminate\Http\Request;

use FuelMeterWeb\Http\Requests;
use FuelMeterWeb\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getDetail() 
    {
        return view('web.station.detail');
    }
}
