<?php

Route::get('/', 'Controller@v1')->name('api.v1');
Route::apiResource('locations', 'LocationController')->only(['index', 'show']);
Route::apiResource('categories', 'CategoryController')->only(['index']);
Route::apiResource('events', 'EventController')->only(['index']);
