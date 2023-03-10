<?php /*a:4:{s:83:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\config\setting.html";i:1649234479;s:81:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\index_layout.html";i:1649390356;s:78:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\inputItem.html";i:1649234479;s:74:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\application\admin\view\layui.html";i:1649234479;}*/ ?>
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
                <li class="<?php if($key==$group): ?>layui-this<?php endif; ?>"><a href="<?php echo url('admin/config/setting',['group'=>$key]); ?>"><?php echo htmlentities($vo); ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="layui-tab-content">
                <form class="layui-form" method="post">
                    <?php if(is_array($fieldList) || $fieldList instanceof \think\Collection || $fieldList instanceof \think\Paginator): $i = 0; $__LIST__ = $fieldList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;switch($vo['type']): case "hidden": if($vo['value']): ?><input type="hidden" class="form-control" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"  value="<?php echo htmlentities($vo['value']); ?>"><?php endif; break; case "text": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "password": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <input type="password" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "tags": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" class="layui-input form-tags tags-<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities($vo['value']); ?>" data-remark="<?php echo htmlentities((isset($vo['remark']) && ($vo['remark'] !== '')?$vo['remark']:'输入回车键确认')); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "number": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <input type="number" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" autocomplete="off" class="layui-input" value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "switch": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" lay-skin="switch" lay-text="ON|OFF" value="<?php echo htmlentities($vo['value']); ?>" <?php if(1==$vo[ 'value' ]): ?>checked='' <?php endif; ?>> </div> <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "array": ?>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <dl class="layui-input-block fieldlist" data-name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-id="<?php echo htmlentities($vo['name']); ?>">
        <dd>
            <ins>键名</ins>
            <ins>键值</ins>
        </dd>
        <dd><button type="button" class="layui-btn btn-append">追加</button></dd>
        <textarea name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" class="layui-textarea layui-hide"><?php echo htmlentities($vo['value']); ?></textarea>
    </dl>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<script type="text/html" id="<?php echo htmlentities($vo['name']); ?>Tpl">
    <dd class="layui-form-item rules-item">
        {{# layui.each(d.lists, function(index, item) { }}
        <input type="text" class="layui-input" name="{{item.name}}[{{item.index}}][key]" placeholder="键" value="{{item.row.key|| ''}}" />
        <input type="text" class="layui-input" name="{{item.name}}[{{item.index}}][value]" placeholder="值" value="{{item.row.value|| ''}}" />
        <button type="button" class="layui-btn layui-btn-danger btn-remove layui-btn-xs"><i class="iconfont icon-close"></i></button>
        <button type="button" class="layui-btn btn-dragsort layui-btn-xs"><i class="iconfont icon-yidong"></i></button>
        {{# }); }}
    </dd>
</script>
<?php break; case "checkbox": ?>
<div class="layui-form-item" pane="">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="checkbox" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>][]" lay-skin="primary" title="<?php echo htmlentities($v); ?>" value="<?php echo htmlentities($key); ?>" <?php if(in_array($key,$vo[ 'value' ])): ?>checked<?php endif; ?>>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "radio": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <input type="radio" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" value="<?php echo htmlentities($key); ?>" title="<?php echo htmlentities($v); ?>" <?php if($key==$vo [ 'value' ]): ?>checked='' <?php endif; ?>> <?php endforeach; endif; else: echo "" ;endif; ?> </div> <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "select": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <select name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]">
            <option value=""></option>
            <?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo htmlentities($key); ?>" <?php if($key==$vo[ 'value' ]): ?>selected="" <?php endif; ?>><?php echo htmlentities($v); ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "selects": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <div class="form-selects" data-name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-id="<?php echo htmlentities($vo['name']); ?>" data-value="<?php echo htmlentities($vo['value']); ?>" data-list="<?php echo htmlentities(json_encode($vo['options'])); ?>"></div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "selectpage": ?>
<div class="layui-form-item form-group">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <input class="form-control layui-input selectpage" type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" data-source="<?php echo htmlentities(url($vo['options']['url'])); ?>" data-multiple="<?php echo htmlentities((isset($vo['options']['multiple']) && ($vo['options']['multiple'] !== '')?$vo['options']['multiple']:'false')); ?>" data-field="<?php echo htmlentities((isset($vo['options']['field']) && ($vo['options']['field'] !== '')?$vo['options']['field']:'name')); ?>" data-primary-key="<?php echo htmlentities((isset($vo['options']['key']) && ($vo['options']['key'] !== '')?$vo['options']['key']:'id')); ?>" data-max-select-limit="<?php echo htmlentities((isset($vo['options']['max']) && ($vo['options']['max'] !== '')?$vo['options']['max']:'20')); ?>" data-pagination="<?php echo htmlentities((isset($vo['options']['pagination']) && ($vo['options']['pagination'] !== '')?$vo['options']['pagination']:'true')); ?>" data-page-size="<?php echo htmlentities((isset($vo['options']['limit']) && ($vo['options']['limit'] !== '')?$vo['options']['limit']:'10')); ?>" data-order-by="<?php echo htmlentities((isset($vo['options']['order']) && ($vo['options']['order'] !== '')?$vo['options']['order']:'id')); ?>"  value="<?php echo htmlentities($vo['value']); ?>">
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "color": ?>
<div class="layui-form-item">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <div class="layui-input-inline" style="width: 120px;">
            <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" value="<?php echo htmlentities($vo['value']); ?>" placeholder="请选择颜色" class="layui-input test-form-input" id="c-<?php echo htmlentities($vo['name']); ?>">
        </div>
        <div class="layui-inline" style="left: -11px;">
            <div class="colorpicker" data-input-id="c-<?php echo htmlentities($vo['name']); ?>"></div>
        </div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "datetime": ?>
<div class="layui-form">
    <div class="layui-form-item">
        <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
        <div class="layui-input-block">
            <input type="text" class="layui-input datetime" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" placeholder="请输入<?php echo htmlentities($vo['title']); ?>" value="<?php echo htmlentities($vo['value']); ?>">
        </div>
        <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    </div>
</div>
<?php break; case "textarea": ?>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <textarea placeholder="请输入<?php echo htmlentities($vo['title']); ?>" class="layui-textarea" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo htmlentities($vo['value']); ?></textarea>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "image": case "images": ?>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <div class="layui-col-xs4">
            <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"  id="c-<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>" class="layui-input">
        </div>
        <div class="webUpload" id="picker_<?php echo htmlentities($vo['name']); ?>" data-multiple="<?php echo $vo['type']=='image' ? 'false' : 'true'; ?>" data-input-id="c-<?php echo htmlentities($vo['name']); ?>" data-preview-id="p-<?php echo htmlentities($vo['name']); ?>" data-type="image"><i class="layui-icon layui-icon-upload"></i> 上传</div>
        <button type="button" class="layui-btn fachoose" data-multiple="<?php echo $vo['type']=='image' ? 'false' : 'true'; ?>" data-input-id="c-<?php echo htmlentities($vo['name']); ?>" id="fachoose-c-<?php echo htmlentities($vo['name']); ?>"><i class="iconfont icon-other"></i> 选择</button>
        <ul class="layui-row list-inline plupload-preview" id="p-<?php echo htmlentities($vo['name']); ?>"></ul>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "file": case "files": ?>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <div class="layui-col-xs4">
            <input type="text" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"  id="c-<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities((isset($vo['value']) && ($vo['value'] !== '')?$vo['value']:'')); ?>" class="layui-input">
        </div>
        <div class="webUpload" id="picker_<?php echo htmlentities($vo['name']); ?>" data-multiple="<?php echo $vo['type']=='file' ? 'false' : 'true'; ?>" data-input-id="c-<?php echo htmlentities($vo['name']); ?>" data-preview-id="p-<?php echo htmlentities($vo['name']); ?>" data-type="file"><i class="layui-icon layui-icon-upload"></i> 上传</div>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "Ueditor": ?>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <script type="text/plain" class="js-ueditor" id="<?php echo htmlentities($vo['name']); ?>" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]"><?php echo $vo['value']; ?></script>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
    <div class="<?php echo htmlentities($vo['name']); ?>_attr editor_tool" style="margin-left: 140px;">
        <a class="layui-btn layui-btn-sm" id="<?php echo htmlentities($vo['name']); ?>grabimg" style="margin-top: 4px;">图片本地化</a>
        <a class="layui-btn layui-btn-sm" id="<?php echo htmlentities($vo['name']); ?>filterword" style="margin-top: 4px;">检测违禁词</a>
    </div>
</div>
<?php break; case "city": ?>
<div class="layui-form-item layui-form-text">
    <label class="layui-form-label <?php if(isset($vo['ifrequire']) AND $vo['ifrequire']): ?>layui-form-item-required<?php endif; ?>"><?php echo htmlentities($vo['title']); ?></label>
    <div class="layui-input-block">
        <input type="text" autocomplete="on" class="layui-input" name="<?php echo htmlentities($vo['fieldArr']); ?>[<?php echo htmlentities($vo['name']); ?>]" id="<?php echo htmlentities($vo['name']); ?>" value="<?php echo htmlentities($vo['value']); ?>" data-toggle="city-picker" placeholder="请选择"/>
    </div>
    <?php if($vo['remark']): ?><div class="layui-form-mid2 layui-word-aux"><?php echo $vo['remark']; ?></div><?php endif; ?>
</div>
<?php break; case "custom": ?>
   <?php echo $vo['options']; break; case "markdown": ?>
    <?php echo hook('markdown',$vo); break; ?>
<?php endswitch; ?>

<?php endforeach; endif; else: echo "" ;endif; if(count($fieldList)): ?>
                    <div class="layui-form-item layer-footer">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit data-refresh="false">立即提交</button>
                        </div>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
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
layui.use('yznForm', function() {
    var yznForm = layui.yznForm;
    $(document).on("fa.event.appendfieldlist", ".btn-append", function (e, obj) {
        yznForm.events.faselect(obj);
    });
    yznForm.listen();
});
</script>

</body>

</html>