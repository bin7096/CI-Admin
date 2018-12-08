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
            width:90%;!important;
        }
    </style>
</head>

<body>
<div class="x-body">
    <form class="layui-form" action="javascript:;" id="form">
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">节点标题：</label>
            <div class="layui-input-block">
                <input type="text" name="title" readonly class="layui-input" value="<?php echo $info['title'] ;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">节点名称：</label>
            <div class="layui-input-block">
                <input type="text" name="name" readonly class="layui-input" value="<?php echo $info['name'] ;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所属分组：</label>
            <div class="layui-input-block">
                <select readonly name="group_id" lay-verify="required" lay-filter="type">
                    <option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序序号：</label>
            <div class="layui-input-block">
                <input type="text" name="sort" readonly class="layui-input" value="<?php echo $info['sort'] ;?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">启用状态：</label>
            <div class="layui-input-block">
                <?php if ($info['status'] === '1'): ?>
                    <input type="text" class="layui-input" name="status" readonly value="已启用">
                <?php else: ?>
                    <input type="text" class="layui-input" name="status" readonly value="已禁用">
                <?php endif; ?>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注：</label>
            <div class="layui-input-block">
                <textarea name="remark" readonly class="layui-textarea"><?php echo $info['remark']; ?></textarea>
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
                data: {id:arr.id,title:arr.title,name:arr.name,group_id:arr.group_id,sort:arr.sort,status:arr.status,remark:arr.remark},
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