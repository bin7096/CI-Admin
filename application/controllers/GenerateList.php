<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once "./application/libraries/Curd.php";
class GenerateList extends Curd{

    public function __construct(){
        parent::__construct();
        $this -> load -> helper('data');
    }

    //控制器(视图目录名称)
    protected $controller = 'generate_list';

    //数据表名称
    //protected $table = '';

    //列表页分页条数
    //protected $limit = 10;

    //表单验证字段
    //protected $field = [];

    //表单验证失败返回信息
    //protected $returnMsg = [];

    //首页
    public function index(){

        if (IS_POST){

            $data = $_POST;

            $control_info = $this -> db -> select('name') -> where('id', $data['control']) -> get('admin_node') -> row_array();

            $control_name = $control_info['name'];

            //控制器文件是否存在
            if (!is_file(ROOT_PATH . '\\' . THIS_MODULE . '\\controllers\\' . $control_name . '.php')){
                return ajax_return_json_error($this, '该控制器文件不存在');
            }

            //视图目录名
            $dirname = ROOT_PATH . '\\' . THIS_MODULE . '\\views\\' . hump_to_line($control_name);

            //视图目录是否存在
            if (!is_dir($dirname)){
                mkdir($dirname);
            }



        }else{

            //查询所有控制器
            $controls = $this -> db -> select('id,name,title') -> where('type', '0') -> where('is_system', '0') -> get('admin_node') -> result_array();

            $this -> load -> view($this -> controller . '/index', ['controls' => $controls]);

        }

    }


}