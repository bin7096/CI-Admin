<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/10/31
 * Time: 18:02
 */

class Echarts extends CI_Controller
{

    public function echarts1(){

        $this -> load -> helper('url');

        return $this -> load -> view('echarts/echarts1');

    }

}