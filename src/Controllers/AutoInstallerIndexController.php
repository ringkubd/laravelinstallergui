<?php

namespace Anwar\AutoInstaller\Controllers;

use Anwar\AutoInstaller\Supports\ConfigFileManager;
use Anwar\AutoInstaller\Supports\EnvironmentFileManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AutoInstallerIndexController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $renderdInput = \Supports::EnvironmentFormInputManager()->makeInput();
        return view("AutoInstall::environment.formway",compact('renderdInput'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request){
        $removeWhiteSpace = array_value_trim($request->all());
        \Supports::EnvironmentFileManager()->saveEnvFormWay($removeWhiteSpace);
        return trans("AutoInstall::autoinstaller_message.env.empty");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function checkRequirement(){
        $requirements = [];
        foreach (config("autoinstall") as $req=>$value){
            $requirements[$req] = $req == "PHP" ? (float) explode("-",PHP_VERSION )[0] >= 7.1 ? true:false : extension_loaded($req);
        }

        return view("AutoInstall::index",compact("requirements"));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configFileList(){
        $filelist = ConfigFileManager::configeList();
        return view("AutoInstall::configuration.index",compact("filelist"));
    }

    public function configFileContent($filename){
        $filecontent = ConfigFileManager::getRawContent($filename);
        return view("AutoInstall::configuration.codeeditor",compact("filecontent",'filename'));
    }

    /**
     * @param Request $request
     */

    public function saveConfigFile(Request $request){
        $request->validate([
            "filename"=>"required|string",
            "contents"=>"required|string"
        ]);
        $saveFile = ConfigFileManager::saveRawContent($request->filename,$request->contents);

        \Artisan::call("config:cache");
        \Artisan::call("view:clear");
        return $saveFile;
    }


}
