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

    Route::group([
        'namespace' => 'Sample',
        'prefix' => 'sample'
    ], function () {

        Route::get('/new', 'ViewController@getNew');

    });

});

Route::group([
    'namespace' => 'Api',
    'prefix' => 'api'
], function () {

    Route::group([
        'namespace' => 'v1',
        'prefix' => 'v1'
    ], function () {

        Route::resource('sample', 'SampleController');

    });

});