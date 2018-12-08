<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/22
 * Time: 9:54
 */

class Help
{

    private $style;

    private $content;

    public function __construct(){

        $this -> style = array(
            ':default_module:' => "\033[38;5;6;1m",
            ':extend_module:'  => "\033[38;5;4;1m",
            ':version_stop:'   => "\033[0m",
            ':version_info:'   => "\033[38;5;4;1m",
            ':extend_name:'    => "\033[38;5;12;1m",
            ':version:'        => "\033[38;5;255;48;5;202;1m",
            ':command:'        => "\033[38;5;196;1m",
            ':normal:'         => "\033[38;5;22;1m",
            ':sample:'         => "\033[38;5;202;1m",
            ':title:'          => "\033[38;5;3;1m",
            ':class:'          => "\033[38;5;2;1m",
            ':head:'           => "\033[38;5;255;1m",
            ':info:'           => "\033[38;5;255;1m",
        );

        $this -> line = ":normal:-------------------------------------------------------------------------------------------------------------------------------------------------------\n";

        $this -> content .= "\n";

        $this -> content .= ":version:                                      :version_stop:\n";

        $this -> content .= ":version: Framework version:CodeIngiter V3.1.9 :version_stop:\n";

        $this -> content .= ":version:                                      :version_stop:\n";

        $this -> content .= ":version: Admin     version:ci-admin beta 1.0  :version_stop:\n";

        $this -> content .= ":version:                                      :version_stop:\n";

        $this -> content .= ":version: Console   version:ci-admin beta 0.1  :version_stop:\n";

        $this -> content .= ":version:                                      :version_stop:\n";

        $this -> content .= $this -> line;

    }

    public function run(){

        $this -> head();

        $this -> make_list();

        $this -> emoji_list();

        foreach ($this -> style as $k => $v){

            $this -> content = str_replace($k, $v, $this -> content);

        }

        echo $this -> content;

    }

    public function head(){

        $this -> content .= ":normal:|     :head:command     :normal:|                   :head:arguments                   :normal:|                  :head:sample                  :normal:|                  :head:info                  :normal:|\n";

        $this -> content .= $this -> line;

    }

    public function make_list(){

        $this -> content .= ":normal:|                                                                        :title:make                                                                         :normal:|\n";

        $this -> content .= $this -> line;

        $this -> content .= ":normal:| :command:make controller :normal:| [:default_module:module:normal:/]:class:class :normal:[[:extend_module:extend_module:normal:/]:extend_name:extend_class:normal:] | :sample:make controller common/Index common/Curd :normal:| :info:Create a new resource controller class :normal:|\n";

        $this -> content .= $this -> line;

        $this -> content .= ":normal:| :command:make model      :normal:| [:default_module:module:normal:/]:class:class :normal:[[:extend_module:extend_module:normal:/]:extend_name:extend_class:normal:] | :sample:make model common/Index common/Curd      :normal:| :info:Create a new model class               :normal:|\n";

        $this -> content .= $this -> line;

        $this -> content .= ":normal:| :command:make library    :normal:| [:default_module:module:normal:/]:class:class :normal:[[:extend_module:extend_module:normal:/]:extend_name:extend_class:normal:] | :sample:make library common/Index common/Curd    :normal:| :info:Create a new library class             :normal:|\n";

        $this -> content .= $this -> line;

        $this -> content .= ":normal:| :command:make helper     :normal:| [:default_module:module:normal:/]:class:helper :normal:[:extend_name:default_func_name:normal:]           | :sample:make helper common/Index func_name       :normal:| :info:Create a new helper file               :normal:|\n";

        $this -> content .= $this -> line;

    }

    public function emoji_list(){

        $this -> content .= ":normal:|                                                                        :title:emoji                                                                        :normal:|\n";

        $this -> content .= $this -> line;

        $this -> content .= ":normal:| :command:emoji *****     :normal:| :class:name                                          :normal:| :sample:emoji gnwdxxx                            :normal:| :info:export emoji to cmd                    :normal:|\n";

        $this -> content .= $this -> line;

    }

}