<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			QUESTIONBOX | 问题列表
		</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.2/dist/css/mdui.min.css">
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
					QUESTIONBOX | 问题列表
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="./" class="mdui-list-item mdui-list-item-active mdui-ripple">
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
				
				<a href='./admin' class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-teal" >
						&#xe853;
					</i>
					<div class="mdui-list-item-content">
						管理面板
					</div>
				</a>

			</div>
		</div>
		<div class="mdui-container mdui-typo">
		      <div class="mdui-dialog" id="none">
                    <div class="mdui-dialog-title">无效操作</div>
                    <div class="mdui-dialog-content">请在列表中查看你感兴趣的问题</div>
                    <div class="mdui-dialog-actions">
                      <button class="mdui-btn mdui-ripple" mdui-dialog-close>确定</button>
                    </div>
                </div>
			<h1 class="mdui-text-color-theme">
				语句列表
			</h1>
			
			<div class="mdui-table-fluid">
  <table class="mdui-table mdui-table-hoverable">
    <thead>
      <tr>
        <th>ID</th>
        <th>提问者</th>
        <th>问题</th>
        <th>查看回答</th>
      </tr>
    </thead>
    <tbody>
        <?php include './code/1.php' ?>
    </tbody>
  </table>
</div>
			    
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