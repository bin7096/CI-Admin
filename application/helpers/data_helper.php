<?php

//驼峰转下划线
if ( !function_exists('hump_to_line') ){

    function hump_to_line($string){

        $lowerStr = strtolower($string);

        $lowerStr = str_split($lowerStr);

        $string = str_split($string);

        foreach ($string as $k => $v){

            if (ord($v) <= 90 && ord($v) >= 65){

                if ($k !==0 ){

                    $string[$k] = '_'.$lowerStr[$k];

                }else{

                    $string[$k] = $lowerStr[$k];

                }

            }

        }

        $string = join('', $string);

        return $string;

    }

}