<?php


namespace Anwar\AutoInstaller\Supports;


class ConfigFileManager
{
    /**
     * @var string
     */
    private static $configFilePath;

    /**
     * ConfigFileManager constructor.
     */

    public function __construct()
    {
        self::$configFilePath = config_path("/");
    }

    /**
     * @return array
     */

    public static function configeList(){
        $configDirectory = config_path("/");
        $fileListWithLink = [];
        foreach (new \DirectoryIterator($configDirectory) as $file){
            if ($file->isFile()){
                $filenameWithOutExtention = substr($file->getFilename(),0,strrpos($file->getFilename(),"."));
                $secured_config = config("secured_config.secure") ?? [];
                if (!in_array($filenameWithOutExtention,$secured_config)){
                    $fileListWithLink[$file->getFilename()] = $file->getRealPath();
                }
            }
        }
        return $fileListWithLink;
    }

    /**
     * @param $filename
     * @return array
     */

    public static function fileGetContent($filename): array {
        $filenameWithOutExtention = substr($filename,0,strrpos($filename,"."));
        $configFileList = self::configeList();
        if (file_exists($configFileList[$filename])){
            return config($filenameWithOutExtention);
        }
        return [];
    }

    /**
     * @param $filename
     * @return string
     */

    public static function getRawContent($filename):string {
        $configFileList = self::configeList();
        if (file_exists($configFileList[$filename])){
            return file_get_contents($configFileList[$filename]);
        }
        return "";
    }

    public static function saveRawContent($filename,$filecontent){
        $configFileList = self::configeList();
        if (file_exists($configFileList[$filename])){
            file_put_contents($configFileList[$filename],$filecontent);
        }
    }
}
