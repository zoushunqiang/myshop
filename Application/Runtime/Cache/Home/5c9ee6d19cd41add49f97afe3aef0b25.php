<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<head>
	<meta charset="utf-8">
	<title>用户登录</title>
	<link rel="stylesheet" href="/Public/Home/css/base.css" />
	<link rel="stylesheet" href="/Public/Home/css/global.css" />
	<link rel="stylesheet" href="/Public/Home/css/login-register.css" />
	<script src="/Public/Home/js/jquery.js"></script>
</head>
<body>
	<div class="header wrap1000">
		<a href=""><img src="/Public/Home/images/logo.png" alt="" /></a>
	</div>
	<div class="main">
		<div class="login-form fr">
			<div class="form-hd">
				<h3>用户登录</h3>
			</div>
			<div class="form-bd">
				<form action="<?php echo U('User/doLogin');?>" method="POST">
					<dl>
						<dt>用户名</dt>
						<dd><input type="text" name="user" class="text" value="<?php echo (cookie('username')); ?>" /></dd>
					</dl>
					<dl>
						<dt>密&nbsp;&nbsp;&nbsp;&nbsp;码</dt>
						<dd><input type="password" name="pwd" class="text"/></dd>
					</dl>
          <dl>
            <dt>验证码</dt>
            <dd><input type="text" name="verify" class="text"/></dd>
          </dl>
          <dl>
            <dt>&nbsp;</dt>
            <dd><img src="<?php echo U('User/verify');?>" alt="点击我刷新" width="180" onclick="changVerify(this)" ></dd>
          </dl>
          <dl>
            <dt>&nbsp;</dt>
            <dd><input type="submit" value="登  录" class="submit"/><input type="checkbox" name="remember" id=""><span>&nbsp;&nbsp;记住我</span></dd>
          </dl>
        </form>
        <dl>
         <dt>&nbsp;</dt>
         <dd> 还不是本站会员？立即 <a href="/index.php/Home/User/reg" class="register">注册</a></dd>
       </dl>
     </div>
     <div class="form-ft">
     </div>		
   </div>
   <div class="login-form-left fl">
     <img src="/Public/Home/images/left.jpg" alt="" />
   </div>
</div>
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
<script>
  function changVerify(obj){
    var src = "<?php echo U('User/verify');?>?verify="+Math.random();
    $(obj).attr('src',src);
  }
</script>
</body>
</html>