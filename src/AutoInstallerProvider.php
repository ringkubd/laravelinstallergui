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
    }

    /**
     * Bootstrap services.
     *
     * @return voiddd
     */
    public function boot()
    {
        foreach (new \DirectoryIterator(__DIR__.'/language') as $file){
            if ($file->isFile()){
                $this->loadTranslationsFrom(__DIR__."/$file->getFilename().php", 'autoinstaller');
            }
        }

        $this->loadViewsFrom(__DIR__."/views","AutoInstall");

    }
}
