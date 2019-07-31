<?php

namespace Anwar\AutoInstaller;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AutoInstallerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes/web.php';
        include_once __DIR__.'/supports/Helpers.php';
    }

    /**
     * Bootstrap services.
     *
     * @return voiddd
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/language', 'AutoInstall');

        $this->loadViewsFrom(__DIR__."/views","AutoInstall");

        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/autoinstall'),
        ], 'public');

        /**
         * @desc Register Configs file
         */

        $configFile = [];
        foreach (new \DirectoryIterator(__DIR__.'/configs') as $file){
            if ($file->isFile()){
                $configFile[__DIR__."/configs/".$file->getFilename()] = config_path($file->getFilename());
            }
        }

        $this->publishes($configFile);
    }

}
