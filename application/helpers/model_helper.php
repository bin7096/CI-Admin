<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/5
 * Time: 14:31
 */

if ( !function_exists('add_field') ){
    function add_field($data, $isUpdate = false, $isdelete = false){

        //添加isdelete
        if (!isset($data['isdelete'])){

            $data['isdelete'] = '0';

        }

        $time = time();

        //添加create_time和update_time
        if ($isUpdate){

            $data['update_time'] = $time;

        }else{

            $data['create_time'] = isset($data['create_time']) ? $data['create_time'] : $time;
            $data['update_time'] = isset($data['update_time']) ? $data['update_time'] : $data['create_time'];

        }

        if ($isdelete){

            $data['delete_time'] = $time;

        }

        return $data;

    }
}