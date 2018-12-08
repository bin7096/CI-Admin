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
    <link rel="stylesheet" href="css/xadmin2.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/xadmin.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/curd.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="x-nav">
    <?php echo navigate(); ?>
</div>
<div class="x-body">
    <xblock>
        <button class="layui-btn layui-bg-blue" onclick="saveList('/AdminRole/nodes', <?php echo $id; ?>)"><i class="layui-icon">&#xe605;</i>保存</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $count; ?> 条</span>
    </xblock>
    <?php foreach ($list as $item): ?>
    <table class="layui-table">
        <thead>
        <tr>
            <th class="list-center" style="width:26%;">
                <div class="layui-unselect header layui-form-checkbox custom custom<?php echo $item['id']; ?>" id="<?php echo $item['id']; ?>" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th class="list-center" colspan="2"><?php echo $item['title'] . '(' . $item['name'] . ')';?></th>
        </thead>
        <tbody>
            <?php foreach ($item['childs'] as $v): ?>
                <tr>
                    <td class="list-center">
                        <div class="layui-unselect layui-form-checkbox custom<?php echo $item['id']; ?> <?php echo in_array($v['id'], $access_ids) ? 'layui-form-checked' : ''; ?>" lay-skin="primary" data-id='<?php echo $v['id'] ?>'><i class="layui-icon">&#xe605;</i></div>
                    </td>
                    <td class="list-center" style="width:37%;"><?php echo $v['title']; ?></td>
                    <td class="list-center" style="width:37%;"><?php echo $v['name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endforeach; ?>
</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });
</script>
</body>

</html>