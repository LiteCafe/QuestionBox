<?php
    include '../../config/siteinfo.php';
?>
<?php
include '../check.php' ;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			<?php echo $sitename;?> | 站点信息
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/css/mdui.min.css">
		<meta name="theme-color" content="#ffffff">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<link rel="icon" href="../../icons/favicon.png">
		<meta name="msapplication-TileImage" content="../icons/logo.png">
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
					<?php echo $sitename;?> | 站点信息
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="../" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe871;
					</i>
					<div class="mdui-list-item-content">
						管理
					</div>
				</a>
				
				<a href="../create" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe3c9;
					</i>
					<div class="mdui-list-item-content">
						创建提问
					</div>
				</a>
				
				<a href="./" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-grey">
						&#xe8b8;
					</i>
					<div class="mdui-list-item-content">
						站点设置
					</div>
				</a>
				
				<a href="../account" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-indigo">
						&#xe7fd;
					</i>
					<div class="mdui-list-item-content">
						账户设置
					</div>
				</a>
				
				<a href="../logout.php" class="mdui-list-item  mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">
						&#xe0b8;
					</i>
					<div class="mdui-list-item-content">
						登出
					</div>
				</a>
				
				<a href="../../" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-teal">
						&#xe88a;
					</i>
					<div class="mdui-list-item-content">
						主页
					</div>
				</a>
				
				<a href='//github.com/ImJingLan/QuestionBox' class="mdui-list-item mdui-ripple"><b>Powered By QuestionBox</b></a>
				
			</div>
		</div>
		<div class="mdui-container mdui-typo">
			<h1 class="mdui-text-color-theme">
				站点信息
			</h1>

			<form class="content database" action="setting.php" method="post">
    			
    			<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点标题</label>
                  <input class="mdui-textfield-input" value='<?php echo $sitename ?>' name="title"/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点描述</label>
                  <input class="mdui-textfield-input" value="<?php echo $describe ?>" name="describe"/>
                </div>

                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">站点关键字(用半角逗号 , 隔开)</label>
                  <input class="mdui-textfield-input" value="<?php echo $keyword ?>" name="keywords"/>
                </div>
                
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">添加</button>
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