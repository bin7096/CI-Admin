<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/5
 * Time: 16:17
 */

class Curd extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this -> load -> helper('url');
        $this -> load -> database();
    }

    public function index(){

        $data = $_GET;

        $this -> db -> select();

        $this -> db -> where(['isdelete' => '0']);

        $this -> db -> order_by('sort','asc');

        if (isset($data['name'])){

            $this -> db -> where(['name' => $data['name']]);

            $param = "&name=" . $data['name'];

        }else{

            $param = '';

        }

        $data['p'] = isset($data['p']) ? $data['p'] : 1;

        $this -> load -> helper('list');
        $result = paginate($this, $this -> table, $this -> limit, $data['p'], true, $param);

        return $this -> load -> view($this -> controller . '/list', $result);

    }

    //添加
    public function add(){

        $this -> load -> helper('response');

        if (IS_POST){

            $data = $_POST;

            //验证参数
            $result = verify_request_field($data, $this->field, $this->returnMsg);

            if (!$result['status']){
                return ajax_return_json($this,$result['msg'],1);
            }

            //添加写入字段
            $this -> load -> helper('model');
            $data = add_field($data);

            //写入数据

            $result = $this -> db -> insert($this -> table, $data);

            if ($result){
                return ajax_return_json($this,'添加成功', 1, [], true, false, true);
            }

            return ajax_return_json_error($this, '添加失败');

        }else{

            return $this -> load -> view($this -> controller . '/add');

        }

    }

    //编辑
    public function edit(){

        $this -> load -> helper('response');

        if (IS_POST){

            $data = $_POST;

            $id = $data['id'];
            unset($data['id']);

            $this -> db -> where('id', $id);

            $result = $this -> db -> update($this -> table, $data);

            if ($result){
                return ajax_return_json($this, '保存成功', 1, [], true, false, true);
            }

            return ajax_return_json_error($this, '保存失败');

        }else{

            $id = $_GET['id'];

            $this -> db -> where('id', $id);

            $info = $this -> db -> get($this -> table) -> row_array();

            $this -> load -> view($this -> controller . '/edit', $info);

        }

    }

    //查看
    public function show(){

        $id = $_GET['id'];

        $result = $this -> db -> where('id', $id) -> get($this -> table) -> row_array();

        return $this -> load -> view($this -> controller . '/show', $result);

    }

    //保存排序
    public function sort(){

        if (empty($_POST['data']) || empty($_POST['ids'])){
            return ajax_return_json_error($this, '保存失败');
        }

        $data = explode(',', $_POST['data']);
        $ids  = explode(',', $_POST['ids']);

        $arr = [];
        foreach ($ids as $k => $v){
            $arr[] = array(
                'id'   => $v,
                'sort' => $data[$k]
            );
        }

        $result = $this -> db -> update_batch($this -> table, $arr, 'id');

        if ($result || $result === 0){
            return ajax_return_json($this, '保存成功', 1, [], false, true, false);
        }

        return ajax_return_json_error($this, '保存失败');

    }

    //禁用
    public function forbidden(){

        if (empty($_POST['data'])){
            return ajax_return_json_error($this,'请勾选禁用目标');
        }

        $data = explode(',',$_POST['data']);

        $this -> db -> where_in('id', $data);

        $result = $this -> db -> update($this -> table, ['status' => 0]);

        if ($result){
            return ajax_return_json($this, '禁用成功', 1, [], false, true, false);
        }

        return ajax_return_json_error($this, '禁用失败');

    }

    //启用
    public function recover(){

        if (empty($_POST['data'])){
            return ajax_return_json_error($this,'请勾选启用目标');
        }

        $data = explode(',',$_POST['data']);

        $this -> db -> where_in('id', $data);

        $result = $this -> db -> update($this -> table, ['status' => '1']);

        if ($result){
            return ajax_return_json($this, '启用成功', 1, [], false, true, false);
        }

        return ajax_return_json_error($this, '启用失败');

    }

    //修改状态
    public function status(){

        $id = $_POST['data'];

        $query = $this -> db -> where('id', $id);

        $query2 = clone($query);

        $result = $query -> get($this -> table) -> row_array();

        if ($result['status'] === '1'){
            $status = '0';
            $str = '禁用';
        }else{
            $status = '1';
            $str = '启用';
        }

        $bool = $query2 -> update($this -> table, ['status' => $status]);

        if ($bool){
            return ajax_return_json($this, $str . '成功', 1, [], false, true);
        }

        return ajax_return_json_error($this, $str . '失败');

    }

    //删除
    public function del(){

        if (empty($_POST['data'])){
            return ajax_return_json_error($this,'请勾选删除目标');
        }

        $data = explode(',',$_POST['data']);

        $this -> db -> where_in('id', $data);

        $result = $this -> db -> update($this -> table, ['isdelete' => '1']);

        if ($result){
            return ajax_return_json($this, '删除成功', 1, [], false, true, false);
        }

        return ajax_return_json_error($this, '删除失败');

    }

    //回收站
    public function recycleBin(){

        $data = $_GET;

        $this -> db -> select();

        $this -> db -> where(['isdelete' => '1']);

        $data['p'] = isset($data['p']) ? $data['p'] : 1;

        $this -> load -> helper('list');
        $result = paginate($this, $this -> table, $this -> limit, $data['p'], true);

        return $this -> load -> view($this -> controller . '/recycleBin', $result);

    }

    //恢复
    public function recycle(){

        if (empty($_POST['data'])){
            return ajax_return_json_error($this,'请勾选回收目标');
        }

        $data = explode(',',$_POST['data']);

        $this -> db -> where_in('id', $data);

        $result = $this -> db -> update($this -> table, ['isdelete' => '0']);

        if ($result){
            return ajax_return_json($this, '回收成功', 1, [], false, true, false);
        }

        return ajax_return_json_error($this, '回收失败');

    }

    //彻底删除
    public function delForever(){

        if (empty($_POST['data'])){
            return ajax_return_json_error($this,'请勾选彻底删除目标，此操作无法恢复！');
        }

        $data = explode(',',$_POST['data']);

        $this -> db -> where_in('id', $data);

        $result = $this -> db -> delete($this -> table);

        if ($result){
            return ajax_return_json($this, '彻底删除成功', 1, [], false, true, false);
        }

        return ajax_return_json_error($this, '彻底删除失败');

    }

}