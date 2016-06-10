<?php

Route::get('/', 'IndexController@getIndex');

Route::group([
    'namespace' => 'Web',
    'prefix' => 'web',
    'middleware' => 'web'
], function () {

    Route::group([
        'namespace' => 'Index',
        'prefix' => 'index'
    ], function () {

        Route::get('/', 'ViewController@getIndex');
        
    });
    
    Route::group([
        'namespace' => 'HowTo',
        'prefix' => 'how-to'
    ], function () {
       
       Route::get('/', 'ViewController@getIndex');
        
    });

    Route::group([
        'namespace' => 'Sample',
        'prefix' => 'sample'
    ], function () {

        Route::get('/new', 'ViewController@getNew');
        Route::get('/data', 'ViewController@getData');
        Route::get('/detail', 'ViewController@getDetail');

    });
    
    Route::group([
        'namespace' => 'Station',
        'prefix' => 'station'
    ], function () {
       
       Route::get('/detail', 'ViewController@getDetail');
        
    });

    Route::group([
        'namespace' => 'About',
        'prefix' => 'about'
    ], function () {

        Route::get('/', 'ViewController@getIndex');

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
        Route::get("sample/by_cep/{cep}", 'SampleController@byCep');
        
    });

});