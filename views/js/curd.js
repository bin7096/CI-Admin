/*单个禁用&启用*/
function changeStatus(url, id, str){
    layer.confirm('确认要'+str+'吗？',function(index){
        $.post(url,{data:id},function (msg) {
            response_query(msg);
        })
    });
}

/*单个删除*/
function delOnce(url, id){
    layer.confirm('确认要删除吗？',function(index){
        $.post(url,{data:id},function (msg) {
            response_query(msg);
        })
    });
}

/*批量删除*/
function delAll (url) {

    var data = tableCheck.getData();
    data = data.join(',');

    if (data == null){
        layer.msg('请勾选删除目标');return false;
    }

    layer.confirm('确认要删除吗？',function(index){
        $.post(url,{data:data},function (msg) {
            response_query(msg);
        })
    });
}

/*批量禁用*/
function forbidden(url) {

    var data = tableCheck.getData();
    data = data.join(',');

    if (data == null){
        layer.msg('请勾选禁用目标');return false;
    }

    layer.confirm('确认要禁用吗？',function(index){
        $.post(url,{data:data},function (msg) {
            response_query(msg);
        })
    });

}

/*批量启用*/
function recover(url) {

    var data = tableCheck.getData();
    data = data.join(',');

    if (data == null){
        layer.msg('请勾选启用目标');return false;
    }

    layer.confirm('确认要启用吗？',function(index){
        $.post(url,{data:data},function (msg) {
            response_query(msg);
        })
    });

}

/*保存排序*/
function save_sort(url) {

    var sort_list = $('input[name=sort]');

    var data = new Array;
    var ids  = new Array;

    for(var i = 0; i<sort_list.length; i++){
        data.push(sort_list.eq(i).val());
        ids.push(sort_list.eq(i).attr('id'));
    }

    data = data.join(',');
    ids  = ids.join(',');

    layer.confirm('确认要保存排序吗？',function(index){
        $.post(url,{data:data,ids:ids},function (msg) {
            response_query(msg);
        })
    });

}

/*批量回收*/
function recycle(url) {
    var data = tableCheck.getData();
    data = data.join(',');

    if (data == null){
        layer.msg('请勾选回收目标');return false;
    }

    layer.confirm('确认要回收吗？',function(index){
        $.post(url,{data:data},function (msg) {
            response_query(msg);
        })
    });
}

/*批量彻底删除*/
function delforever(url) {
    var data = tableCheck.getData();
    data = data.join(',');

    if (data == null){
        layer.msg('请勾选彻底删除目标');return false;
    }

    layer.confirm('确认要彻底删除吗？此操作无法恢复！',function(index){
        $.post(url,{data:data},function (msg) {
            response_query(msg);
        })
    });
}

/*多选保存*/
function saveList(url,id){
    var data = tableCheck.getData();
    data = data.join(',');

    if (data == null){
        layer.msg('请勾选保存目标');return false;
    }

    layer.confirm('确认要保存吗？',function(index){
        $.post(url,{id:id,data:data},function (msg) {
            response_query(msg);
        })
    });
}