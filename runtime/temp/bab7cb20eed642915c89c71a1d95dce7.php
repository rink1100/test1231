<?php /*a:3:{s:82:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\manager\index.html";i:1649234479;s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\index_layout.html";i:1649390356;s:74:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\layui.html";i:1649234479;}*/ ?>
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
    <div class="layui-card-header">管理员管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
        </div>
    </div>
</div>

    
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
    
    
<script type="text/javascript">
layui.use('yznTable', function() {
    var table = layui.yznTable;

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTable',
        add_url: '<?php echo url("add"); ?>',
        edit_url: '<?php echo url("edit"); ?>',
        delete_url: '<?php echo url("del"); ?>',
    };

    table.render({
        init: init,
        toolbar: ['refresh','add'],
        url: '<?php echo url("index"); ?>',
        cols: [
            [
                { field: 'id', width: 80, title: 'ID'},
                { field: 'username', width: 80, title: '登录名', searchOp: 'like' },
                { field: 'roleid', width: 120, title: '所属角色', searchOp: 'like' },
                { field: 'last_login_ip', title: '最后登录IP', searchOp: 'like'  },
                { field: 'last_login_time', width: 200, title: '最后登录时间', search: 'range' },
                { field: 'email',width: 200, title: 'E-mail', searchOp: 'like'  },
                { field: 'nickname', title: '真实姓名', searchOp: 'like'  },
                { width:100, title: '操作',templet: function (d){
                    if(d.id==<?php echo htmlentities($userInfo['id']); ?>){
                        return '<a class="layui-btn layui-btn-xs layui-btn-danger layui-btn-disabled">不可操作</a>';
                    }else{
                        return yznTable.formatter.tool.call(this,d,this);
                    }
                },operat: ['edit','delete']}
            ]
        ],
        page: {}
    });
});
</script>

</body>

</html>