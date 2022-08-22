<?php Route::group( [ 'namespace' => 'App\Http\Controllers',
], function(){
    Route::get('/bankon', ['uses' => 'BankonTestController@index']);
});
