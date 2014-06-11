<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($sys_sitename); ?></title>
<link rel="stylesheet" type="text/css" href="/cloudtxl/1/Public/Css/login.css" />
<script type="text/javascript" src="/cloudtxl/1/Public/js/jquery.js"></script>
<script type="text/javascript" src="/cloudtxl/1/Public/js/common.js"></script>
<script type="text/javascript" src="/cloudtxl/1/Public/js/jquery.js"></script>
<script type="text/javascript" src="/cloudtxl/1/Public/js/validate.js"></script>
<script type="text/javascript">
$(function(){
	//遮挡字样无法被选中
	$(".field label").mousedown(function(){
		return false;
	});
	//遮挡字自动清除
	BindLabClear('#email','电子邮箱');
	BindLabClear('#name','昵称');
	BindLabClear('#pwd','密码');
	BindLabClear('#pwd_conf','确认密码');
	

});
function ErrMsg(str){
	$(".fi").html("<div class='flash-error'><span>"+str+"</span></div>");
}

//验证提交数据
function Validate(){
	if(!IsEmail($("#email input").attr("value"))){
		ErrMsg("邮箱格式不正确");
		return;
	}else if(jsTrim($("#name input").attr("value")).length<3){
		ErrMsg("昵称过短(最小长度为3)");
		return;
	}else if(jsTrim($("#pwd input").attr("value")).length<6){
		ErrMsg("密码过短(最小长度为6)");
		return;
	}else if($("#pwd input").attr("value")!=$("#pwd_conf input").attr("value")){
		ErrMsg("请检查两次输入密码是否相同");
		return;
	}
	ErrMsg("");
	$("#new_user")[0].submit();
}

</script>
<title>SignUp</title>
</head>
<body class='dark'>
<div class='page-wrap'>
	<div class='page-container'>
		<div class='main grid_24 nl'>
			<div class='signup-box'>
				<div class='logo'>
				</div>
				<div class='signup-content'>
					<div class='ct'>
						<div class='signup-form'>
						<form action="__URL__/adduser" class="new_user" id="new_user" method="post">
						<div class='fi'></div>
						<input id="service" name="service" type="hidden" />
						<div class='field' id="email">
							<label>电子邮箱</label>
							<input class="text need j-tip" id="user_email" maxlength="50" name="email" size="50" type="text" value="" />
							<div class='quiet'>必填，以后用来登录</div>
						</div>
						
						<div class='field' id="name">
							<label>昵称</label>
							<input class="text need j-tip" id="user_name" maxlength="50" name="name" size="50" type="text" value="测试用户" />
							<div class='quiet'>显示的名称，必填，以后可以修改</div>
						</div>
						
						<div class='field' id="pwd">
							<label>密码</label>
							<input class="text need j-tip" id="user_password" maxlength="32" name="pwd" size="32" type="password" value="12345678" />
							</div>
						<div class='field' id="pwd_conf">
						<label>确认密码</label>
						<input class="text need j-tip" id="user_password_confirmation" maxlength="32" name="psw_conf" size="32" type="password" value="12345678" />
						</div>
						
						<div class='field subm'>
						<a class='signup-submit middlebutton loginblue' href='javascript:Validate();'><span>确认注册</span></a>
						</div>					
						</form>
						</div>
					</div>
					
					<div class='others'>
						<div class='bl'>
						<div class='desc'>如果你已经注册过了，请：</div>
						<a class='middlebutton logingray' href='__APP__/Index/index'><span>直接登录</span></a>
						</div>
						<div class='bl'>
	
						<div class='desc'>也可以使用新浪微博账号登录：</div>
						<div class='connects'>
						<a class='connect tsina-weibo middlebutton loginred' href='http://www.mindpin.com/apps/tsina/mindpin/connect' title='使用新浪微博账号登陆'>
						<div class='icon'></div>
						<div class='name'>新浪微博</div>
						</a>
						</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class='page-footer'>
	<div class='container_24'>
		<span class='sitename'>2012© MarchSoft .</span>
		<span>&nbsp;</span>
		<span class='beian'><a href="http://www.miibeian.gov.cn/icp/publish/query/icpMemoInfo_login.action?id=3743960" target="_blank">豫ICP备012345号</a></span>
	</div>
</div>

</body>
</html>