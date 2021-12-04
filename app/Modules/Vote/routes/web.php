<?php

use Illuminate\Support\Facades\Route;


        //Route::get('vote', 'VoteController@welcome');
        Route::get('/vote', 'VoteController@index');
        Route::get('/meeting', 'VoteController@meeting');
        // to get vote
        Route::get('/vote', [App\Http\Controllers\UserController::class, 'vote']);

        // Change ur miss asu dp
        Route::get('vote/{id}', 'VoteController@getAspirant');
        Route::post('/payment',[\App\Modules\Vote\Http\Controllers\PaymentController::class,'payment']);
//        Route::any('/verifyPayment',[\App\Modules\Vote\Http\Controllers\PaymentController::class,'verifyPayment'])->name('verifyPayment');

        Route::post('/voter/voters_reg', [App\Modules\Vote\Http\Controllers\VoteController::class, 'voters_reg'])->name('voters_reg');
        // Voter start session
        Route::post('/voter/start_session', [App\Modules\Vote\Http\Controllers\VoteController::class, 'voterStartSession'])->name('voterStartSession');

        // cast vote
        Route::post('/castVote', [App\Modules\Vote\Http\Controllers\VoteController::class, 'castVote'])->name('castVote');

//Route::get('voter/voter_login', [App\Modules\Vote\Http\Controllers\VoteController::class, 'voter_login'])->name('voter_login');


//Route::post('vote/{$id}', [App\Http\Controllers\VoteController::class, 'getAspirant'])->name('getAspirant');
