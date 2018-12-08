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
        <?php echo btn_list($this, ['recycle', 'delforever', 'index'], $count, '', ['index' => 'methodList'], [], false, $pid); ?>
    </xblock>
        <table class="layui-table">
            <thead>
            <tr>
                <th class="list-center">
                    <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
                </th>
                <th class="list-center">ID</th>
                <th class="list-center">节点标题</th>
                <th class="list-center">节点名称</th>
                <th class="list-center">类型</th>
                <th class="list-center">层级</th>
                <th class="list-center">序号</th>
                <th class="list-center">状态</th>
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
                    <td class="list-center"><?php echo $item['title'] ?></td>
                    <td class="list-center"><?php echo $item['name'] ?></td>
                    <td class="list-center">
                        <?php if ($item['type'] === '1'): ?>
                            方法
                        <?php else: ?>
                            控制器
                        <?php endif; ?>
                    </td>
                    <td class="list-center"><?php echo $item['level'] ?></td>
                    <td class="list-center"><input type="text" name="sort" id="<?php echo $item['id'] ?>" class="layui-input input-xs" value="<?php echo $item['sort'] ?>"></td>
                    <td class="list-center">
                        <?php echo td_btn($this, $item['id'], ['status'], true, $item['status']); ?>
                    </td>
                    <td class="list-center"><?php echo date('Y-m-d H:i:s', $item['create_time']) ?></td>
                    <td class="list-center"><?php echo date('Y-m-d H:i:s', $item['update_time']) ?></td>
                    <td class="td-manage">
                        <?php echo td_btn($this, $item['id'], ['edit', 'show'], true, false, '', ['edit' => 'editMethod', 'show' => 'showMethod'], [], false); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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