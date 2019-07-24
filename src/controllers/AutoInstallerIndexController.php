<?php

namespace Anwar\AutoInstaller\Controllers;

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

    public function store(Request $request){
        //return dump(\Supports::EnvironmentFileManager()->getEnvContent());
        return dump(\Supports::EnvironmentFileManager()->saveEnvFormWay($request->all()));
    }
}
