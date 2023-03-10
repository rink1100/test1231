<?php /*a:3:{s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\module\index.html";i:1649234479;s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\index_layout.html";i:1649390356;s:74:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\layui.html";i:1649234479;}*/ ?>
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
    <div class="layui-card-header">模块管理</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
    </div>
</div>
<script type="text/html" id="titleTpl">
{{#  if(d.create_time == "" || d.create_time == null || d.create_time == undefined){ }}
    <a class="layui-btn layui-btn-xs" data-open="<?php echo url('install'); ?>?module={{ d.module }}" data-table="currentTable" title="【{{d.name}}】安装">安装</a>
{{#  } else { }}
    {{#  if(d.iscore == 0){ }}
    <a class="layui-btn layui-btn-xs layui-btn-danger" data-open="<?php echo url('uninstall'); ?>?module={{ d.module }}" data-table="currentTable" data-width="400" data-height="250" title="【{{d.name}}】卸载">卸载</a>
    {{#  } }}
{{#  } }}
</script>
<button type="button" class="layui-btn layui-btn-sm" id="local-install" value="离线安装" style="display: none"/>

    
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
layui.use(['yznTable', 'upload'], function() {
    var table = layui.yznTable,
        $ = layui.$,
        upload = layui.upload;

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTable',
    };

    table.render({
        init: init,
        toolbar: ['refresh',
            [{
               html:'<a class="layui-btn layui-btn-sm" onclick="importFile();"><i class="iconfont icon-upload-fill"></i>&nbsp;本地安装</a>'
            }],
        ],
        url: '<?php echo url("index"); ?>',
        search:false,
        cols: [
            [
                { field: 'name', width: 150, title: '名称' },
                { field: 'module', width: 150, title: '标识' },
                { field: 'introduce', title: '描述' },
                { field: 'create_time', width: 200, title: '安装时间', templet: '<div>{{#  if(d.create_time){ }} {{d.create_time}} {{#  } else { }} / {{#  } }}</div>' },
                { field: 'author', width: 90, title: '作者' },
                { field: 'version', width: 90, title: '版本' },
                { fixed: 'right', width: 80, title: '操作', templet: '#titleTpl' }
            ]
        ]
    });

    importFile=function (){
        $('#local-install').click();
    }

    //执行实例
    var uploadInst = upload.render({
        elem: '#local-install',
        url: '<?php echo url("admin/module/local"); ?>',
        accept: 'file',
        exts: 'zip',
        done: function(res) {
            //上传完毕回调
            layer.alert(res.msg, {}, function(index) {
                if (res.code != 0) {
                    location.reload();
                }else{
                    layer.close(index);
                }
            });
        },
        error: function() {
            //请求异常回调
        }
    });
});
</script>

</body>

</html>