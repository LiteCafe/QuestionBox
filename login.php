<?php
include 'check.php';include './config/siteinfo.php';
    $code=$_GET['code'];
    
    session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
    header('Location: ./admin');
} else {
    $_SESSION["login"] = false;
    
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			<?php echo $sitename;?> | 后台登录
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/css/mdui.min.css">
		<meta name="description" content=
		<?php
		    if($describe != '' )
		        echo "\"".$describe."\"";
		    else echo "\"欢迎来到我的提问箱\""
		 ?>
		    
		>
		<meta name="keywords" content="<?php echo $keyword ?>">
		<meta name="theme-color" content="#ffffff">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="icon" href="./icons/favicon.png">
		<meta name="msapplication-TileImage" content="icons/logo.png">
		<meta name="msapplication-TileColor" content="#000000">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js">
		</script>
		<script src="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/js/mdui.min.js">
		</script>
	</head>
	<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-blue">
		<div class="mdui-appbar mdui-appbar-fixed">
			<div class="mdui-toolbar mdui-color-theme">
				<button class="mdui-btn mdui-btn-icon" mdui-drawer="{target:'#sidebar'}">
					<i class="mdui-icon material-icons">
						&#xe5d2;
					</i>
				</button>
				<a href="./" class="mdui-typo-headline">
					<?php echo $sitename;?> | 后台登录
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="./" class="mdui-list-item  mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe88a;
					</i>
					<div class="mdui-list-item-content">
						主页
					</div>
				</a>
				<a href="./ask.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe145;
					</i>
					<div class="mdui-list-item-content">
						提问
					</div>
				</a>
				<a class="mdui-list-item mdui-ripple" mdui-dialog="{target: '#none'}">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange" >
						&#xe866;
					</i>
					<div class="mdui-list-item-content">
						查看问题
					</div>
				</a>
				
				<a href='./' class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-teal" >
						&#xe853;
					</i>
					<div class="mdui-list-item-content">
						登录面板
					</div>
				</a>
				<a href='//github.com/ImJingLan/QuestionBox' class="mdui-list-item mdui-ripple"><b>Powered By QuestionBox</b></a>
			</div>
		</div>
		<div class="mdui-container mdui-typo">
			<h1 class="mdui-text-color-theme">
				后台登录
			</h1>
			
			<div class="mdui-dialog" id="none">
                <div class="mdui-dialog-title">无效操作</div>
                <div class="mdui-dialog-content">请在列表中查看你感兴趣的问题</div>
                <div class="mdui-dialog-actions">
                  <a href ='./'><button class="mdui-btn mdui-ripple">确定</button></a>
                </div>
            </div>
			
			<?php
			if($code=='1')
			echo("<script>mdui.alert('用户名或密码错误, 请检查后重试', '用户名或密码错误');</script>");
			?>
			
			<form class="content database" action="./admin/login.php" method="post">
    			
    			<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">用户名</label>
                  <input class="mdui-textfield-input" value='' name="username"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">密码</label>
                  <input class="mdui-textfield-input" value="" name="passwd"/>
                </div>
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">登录</button>
			</form>
			
		</div>
		<script>
			$(function() {});
		</script>
		<style>
			.dictumanchor{position:relative;top:-56px}@media (min-width:600px){.dictumanchor{top:-64px!important}}@media
			(orientation:landscape) and (max-width:959px){.dictumanchor{top:-48px!important}}
		</style>
	</body>

</html>