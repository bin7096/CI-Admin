<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once './application/libraries/Curd.php';

class AdminNode extends Curd
{
    public function __construct(){
        parent::__construct();
        $this -> load -> helper('url');
    }

    protected $controller = 'admin_node';

    protected $model = 'ANModel';

    protected $table = 'admin_node';

    protected $limit = 5;

    protected $field = ['title','name','group_id','sort'];

    protected $returnMsg = ['节点标题','节点名称','所属分组','排序序号'];

    //列表页
    public function index(){

        $data = $_GET;

        //查询分组
        $this -> load -> database();

        $this -> db -> select();

        $this -> db -> order_by('sort','asc');

        if (isset($data['name'])){

            $this -> db -> where(['name' => $data['name']]);

            $param = "&name=" . $data['name'];

        }else{

            $param = '';

        }

        $data['p'] = isset($data['p']) ? $data['p'] : 1;

        $this -> load -> helper('list');
        $result = paginate($this, 'admin_group', $this -> limit, $data['p'], true, $param);

        //根据分组查询控制器

        $list = [];
        foreach ($result['list'] as $v){

            $childs = $this -> db -> where('group_id', $v['id']) -> where('isdelete', '0') -> where('type', '0') -> order_by('sort', 'asc') -> get($this -> table) -> result_array();

            if (empty($childs)){        //为空跳过，不显示分组
                continue;
            }

            $list[] = array(
                'name'   => '<i class="layui-icon">' . $v['icon'] . '</i> ' . $v['name'],
                'childs' => $childs
            );

        }

        $count = $this -> db -> where('isdelete', '0') -> count_all_results($this -> table);

        return $this -> load -> view($this -> controller . '/list', ['list' => $list, 'page' => $result['page'], 'count' => $count]);

    }

    //添加
    public function add(){

        $this -> load -> helper('response');
        $this -> load -> database();

        if (IS_POST){

            $data = $_POST;

            //验证参数
            $result = verify_request_field($data, $this -> field, $this -> returnMsg);

            if (!$result['status']){
                return ajax_return_json($this,$result['msg'],1);
            }

            //添加写入字段
            $this -> load -> helper('model');
            $data = add_field($data);
            $data['pid']   = 0;
            $data['type']  = '0';
            $data['level'] = 1;
            $data['create_time'] = $data['update_time'] = time();

            $result = $this -> db -> insert($this -> table, $data);

            if ($result){
                return ajax_return_json($this,'添加成功', 1, [], true, false, true);
            }

            return ajax_return_json_error($this, '添加失败');

        }else{

            //分组列表
            $group_list = $this -> db -> select('id,name') -> where('isdelete', '0') -> order_by('sort', 'asc') -> get('admin_group') -> result_array();

            return $this -> load -> view($this -> controller . '/add', ['group_list' => $group_list]);

        }

    }

    //编辑
    public function edit(){

        $this -> load -> database();

        if (IS_POST){

            $data = $_POST;

            $id = $data['id'];
            unset($data['id']);

            $result = $this -> db -> where('id', $id) -> update($this -> table, $data);

            if ($result){
                return ajax_return_json($this, '保存成功', 1, [], true, false, true);
            }

            return ajax_return_json_error($this, '保存失败');

        }else{

            $id = $_GET['id'];

            $info = $this -> db -> where('id', $id) -> get($this -> table) -> row_array();

            $groups = $this -> db -> select('id,name') -> get('admin_group') -> result_array();

            return $this -> load -> view($this -> controller . '/edit', ['info' => $info, 'groups' => $groups]);

        }

    }

    //查看
    public function show(){

        $id = $_GET['id'];

        $this -> load -> database();

        $info = $this -> db -> where('id', $id) -> get($this -> table) -> row_array();

        $group = $this -> db -> where('id', $info['group_id']) -> get('admin_group') -> row_array();

        return $this -> load -> view($this -> controller . '/show', ['info' => $info, 'group' => $group]);

    }

    //回收站
    public function recycleBin(){

        $data = $_GET;

        //查询分组
        $this -> load -> database();

        $this -> db -> select();

        $this -> db -> order_by('sort','asc');

        if (isset($data['name'])){

            $this -> db -> where(['name' => $data['name']]);

            $param = "&name=" . $data['name'];

        }else{

            $param = '';

        }

        $data['p'] = isset($data['p']) ? $data['p'] : 1;

        $this -> load -> helper('list');
        $result = paginate($this, 'admin_group', $this -> limit, $data['p'], true, $param);

        //根据分组查询控制器

        $list = [];
        foreach ($result['list'] as $v){

            $childs = $this -> db -> where('group_id', $v['id']) -> where('isdelete', '1') -> where('type', '0') -> order_by('sort', 'asc') -> get($this -> table) -> result_array();

            if (empty($childs)){        //为空跳过，不显示分组
                continue;
            }

            $list[] = array(
                'name'   => '<i class="layui-icon">' . $v['icon'] . '</i> ' . $v['name'],
                'childs' => $childs
            );

        }

        $count = $this -> db -> where('isdelete', '1') -> count_all_results($this -> table);

        return $this -> load -> view($this -> controller . '/recycleBin', ['list' => $list, 'page' => $result['page'], 'count' => $count]);

    }

    //方法列表
    public function methodList(){

        $pid = $_GET['pid'];

        $this -> load -> database();

        $list = $this -> db -> where('pid', $pid) -> where('isdelete', '0') -> get($this -> table) -> result_array();

        $count = $this -> db -> where('pid', $pid) -> where('isdelete', '0') -> count_all_results($this -> table);

        return $this -> load -> view($this -> controller . '/methodList', ['list' => $list, 'count' => $count, 'pid' => $pid]);

    }

    //添加方法
    public function addMethod(){

        $this -> load -> database();

        if (IS_POST){

            $data = $_POST;

            $pid = $data['pid'];

            $this -> field = ['title','name','sort'];

            $this -> returnMsg = ['节点标题','节点名称','排序序号'];

            //验证参数
            $result = verify_request_field($data, $this -> field, $this -> returnMsg);

            if (!$result['status']){
                return ajax_return_json($this,$result['msg'],1);
            }

            $parent = $this -> db -> select('group_id') -> where('id', $pid) -> get($this -> table) -> row_array();

            if (empty($parent)){
                return ajax_return_json_error($this, '添加失败');
            }

            //添加写入字段
            $this -> load -> helper('model');
            $data = add_field($data);
            $data['group_id'] = $parent['group_id'];
            $data['type']  = '1';
            $data['level'] = 2;
            $data['create_time'] = $data['update_time'] = time();

            $result = $this -> db -> insert($this -> table, $data);

            if ($result){
                return ajax_return_json($this,'添加成功', 1, [], false, false, false, true);
            }

            return ajax_return_json_error($this, '添加失败');

        }else{

            $pid = $_GET['pid'];

            $list = $this -> db -> select('id,title') -> where('isdelete', '0') -> get($this -> table) -> result_array();

            return $this -> load -> view($this -> controller . '/addMethod', ['controllers' => $list, 'pid' => $pid]);

        }

    }

    //编辑方法
    public function editMethod(){

        $this -> load -> database();

        if (IS_POST){

            $data = $_POST;

            $id = $data['id'];
            unset($data['id']);

            $result = $this -> db -> where('id', $id) -> update($this -> table, $data);

            if ($result){
                return ajax_return_json($this, '保存成功', 1, [], false, false, false, true);
            }

            return ajax_return_json_error($this, '保存失败');

        }else{

            $id = $_GET['id'];

            $info = $this -> db -> where('id', $id) -> get($this -> table) -> row_array();

            return $this -> load -> view($this -> controller . '/editMethod', ['info' => $info]);

        }

    }

    //查看方法
    public function showMethod(){

        $id = $_GET['id'];

        $this -> load -> database();

        $info = $this -> db -> where('id', $id) -> get($this -> table) -> row_array();

        return $this -> load -> view($this -> controller . '/showMethod', ['info' => $info]);

    }

    //方法回收站
    public function methodRecycle(){

        $pid = $_GET['pid'];

        $this -> load -> database();

        $list = $this -> db -> where('pid', $pid) -> where('isdelete', '1') -> get($this -> table) -> result_array();

        $count = $this -> db -> where('pid', $pid) -> where('isdelete', '1') -> count_all_results($this -> table);

        return $this -> load -> view($this -> controller . '/methodRecycle', ['list' => $list, 'count' => $count, 'pid' => $pid]);

    }

}