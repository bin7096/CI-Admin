<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/1
 * Time: 14:28
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 验证请求参数
 * @param array $data       请求参数
 * @param array $field      验证字段
 * @param array $returnMsg  对应返回信息
*/

if ( !function_exists('verify_request_field')){

    function verify_request_field($data, $field, $returnMsg){

        if (count($data) < count($field)){

            return ['status' => false, 'msg' => '长度有误'];

        }

        foreach ($field as $k => $v){

            if (!isset($data[$v]) || empty($data[$v]) && $data[$v] !== 0){

                return ['status' => false, 'msg' => $returnMsg[$k].'不能为空'];

            }

        }

        return ['status' => true];

    }

}

/**
 * 正则验证邮箱、手机号码
 * @param array $data   验证数据
 * @param array $field  验证字段  ['email' => 'field1', 'mobile' => 'field2']
*/
if ( !function_exists('regMatch') ){

    function regMatch($data = [], $field = []){

        $errorMsg = array(
            'email'  => ['邮箱地址格式有误', "/^[a-z0-9A-Z]+[- | a-z0-9A-Z . _]+@([a-z0-9A-Z]+(-[a-z0-9A-Z]+)?\\.)+[a-z]{2,}$/"],
            'mobile' => ['手机号码格式有误', "/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/"]
        );

        if (empty($field)){

            $field = array(
                'email'  => 'email',
                'mobile' => 'mobile'
            );

        }

        foreach ($field as $k => $v){

            if ( !preg_match($errorMsg[$k][1], $data[$k]) ){

                return ['status' => false, 'msg' =>$errorMsg[$k][0]];

            }

        }

        return ['status' => true];

    }

}