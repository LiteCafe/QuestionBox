<?php
session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
$qid = $_POST['qid'];
include '../../config/database.php';
$textsql = $dbprefix.'questions';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "DELETE FROM `".$textsql."` WHERE id = ".$qid;
//DELETE FROM `ask_questions` WHERE `ask_questions`.`id` = 1”
if (mysqli_query($con, $sql)) {
    header('Location: ../');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
echo $sql;
}
 else {
    $_SESSION["login"] = false;
    header('Location: ../../login.php');
}
?>