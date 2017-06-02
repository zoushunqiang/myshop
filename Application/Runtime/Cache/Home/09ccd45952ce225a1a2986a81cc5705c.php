<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<head>
  <meta charset="utf-8">
  <title>百货商城-关于我们</title>
  <link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
  <link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
  <link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
     <link rel="stylesheet" href="/Public/Home/css/shop_home.css" type="text/css" />
     <script type="text/javascript" src="/Public/Home/js/jquery.js" ></script>
     <script type="text/javascript" src="/Public/Home/js/focus.js" ></script>
</head>
<body>
  <!-- 头部开始   -->
  <div class="shop_hd">
    <!-- Header TopNav -->
    <div class="shop_hd_topNav">
      <div class="shop_hd_topNav_all">
        <!-- Header TopNav Left -->
        <div class="shop_hd_topNav_all_left">
          <p>您好<span style="color:red;">
            <?php if(!empty($_COOKIE['login'])): echo (cookie('login')); ?>
            <?php else: ?>
              <?php if(!empty($_SESSION['username'])): echo (session('username')); endif; endif; ?>
          </span>，欢迎来到<b><a href="index.html">百货商城</a></b></p>
        </div>
        <!-- Header TopNav Left End -->
        <!-- Header TopNav Right -->
        <div class="shop_hd_topNav_all_right">
          <ul class="topNav_quick_menu">
            <li>
              <div class="topNav_menu"><a href="cart.html" class="topNavHover">购物车<b>0</b></a></div>
            </li>
            <li>
              <div class="topNav_menu">
                <?php if(empty($_SESSION['username'])): ?><a href="<?php echo U('User/login');?>" class="topNavHover">会员登陆</a>
                <?php else: ?>
                  <a href="<?php echo U('User/doLogout');?>" class="topNavHover">注销登陆</a><?php endif; ?>
                <a href="<?php echo U('User/reg');?>" class="topNavHover">会员注册</a>    
              </div>
            </li>
          </ul>
        </div>
        <!-- Header TopNav Right End -->
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- Header TopNav End -->
    <!-- TopHeader Center -->
    <div class="shop_hd_header">
      <div class="shop_hd_header_logo"><h1 class="logo"><a href="index.html"><img src="/Public/Home/images/logo.png" alt="百货" /></a><span>百货</span></h1></div>
      <div class="shop_hd_header_search">
                 <ul class="shop_hd_header_search_tab">
              <li id="search" class="current">商品</li> 
          </ul>
               <div class="clear"></div>
          <div class="search_form">
            <frm method="get" action="">
              <div class="search_formstyle">
                <input type="text" class="search_form_text" name="search_content" value="" placeholder="搜索其实很简单"  />
                <input type="submit" class="search_form_sub" name="secrch_submit" value="" title="搜索" />
              </div>
            </form>
          </div>
      </div>
    </div>
    <div class="clear"></div>
    <!-- TopHeader Center End -->
    <!-- Header Menu -->
    <div class="shop_hd_menu">
      <!-- 普通导航菜单 -->
      <ul class="shop_hd_menu_nav" style="margin-left: -150px;">
        <li class="current_link"><a href="index.html"><span>首页</span></a></li>
        <li class="link"><a href="list.html"><span>产品列表</span></a></li>
        <li class="link"><a href="<?php echo U('Index/about');?>"><span>关于我们</span></a></li>
      </ul>
      <!-- 普通导航菜单 End -->
    </div>
    <!-- Header Menu End -->
  </div>
  <div class="clear"></div>
  <!-- 头部 End -->
	<!-- Body -->
	<style type="text/css">
		.news{width:1000px; margin:10px auto 0; border:1px solid #EBEBEB;color: #666666;}
		.news .title{width: 100%;height: 80px;}
		.news .title h1{width: 95%;margin: 20px auto 0px;height: 50px;line-height: 50px;text-align: center;font-size: 22px;border-bottom: 1px solid #dfdfdf;}
		.news .title h2{text-align: center;margin-top: 10px;color: #999999;}
		.news .content{padding: 30px 20px;font-size: 14px;line-height: 2em;}
  </style>
	<div class="news">
		<div class="title">
			<h1>微联超级APP场景化升级</h1>
			<h2>时间：2015-07-09 09:38:51</h2>
		</div>
		<div class="content">
			<p></p>亲爱的各位网友：<br>国内首款完成智能硬件产品跨品牌集中控制和数据集中管理的应用——微联超级APP近日宣布升级到2.1版，全面支持场景化。用户可以根据自己的生活习惯建立一个场景模式，然后给该场景添加一系列相关设备及设备需要执行的动作，各设备动作之间可以设置时间间隔；此后，当用户点击执行该场景模式，相关设备即可自动按照定义好的动作序列自动执行。<br>例如，用户可以将空调开启到26度、热水器开始加热、窗帘关闭后灯光点亮至最佳色温和亮度、电视自动开机并切换到用户最喜欢的频道等等一系列操作设置为“回家模式”；用户也可以设置“睡眠模式”为灯光渐暗到熄灭、空调到睡眠模式、视听大家电关闭……<br>场景化模式不仅令用户使用更加便利和人性化，也从生态角度推进了智能产品的购物场景化。在微联超级APP实现场景化的同时，智能产品选购的网页也完成了场景化改版，不仅便于用户迅速了解智能产品的组合应用，更可以启发用户设置更有趣和实用的场景。<br>欢迎访问微联专题，了解更多智能产品和场景化选择：</p> 
		</div>
	</div>
	<!-- Body End -->
  <!--底部开始-->
<div clas="clear"></div>
<div class="footer clear wrap1000">
  <div class="shop_footer_link">
    <p>
      <a href="">首页</a>|
      <a href="">关于我们</a>|
      <a href="">法律声明</a>|
      <a href="">隐私声明</a>|
      <a href="">联系我们</a>
    </p>
  </div>
  <div class="shop_footer_copy">
    <p>©2016 百货商城 版权所有</p>
  </div>
</div>
<!-- 底部 End -->
</body>
</html>