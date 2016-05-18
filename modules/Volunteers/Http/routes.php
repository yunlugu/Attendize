<?php


Route::group([
    'middleware' => ['web', 'auth'],
    'prefix'     => 'module/{event_id}/volunteers',
    'namespace'  => 'Modules\Volunteers\Http\Controllers'
], function () {


    Route::get('/', [
        'as'   => 'volunteer.backend.index',
        'uses' => 'BackendController@index'
    ]);
});

Route::group([
    'middleware' => 'web',
    'prefix'     => 'm/{event_id}/volunteers',
    'namespace'  => 'Modules\Volunteers\Http\Controllers'
], function(){

    Route::get('/', [
       'as' => 'volunteer.public.index',
        'uses' => 'PublicController@index',
    ]);
});