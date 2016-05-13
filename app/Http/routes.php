<?php

Route::get('/', 'IndexController@getIndex');

Route::group([
    'namespace' => 'Web',
    'middleware' => 'web',
    'prefix' => 'web'
], function () {

    Route::group([
        'namespace' => 'Index',
        'prefix' => 'index'
    ], function () {

        Route::get('/', 'ViewController@getIndex');
        
    });

});