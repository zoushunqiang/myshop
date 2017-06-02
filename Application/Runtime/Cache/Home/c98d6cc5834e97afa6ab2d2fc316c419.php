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
        <li class="current_link"><a href="<?php echo U('Index/index');?>"><span>首页</span></a></li>
        <li class="link"><a href="list.html"><span>产品列表</span></a></li>
        <li class="link"><a href="<?php echo U('Index/content');?>"><span>关于我们</span></a></li>
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
  <!-- 面包屑 注意首页没有 -->

  <div class="shop_hd_breadcrumb">
    <strong>当前位置：</strong>
    <span>
      <a href="<?php echo U('Index/index');?>">首页</a>&nbsp;›&nbsp;
      <a href="<?php echo U('Index/content',array('cat_id'=>$content[cat_name]));?>"><?php echo ($content["cat_name"]); ?></a>
    </span>
  </div>
  <div class="clear"></div>
  <!-- 面包屑 End -->
	<div class="news">
		<div class="title">
			<h1><?php echo ($content["title"]); ?></h1>
			<h2>时间：<?php echo (date('Y-m-d H:i:s',$content["add_time"])); ?></h2>
		</div>
		<div class="content">
			<?php echo (html_entity_decode($content["content"])); ?> 
		</div>
	</div>
	<!-- Body End -->
  <!--底部开始-->
<div clas="clear"></div>
<div class="footer clear wrap1000">
  <div class="shop_footer_link">
    <p>
      <a href="<?php echo U('Index/index');?>">首页</a>|
      <?php if(is_array($contents)): $i = 0; $__LIST__ = $contents;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/content',array('cat_id'=>$vo['cat_id']),'');?>"><?php echo ($vo["cat_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </p>
  </div>
  <div class="shop_footer_copy">
    <p>©2016 百货商城 版权所有</p>
  </div>
</div>
<!-- 底部 End -->
</body>
</html>