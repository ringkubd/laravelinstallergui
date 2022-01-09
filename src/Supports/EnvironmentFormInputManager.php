<?php


namespace Anwar\AutoInstaller\Supports;


class EnvironmentFormInputManager
{
    public function makeInput(){
        $envarray = \Supports::EnvironmentFileManager()->getEnvAsKeyValue();

        if (empty($envarray)){
            return trans("AutoInstall::autoinstaller_message.env.empty");
        }

        $rendered = "";
        $totalEnvPart = ceil((count($envarray) - 1) / 6);
        $partArray = [];
        for ($z = 1; $z <= $totalEnvPart;$z++){
            $num = $z + 1;
            $partArray[$z*6] = "</div><div class='part' id='{$num}'>";
        }
        $i = 1;
        foreach ($envarray as $key=>$value){
            $i++;
            $part = false;
            if (array_key_exists($i,$partArray)){
                $part = $partArray[$i];
                unset($partArray[$i]);
            }
            $rendered .= $this->input([
                "value"=>$value,
                "name"=>$key
            ],$part);

        }
        return  "<div class='part active' id='1'>".$rendered."</div>";
    }

    /**
     * @param array $attribute
     * @return string
     */

    public function input($attribute = ["value"=>"","name"=>"","id"=>"","classes"=>[],"label"=>""],$nextpart = false){
        $value = $attribute["value"] ?? null;
        $name = $attribute["name"] ?? null;
        $id = $attribute["id"] ?? $attribute["name"] ?? null;
        if (array_key_exists("classes",$attribute) && $attribute["classes"] != ""){
            $class = implode(" ",$attribute["classes"] ?? []);
        }else{
            $class = "form-control";
        }

        $nextpartEnd = null;
        $nextpartStart = null;



        $label = ucwords($attribute["label"] ?? str_replace("_"," ",$name) ?? str_replace("_"," ",$id));
        $inputHtml = "
            $nextpart
            <div class='form-group'>
                <label for='{$id}'>{$label}</label>
                <input class='{$class} env' name='{$name}' id='{$id}' value='{$value}'/>
            </div>";
        return $inputHtml;

    }

}
