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
            width:100%;!important;
        }
        .func_head td{
            background:#FF5722;
            border:1px solid #FF5722;
            border-right:1px solid #FFFFFF;
            color:#FFFFFF;
        }
        .func_body td{
            border:1px solid #FF5722;
            color:#FF5722;
        }
        .title_font{
            color:#FF5722;
            font-family:微软雅黑;
            font-size:1.5rem;
            /*font-weight:bold;*/
        }
        .add_func{
            text-align:center;
            font-size:3rem;
        }
        .add_func:hover{
            background:#1E9FFF;
            border:1px solid #1E9FFF;
        }
        .other_func td{
            background:#FF5722;
            border:1px solid #FF5722;
            border-right:1px solid #FFFFFF;
            color:#FFFFFF;
        }
    </style>
</head>

<body>
<div class="x-body">
    <p class="title_font">* 如需关联数据表请先创建数据表</p>
    <hr class="layui-bg-red">
    <form class="layui-form" action="javascript:;" id="form">
        <table class="layui-table">
            <thead>
                <tr>
                    <th>标题：</th>
                    <th>信息</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>节点标题：</td>
                <td>
                    <input type="text" name="title" placeholder="请输入节点标题" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>控制器名称：</td>
                <td>
                    <input type="text" name="name" placeholder="请输入控制器名称(默认application模块，指定模块请填'模块名/控制器名')" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>继承控制器：</td>
                <td>
                    <input type="text" name="extend_src" placeholder="请输入继承控制器名称(输入根目录下的完整路径，如：application/libraries/Curd)" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>数据表：</td>
                <td>
                    <input type="text" name="database_table" placeholder="请输入数据表名称(省略前缀，如admin_node)" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>所属分组：</td>
                <td>
                    <select name="group_id" lay-verify="required" lay-filter="type">
                        <option value="">请选择分组</option>
                        <?php foreach ($groups as $k => $v): ?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr id="beforeTr">
                <td>排序序号：</td>
                <td>
                    <input type="text" name="sort" placeholder="请输入排序序号" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>启用状态：</td>
                <td>
                    <input type="radio" name="status" value="1" title="启用" checked>
                    <input type="radio" name="status" value="0" title="禁用">
                </td>
            </tr>
            <tr>
                <td>备注：</td>
                <td>
                    <textarea name="remark" placeholder="请输入备注" class="layui-textarea"></textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <div style="overflow-x:auto;height:250px;">
            <table class="layui-table" style="width:<?php echo $funcs_count*200+120; ?>px;">
                <tr class="func_head" id="func_head">
                    <td style="width:120px;">关联方法</td>
                    <?php foreach ($funcs as $v): ?>
                        <td style="width:200px;">
                            <?php echo $v['title'].'('.$v['name'].')'; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <tr class="func_body" id="func_body">
                    <td>是否继承</td>
                    <?php $i = 0; ?>
                    <?php foreach ($funcs as $v): ?>
                        <td>
                            <select name="" id="<?php echo $i; ?>" lay-verify="required">
                                <option value="0">不关联</option>
                                <option value="1">继承</option>
                                <option value="2">不继承</option>
                            </select>
                            <?php $i++; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
        <button class="layui-btn" lay-submit lay-filter="add">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </form>
</div>
<script>
    var num = 1;
    var func_id = new Array();
    <?php foreach ($funcs as $v): ?>
        func_id.push("<?php echo $v['id']; ?>");
    <?php endforeach; ?>
    var func_check = new Array();
    for(var i = 0; i < <?php echo $funcs_count; ?>; i++){
        func_check.push("0");
    }
    console.log(func_id);
    console.log(func_check);

    <?php $this -> load -> helper('url'); ?>
    layui.use(['form','layer'], function(){
        form = layui.form;
        layer = layui.layer;

        form.on('select', function(data){
            var dom_id=data.elem.getAttribute('id');
            var val=data.value;
            func_check[dom_id] = val;
            console.log(func_check);
        });

        //监听提交
        form.on('submit(add)', function(data){
            var arr = data.field;
            $.ajax({
                type: "POST",
                url : "<?php echo current_url(); ?>",
                data: {title:arr.title,name:arr.name,extend_src:arr.extend_src,database_table:arr.database_table,group_id:arr.group_id,sort:arr.sort,status:arr.status,remark:arr.remark,func_id:func_id,func_check:func_check},
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