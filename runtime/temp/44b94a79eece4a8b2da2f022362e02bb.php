<?php /*a:3:{s:85:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\module\uninstall.html";i:1649234479;s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\index_layout.html";i:1649390356;s:74:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\layui.html";i:1649234479;}*/ ?>
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
    
<form class="layui-form" method="post">
    <input type="hidden" name="module" value="<?php echo htmlentities($config['module']); ?>">
    <div class="layui-form-item">
        <h4><b>是否清除模块数据</b></h4>
        <div>
            <input type="radio" name="clear" value="0" title="否" checked>
            <input type="radio" name="clear" value="1" title="是">
        </div>
        <div class="layui-form-mid layui-word-aux">选择“是”，将删除数据库中模块数据表</div>
    </div>
    <div class="layui-form-item layer-footer">
        <button class="layui-btn" lay-submit>确认卸载</button>
    </div>
</form>

    
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
layui.use('yznForm', function() {
    var yznForm = layui.yznForm;
    yznForm.listen();
});
</script>

</body>

</html>