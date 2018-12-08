var layer;

layui.use('layer', function(){
    layer = layui.layer;
});

/**
 * 返回结果执行操作
 */
function response_query(msg) {

    var index = layer.open();

    layer.msg(msg.msg);

    setTimeout(function () {
        if (msg.reload === true){
            location.reload();
        }

        if (msg.reloadParent === true){
            parent.location.reload();
        }

        if (msg.close === true){
            layer.close(index);
        }

        if (msg.return === true){
            window.location.href = document.referrer;
        }
    },2000);

}