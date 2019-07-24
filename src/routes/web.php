<?php

Route::namespace("Anwar\AutoInstaller\Controllers")->middleware(["web"])->group(function (){
    Route::get("install","AutoInstallerIndexController@index");
    Route::post("install","AutoInstallerIndexController@store");
});
