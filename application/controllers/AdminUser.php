<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/9
 * Time: 11:13
 */
defined('BASEPATH') OR exit('No direct script access allowed');

include_once './application/libraries/Curd.php';
class AdminUser extends Curd
{
    public function __construct(){
        parent::__construct();
    }

    protected $controller = 'admin_user';

    protected $table = 'admin_user';

    protected $limit = 10;

    protected $field = ['account','realname','password','email','mobile','sort'];

    protected $returnMsg = ['登录账户','用户名称','密码','邮箱地址','手机号码','序号'];

    //添加用户
    public function add(){

        if (IS_POST){

            $data = $_POST;

            if ($data['password'] !== $data['confirmPw']){
                return ajax_return_json_error($this, '确认密码不一致，请重新输入');
            }
            unset($data['confirmPw']);

            //验证参数
            $result = verify_request_field($data, $this -> field, $this -> returnMsg);

            if (!$result['status']){
                return ajax_return_json($this,$result['msg'],1);
            }

            $data['password'] = md5($data['password']);

            //验证邮箱、手机号码格式
            $res = regMatch($data);
            if (!$res['status']){
                return ajax_return_json_error($this, $res['msg']);
            }

            //验证登录账户、邮箱地址、手机号码是否已注册
            if ($this -> db -> where('account', $data['account']) -> count_all_results($this -> table) != 0){
                return ajax_return_json_error($this, '登录账户已被注册');
            }elseif ($this -> db -> where('email', $data['email']) -> count_all_results($this -> table) != 0){
                return ajax_return_json_error($this, '邮箱地址已被使用');
            }elseif ($this -> db -> where('mobile', $data['mobile']) -> count_all_results($this -> table) != 0){
                return ajax_return_json_error($this, '手机号码已被使用');
            }

            //添加写入字段
            $this -> load -> helper('model');
            $data = add_field($data);

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

        if (IS_POST){

            $data = $_POST;

            $id = $data['id'];
            unset($data['id']);

            if ($data['password'] !== $data['confirmPw']){
                return ajax_return_json_error($this, '确认密码不一致，请重新输入');
            }
            unset($data['confirmPw']);

            //验证参数
            $result = verify_request_field($data, $this -> field, $this -> returnMsg);

            if (!$result['status']){
                return ajax_return_json($this,$result['msg'],1);
            }

            $data['password'] = md5($data['password']);

            //验证邮箱、手机号码格式
            $res = regMatch($data);
            if (!$res['status']){
                return ajax_return_json_error($this, $res['msg']);
            }

            //验证登录账户、邮箱地址、手机号码是否已注册
            if ($this -> db -> where('id', $id) -> where('account', $data['account']) -> count_all_results($this -> table) > 1){
                return ajax_return_json_error($this, '登录账户已被注册');
            }elseif ($this -> db -> where('id', $id) -> where('email', $data['email']) -> count_all_results($this -> table) > 1){
                return ajax_return_json_error($this, '邮箱地址已被使用');
            }elseif ($this -> db -> where('id', $id) -> where('mobile', $data['mobile']) -> count_all_results($this -> table) > 1){
                return ajax_return_json_error($this, '手机号码已被使用');
            }

            $result = $this -> db -> where('id', $id) -> update($this -> table, $data);

            if ($result){
                return ajax_return_json($this,'保存成功', 1, [], true, false, true);
            }

            return ajax_return_json_error($this, '保存失败');

        }else{

            $id = $_GET['id'];

            $info = $this -> db -> where('id', $id) -> get($this -> table) -> row_array();

            return $this -> load -> view($this -> controller . '/edit', $info);

        }

    }

}