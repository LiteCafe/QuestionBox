<?php
session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {

$qid = $_GET['q'];
include '../../config/database.php';
$questionsql = $dbprefix.'questions';
$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "SELECT * FROM ".$questionsql.' WHERE id='.$qid;
echo $sql;
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $hide=$row['istop'];
        
    }
echo $sql;
if($hide == 1) 
    $sql = "UPDATE `".$questionsql."` SET `istop` = 0 WHERE id = ".$qid;
if($hide == 0)
    $sql = "UPDATE `".$questionsql."` SET `istop` = 1 WHERE id = ".$qid;

if (mysqli_query($con, $sql)) {
    header('Location: ../');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
echo $sql;
}

} else {
    $_SESSION["login"] = false;
    header('Location: ../../login.php');
}


?>