<?php
if (!function_exists("array_value_trim")){
    function array_value_trim(array $array):array {
        if (empty($array)){
            return [];
        }
        $rendered = [];
        foreach ($array as $key=>$value){
            $k = trim($key);
            $v = trim($value);
            $rendered[$k] = $v;
        }
        return $rendered;
    }
}

