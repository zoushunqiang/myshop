<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">

    <link rel="stylesheet" href="/Public/Admin/css/login.css">
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
	<title>后台登陆</title>
</head>
<body>
	<div id="login_top">
		<div id="welcome">
			欢迎使用信息管理系统
		</div>
		<div id="back">
			<a href="/">返回首页</a>
		</div>
	</div>
	<div id="login_center">
		<div id="login_area">
			<div id="login_form">
				<form action="<?php echo U('Login/doLogin');?>" method="post">
					<div id="login_tip">
						用户登录&nbsp;&nbsp;UserLogin  
					</div>
					<div><input type="text" class="username" name="username" ></div>
					<div><input type="text" class="pwd" name="password" ></div>
					<div id="btn_area">
						<input type="submit" name="submit" id="sub_btn" value="登&nbsp;&nbsp;录">&nbsp;&nbsp;
						<input type="text" class="verify" name="verify">
						<img src="<?php echo U('Login/verify');?>" alt="" width="80" height="40" onclick="changVerify(this)" >
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="login_bottom">
		版权所有
	</div>
	<script>
		function changVerify(obj){
			var src = "<?php echo U('Login/verify');?>?code="+Math.random();
			$(obj).attr('src',src);
		}
	</script>
</body>
</html>