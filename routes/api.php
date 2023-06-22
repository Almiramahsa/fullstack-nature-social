<?php


use Illuminate\Support\Facades\Route;

//posts
Route::apiResource('/comments', App\Http\Controllers\Api\CommentsController::class);