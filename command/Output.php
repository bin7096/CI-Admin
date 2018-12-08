<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/21
 * Time: 14:33
 */

class Output
{
    private $stdout;

    private $font_color;

    public function __construct(){

        $this -> stdout = $this -> open_output_stream();

    }

    /**
     * 将返回信息写入到输出
    */
    public function run($content = ''){

        if (false === fwrite($this -> stdout, $content)){
            echo 'Unable to write output!';exit;
        }

        fflush($this -> stdout);exit;

    }

    /**
     * 开启输出
     * return resource
    */
    protected function open_output_stream(){

        return @fopen('php://stdout', 'w') ? : fopen('php://output', 'w');

    }

}