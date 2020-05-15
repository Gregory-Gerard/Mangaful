<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('mangas', 'MangaController')->except(['store', 'update', 'destroy']);

Route::get('/chapters/last', 'ChapterController@lastReleases')->name('chapters.last-releases');
Route::apiResource('mangas.chapters', 'ChapterController')->shallow()->except(['store', 'update', 'destroy']);
