<?php

use App\Http\Controllers\Api\UserController;

Route::group([
    'prefix' => 'user',
    'as' => 'user.'
], function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
});
