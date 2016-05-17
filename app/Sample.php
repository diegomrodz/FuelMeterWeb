<?php

namespace FuelMeterWeb;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = [
        'name',
        'email',
        'institution',
        'attendant_name',
        'station_name',
        'station_flag',
        'station_cep',
        'station_address',
        'station_district',
        'station_city',
        'station_state',
        'station_lat',
        'station_lng',
        'sample_volume',
        'sample_result',
        'proceedings',
        'observation'
    ];
}
