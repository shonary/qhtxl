<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'>
<title>云海通讯录</title>
<link rel="stylesheet" type="text/css" href="/cloudtxl/1/Public/Css/login.css" />
</head>
<body class='dark'>
<div class='page-wrap'>
 	<div class='message-box'>
 		<div class='logo vote'></div>
		<div class='content'>
			<div class="form">
				<div class="title"><?php echo ($error); echo ($message); ?></div>
				<div class="desc">此页面将在 <span class="wait"><?php echo ($waitSecond); ?></span> 秒后自动关闭，如果不想等待请点击 <a href="<?php echo ($jumpUrl); ?>">这里</a> 关闭
					</div>
			</div>
		</div>
 	</div>
</div>
</body>
</html>