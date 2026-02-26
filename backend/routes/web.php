<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Socialite;

Route::get('/', function () {
    return 'testando..';
});

Route::get('auth/google/redirect',function(Request $request){
    return Socialite::driver("google")->redirect();
});

Route::get('auth/google/callback',function(Request $request){
   dd($request->query());
});
