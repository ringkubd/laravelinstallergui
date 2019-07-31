<?php


namespace Anwar\AutoInstaller\Supports;


class EnvironmentRequirements
{
    public function __construct()
    {
        // return dd(config("autoinstall"));
//        foreach (config("autoinstall") as $req=>$value){
//            $this->{$req} = $req == "PHP" ? (float) explode("-",PHP_VERSION )[0] >= 7.3 ? true:false : extension_loaded($req);
//        }
    }


    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (!property_exists($name)){
            if ($name == "PHP"){
                if (PHP_VERSION >= (int) $this->PHP){
                    return true;
                }else{
                    return false;
                }
            }else{

                return extension_loaded($name);
            }

        }else{
            return "Property $name not exist";
        }

    }


}
