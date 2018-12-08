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
        <?php echo btn_list($this, ['add', 'sort', 'forbidden', 'recover', 'delAll', 'recycleBin'], $count); ?>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th class="list-center">
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th class="list-center">ID</th>
            <th class="list-center">角色名称</th>
            <th class="list-center">序号</th>
            <th class="list-center">状态</th>
            <th class="list-center">用户列表</th>
            <th class="list-center">授权列表</th>
            <th class="list-center">创建时间</th>
            <th class="list-center">更新时间</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php foreach ($list as $item): ?>
            <tr>
                <td class="list-center">
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $item['id'] ?>'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td class="list-center"><?php echo $item['id'] ?></td>
                <td class="list-center"><?php echo $item['name'] ?></td>
                <td class="list-center"><input type="text" name="sort" id="<?php echo $item['id'] ?>" class="layui-input input-xs" value="<?php echo $item['sort'] ?>"></td>
                <td class="list-center">
                    <?php echo td_btn($this, $item['id'], ['status'], true, $item['status']); ?>
                </td>
                <td class="list-center">
                    <button class="layui-btn layui-btn-xs layui-bg-green" title="查看用户列表" onclick="x_admin_show('用户列表', '/AdminRole/users?id=<?php echo $item['id']; ?>')">查看</button>
                </td>
                <td class="list-center">
                    <button class="layui-btn layui-btn-xs layui-bg-red" title="查看授权列表" onclick="x_admin_show('授权列表', '/AdminRole/nodes?id=<?php echo $item['id']; ?>')">查看</button>
                </td>
                <td class="list-center"><?php echo date('Y-m-d H:i:s', $item['create_time']) ?></td>
                <td class="list-center"><?php echo date('Y-m-d H:i:s', $item['update_time']) ?></td>
                <td class="td-manage">
                    <?php echo td_btn($this, $item['id'], ['edit', 'show', 'delete'], true); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php echo $page; ?>
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