<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<head>
	<meta charset="utf-8">
	<title>用户注册</title>
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
				<h3>用户注册</h3>
			</div>
			<div class="form-bd">
				<form action="<?php echo U('User/regsave');?>" method="post" >
					<dl>
						<dt>用户名</dt>
						<dd><input type="text" name="user" class="text" /></dd>
					</dl>
					<dl>
						<dt>密码</dt>
						<dd><input type="password" name="pwd" class="text"/></dd>
					</dl>
					<dl>
						<dt>确认密码</dt>
						<dd><input type="password" name="repwd" class="text"/></dd>
					</dl>
					<dl>
						<dt>邮箱</dt>
						<dd><input type="text" name="email" class="text"/></dd>
					</dl>
					<dl>
						<dt>验证码</dt>
						<dd><input type="text" name="verify" class="text"/></dd>
					</dl>
					<dl>
						<dt>&nbsp;</dt>
						<dd><img src="<?php echo U('User/verify');?>" alt="点击我刷新" onclick="changVerify(this)" ></dd>
					</dl>	
					<dl>
						<dt>&nbsp;</dt>
						<dd>
							<input type="submit" value="立即注册" class="submit"/>
							<input type="checkbox" name="remember" id=""><span>&nbsp;&nbsp;记住我</span>
						</dd>
					</dl>
				</form>
				
			</div>
			<div class="form-ft">
			</div>		
		</div>
		<div class="login-form-left fl">
			<img src="/Public/Home/images/left.jpg" alt="" />	
		</div>
	</div>
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
	<script>
		function changVerify(obj){
			var src = "<?php echo U('User/verify');?>?verify="+Math.random();
			$(obj).attr('src',src);
		}
	</script>
</body>
</html>