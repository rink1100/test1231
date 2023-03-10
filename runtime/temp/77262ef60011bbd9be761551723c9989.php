<?php /*a:3:{s:79:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\menu\index.html";i:1649234479;s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\index_layout.html";i:1649390356;s:74:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\layui.html";i:1649234479;}*/ ?>
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
    <div class="layui-card-header">菜单管理</div>
    <div class="layui-card-body">
        <div class="layui-form">
            <table class="layui-hide" id="currentTable" lay-filter="currentTable"></table>
        </div>
    </div>
</div>
<script type="text/html" id="toolbarDemo">
    <div class="layui-table-tool-temp">
        <button class="layui-btn layui-btn-sm yzn-btn-primary" data-treetable-refresh="currentTable"><i class="iconfont icon-shuaxin1"></i></button>
        <button class="layui-btn layui-btn-sm" data-open="<?php echo url('add'); ?>" title="添加"><i class="iconfont icon-add"></i>&nbsp;新增后台菜单</button>
        <button class="layui-btn layui-btn-sm layui-btn-normal" id="openAll"><i class="iconfont icon-add"></i>&nbsp;展开或折叠全部</button>
    </div>
</script>
<script type="text/html" id="barTool">
    <a data-open='<?php echo url("add"); ?>?parentid={{ d.id }}' class="layui-btn layui-btn-xs layui-btn-normal" title="添加">添加</a>
    <a data-open='<?php echo url("edit"); ?>?id={{ d.id }}' class="layui-btn layui-btn-xs" title="编辑"><i class='iconfont icon-brush_fill'></i></a>
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
var treeGrid = null;
layui.use(['table', 'treeGrid', 'yznTable'], function() {
    var $ = layui.$,
        treeGrid = layui.treeGrid,
        tableId = 'currentTable',
        yznTable = layui.yznTable,
        ptable = null;

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTable',
        modify_url:'<?php echo url("multi"); ?>',
    };

    var renderTable = function() {
        treeGrid.render({
            id: tableId,
            elem: init.table_elem,
            toolbar: '#toolbarDemo',
            idField: 'id',
            url: "<?php echo url('index'); ?>",
            cellMinWidth: 100,
            treeId: 'id', //树形id字段名称
            treeUpId: 'parentid', //树形父id字段名称
            treeShowName: 'title', //以树形式显示的字段
            height: 'full-140',
            isFilter: false,
            iconOpen: false, //是否显示图标【默认显示】
            isOpenDefault: false, //节点默认是展开还是折叠【默认展开】
            onDblClickRow: false, //去除双击事件

            // @todo 不直接使用yznTable.render(); 进行表格初始化, 需要使用 yznTable.formatCols(); 方法格式化`cols`列数据
            cols: yznTable.formatCols([
                [
                    { field: 'listorder', width: 60, title: '排序', edit: 'text' },
                    { field: 'id', width: 60, title: 'ID' },
                    { field: 'title', align: 'left', title: '菜单名称', },
                    { width: 80, title: '图标', align: 'center', templet: "<div><i class='iconfont {{d.icon}}'></i></div>" },
                    { width: 200, title: '模块/控制器/方法', templet: "<div>{{d.app}}/{{d.controller}}/{{d.action}}</div>" },
                    { field: 'status', align: 'center', width: 120, title: '状态', unresize: true ,templet: yznTable.formatter.switch,tips:"显示|隐藏"},
                    { fixed: 'right', align: 'center', width: 120, title: '操作', toolbar: '#barTool' }
                ]
            ], init),
        });
    }
    renderTable();

    $('#openAll').click(function(e) {
        var that = this;
        var treedata = treeGrid.getDataTreeList(tableId);
        treeGrid.treeOpenAll(tableId, !treedata[0][treeGrid.config.cols.isOpen]);
        var show = $("i", that).hasClass("icon-add");
        $("i", that).toggleClass("icon-add", !show);
        $("i", that).toggleClass("icon-min", show);
    })

    $('body').on('click', '[data-treetable-refresh]', function() {
        renderTable();
    });

    yznTable.listenSwitch({filter: 'status', url: init.modify_url});

    //yznTable.listenEdit(init, 'currentTable', init.table_render_id, true);

    //监听单元格编辑
    treeGrid.on('edit(currentTable)', function(obj) {
     var value = obj.value,
         data = obj.data;
         $.post('<?php echo url("multi"); ?>', {'id': data.id,'value': value,'param':'listorder'}, function(data) {
             if (data.code == 1) {
                 layer.msg(data.msg);
             } else {
                 layer.msg(data.msg);
             }

         })
    });
});
</script>

</body>

</html>