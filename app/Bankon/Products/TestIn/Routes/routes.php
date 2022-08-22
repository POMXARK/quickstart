<?php Route::group( [ 'namespace' => 'App\Http\Controllers',
], function(){
    Route::get('/testin', ['uses' => 'TestInTestController@index']);
});
