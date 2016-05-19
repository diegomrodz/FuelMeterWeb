<?php

namespace FuelMeterWeb\Http\Controllers\Web\Sample;

use Illuminate\Http\Request;

use FuelMeterWeb\Http\Requests;
use FuelMeterWeb\Http\Controllers\Controller;

class ViewController extends Controller
{
    public function getNew()
    {
        return view('web.sample.new');
    }

    public function getData()
    {
        return view('web.sample.data');
    }

    public function getDetail()
    {
        return view('web.sample.detail');
    }
}
