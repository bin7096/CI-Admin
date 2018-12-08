<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once "./command/optimize/Make.php";
class GenerateNode extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this -> load -> helper('url');

        $this -> load -> database();

        $this -> load -> helper('data');
    }

    protected $field = array('title','name','sort');

    protected $returnMsg = array('方法标题','方法名称','排序序号');

    public function index(){

        if (IS_POST){

            $data = $_POST;

            //校验必填字段
            foreach ($this -> field as $k => $v){
                if (empty($data[$v])){
                    return ajax_return_json_error($this, $this -> returnMsg . '不能为空');
                }
            }

            //controller文件是否存在
            $file_name = ROOT_PATH . '\\' . THIS_MODULE . '\\controllers\\' . $data['name'] . '.php';
            if (is_file($file_name)){
                return ajax_return_json_error($this, '控制器已存在');
            }

            $time = time();

            $insert = array(
                'pid'         => 0,
                'group_id'    => $data['group_id'],
                'name'        => $data['name'],
                'title'       => $data['title'],
                'remark'      => $data['remark'],
                'level'       => 1,
                'type'        => '0',
                'status'      => '1',
                'sort'        => $data['sort'],
                'isdelete'    => '0',
                'create_time' => $time,
                'update_time' => $time,
                'is_system'   => '0'
            );

            //方法ID
            foreach ($data['func_check'] as $k => $v){

                if ((int)$v < 2){
                    unset($data['func_id'][$k]);
                }

            }

            array_multisort($data['func_id']);

            //查询方法信息
            $funcs = $this -> db -> select('name,title') -> where_in('id', $data['func_id']) -> get('admin_generate_func') -> result_array();

            unset($data['func_id']);
            unset($data['func_check']);

            //视图目录名称
            $view_dir = hump_to_line($data['name']);

            //生成视图目录
            $dirname = make::generate_view_dir($view_dir);

            //生成Controller
            $bool = Make::generate_node($file_name, $data['name'], $data['extend_src'], $data['database_table'], $view_dir, $funcs);

            if (!$bool){
                return ajax_return_json_error($this, '生成控制器失败');
            }

            //开启事务
            $this -> db -> trans_begin();

            $this -> db -> insert('admin_node', $insert);

            $id = $this -> db -> insert_id();

            $funcs_insert = array();

            foreach ($funcs as $k => $v){

                $funcs_insert[] = array(
                    'pid'         => $id,
                    'group_id'    => $data['group_id'],
                    'name'        => $v['name'],
                    'title'       => $v['title'],
                    'remark'      => '',
                    'level'       => 2,
                    'type'        => '1',
                    'status'      => '1',
                    'sort'        => $k,
                    'isdelete'    => '0',
                    'create_time' => $time,
                    'update_time' => $time,
                    'is_system'   => '0',
                );

            }

            $this -> db -> insert_batch('admin_node', $funcs_insert);

            if ($this -> db -> trans_status() === false){
                @unlink($file_name);
                @rmdir($dirname);
                $this -> db -> trans_rollback();
                return ajax_return_json_error($this, '生成节点失败');
            }
            $this -> db -> trans_commit();
            return ajax_return_json($this, '生成节点成功');


        }else{

            $groups = $this -> db -> select('id,name') -> get('admin_group') -> result_array();

            $funcs = $this -> db -> select('id,name,title') -> get('admin_generate_func') -> result_array();

            $funcs_count = count($funcs);

            $this -> load -> view('generate_node/index', ['groups' => $groups, 'funcs' => $funcs, 'funcs_count' => $funcs_count]);

        }

    }

}