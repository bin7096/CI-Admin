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
            <label class="layui-form-label">分组ID：</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" value="<?php echo $id ?>" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分组名称：</label>
            <div class="layui-input-block">
                <input type="text" name="name" class="layui-input" value="<?php echo $name ?>" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">分组图标：</label>
            <div class="layui-input-block">
                <input type="text" name="icon" class="layui-input" value="<?php echo htmlspecialchars($icon) ?>" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">序号：</label>
            <div class="layui-input-block">
                <input type="text" name="sort" class="layui-input" value="<?php echo $sort ?>" readonly>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态：</label>
            <div class="layui-input-block">
                <?php if ($status === '1'): ?>
                    <input type="text" name="status" class="layui-input" value="已启用" readonly>
                <?php else: ?>
                    <input type="text" name="status" class="layui-input" value="已禁用" readonly>
                <?php endif; ?>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注：</label>
            <div class="layui-input-block">
                <textarea name="remark" class="layui-textarea" readonly ><?php echo $remark ?></textarea>
            </div>
        </div>
    </form>
</div>
<script>
    <?php $this -> load -> helper('url'); ?>
</script>
</body>

</html>