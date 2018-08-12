<?php
# @Author: Anwar Jahid
# @Date:   2018-08-12T10:12:32+06:00
# @Email:  a.jahid@il.com
# @Filename: InstallerServiceProvider.php
# @Last modified by:   Anwar Jahid
# @Last modified time: 2018-08-12T11:12:09+06:00
# @Copyright: anwar jahid


namespace Anwar\Installer;

use Illuminate\Support\ServiceProvider;

class InstallerServiceProvider extends ServiceProvider
{
  /**
  * Bootstrap services.
  *
  * @return void
  */
  public function boot()
  {
    $this->loadViewsFrom(__DIR__.'/views', 'installer');
    $this->publishes([
      __DIR__.'/views' => resource_path('views/vendor/installer'),
    ]);
  }

  /**
  * Register services.
  *
  * @return void
  */
  public function register()
  {
    $this->loadRoutesFrom(__DIR__.'/routes/Routes.php');
    $this->app->make('Anwar\Bankid\InstallerController');
    $this->app->bind('Installer', function () {
      return new InstallerController;
    });
  }
}
