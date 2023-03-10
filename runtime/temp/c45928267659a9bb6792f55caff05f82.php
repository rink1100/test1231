<?php /*a:4:{s:90:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\public\..\templates\default\cms\show_picture.html";i:1649829520;s:84:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\public\..\templates\default\cms\header.html";i:1678410223;s:83:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\public\..\templates\default\cms\sider.html";i:1656292421;s:84:"D:\phpstudy_pro\WWW\error\xdnyjqrsys.top\public\..\templates\default\cms\footer.html";i:1678354661;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
    <title><?php if(isset($SEO['title']) && !empty($SEO['title'])): ?><?php echo htmlentities($SEO['title']); ?><?php endif; ?><?php echo htmlentities($SEO['site_title']); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($SEO['keyword']); ?>" />
    <meta name="description" content="<?php echo htmlentities($SEO['description']); ?>" />

    <link rel="stylesheet" href="/static/modules/cms/js/amazeui/dist/css/amazeui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/static/modules/cms/js/fullPage/dist/fullpage.css" />
    <link rel="stylesheet" type="text/css" href="/static/modules/cms/css/app.css" />
    <link rel="stylesheet" href="/static/modules/cms/css/animate.min.css" />


    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="/static/modules/cms/js/amazeui/dist/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="/static/modules/cms/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="/static/modules/cms/js/amazeui/dist/js/amazeui.min.js"></script>
    <script src="/static/modules/cms/js/app.js"></script>

    <script type="text/javascript" src="/static/modules/cms/js/fullPage/dist/fullpage.js"></script>
    <!--[if IE]>
    <script type="text/javascript">
        var console = { log: function() {} };
    </script>
    <![endif]-->
    <link rel="stylesheet" href="/static/modules/cms/js/swiper/swiper-bundle.min.css" />
    <script src="/static/modules/cms/js/swiper/swiper-bundle.min.js"></script>
</head>

<body>

<header class="am-topbar am-topbar-inverse admin-header am-header-fixed header1">
    <div class="am-topbar-brand">
        LOGO
    </div>

    <div class="operater">
        <ul class="mmenu">
            <li class="li1"></li>
            <li ></li>
            <li class="li2"></li>
        </ul>
    </div>
</header>

<div class="menu-container active">
    <header class="am-topbar am-topbar-inverse admin-header header2">
        <div class="am-topbar-brand">
            LOGO
        </div>
        <div class="operater">
            <div class="close"></div>
        </div>
    </header>
    <ul id="menu" class="menu">
        <li class="title">MENU</li>
        <li data-menuanchor="1" class="active">
            <a href="#1"><span class="num">01</span> <span class="line">-</span> <span class="t">首页</span></a>
        </li>
        <li data-menuanchor="2">
            <a href="#2"><span class="num">02</span> <span class="line">-</span> <span class="t">宣传视频</span></a></li>
        <li data-menuanchor="3">
            <a href="#3"><span class="num">03</span> <span class="line">-</span> <span class="t">关于我们</span></a>
            <div class="child">
                <a href="#3">团队简介</a>
                <a href="#3/1">人物介绍</a>
                <a href="#3/2">发展历程</a>
            </div>
        </li>
        <li data-menuanchor="4">
            <a href="#4"><span class="num">04</span> <span class="line">-</span> <span class="t">团队荣誉</span></a></li>
        <li data-menuanchor="5">
            <a href="#5"><span class="num">05</span> <span class="line">-</span> <span class="t">投资案例</span></a></li>
        <li data-menuanchor="6">
            <a href="#6"><span class="num">06</span> <span class="line">-</span> <span class="t">新闻资讯</span></a>
        </li>
    </ul>
    <div class="foot">
        <div class="container">
            <div class="l">
                <div class="">0571- 88990588</div>
                <div class="">88990588zhanwei@gmail.com</div>
            </div>
            <div class="r">
                <div class="">城星路128号钱江国际时代广场1-1508室 310020，中国杭州</div>
                <div class="">Copyright@2019 PIMCO AlI Rights Roserved</div>
            </div>
        </div>
    </div>
</div>

<?php if(config('web_site_image') != ''): ?>
<img src="<?php echo config('web_site_image'); ?>" class="topimage">
<?php endif; ?>

<div class="list-box clear w128">
    <div class="list-nav">
    <h5><?php echo getCategory($top_parentid,'catname'); ?></h5>
    <ul>
        <?php $cache = 3600;$cacheID = to_guid_string(['module'=>'cms','action'=>'category','catid'=>$top_parentid,'cache'=>'3600','order'=>'listorder DESC','num'=>'10','return'=>'data','page'=>0]);if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "category")):$data = $cmsTagLib->category(['module'=>'cms','action'=>'category','catid'=>$top_parentid,'cache'=>'3600','order'=>'listorder DESC','num'=>'10','return'=>'data','page'=>0]);if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; foreach($data as $key=>$vo): ?>
        <li>
            <a href="<?php echo htmlentities($vo['url']); ?>" class="transition <?php if($vo['id']==$catid): ?>active<?php endif; ?>"><?php echo htmlentities($vo['catname']); ?></a>
        </li>
        <!--判断是否有子栏目-->
        <div class="subnav" style="padding-left: 10px;">
            <?php $cache = 3600;$cacheID = to_guid_string(['module'=>'cms','action'=>'category','catid'=>$vo['id'],'cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>0]);if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "category")):$data = $cmsTagLib->category(['module'=>'cms','action'=>'category','catid'=>$vo['id'],'cache'=>'3600','order'=>'listorder ASC','num'=>'10','return'=>'data','page'=>0]);if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li>
            <a href="<?php echo htmlentities($vo['url']); ?>" title="<?php echo htmlentities($vo['catname']); ?>"  class="transition <?php if($vo['id']==$catid): ?>active<?php endif; ?>"><?php echo htmlentities($vo['catname']); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            
        </div>
        <?php endforeach; ?>
        
    </ul>
</div>
    <div class="list-r">
        <div class="position">
            <h5><?php echo htmlentities($catname); ?></h5>
            <p>位置：
                <a href="<?php echo htmlentities($siteurl); ?>">首页</a>
                &gt;
                <?php echo catpos($catid); ?>
            </p>
            <div class="list-nav-icon"><img src="/static/modules/cms/images/list-nav03.png"></div>
        </div>
        <div class="list01 "><div class="show01">
            <h5><?php echo htmlentities($title); ?></h5>
            <p>
                <i>发布时间：<?php echo htmlentities(date('Y-m-d H:i',!is_numeric($inputtime)? strtotime($inputtime) : $inputtime)); ?></i><i></i>
                <i>浏览次数：<span id="dynclicks_wbnews_1415_291" name="dynclicks_wbnews_1415_291"><?php echo htmlentities($hits); ?></span>次</i>
            </p>
        </div>

            <div id="vsb_content">
                <div class="show02">
                    <?php if($allow_visitor == '1'): ?>
                    <?php echo $content; else: ?>
                    <div class="allow_visitor">
                        <a href="<?php echo url('cms/index/readpoint',['allow_visitor' => $allow_visitor]); ?>"><font color="red">阅读此信息需要您支付 <B><I><?php echo htmlentities($readpoint); if($paytype): ?>元<?php else: ?>点<?php endif; ?></I></B>，点击这里支付</font></a>
                    </div>
                    <?php endif; ?>
                    <!--S 分页-->
                    <?php echo $pages; ?>
                    <!--E 分页-->
                </div>
            </div>
            <div class="viewpage">
                <div class="main_r_nav">
                    <?php $cache = 3600;$cacheID = to_guid_string(['module'=>'cms','action'=>'pre','catid'=>$catid,'id'=>$id,'cache'=>'3600','return'=>'data','page'=>0]);if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "pre")):$data = $cmsTagLib->pre(['module'=>'cms','action'=>'pre','catid'=>$catid,'id'=>$id,'cache'=>'3600','return'=>'data','page'=>0]);if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; ?>
                    <a href="<?php echo htmlentities($data['url']); ?>" <?php echo htmlentities($data['target']); ?>>上一篇：<?php echo htmlentities($data['title']); ?></a>
                    
                    <?php $cache = 3600;$cacheID = to_guid_string(['module'=>'cms','action'=>'next','catid'=>$catid,'id'=>$id,'cache'=>'3600','return'=>'data','page'=>0]);if($cache && $_return = Cache::get($cacheID)):$data = $_return;else: $cmsTagLib =  \think\Container::get("\\app\\cms\\taglib\\CmsTagLib");if(method_exists($cmsTagLib, "next")):$data = $cmsTagLib->next(['module'=>'cms','action'=>'next','catid'=>$catid,'id'=>$id,'cache'=>'3600','return'=>'data','page'=>0]);if($cache):Cache::set($cacheID, $data, $cache);endif;endif;endif; ?>
                    <a href="<?php echo htmlentities($data['url']); ?>" <?php echo htmlentities($data['target']); ?>>下一篇：<?php echo htmlentities($data['title']); ?></a>
                    
                </div>
                <div class="returnlist"> <a href="javascript:history.go(-1);" title="返回列表">返回列表</a> </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>