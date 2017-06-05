<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<head>
	<meta charset="utf-8">
	<title>商品详细页面</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_common.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_header.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_list.css" type="text/css" />
	<link rel="stylesheet" href="/Public/Home/css/shop_goods.css" type="text/css" />
	<script type="text/javascript" src="/Public/Home/js/jquery.js" ></script>
	<script type="text/javascript" src="/Public/Home/js/topNav.js" ></script>
	<script type="text/javascript" src="/Public/Home/js/shop_goods.js" ></script>
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
        <li class="link"><a href="<?php echo U('Index/Plist');?>"><span>产品列表</span></a></li>
        <li class="link"><a href="<?php echo U('Index/content');?>"><span>关于我们</span></a></li>
      </ul>
      <!-- 普通导航菜单 End -->
    </div>
    <!-- Header Menu End -->
  </div>
  <div class="clear"></div>
  <!-- 头部 End -->
	<!-- 头部 End -->
</div>
<div class="clear"></div>
<!-- 面包屑 注意首页没有 -->
<div class="shop_hd_breadcrumb">
	<strong>当前位置：</strong>
	<span>
		<a href="">首页</a>&nbsp;›&nbsp;
		<a href="">产品详细</a>

	</span>
</div>
<div class="clear"></div>
<!-- 面包屑 End -->

<!-- Header End -->

<!-- Goods Body -->
<div class="shop_goods_bd clear">

	<!-- 商品展示 -->
	<div class="shop_goods_show">
		<div class="shop_goods_show_left">
			<!-- 京东商品展示 -->
			<link rel="stylesheet" href="/Public/Home/css/shop_goodPic.css" type="text/css" />
			<script type="text/javascript" src="/Public/Home/js/shop_goodPic_base.js"></script>
			<script type="text/javascript" src="/Public/Home/js/lib.js"></script>
			<script type="text/javascript" src="/Public/Home/js/163css.js"></script>
			<div id="preview">
				<div class=jqzoom >
					
					<img height="350" src="<?php echo ($Info["water_img"]); ?>" jqimg="<?php echo ($Info["water_img"]); ?>" width="350">
					</div>
					
				</div>

				<SCRIPT type=text/javascript>
					$(function(){			
						$(".jqzoom").jqueryzoom({
							xzoom:400,
							yzoom:400,
							offset:10,
							position:"right",
							preload:1,
							lens:1
						});
						$("#spec-list").jdMarquee({
							deriction:"left",
							width:350,
							height:56,
							step:2,
							speed:4,
							delay:10,
							control:true,
							_front:"#spec-right",
							_back:"#spec-left"
						});
						$("#spec-list img").bind("mouseover",function(){
							var src=$(this).attr("src");
							$("#spec-n1 img").eq(0).attr({
								src:src.replace("\/n5\/","\/n1\/"),
								jqimg:src.replace("\/n5\/","\/n0\/")
							});
							$(this).css({
								"border":"2px solid #ff6600",
								"padding":"1px"
							});
						}).bind("mouseout",function(){
							$(this).css({
								"border":"1px solid #ccc",
								"padding":"2px"
							});
						});				
					})
				</SCRIPT>
				<!-- 京东商品展示 End -->

			</div>
			<div class="shop_goods_show_right" style="margin-top: 50px;">
				
				<ul> 
					<form action="cart.html" method="post">
						<li>
							<strong style="font-size:14px; font-weight:bold;"><?php echo ($Info["title"]); ?></strong>
						</li>
						<li>
							<label>价格：</label>
							<span><strong><?php echo ($Info["price"]); ?></strong>元</span>
						</li>
						
						<li>
							<label>累计售出：</label>
							<span>99件</span>
						</li>
						
						<li class="goods_num">
							<label>购买数量：</label>
							<span><a class="good_num_jian" id="good_num_jian" href="javascript:void(0);"></a><input type="text" value="1" id="good_nums" class="good_nums" /><a href="javascript:void(0);" id="good_num_jia" class="good_num_jia"></a>(当前库存0件)</span>
						</li>
						
						<li style="padding:20px 0 20px 20px;">
							
							<span> <input type="submit" class="goods_sub goods_sub_gou"   value="加入购物车"></span>
						</li>
					</form>
					
					<li>  <!--百度分享接口 Start-->
						<div class="bdsharebuttonbox" style="margin-top:20px;"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
						<script>
							window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
						</script>
						<!--百度分享接口 End-->  
					</li>
				</ul>
			</div>
		</div>
		<!-- 商品展示 End -->

		<div class="clear mt15"></div>
		<!-- Goods Left -->
		<div class="shop_bd_list_left clearfix">
			

			<!-- 推荐商品 -->
			<div class="shop_bd_list_bk clearfix">
				<div class="title">推荐商品</div>
				<div class="contents clearfix">
					<ul class="clearfix">
						<?php if(is_array($is_hot)): $i = 0; $__LIST__ = $is_hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="clearfix">					
								<div class="goods_pic"><a href="<?php echo U('Index/product',array('pid'=>$vo['pid']),'');?>"><img src="<?php echo ($vo["water_img"]); ?>" width="160" height=160 /></a></div>
								<div class="goods_name"><a href="<?php echo U('Index/product',array('pid'=>$vo['pid']),'');?>"><?php echo (Mystrsub($vo["title"])); ?></a></div>
								<div class="goods_xiaoliang">
									<span class="goods_xiaoliang_link"><a href="<?php echo U('Index/product',array('pid'=>$vo['pid']),'');?>">去看看</a></span>
									<span class=" goods_xiaoliang_nums goods_price">¥ <?php echo ($vo["price"]); ?> </span>
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
			<!-- 推荐商品 END -->
		</div>
		<!-- Goods Left End -->
		<!-- 商品详情 -->
		<div class="shop_goods_bd_xiangqing clearfix">
			<div class="shop_goods_bd_xiangqing_tab">
				<ul>
					<li id="xiangqing_tab_1" ><a href=""><span>商品详情</span></a></li>            </ul>
				</div>
				
				<div class="shop_goods_bd_xiangqing_content clearfix">
					<div class="xiangqing_contents clearfix">
						<?php echo (htmlspecialchars_decode($vo["content"])); ?>
					</div>
				</div>
			</div>
			<!-- 商品详情 End -->
		</div>
		<!-- Goods Body End -->
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