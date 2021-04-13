<?php
include '../../config/database.php';

$olduser = $_POST['oldusername'];

$newuser = $_POST['newusername'];

$newpasswd = $_POST['newpasswd'];

$veripasswd = $_POST['verifiedpasswd'];

$oldpasswd = $_POST['oldpasswd'];


$usersql = $dbprefix.'user';

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

session_start();
//  判断是否登陆
if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
$answer = $_POST['answer'];
$qid = $_POST['qid'];
include '../../config/database.php';
$new=0;
$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

if($newuser != '')
{
    $new=1;
    $sql = "UPDATE `".$usersql."` SET `username` = '".$newuser."' WHERE username = '".$olduser."'";
    
    if (mysqli_query($con, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

if($newpasswd != '')
{
    $sql = "SELECT * FROM `".$usersql.'`';
    
    $result = mysqli_query($con, $sql);
     
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
                $passwd = $row["passwd"];
        }
    }
    
    if(sha1($oldpasswd)==$passwd)
    {
    
        $sql = "UPDATE `".$usersql."` SET `passwd` = '".sha1($newpasswd)."'";
        
        if (mysqli_query($con, $sql)) 
        {
        }
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
}
mysqli_close($con);
    
} 
echo $sql;
//header ('Location: ../logout.php');


?>