<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<head>
  <meta charset="utf-8">
  <title>百货商城-首页</title>
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
  <!-- 图片切换  begin  -->
  <div class="shop_bd_2 clearfix">
    <div class="xifan_sub_box">
      <div id="p-select" class="sub_nav">
        <div class="sub_no" id="xifan_bd1lfsj"><ul></ul></div>
      </div>
      <div id="xifan_bd1lfimg">
        <div>
          <dl class=""></dl>
          <!--轮播广告-->
          <?php if(is_array($ban_list)): $i = 0; $__LIST__ = $ban_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl class="">
              <dt><a href="" title="" target="_blank"><img src="<?php echo ($vo["water_img"]); ?>" alt="<?php echo ($vo["title"]); ?>" ></a></dt>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
          <!-- <dl class="">
            <dt><a href="" title="" target="_blank"><img src="/Public/Home/images/e50b5d398e3b890f08e14defbc71a94d.jpg" alt="潜入城市周边清幽之地"></a></dt>
          </dl> -->
          <!--轮播广告 END-->
        </div>
      </div>
    </div>
    <script type="text/javascript">movec();</script> 
  </div>
  <!-- 图片切换  end --> 
  <div class="clear"></div>
  <!-- 特别推荐 -->
  <div class="shop_bd_2 clearfix ">
    <div class="shop_bd_tuijian">
      <ul class="tuijian_tabs">
        <li class="hover" >新品推荐</li> 
      </ul>
      <div class="tuijian_content">
        <div id="tuijian_content_1" class="tuijian_shangpin" style="display: block;">
          <ul>
            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">11111111棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>
            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>

            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>

            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>
            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- 特别推荐 End -->
  <div class="clear"></div>
  <!-- 特别推荐 -->
  <div class="shop_bd_2 clearfix">
    <div class="shop_bd_tuijian">
      <ul class="tuijian_tabs">
        <li class="hover"  >精品推荐</li>    
      </ul>
      <div class="tuijian_content">
        <div id="tuijian_content_1" class="tuijian_shangpin" style="display: block;">
          <ul>
            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">11111111棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>
            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>

            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>

            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>
            <li>
              <dl>
                <dt><a href="product.html"><img src="/Public/Home/images/365_7d5e08127b8d6799209674ecffbfc624.jpg_small.jpg" /></a></dt>
                <dd><a href="product.html">外贸田园绗缝全棉布艺双人沙发垫沙发巾飘窗垫素雅黄花</a></dd>
                <dd> 商城价：<em>256.00</em>元</dd>
              </dl>
            </li>

          </ul>
        </div>
        </div>
    </div>
  </div>
  <!-- 特别推荐 End -->
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