<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/1
 * Time: 11:27
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ajax成功返回（json）
 * @param object  $obj
 * @param string  $msg           提示信息
 * @param int     $code          错误码
 * @param array   $data          返回数据
 * @param boolean $close         是否关闭当前弹窗
 * @param boolean $reload        是否刷新当前页面
 * @param boolean $reloadParent  是否刷新父页面
 * @param boolean $return       是否返回前一页
*/
if ( !function_exists('ajax_return_json') ){

    function ajax_return_json($obj, $msg = '操作成功', $code = 1, $data = [], $close = false, $reload = false, $reloadParent = false, $return = false){

        $jsonData = json_encode(['msg' => $msg, 'code' => $code, 'data' => $data, 'close' => $close, 'reload' => $reload, 'reloadParent' => $reloadParent, 'return' => $return]);

        return $obj -> output -> set_content_type('application/json') -> set_output($jsonData);

    }

}

/**
 * ajax错误返回（json）
 * @param object  $obj
 * @param string  $msg           提示信息
 * @param int     $code          错误码
 *
*/
if ( !function_exists('ajax_return_json_error') ){

    function ajax_return_json_error($obj, $msg = '操作失败', $code = 0){

        return ajax_return_json($obj, $msg, $code);

    }

}