<?php
session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
$answer = $_POST['answer'];
$qid = $_POST['qid'];
include '../../config/database.php';

$questionsql = $dbprefix .'questions';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "UPDATE `".$questionsql."` SET `answer` = '".$answer."' WHERE id = ".$qid;

if (mysqli_query($con, $sql)) {
    header('Location: ./?q='.$qid.'&complete=1');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
echo $sql;} else {
    $_SESSION["login"] = false;
    header('Location: ../../login.php');
}
?>