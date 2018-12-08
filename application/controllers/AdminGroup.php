<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once './application/libraries/Curd.php';

class AdminGroup extends Curd
{
    public function __construct(){
        parent::__construct();
        $this -> load -> helper('url');
    }

    protected $controller = 'admin_group';

    protected $model = 'AGModel';

    protected $table = 'admin_group';

    protected $limit = 10;

    protected $field = ['name','icon','sort','status','remark'];

    protected $returnMsg = ['分组名称','分组图标','序号','状态','备注'];

}