<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <base href="<?=base_url()?>views/admin_group" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/xadmin.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .layui-input,.layui-textarea{
            width:90%;
        }
    </style>
</head>

<body>
<div class="x-body">
    <form class="layui-form" action="javascript:;" id="form">
        <div class="layui-form-item">
            <label class="layui-form-label">登录账户：</label>
            <div class="layui-input-block">
                <input type="text" name="account" placeholder="请输入登录账户" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名称：</label>
            <div class="layui-input-block">
                <input type="text" name="realname" placeholder="请输入用户名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登录密码：</label>
            <div class="layui-input-block">
                <input type="password" name="password" placeholder="请输入登录密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码：</label>
            <div class="layui-input-block">
                <input type="password" name="confirmPw" placeholder="请输入确认密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱账号：</label>
            <div class="layui-input-block">
                <input type="text" name="email" placeholder="请输入邮箱账号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号码：</label>
            <div class="layui-input-block">
                <input type="text" name="mobile" placeholder="请输入手机号码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">序号：</label>
            <div class="layui-input-block">
                <input type="text" name="sort" placeholder="请输入排序序号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态：</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="启用" checked>
                <input type="radio" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注：</label>
            <div class="layui-input-block">
                <textarea name="remark" placeholder="请输入备注" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="add">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>
<script>
    <?php $this -> load -> helper('url'); ?>
    layui.use(['form','layer'], function(){
        var form = layui.form;
        var layer = layui.layer;

        //监听提交
        form.on('submit(add)', function(data){
            var arr = data.field;
            $.ajax({
                type: "POST",
                url : "<?php echo current_url(); ?>",
                data: {account:arr.account,realname:arr.realname,password:arr.password,confirmPw:arr.confirmPw,email:arr.email,mobile:arr.mobile,sort:arr.sort,status:arr.status,remark:arr.remark},
                dataType: "json",
                success: function(msg){
                    response_query(msg);
                },
                error: function (msg) {
                    layer.msg('表单提交失败');
                }
            });
        });

    });
</script>
</body>

</html>