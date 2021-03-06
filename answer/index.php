<?php
include '../config/database.php';include '../config/siteinfo.php';
$questionsql = $dbprefix.'questions';

$qid=$_GET['q'];
if($qid)
{
$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$questionsql.' WHERE id='.$qid;

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if($row['ishide'] == 1)
            $hide=1;
        if($row['ishide'] == 0)
            $hide=0;    
        $qid = $row['id'];
        $creator =  $row['creator'];
        $question = $row['question'];
        $answer = $row['answer'];
        $have='1';
    }
} else 
{
    $have='0';
}
mysqli_close($con);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
		<title>
			<?php echo $sitename;?> | 回答
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
					<?php echo $sitename;?> | 回答
				</a>
				<div class="mdui-toolbar-spacer">
				</div>
			</div>
		</div>
		<div class="mdui-drawer" id="sidebar">
		    
			<div class="mdui-list" mdui-collapse="{accordion:true}">
			    <a href="../" class="mdui-list-item  mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-blue">
						&#xe88a;
					</i>
					<div class="mdui-list-item-content">
						主页
					</div>
				</a>
				<a href="../ask.php" class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-green">
						&#xe145;
					</i>
					<div class="mdui-list-item-content">
						提问
					</div>
				</a>
				<a href="" class="mdui-list-item mdui-list-item-active mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-orange">
						&#xe866;
					</i>
					<div class="mdui-list-item-content">
						查看问题
					</div>
				</a>
				
				<a href='../admin' class="mdui-list-item mdui-ripple">
					<i class="mdui-list-item-icon mdui-icon material-icons mdui-text-color-teal" >
						&#xe853;
					</i>
					<div class="mdui-list-item-content">
						管理面板
					</div>
				</a>
				<a href='//github.com/ImJingLan/QuestionBox' class="mdui-list-item mdui-ripple"><b>Powered By QuestionBox</b></a>
			</div>
		</div>
		</div>
		<div class="mdui-container mdui-typo">
		    
		    <div class="mdui-col-sm-8 mdui-col-md-10">
      
<?php 
if($hide == 0)
{
if($qid){if($have=='1'){ echo('
<div class="mdui-card">
        <div class="mdui-card-primary">
          <div class="mdui-card-primary-title"> 
				问题ID: '.$qid.'
</div>
          <div class="mdui-card-primary-subtitle">
				提问者: '.$creator.'
			</div>
        </div>
        <div class="mdui-card-content">
		    '.$answer.'
        </div>
        
      </div>
    </div>');}
    
    else { echo '<h1 class="mdui-text-color-theme">问题编号QID = '.$qid.', 但问题不存在</h1>';}

    
}
    else echo '<h1 class="mdui-text-color-theme">问题编号QID为空, 请提供问题编号</h1>';
    }
    if($hide == 1) echo '<h1 class="mdui-text-color-theme">问题编号QID = '.$qid.', 问题存在但已被隐藏</h1>';?>

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