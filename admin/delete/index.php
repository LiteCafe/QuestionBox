<?php
session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
$qid=$_GET['q'];
$code = $_GET['complete'];
include '../../config/database.php';
$textsql = $dbprefix.'questions';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);
if($qid)
{
    
$sql = "SELECT * FROM ".$textsql.' WHERE id='.$qid;
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        
        $creator = $row['creator'];
        $question = $row['question'];
        $answer = $row['answer'];
        $asked = '1';
    }
} 
else 
{
}

}
} else {
    $_SESSION["login"] = false;
    header('Location: ../../login.php');
}
include '../../config/siteinfo.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			<?php echo $sitename;?> | 删除确认
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
					<?php echo $sitename;?>| 删除确认
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="../" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe871;
					</i>
					<div class="mdui-list-item-content">
						删除提问
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
				
				<a href="../setting" class="mdui-list-item mdui-ripple">
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
		</div>
		<div class="mdui-container mdui-typo">
			<h1 class="mdui-text-color-theme">
				你确定要删除吗？删除后将无法挽回
			</h1>

			<?php if($asked == '1')
			echo ('
			<form class="content database" action="./delete.php" method="post">
    			<div class="mdui-textfield mdui-textfield-floating-label" style ="display:none">
                  <label class="mdui-textfield-label"></label>
                  <input class="mdui-textfield-input" value="'.$qid.'" name="qid"/>
                </div>
    			
    			<div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">提问者</label>
                  <input class="mdui-textfield-input" value="'.$creator.'" name="asker" disabled/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">问题</label>
                  <input class="mdui-textfield-input" value="'.$question.'" name="question" disabled/>
                </div>
                
                <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">回答</label>
                  <input class="mdui-textfield-input" value="'.$answer.'" name="answer" disabled/>
                </div>
                
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">删除</button>
			</form>');
			if($asked == '20')echo ("<h2>抱歉,你没有提供问题ID</h2>");
			if($asked !='1' && $asked !='20')
			 echo ("<h2>抱歉,找不到该问题</h2>");
			?>
			
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