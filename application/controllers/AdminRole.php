<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/9
 * Time: 9:51
 */
defined('BASEPATH') OR exit('No direct script access allowed');

include_once './application/libraries/Curd.php';
class AdminRole extends Curd
{

    public function __construct(){
        parent::__construct();
    }

    protected $controller = 'admin_role';

    protected $table = 'admin_role';

    protected $limit = 10;

    protected $field = ['name','sort'];

    protected $returnMsg = ['角色名称','排序序号'];

    //查看用户列表
    public function users(){

        if (IS_POST){

            $uids = explode(',', $_POST['data']);

            $id = $_POST['id'];

            $data = [];
            foreach ($uids as $v){

                $data[] = array(
                    'role_id' => $id,
                    'user_id' => $v
                );

            }

            //开启事务
            $this -> db -> trans_start();
            //删除角色下所有用户关联
            $this -> db -> where('role_id', $id) -> delete('admin_role_user');
            //写入角色用户关联
            $this -> db -> insert_batch('admin_role_user', $data);
            //事务结束
            $this -> db -> trans_complete();

            if ($this -> db -> trans_status()){
                return ajax_return_json($this, '保存成功', 1, [], true, false, true);
            }
            return ajax_return_json_error($this, '保存失败');

        }else{

            $id = $_GET['id'];

            $all_user = $this -> db -> select('id,account,realname') -> where('status', '1') -> where('isdelete', '0') -> get('admin_user') -> result_array();

            $count = $this -> db -> count_all('admin_user');

            $uids = $this -> db -> select('user_id') -> where('role_id', $id) -> get('admin_role_user') -> result_array();

            $uids = array_column($uids, 'user_id');

            return $this -> load -> view($this -> controller . '/users', ['all_user' => $all_user, 'uids' => $uids, 'count' => $count, 'id' => $id]);

        }

    }

    //查看授权列表
    public function nodes(){

        if (IS_POST){

            $data = explode(',', $_POST['data']);

            $id = $_POST['id'];

            $insert = array();
            foreach ($data as $v){

                $insert[] = array('role_id' => $id, 'node_id' => $v);

            }

            $this -> db -> where('role_id', $id) -> delete('admin_access');

            $result = $this -> db -> insert_batch('admin_access', $insert);

            if ($result){
                return ajax_return_json($this, '保存成功', 1, [], true, false, true);
            }
            return ajax_return_json_error($this, '保存失败');

        }else{
            $id = $_GET['id'];

            //查询控制器条件
            $where = array(
                'isdelete' => '0',
                'status'   => '1',
                'type'     => '0'
            );

            //查询所有未删除且未禁用的控制器
            $controls = $this -> db -> select('id,title,name') -> where($where) -> get('admin_node') -> result_array();

            //查询方法条件
            $where['type'] = '1';

            $list = array();
            $count = 0;
            foreach ($controls as $k => $v){

                //查询所有未删除且未禁用的方法
                $childs = $this -> db -> select('id,title,name') -> where($where) -> where('pid', $v['id']) -> get('admin_node') -> result_array();
                if (empty($childs)){
                    continue;
                }

                //统计条数
                $count += count($childs);

                $list[] = array(
                    'id'    => $v['id'],
                    'title' => $v['title'],
                    'name'  => $v['name'],
                    'childs'=> $childs
                );
            }

            //已绑定节点
            $access_ids = $this -> db -> select('node_id') -> get('admin_access') -> result_array();
            if (!empty($access_ids)){
                $access_ids = array_column($access_ids, 'node_id');
            }

            return $this -> load -> view($this -> controller . '/nodes', ['list' => $list, 'count' => $count, 'id' => $id, 'access_ids' => $access_ids]);

        }

    }

}