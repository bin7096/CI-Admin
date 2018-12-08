<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/21
 * Time: 17:06
 */

class Style
{
    private $color;

    private $style;

    public function __construct(){

        $this -> style = array(
            "is_exists" => array(
                "common" => "%s:%s is already exists!",
                "isANSI" => "error:|%s:|highLight:|%s| is already exists!"
            ),
            "created_successfully" => array(
                "common" => "%s:%s created successfully!",
                "isANSI" => "success:|%s:|highLight:|%s| created successfully!"
            ),
            "create_failed" => array(
                "common" => "%s:%s create failed!",
                "isANSI" => "error:|%s:|highLight:|%s| create failed!"
            )
        );

        $this -> color = array(
            "error:"     => "\033[38;5;202;1;4m",
            "success:"   => "\033[38;5;22;1;4m",
            "highLight:" => "\033[38;5;255;1;4m"
        );

    }

    public function run($type, $param1, $param2 = false){

        if (!$style = @$this -> style[$type]){

            return $this -> error_style('The style is not found!');

        }

        $content = ANSI ? $style['isANSI'] : $style['common'];

        if ($param2){

            $content = sprintf($content, ucfirst($param1), $param2);

        }else{

            $content = sprintf($content, $param1);

        }

        if (ANSI){
            $content = $this -> build_style($content);
        }

        return $content;

    }

    protected function build_style($content){

        $text_list = explode('|', $content);

        $content = $this -> color[$text_list[0]] . $text_list[1];

        $content .= $this -> color[$text_list[2]] . $text_list[3];

        $content .= $this -> color[$text_list[0]] . $text_list[4];

        return $content;

    }

    public function success_style($content){

        return $this -> color['success:'] . $content;

    }

    public function error_style($content){

        return $this -> color['error:'] . $content;

    }

}