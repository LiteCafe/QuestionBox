<?php
include 'check.php';include './config/siteinfo.php';
include './config/database.php';
$questionsql = $dbprefix.'questions';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$questionsql.' WHERE istop = 1';

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
                if($row['ishide'] == 0)
        {
        echo ('<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['creator'].'</td>
        <td><span style="color : red"><b>[置顶] </b></span>'.$row['question'].'</td>
        ');
        if($row['answer']!='')
            echo('<td><a href="./answer/?q='.$row['id'].'">点我查看</a></td>
            ');
        else echo('<td>暂未回答</td>
        ');
      echo('</tr>');
    }}
} else 
{
    echo "";
}

$sql = "SELECT * FROM ".$questionsql.' WHERE istop = 0';

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
                if($row['ishide'] == 0)
        {
        echo ('<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['creator'].'</td>
        <td>'.$row['question'].'</td>
        ');
        if($row['answer']!='')
            echo('<td><a href="./answer/?q='.$row['id'].'">点我查看</a></td>
            ');
        else echo('<td>暂未回答</td>
        ');
      echo('</tr>');
    }}
} else 
{
    echo "";
}

mysqli_close($con);


?>