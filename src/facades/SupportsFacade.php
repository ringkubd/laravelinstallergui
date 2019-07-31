<?php


namespace Anwar\AutoInstaller\Facades;

use Anwar\AutoInstaller\Supports\EnvironmentFormInputManager;
use Anwar\AutoInstaller\Supports\EnvironmentRequirements;
use Illuminate\Support\Facades\Facade;
use Anwar\AutoInstaller\Supports\SupportsFactory;
use Anwar\AutoInstaller\Supports\EnvironmentFileManager;

class SupportsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return new SupportsFactory(new EnvironmentFileManager(),new EnvironmentFormInputManager(),new EnvironmentRequirements());
    }
}
