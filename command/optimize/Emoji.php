<?php
/**
 * Created by PhpStorm.
 * User: bin_i
 * Date: 2018/11/20
 * Time: 22:23
 */

include_once './command/Output.php';
include_once './command/Style.php';
class Emoji
{
    public function __construct(){

        $this -> output = new Output();

        $this -> style = new Style();

    }

    public function output($param){

        $has =array(
            'gnwdxxx' => 'give_you_my_heart'
        );

        if (!isset($has[$param[2]])){
            $this -> output -> run($this -> style ->error_style('The emoji is not exists!'));
        }

        $content = file_get_contents(ROOT_PATH . '\\command\\imageToTxt\\' . $has[$param[2]] . '.txt');

        $this -> output -> run($content);

    }
}