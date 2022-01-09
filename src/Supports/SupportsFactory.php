<?php


namespace Anwar\AutoInstaller\Supports;
use Illuminate\Http\Request;

class SupportsFactory
{
    private $environmentFileManager;
    private $environmentFormInputManager;
    private $environmentRequirements;

    public function __construct(EnvironmentFileManager $environmentFileManager,EnvironmentFormInputManager $environmentFormInputManager,EnvironmentRequirements $environmentRequirements)
    {
        $this->environmentFileManager = $environmentFileManager;
        $this->environmentFormInputManager = $environmentFormInputManager;
        $this->environmentRequirements = $environmentRequirements;
    }

    /**
     * @return EnvironmentFileManager
     */

    public function EnvironmentFileManager(){
        return $this->environmentFileManager;
    }

    /**
     * @return EnvironmentFormInputManager
     */

    public function EnvironmentFormInputManager(){
        return $this->environmentFormInputManager;
    }

    /**
     * @return EnvironmentRequirements
     */

    public function EnvironmentRequirements(){
        return $this->environmentRequirements;
    }


    /**
     * @param $name
     * @return mixed
     */

    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (!property_exists($name)){
            return "Property $name not exist";
        }
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        if (!property_exists($name)){
            return "Property $name not exist";
        }
    }



}
