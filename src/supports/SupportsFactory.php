<?php


namespace Anwar\AutoInstaller\Supports;




use Illuminate\Http\Request;

class SupportsFactory
{
    private $environmentFileManager;
    private $environmentFormInputManager;

    public function __construct(EnvironmentFileManager $environmentFileManager,EnvironmentFormInputManager $environmentFormInputManager)
    {
        $this->environmentFileManager = $environmentFileManager;
        $this->environmentFormInputManager = $environmentFormInputManager;
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
