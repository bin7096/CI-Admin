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
        <table class="layui-table">
            <thead>
                <tr>
                    <th>标题：</th>
                    <th colspan="2">信息</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>节点标题：</td>
                <td colspan="2">
                    <input type="text" name="title" placeholder="请输入节点标题" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>控制器名称：</td>
                <td colspan="2">
                    <input type="text" name="name" placeholder="请输入控制器名称(默认application模块，指定模块请填'模块名/控制器名')" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>继承控制器：</td>
                <td colspan="2">
                    <input type="text" name="extend_name" placeholder="请输入继承控制器名称(输入根目录下的完整路径，如：application/libraries/Curd)" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>所属分组：</td>
                <td colspan="2">
                    <select name="group_id" lay-verify="required" lay-filter="type">
                        <option value="">请选择分组</option>
                        <?php foreach ($groups as $k => $v): ?>
                        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th rowspan="<?php echo $funcs_count+2; ?>" id="addCustom">关联方法(点击添加自定义方法)：</th>
                <th>
                    方法名称
                </th>
                <th>
                    是否继承
                </th>
            </tr>
            <?php foreach ($funcs as $v): ?>
            <tr>
                <td>
                    <input type="checkbox" name="func[<?php echo $v; ?>]" title="阅读" checked>
                </td>
                <td>
                    <input type="radio" name="<?php echo $v; ?>" value="true" title="是" checked>
                    <input type="radio" name="<?php echo $v; ?>" value="false" title="否">
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td>
                    <input type="text" name="custom[]" class="layui-input" />
                </td>
                <td>
                    <input type="radio" name="custom_value[]" value="true" title="是" checked>
                    <input type="radio" name="custom_value[]" value="false" title="否">
                </td>
            </tr>
            <tr id="beforeTr">
                <td>排序序号：</td>
                <td colspan="2">
                    <input type="text" name="sort" placeholder="请输入排序序号" autocomplete="off" class="layui-input" value="">
                </td>
            </tr>
            <tr>
                <td>启用状态：</td>
                <td colspan="2">
                    <input type="radio" name="status" value="1" title="启用" checked>
                    <input type="radio" name="status" value="0" title="禁用">
                </td>
            </tr>
            <tr>
                <td>备注：</td>
                <td colspan="2">
                    <textarea name="remark" placeholder="请输入备注" class="layui-textarea"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button class="layui-btn" lay-submit lay-filter="add">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script>
    var num = 1;
    <?php $this -> load -> helper('url'); ?>
    layui.use(['form','layer'], function(){
        form = layui.form;
        layer = layui.layer;

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

    $('#addCustom').click(function () {
        var funcs_count = $(this).attr('rowspan');
        funcs_count = parseInt(funcs_count)+1;
        var html = '<tr>\n' +
            '                <td>\n' +
            '                    <input type="text" name="custom[]" class="layui-input" />\n' +
            '                </td>\n' +
            '                <td>\n' +
            '                    <input type="radio" name="custom_value'+num+'" value="true" title="是" checked>\n' +
            '                    <input type="radio" name="custom_value'+num+'" value="false" title="否">\n' +
            '                </td>\n' +
            '            </tr>';
        $(this).attr('rowspan',funcs_count);
        $('#beforeTr').before(html);
        form.render();
        num++;
    })
</script>
</body>

</html>