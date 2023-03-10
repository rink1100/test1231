<?php /*a:3:{s:91:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\attachment\view\attachments\index.html";i:1649234479;s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\index_layout.html";i:1649390356;s:74:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\layui.html";i:1649234479;}*/ ?>
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
    <div class="layui-card-header">附件管理</div>
    <div class="layui-card-body">
        <table class="layui-hide" id="dataTable" lay-filter="dataTable"></table>
    </div>
</div>
<script type="text/html" id="picTpl">
  {{#  if(d.mime.indexOf("image") > -1){ }}
    <img style="max-width:80px; max-height:30px;" src="{{d.path}}" data-image="{{d.name}}">
  {{#  } else { }}
    <img style="max-width:80px; max-height:30px;" src="<?php echo url('admin/ajax/icon'); ?>?suffix={{d.ext}}">
  {{#  } }}
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
layui.use('yznTable', function() {
    var table = layui.yznTable;

    var init = {
        delete_url: '<?php echo url("del"); ?>',
    };

    table.render({
        init: init,
        id: 'dataTable',
        toolbar: ['refresh','delete'],
        elem: '#dataTable',
        url: '<?php echo url("index"); ?>',
        cols: [
            [
                { type: 'checkbox', fixed: 'left' },
                { field: 'id', width: 80, title: 'ID', sort: true },
                { field: 'aid', width: 80, title: '用户',hide:true,addClass: "selectpage", extend: "data-source='admin/manager/index' data-field='username'" },
                { field: 'name', title: '名称', searchOp: 'like' },
                { field: 'path', width: 100, align: "center",title: '图片', search: false, templet: '#picTpl' },
                { field: 'path', width: 450, align: "center", title: '物理路径', templet: '<div><a class="layui-btn layui-btn layui-btn-xs" href="{{d.path}}" target="_blank">{{d.path}}</a></div>', searchOp: 'like' },
                { field: 'size', width: 100, title: '大小', sort: true },
                { field: 'ext', width: 100, title: '类型', searchOp: 'like' },
                { field: 'mime', width: 120, title: 'Mime类型' , searchOp: 'like'},
                { field: 'driver', width: 100, title: '存储引擎', searchOp: 'like' },
                { field: 'create_time', width: 180, title: '上传时间', search: 'range' },
                { width:60, title: '操作',templet: yznTable.formatter.tool,operat: ['delete']}
            ]
        ],
        page: {}
    });
});
</script>

</body>

</html>