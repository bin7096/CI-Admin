<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once "./application/libraries/Curd.php";
include_once "./command/optimize/Make.php";
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
//            echo '<pre/>';
//            var_dump($data);exit;

            $control_info = $this -> db -> select('name') -> where('id', $data['control']) -> get('admin_node') -> row_array();

            $control_name = hump_to_line($control_info['name']);

            //判断文件是否存在
            $filename = ROOT_PATH . '\\views\\' . $control_name;

            if (is_file($filename . '\\list.php')){
                return ajax_return_json_error($this, '列表文件已存在');
            }

            $make_recycle = $data['recycleBin'] === "1" ? true : false;
            //当回收站文件存在时不生成
            if ($make_recycle && is_file($filename . '\\recycleBin.php')){
                $make_recycle = false;
            }

            $bool = Make::generate_list($control_name, $data['title'], $data['type'], $data['field'], $data['other'], $data['count'], $make_recycle);

            if (!$bool){
                return ajax_return_json_error($this, '生成列表失败');
            }

            return ajax_return_json($this, '生成列表成功');

        }else{

            //查询所有控制器
            $controls = $this -> db -> select('id,name,title') -> where('type', '0') -> where('is_system', '0') -> get('admin_node') -> result_array();

            $this -> load -> view($this -> controller . '/index', ['controls' => $controls]);

        }

    }

}