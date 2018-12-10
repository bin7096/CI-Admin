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
        .title_font{
            color:#FF5722;
            font-family:微软雅黑;
            font-size:1.5rem;
        }
        .list-table{
            width:100%;
        }
        .title_th{
            width:15%;
        }
        .type_th{
            width:18%;
        }
        .data_th{
            width:15%;
        }
        .other_th{
            width:37%;
        }
        .mother_th{
            width:15%;
        }
        .add_line{
            text-align: center;
            background: #5FB878;
            color: #FFFFFF;
        }
        .select_td{
            color: #5FB878;
        }
    </style>
</head>

<body>
<div class="x-body">
    <p class="title_font">* 此功能为测试功能，请谨慎使用！</p>
    <hr class="layui-bg-red">
    <form class="layui-form" action="javascript:;" id="form">
        <table class="layui-table list-table">
            <thead>
                <tr>
                    <th>所属控制器</th>
                    <th>统计数字变量名称</th>
                    <th>是否生成回收站页面</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="control" id="0">
                            <?php foreach ($controls as $v): ?>
                                <?php echo '<option value="' . $v['id'] . '">' . $v['title'] . '(' . $v['name'] . ')' . '</option>'; ?>
                            <?php endforeach;?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="count" placeholder="请输入变量名称，例如：$count输入count" class="layui-input">
                    </td>
                    <td>
                        <input type="radio" name="recycleBin" value="1" title="是" checked>
                        <input type="radio" name="recycleBin" value="0" title="否">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <form class="layui-form" action="javascript:;">
        <table class="layui-table list-table">
            <thead>
                <tr>
                    <th class="title_th">标题</th>
                    <th class="type_th">类型</th>
                    <th class="data_th">数据字段</th>
                    <th class="other_th">扩展</th>
                    <th class="mother_th">操作</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <tr id="0">
                    <td><input type="text" name="title" placeholder="请输入标题" class="layui-input"></td>
                    <td class="select_td">
                        <select name="type" lay-filter="type" id="0">
                            <option value="0">文字</option>
                            <option value="1">操作栏</option>
                            <option value="2">序号输入框</option>
                            <option value="3">启用/禁用按钮</option>
                            <option value="4">iframe弹窗按钮</option>
                        </select>
                    </td>
                    <td><input type="text" name="dataField" placeholder="请输入字段名称" class="layui-input"></td>
                    <td>- - 无 - -</td>
                    <td>
                        <a title="删除" style="color:#FF5722;" href="javascript:;" onclick="del_line(this)" ><i class="layui-icon">&#x1006;</i>删除</a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="add_line" id="add_line"><i class="layui-icon">&#xe654;</i> 添 加 一 栏</td>
                </tr>
            </tfoot>
        </table>
        <button class="layui-btn" lay-submit lay-filter="add">立即提交</button>
        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </form>
</div>
<script>
    var form;
    var layer;
    var num = 0;
    var checkbox = '<input type="checkbox" name="btn" value="1" title="编辑">' +
                   '<input type="checkbox" name="btn" value="2" title="显示">' +
                   '<input type="checkbox" name="btn" value="3" title="删除">';
    var alertMsg = [
        '标题不能为空',
        '请选择类型',
        '数据字段不能为空'
    ];
    layui.use(['form','layer'], function() {
        form = layui.form;
        layer = layui.layer;
        form.on('select(type)', function(data){
            var parent_td = $(data.elem).parent();
            parent_td.parent().attr('id',data.value);
            if (data.value === '1') {
                parent_td.next().html('<input type="text" name="dataField" placeholder="不可编辑" readonly class="layui-input" value="">');
                parent_td.next().next().html(checkbox);
                form.render();
            }else{
                parent_td.next().html('<input type="text" name="dataField" placeholder="请输入字段名称" class="layui-input">');
                parent_td.next().next().html('- - 无 - -');
                form.render();
            }
        });
        form.on('submit(add)', function(data){
            var formData = new FormData(document.getElementById('form'));
            var childs = $('#tbody').children();
            var len = childs.length;
            var type = new Array();
            var title = new Array();
            var field = new Array();
            var other = new Array();
            for (var i = 0; i < len; i++){
                var obj = childs.eq(i);
                var title_val = obj.find('input[name=title]').val();
                var field_val = obj.find('input[name=dataField]').val();
                console.log(title_val);
                var type_val  = obj.attr('id');
                title_val === '' ? layer.msg(alertMsg[0]) : '';
                field_val === '' ? layer.msg(alertMsg[1]) : '';
                type_val  === '' ? layer.msg(alertMsg[2]) : '';
                title.push(title_val);
                field.push(field_val);
                type.push(type_val);
                var other_child = new Array();
                if (type_val === '1'){
                    var btn = obj.find('input[name=btn]');
                    for (var k = 0; k < btn.length; k++){
                        var class_val = btn.eq(k).next().attr('class');
                        class_val = class_val.split(' ');
                        if (class_val[2] && class_val[2] === 'layui-form-checked'){
                            other_child.push(btn.eq(k).val());
                        }
                    }
                }
                other.push(other_child);
            }
            $.ajax({
                type: "POST",
                url : "<?php echo current_url(); ?>",
                data: {type:type,title:title,field:field,other:JSON.stringify(other),control:formData.get('control'),count:formData.get('count'),recycleBin:formData.get('recycleBin')},
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

    function del_line(obj){
        if (num === 0){
            return false;
        }
        $(obj).parent().parent().remove();
        type.pop();
    }

    var html = '<tr id="0">' +
                    '<td><input type="text" name="title" placeholder="请输入标题" class="layui-input"></td>' +
                    '<td class="select_td">' +
                    '    <select name="type" lay-filter="type">' +
                    '        <option value="0">文字</option>' +
                    '        <option value="1">操作栏</option>' +
                    '        <option value="2">序号输入框</option>' +
                    '        <option value="3">启用/禁用按钮</option>' +
                    '        <option value="4">iframe弹窗按钮</option>' +
                    '    </select>' +
                    '</td>' +
                    '<td><input type="text" name="dataField" placeholder="请输入字段名称" class="layui-input"></td>' +
                    '<td>- - 无 - -</td>' +
                    '<td>' +
                    '    <a title="删除" style="color:#FF5722;" href="javascript:;" onclick="del_line(this)" ><i class="layui-icon">&#x1006;</i>删除</a>' +
                    '</td>' +
                '</tr>';

    $('#add_line').click(function () {
        if (num>=20){
            layer.msg('列表不能超过20列');return false;
        }
        $('#tbody').append(html);
        form.render();
        num++;
    })
</script>
</body>

</html>