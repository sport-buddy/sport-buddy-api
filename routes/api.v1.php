<?php

Route::get('/', 'Controller@v1')->name('api.v1');
Route::resource('locations', 'LocationController')->only(['index', 'show']);
