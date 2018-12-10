<?php
/**
 * Created by PhpStorm.
 * User: v_weibyang
 * Date: 2018/11/20
 * Time: 17:09
 */
include_once './command/Output.php';
include_once './command/Style.php';

class Make
{
    private $optimize;

    private $output;

    public function __construct(){

        $this -> output = new Output();

        $this -> style = new Style();

    }

    //命令行调用入口
    public function run($param){

        switch (strtolower($param[2])){
            case 'controller':
                return $this -> make_control($param);
                break;
            case 'model':
                return $this -> make_model($param);
                break;
            case 'helper':
                return $this -> make_helper($param);
                break;
            case 'library':
                return $this -> make_library($param);
                break;
        }

    }

    //生成控制器
    protected function make_control($param){

        $path = $this -> process_path($param[3], 'controllers');

        $class_name = ucfirst($path['name']);
        $dirname = $path['path'];
        $filename = $dirname . '\\' . $class_name . '.php';

        $this -> is_file_or_dir($class_name, $filename, $dirname, 'controller');

        if (isset($param[4])){
            $param[4] = $this -> process_extend($param[4], $path['module']);
            $parent_class = $param[4]['name'];
            $include_path = 'include_once "' . $param[4]['include_path'] . '";';
        }else{
            $parent_class = 'CI_Controller';
            $include_path = '';
        }

        $content = file_get_contents(ROOT_PATH . '/command/stub/controller.stub');

        $content = sprintf($content, $include_path, $class_name, $parent_class);

        $bool = file_put_contents($filename, $content);

        $this -> create_status($class_name, 'controller', $bool);

    }

    //生成模型
    protected function make_model($param){

        $path = $this -> process_path($param[3], 'model');

        $class_name = ucfirst($path['name']);
        $dirname = $path['path'];
        $filename = $dirname . '\\' . $class_name . '.php';

        $this -> is_file_or_dir($class_name, $filename, $dirname, 'model');

        if (isset($param[4])){
            $param[4] = $this -> process_extend($param[4], $path['module']);
            $parent_class = $param[4]['name'];
            $include_path = 'include_once "' . $param[4]['include_path'] . '";';
        }else{
            $parent_class = 'CI_Model';
            $include_path = '';
        }

        $content = file_get_contents(ROOT_PATH . '/command/stub/model.stub');

        $content = sprintf($content, $include_path, $class_name, $parent_class);

        $bool = file_put_contents($filename, $content);

        $this -> create_status($class_name, 'model', $bool);

    }

    //生成函数助手文件
    protected function make_helper($param){

        $path = explode('/', $param[3]);

        if (empty($path[1])){
            echo $this -> style -> error_style('The path is error');exit;
        }

        $helper_name = strtolower($path[1]);

        $dirname = ROOT_PATH . '\\' . $path[0] . '\\helpers';
        $filename = $dirname . '\\' . $helper_name . '_helper.php';

        $this -> is_file_or_dir($helper_name, $filename, $dirname, 'helper');

        $func_name = isset($param[4]) ? $param[4] : 'func_name';

        $content = file_get_contents(ROOT_PATH . '/command/stub/helper.stub');

        $content = sprintf($content, $func_name, $func_name);

        $bool = file_put_contents($filename, $content);

        $this -> create_status($helper_name.'_helper', 'helper', $bool);

    }

    //生成类库
    protected function make_library($param){

        $path = $this -> process_path($param[3], 'libraries');

        $lib_name = ucfirst($path['name']);
        $dirname = $path['path'];
        $filename = $dirname . '\\' . $lib_name . '.php';

        $this -> is_file_or_dir($lib_name, $filename, $dirname, 'library');

        if (isset($param[4])){
            $param[4] = $this -> process_extend($param[4], $path['module']);
            $parent_class = $param[4]['name'];
            $include_path = 'include_once "' . $param[4]['include_path'] . '";';
        }else{
            $parent_class = 'CI_Controller';
            $include_path = '';
        }

        $content = file_get_contents(ROOT_PATH . '/command/stub/controller.stub');

        $content = sprintf($content, $include_path, $lib_name, $parent_class);

        $bool = file_put_contents($filename, $content);

        $this -> create_status($lib_name, 'library', $bool);

    }

    //判断文件、目录是否存在
    protected function is_file_or_dir($name, $filename, $dirname, $type = 'controller'){

        if (is_file($filename)){
            $this -> is_exists($name, $type);
        }

        if (!is_dir($dirname)){
            mkdir(strtolower($dirname), 0755, true);
        }

    }

    //文件存在时输出样式
    protected function is_exists($name, $type = 'controller'){

        $str = $this -> style -> run('is_exists', $type, $name);

        $this -> output -> run($str);

    }

    //生成成功返回样式
    protected function create_status($name, $type = 'controller', $bool = true){

        $str = $this -> style -> run('created_successfully', $type, $name);

        $this -> output -> run($str);

    }

    //处理生成控制器/模型继承关系
    protected function process_extend($other_param, $module){

        $other_param = explode('/',$other_param);

        switch (count($other_param)){
            case 1:
                $other_param[0] = ucfirst($other_param[0]);
                $param = array(
                    'name'         => $other_param[0],
                    'path'         => ROOT_PATH . '\\' . $module . '\\libraries',
                    'include_path' => './' . $module . '/libraries/' . $other_param[0] . '.php'
                );
                break;
            case 2:
                $other_param[1] = ucfirst($other_param[1]);
                $param = array(
                    'name' => $other_param[1],
                    'path' => ROOT_PATH . '\\' . $other_param[0] . '\\libraries',
                    'include_path' => './' . $other_param[0] . '/libraries/' . $other_param[1] . '.php'
                );
                break;
            case 3:
                $other_param[2] = ucfirst($other_param[2]);
                $param = array(
                    'name' => $other_param[2],
                    'path' => ROOT_PATH . '\\' .$other_param[0] . '\\' . $other_param[1],
                    'include_path' => $other_param[0] . '/' . $other_param[1]  . '/' . $other_param[2] . '.php'
                );
                break;
        }

        if (!is_file($param['path'] . '\\' . $param['name'] . '.php')){
            $this -> output -> run($this -> style -> error_style('Library path is error'));
        }

        return $param;

    }

    //处理生成控制器/模型所属模块或保存路径
    protected function process_path($path, $type){

        $path = explode('/', $path);

        switch (count($path)){
            case 1:
                $param = array(
                    'name'   => $path[0],
                    'path'   => ROOT_PATH . '\\application\\' . $type,
                    'module' => 'application'
                );
                break;
            case 2:
                $param = array(
                    'name'   => $path[1],
                    'path'   => ROOT_PATH . '\\' . $path[0] . '\\' . $type,
                    'module' => $path[0]
                );
                break;
        }

        return $param;

    }

    //生成节点控制器
    static public function generate_node($file_name, $name, $extends_src, $table, $view_dir, $funcs, $limit = 10){

        $func_list = '';

        foreach ($funcs as $v){

            $func_list .= sprintf(file_get_contents(COMMAND_PATH . '\\stub\\func.stub'), $v['title'], $v['name']);

        }

        //父控制器
        $src = explode('/', $extends_src);

        if (count($src) <= 1){
            $extends_src = '';
            $extends_name = 'CI_controller';
        }else{
            $extends_src = 'include_once "./' . $extends_src.'.php";';
            $extends_name = $src[count($src) - 1];
         }

        $content = sprintf(file_get_contents(COMMAND_PATH . '\\stub\\generate_node.stub'), $extends_src, $name, $extends_name, $view_dir, $table, $limit, $func_list);

        $bool = file_put_contents($file_name,$content);

        return $bool;

    }

    //生成视图目录
    static public function generate_view_dir($name){

        $dirname = ROOT_PATH . '\\views\\' . $name;

        if (!is_dir($dirname)){
            mkdir($dirname);
        }

        return $dirname;

    }

    /**
     * 生成列表页面
     * @param string  control_name      控制器/视图目录名称
     * @param array   title             前端提交标题列表
     * @param array   type              前端提交类型列表
     * @param array   field             前端提交数据字段列表
     * @param array   other             前端提交数据扩展列表
     * @param string  count             前端提交统计变量名称
     * @param boolean make_recycle      是否生成回收站列表
    */
    static public function generate_list($control_name, $title, $type, $field, $other, $count, $make_recycle = true){

        $th = self::process_th($title);

        $td = self::process_td($type, $field, $other);

        $btn = '<?php echo btn_list($this, ["add", "sort", "forbidden", "recover", "delAll", "recycleBin"], $' . $count .'); ?>';

        $dirname = self::generate_view_dir($control_name);

        $content = file_get_contents(COMMAND_PATH . '\\stub\\generate_list.stub');

        $bool = file_put_contents($dirname . '\\list.php', sprintf($content, $btn, $th, $td));

        if (!$bool || !$make_recycle){
            return $bool;
        }

        $btn = '<?php echo btn_list($this, ["recycle", "delforever", "index"], $' . $count .'); ?>';

        $bool = file_put_contents($dirname . '\\recycleBin.php', sprintf($content, $btn, $th, $td));

        return $bool;

    }

    /**
     * 处理th
     * @param array title 前端提交标题列表
    */
    static protected function process_th($title){

        $html = '';

        foreach ($title as $v){

            $html .= '<th class="list-center">' . $v . '</th>';

        }

        return $html;

    }

    /**
     * 处理td
     * @param array type  列类型数组（[0=>'文字',1=>'操作栏',2=>'序号输入框',3=>'启用&禁用按钮',4=>'iframe弹窗按钮']）
     * @param array field 列名称
     * @param array other 扩展（类型为操作时不为空,[1=>'编辑',2=>'显示',3=>'删除']）
    */
    static protected function process_td($type, $field, $other){

        $html = '';

        foreach ($type as $k => $v){

            switch ($v){
                //文字
                case "0":
                    $html .= '<td class="list-center"><?php echo $item["' . $field[$k] . '"]; ?></td>';
                    break;
                //操作栏
                case "1":
                    $html .= '<td class="td-manage">' . self::process_mother(json_decode($other,true)[$k]) . '</td>';
                    break;
                //序号输入框
                case "2":
                    $html .= '<td class="list-center"><input type="text" name="sort" id="<?php echo $item[\'id\'] ?>" class="layui-input input-xs" value="<?php echo $item[\'' . $field[$k] . '\'] ?>"></td>';
                    break;
                //启用、禁用按钮
                case "3":
                    $html .= '<td class="list-center"><?php echo td_btn($this, $item["id"], ["status"], true, $item["' . $field[$k] . '"]); ?></td>';
                    break;
                //iframe弹窗按钮
                case "4":
                    $html .= '<td class="list-center"><button class="layui-btn layui-btn-xs layui-bg-green" title="标题" onclick="x_admin_show(\'标题\',\'/AdminNode/methodList?pid=' . '<?php echo $item["id"]; ?>' . '\')" >查看</button></td>';
                    break;
            }

        }

        return $html;

    }

    /**
     * 处理操作栏
    */
    static protected function process_mother($other){

        $arr = '[';

        $num = count($other);

        $i = 0;

        foreach ($other as $v){

            switch ($v){
                //编辑
                case "1":
                    $arr .= "'edit'";
                    break;
                //显示
                case "2":
                    $arr .= "'show'";
                    break;
                //删除
                case "3":
                    $arr .= "'delete'";
                    break;
            }

            $i++;

            if ($i !== $num){
                $arr .= ', ';
            }

        }

        $arr .= ']';

        return '<?php echo td_btn($this, $item["id"], ' . $arr . ', true); ?>';

    }

}