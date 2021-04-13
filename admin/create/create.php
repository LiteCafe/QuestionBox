<?php
include '../../config/database.php';
$anony=$_POST['anony'];
if($anony=='on')
    $creator='匿名者';
else
    $creator=$_POST['asker'];
    
$question=$_POST['question'];

$textsql = $dbprefix.'questions';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "INSERT INTO ".$textsql." (creator,question,answer)
VALUES (\"".$creator."\", \"".$question."\", \"\")";
 
if (mysqli_query($con, $sql)) {
    header('Location: ../ask.php?complete=1');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);


?>