<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/story/{slug?}', [StoryController::class, 'show'])->where('slug', '.*')->name('story.show');
