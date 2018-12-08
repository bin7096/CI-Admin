<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /Index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

	    $this -> load -> helper('url');

	    //session验证登录用户
	    $this -> load -> library('session');

	    $login_info = $this -> session -> userdata();

        if (isset($login_info['realname'])){

            $this -> load -> database();
            //查询开启的分组
            $groups = $this -> db -> select('id,name,icon') -> where('isdelete', '0') -> where('status', '1') -> get('admin_group') -> result_array();

            //定义节点列表
            $list = array();

            $this -> load -> library('session');
            //当前用户可以访问的主页节点的pid(即控制器ID)
            $pid = $this -> db -> select('admin_node.pid') -> from('admin_node')
                            -> join('admin_access', 'admin_access.node_id=admin_node.id')
                            -> join('admin_role_user', 'admin_role_user.role_id=admin_access.role_id')
                            -> where('admin_role_user.user_id', $this->session->user_id)
                            -> where('admin_node.name', 'index')
                            -> get()
                            -> result_array();
            $pid = array_column($pid ,'pid');

            //查询条件
            $where = array(
                'isdelete' => '0',
                'status'   => '1',
                'type'     => '0',
            );

            foreach ($groups as $v){

                $where['group_id'] = $v['id'];

                //查询开启的控制器列表
                $childs = $this -> db -> select('id,name,title') -> where($where) -> where_in('id', $pid) -> get('admin_node') -> result_array();

                if (empty($childs)){
                    continue;
                }

                $list[] = array(
                    'id'     => $v['id'],
                    'name'   => $v['name'],
                    'icon'   => $v['icon'],
                    'childs' => $childs
                );

            }

            return $this -> load -> view('welcome/index', ['list' => $list]);

        }else{

            //不存在跳转到登录页
            $this -> load -> helper('url');

            redirect('/pub/login');

        }

	}

	public function welcome2(){

	    $this -> load -> helper('url');

	    return $this -> load -> view('welcome');

    }

}
