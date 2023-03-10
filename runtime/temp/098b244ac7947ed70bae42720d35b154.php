<?php /*a:3:{s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\config\index.html";i:1649234479;s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\index_layout.html";i:1649390356;s:74:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\layui.html";i:1649234479;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <meta name="author" content="YZNCMS">
    <meta name="csrf-token" content="<?php echo think\facade\Request::token('__token__'); ?>">
    <link rel="stylesheet" href="/static/libs/layui/css/layui.css">
    <link rel="stylesheet" href="/static/admin/css/admin.css?v=<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>">
    <link rel="stylesheet" href="/static/common/font/iconfont.css?v=<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>">
    <script src="/static/libs/layui/layui.js"></script>
    <script src="/static/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    //全局变量
    var GV = {
        'site':<?php echo json_encode($site); ?>,
        'image_upload_url': '<?php echo !empty($image_upload_url) ? htmlentities($image_upload_url) :  url("attachment/upload/upload", ["dir" => "images"]); ?>',
        'file_upload_url': '<?php echo !empty($file_upload_url) ? htmlentities($file_upload_url) :  url("attachment/upload/upload", ["dir" => "files"]); ?>',
        'ueditor_upload_url': '<?php echo !empty($ueditor_upload_url) ? htmlentities($ueditor_upload_url) :  url("attachment/upload/upload", ["dir" => "images","from"=>"ueditor"]); ?>',
        'attachment_select_url': '<?php echo !empty($attachment_select_url) ? htmlentities($attachment_select_url) :  url("attachment/attachments/select"); ?>',
    };
    </script>
</head>

<body class="childrenBody <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
    
<div class="layui-card">
    <div class="layui-card-body">
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($groupArray) || $groupArray instanceof \think\Collection || $groupArray instanceof \think\Paginator): $i = 0; $__LIST__ = $groupArray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="<?php if($key==$group): ?>layui-this<?php endif; ?>"><a href="<?php echo url('index',['group'=>$key]); ?>"><?php echo htmlentities($vo); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="layui-tab-content">
                <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
            </div>
        </div>
    </div>
</div>
<script type="text/html" id="barTool">
    {{# if(d.type=='radio' || d.type=='select'){ }}
    <a href='javascript:;' class="layui-btn layui-btn-xs copy" data-clipboard-text="键：{:config('{{d.name}}')} 值：{:config('{{d.name}}_text')}">代码调用</a>
    {{# } else if(d.type=='checkbox' || d.type=='array' || d.type=='images' || d.type=='files'){ }}
    <a href='javascript:;' class="layui-btn layui-btn-xs copy" data-clipboard-text="{volist name=&quot;:config('{{d.name}}')&quot; id='vo'}  键：{$key}  值：{$vo} <br> {/volist}">代码调用</a>
    {{# } else { }}
    <a href='javascript:;' class="layui-btn layui-btn-xs copy" data-clipboard-text="{:config('{{d.name}}')}">代码调用</a>
    {{# } }}
    <a data-open='<?php echo url("edit"); ?>?id={{ d.id }}' title="编辑" class="layui-btn layui-btn-xs"><i class='iconfont icon-brush_fill'></i></a>
    <a href='<?php echo url("del"); ?>?id={{ d.id }}' class="layui-btn layui-btn-danger layui-btn-xs layui-tr-del"><i class='iconfont icon-trash_fill'></i></a>
</script>

    
    <script type="text/javascript">
layui.config({
	version: '<?php echo htmlentities(app('config')->get('version.yzncms_release')); ?>',
	base: '/static/libs/layui_exts/'
}).extend({
	yzn: 'yzn/yzn',
	yznForm: 'yznForm/yznForm',
	yznTable: 'yznTable/yznTable',
	treeGrid: 'treeGrid/treeGrid',
	clipboard: 'clipboard/clipboard.min',
	notice: 'notice/notice.min',
	iconPicker: 'iconPicker/iconPicker.min',
	ztree: 'ztree/ztree',
	dragsort: 'dragsort/dragsort.min',
	tagsinput: 'tagsinput/tagsinput',
	xmSelect: 'xmSelect/xm-select',
	selectPage: 'selectPage/selectpage.min',
	echarts: 'echarts/echarts',
	echartsTheme: 'echarts/echartsTheme',
	citypicker: 'citypicker/city-picker',
	webuploader: 'webuploader/webuploader',
	ueditor: 'ueditor/ueditor.min',
}).use('yznForm');
</script>
    
    
<script>
layui.use(['yznTable','clipboard'], function() {
    var table = layui.yznTable,
        $ = layui.$,
        form = layui.form,
        clipboard =  layui.clipboard;

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTable',
        add_url: "<?php echo url('add',['groupType'=>$group]); ?>",
        modify_url:'<?php echo url("multi"); ?>',
    };

    table.render({
        init: init,
        toolbar: ['refresh','add'],
        url: '<?php echo url("index",["group"=>$group]); ?>',
        search:false,
        cols: [
            [
                { field: 'listorder', width: 70, title: '排序', edit: 'text' },
                { field: 'name',align: "left", title: '名称' },
                { field: 'title',align: "left", title: '标题' },
                { field: 'ftitle', width: 150, title: '类型' },
                { field: 'update_time', width: 200, title: '更新时间'},
                { field: 'status', title: '状态', width: 100, unresize: true,templet: yznTable.formatter.switch },
                { fixed: 'right', width: 160, title: '操作', toolbar: '#barTool' }
            ]
        ],
    });

    var clipboard = new clipboard('.copy');
    clipboard.on('success', function(e) {
        layer.msg("复制成功",{ icon: 1});
    });
    clipboard.on('error', function(e) {
        layer.msg("复制失败！请手动调用",{ icon: 2});
    });
});
</script>

</body>

</html>