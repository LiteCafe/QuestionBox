<?php
$qid=$_GET['q'];
$code = $_GET['complete'];
include '../../config.php';
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
else $asked = '20';


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			QUESTIONBOX | 回答
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
					QUESTIONBOX | 回答
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
			<div class="mdui-list" mdui-collapse="{accordion:true}">
				<a href="./" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe145;
					</i>
					<div class="mdui-list-item-content">
					回答
					</div>
				</a>
			</div>
		</div>
		</div>
		<div class="mdui-container mdui-typo">
			<h1 class="mdui-text-color-theme">
				回答
			</h1>
			<?php
			    if($code)
			    {
			        echo("<script>mdui.alert('问题回答成功', '回答成功');</script>");
			    }
			?>
			<?php if($asked == '1')
			echo ('
			<form class="content database" action="./answer.php" method="post">
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
                  <input class="mdui-textfield-input" value="'.$answer.'" name="answer"/>
                </div>
                
    			<button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">回答</button>
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