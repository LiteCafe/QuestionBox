<?php
include 'check.php';
include '../config/database.php';

$questionsql = $dbprefix.'questions';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$questionsql;

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

        echo ('<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['creator'].'</td>
        <td>'.$row['question'].'</td>
<td><a id="edit" class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple" href="./answer/?q='.$row['id'].'" mdui-tooltip="{content: \'编辑\'}"><i class="mdui-icon material-icons">&#xe3c9;</i></a> 
<a class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple" href="./delete/?q='.$row['id'].'" mdui-tooltip="{content: \'删除\'}"><i class="mdui-icon material-icons" >&#xe872;</i></a>
<a class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple" href="./hide/?q='.$row['id'].'" mdui-tooltip="{content: \'');if($row['ishide'] == 0) echo ('隐藏');if($row['ishide'] == 1) echo ('显示');

echo('\'}"><i class="mdui-icon material-icons">');if($row['ishide'] == 0) echo ('&#xe8f4;');if($row['ishide'] == 1) echo ('&#xe8f5;');
echo ('</i></a>
');

echo ('<a class="mdui-fab mdui-fab-mini mdui-color-theme-accent mdui-ripple" href="./top/?q='.$row['id'].'" mdui-tooltip="{content: \'');if($row['istop'] == 0) echo ('置顶');if($row['istop'] == 1) echo ('取消置顶');

echo('\'}"><i class="mdui-icon material-icons">');if($row['istop'] == 0) echo ('&#xe5d8;');if($row['istop'] == 1) echo ('&#xe5db;');
echo ('</i></a>');

echo('</td>');
        
      echo('</tr>');
    }
} else 
{
    echo "";
}

mysqli_close($con);


?>