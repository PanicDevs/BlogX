<?php


use Illuminate\Support\Facades\Route;

Route::get('foo', function ()
{
    dd(config('user.filament.foo'));
});
