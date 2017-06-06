<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<head>
	<meta charset="utf-8">
	<title>商品列表页</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/shop_list.css" type="text/css" />
    <link rel="stylesheet" href="/Public/Home/css/style.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/js/jquery.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
    <script type="text/javascript" src="/Public/Home/js/shop_list.js" ></script>
</head>
<body>
	<!-- 头部开始   -->
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
        <li class="link"><a href="<?php echo U('Product/Plist');?>"><span>产品列表</span></a></li>
        <li class="link"><a href="<?php echo U('Index/content');?>"><span>关于我们</span></a></li>
      </ul>
      <!-- 普通导航菜单 End -->
    </div>
    <!-- Header Menu End -->
  </div>
  <div class="clear"></div>
  <!-- 头部 End -->
	<!-- 头部 End -->
	
	<div class="clear"></div>
	<!-- 面包屑 注意首页没有 -->
	<div class="shop_hd_breadcrumb">
		<strong>当前位置：</strong>
		<span>
			<a href="<?php echo U('Index/index');?>">首页</a>&nbsp;›&nbsp;
			<a href="<?php echo U('Index/Plist');?>">商品列表</a>
		</span>
	</div>
	<div class="clear"></div>
	<!-- 面包屑 End -->
	<!-- Header End -->
	<div class="shop_bd clearfix">
<div class="shop_bd_list_right clearfix" style="width: 1000px;">
<!-- 条件筛选框 -->
<div class="jifen">
      <ul>    
          <li class="overflow">
            <i class="fl">价格：</i>
              <span class="fl">
              	<a <?php if(($max) == ""): ?>style="color:red;"<?php endif; ?> href="<?php echo U('Product/Plist',array('sort'=>$sort));?>">不限</a>
             		<a <?php if(($max) == "100"): ?>style="color:red;"<?php endif; ?> href="<?php echo U('Product/Plist',array('sort'=>$sort, 'min'=>'0', 'max'=>'100'));?>">0~100元</a>
             		<a <?php if(($max) == "200"): ?>style="color:red;"<?php endif; ?> href="<?php echo U('Product/Plist',array('sort'=>$sort, 'min'=>'100', 'max'=>'200'));?>">100~200元</a>
             		<a <?php if(($max) == "300"): ?>style="color:red;"<?php endif; ?> href="<?php echo U('Product/Plist',array('sort'=>$sort, 'min'=>'200', 'max'=>'300'));?>">200~300元</a>
             		<a <?php if(($max) == "500"): ?>style="color:red;"<?php endif; ?> href="<?php echo U('Product/Plist',array('sort'=>$sort, 'min'=>'300', 'max'=>'500'));?>">300~500元</a>
             		<a <?php if(($max) == "10000"): ?>style="color:red;"<?php endif; ?> href="<?php echo U('Product/Plist',array('sort'=>$sort, 'min'=>'500', 'max'=>'10000'));?>">500~10000元</a>
             	</span>
            <i class="fl i1">
            	<form action="<?php echo U('Product/Plist',array('sort'=>$sort));?>" method="get" >
            		<input type="text" class="text4" name="min" value="<?php echo ($min); ?>"> - <input type="text" class="text4" name="max" value="<?php echo ($max); ?>">&nbsp;&nbsp;元
            		<input type="image" src="/Public/Home/images/a1.jpg">
            	</form>
            </i>
            
          </li>
      </ul>
   </div>
   <!-- 条件筛选END -->
			<div class="sort-bar">
				<div class="bar-l"> 
          <!-- 排序方式S -->
          <ul class="array">
            <li <?php if(($sort) == "is_new-asc"): ?>class="selected"<?php endif; ?> ><a title="点击按人气从高到低排序"  href="<?php echo U('Product/Plist',array('sort'=>'is_new-asc', 'min'=>$min, 'max'=>$max));?>">新品</a></li>
            <li <?php if(($sort) == "is_best-desc"): ?>class="selected"<?php endif; ?> ><a title="点击按信用从高到低排序"  href="<?php echo U('Product/Plist',array('sort'=>'is_best-desc', 'min'=>$min, 'max'=>$max));?>">精品</a></li>
						<?php if( $sort == 'price-asc' ): ?><li <?php if(($sort) == "price-asc"): ?>class="selected"<?php endif; ?> ><a title="点击按价格从高到低排序"  href="<?php echo U('Product/Plist',array('sort'=>'price-desc', 'min'=>$min, 'max'=>$max));?>">价格</a></li>
            <?php else: ?>
							<li <?php if(($sort) == "price-desc"): ?>class="selected"<?php endif; ?> ><a title="点击按价格从高到低排序"  href="<?php echo U('Product/Plist',array('sort'=>'price-asc', 'min'=>$min, 'max'=>$max));?>">价格</a></li><?php endif; ?>
          </ul>
          <!-- 排序方式E --> 
		     </div>
			</div>
			<div class="clear"></div>
			<!-- 商品列表 -->
			<div class="shop_bd_list_content clearfix">
				<ul>
          <!-- 循环产品 S -->
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<dl>
								<dt><a href="<?php echo U('Product/info',array('pid'=>$vo['pid']));?>"><img src="<?php echo ($vo["water_img"]); ?>" /></a></dt>
								<dd class="title"><a href="<?php echo U('Product/info',array('pid'=>$vo['pid']));?>"><?php echo (Mystrsub($vo["title"])); ?></a></dd>
								<dd class="content">
									<span class="goods_jiage">￥<strong><?php echo ($vo["price"]); ?></strong></span>
								</dd>
							</dl>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
         	<!-- 循环产品 End -->
				</ul>
			</div>
            	<!-- 商品列表 End -->
			<div class="clear"></div>
			<div class="pagination"> 
				<?php echo ($page); ?>
			</div>
		</div>
	</div>
	<!-- List Body End -->
	<!--底部开始-->
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
	<!-- 底部 End -->
</body>
</html>