<?php Route::group( [ 'namespace' => 'App\Http\Controllers',
], function(){
    Route::get('/test', ['uses' => 'TestController@index']);
});
