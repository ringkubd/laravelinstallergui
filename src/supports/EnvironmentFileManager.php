<?php
namespace Anwar\AutoInstaller\Supports;

use Illuminate\Http\Request;

class EnvironmentFileManager
{
    /*
     * @var .env file path
     */
    private $envFilePath;

    /**
     * @var .env.example file
     */
    private  $envExampleFilePath;

    /**
     * EnvironmentFileManager constructor.
     * @desc set envFilePath and envExampleFilePath file path
     */
    public function __construct()
    {
        $this->envFilePath = base_path(".env");
        $this->envExampleFilePath = base_path(".env.example");
    }

    /**
     * @desc create if not exist and return .env content
     * @return false|string
     */


    public function getEnvContent(){
        if (!file_exists($this->envFilePath)){
            if (file_exists($this->envExampleFilePath)){
                copy($this->envExampleFilePath,$this->envFilePath);
            }else{
                touch($this->envFilePath);
            }
        }

        return file_get_contents($this->envFilePath);
    }

    /**
     * @return false|string
     */

    public function getEnvContentAsArray(){

        $contentAsString =  $this->getEnvContent();
        $every_line_as_array = explode("\n",$contentAsString);
        return $every_line_as_array;
    }


    /**
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */

    public function getEnvAsKeyValue(){
        $every_line_as_array = $this->getEnvContentAsArray();
        if (empty($every_line_as_array)){
            return trans("autoinstaller_message.env.empty");
        }

        $key_value_array = [];

        foreach ($every_line_as_array as $line){
            $keyvalue = explode("=",$line);
            if ($keyvalue[0] != ""){
                $key_value_array[str_replace(" ","",$keyvalue[0])] = str_replace(" ","",$keyvalue[1]) ?? "";
            }

        }
        return $key_value_array;
    }


    /**
     * @return string | .env file path
     */
    public function getEnvPath(){
        return $this->envFilePath;
    }

    /**
     * @return string| .env.example file path
     */

    public function getExampleEnvFilePath(){
        return $this->envExampleFilePath;
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */

    public function saveEnvClassicWay(Request $request){
        $message = trans("autoinstaller_message.env.success");
        try{
            file_get_contents($this->envFilePath,$request->envcontent);
        }catch (\Exception $exception){
            return $message = trans("autoinstaller_message.env.error");
        }
    }

    public function saveEnvFormWay($request){
        if (array_key_exists("_token",$request)){
            unset($request["_token"]);
        }

        $allEnvArray = [];
        foreach ($request as $k=>$v){
            $allEnvArray[] = "$k=$v";
        }
        $allEnvString = implode(PHP_EOL,$allEnvArray);
        file_put_contents($this->getEnvPath(),$allEnvString);
    }







}
