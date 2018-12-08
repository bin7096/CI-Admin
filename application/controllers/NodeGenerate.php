<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once "./application/libraries/Curd.php";
class NodeGenerate extends Curd{

    public function __construct(){
        parent::__construct();

        $this -> load -> database();
    }

    public function index(){

        $content = file_get_contents('C:\\Users\\bin_i\\Desktop\\ci\\command\\imageToTxt\\code_no_bug.txt');

        echo '<pre/>';
        var_dump($content);exit;

        if (IS_POST){

        }else{

            $groups = $this -> db -> select() -> get('admin_group') -> result_array();

            $funcs = $this -> db -> select() -> get('admin_generate_func') -> result_array();

            $funcs_count = count($funcs);

            $this -> load -> view('node_generate/index', ['funcs' => $funcs, 'funcs_count' => $funcs_count]);

        }

    }

}