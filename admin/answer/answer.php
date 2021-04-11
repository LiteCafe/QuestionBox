<?php
$answer = $_POST['answer'];
$qid = $_POST['qid'];
include '../../config.php';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sql = "UPDATE `ask_questions` SET `answer` = '".$answer."' WHERE id = ".$qid;

if (mysqli_query($con, $sql)) {
    header('Location: ./?q='.$qid.'&complete=1');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
echo $sql;
?>