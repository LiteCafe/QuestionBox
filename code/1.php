<?php
include './config.php';
$textsql = $dbprefix.'questions';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$textsql;

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
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
    }
} else 
{
    echo "";
}

mysqli_close($con);


?>