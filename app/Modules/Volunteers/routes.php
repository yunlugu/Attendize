<?php

Route::group(array('module' => 'Volunteers', 'namespace' => 'App\Modules\Volunteers\Controllers'), function() {

    Route::resource('volunteers', 'VolunteersController');
    
});	