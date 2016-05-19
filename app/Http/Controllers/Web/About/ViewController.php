<?php

namespace FuelMeterWeb\Http\Controllers\Web\About;

use Illuminate\Http\Request;

use FuelMeterWeb\Http\Requests;
use FuelMeterWeb\Http\Controllers\Controller;

class ViewController extends Controller
{

    public function getIndex()
    {
        return view('web.about.index');
    }

}
