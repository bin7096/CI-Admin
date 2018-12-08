<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once "./application/libraries/Curd.php";
class GenerateFuncs extends Curd{

    public function __construct(){
        parent::__construct();
    }

    protected $controller = 'generate_funcs';

    protected $table = 'admin_generate_func';

    protected $limit = 10;

    protected $field = ['name','title','status'];

    protected $returnMsg = ['方法名称','方法标题','状态'];

}