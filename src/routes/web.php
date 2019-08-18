<?php

Route::namespace("Anwar\AutoInstaller\Controllers")->middleware(["web"])->group(function (){
    Route::get('configure', 'AutoInstallerIndexController@index');
    Route::post('install', 'AutoInstallerIndexController@store');
    Route::get('install', 'AutoInstallerIndexController@checkRequirement');

    Route::get('confile_file_list', 'AutoInstallerIndexController@configFileList');
    Route::get('confige_file/{filename}', 'AutoInstallerIndexController@configFileContent');
    Route::post('confige_file_store', 'AutoInstallerIndexController@saveConfigFile');
});
