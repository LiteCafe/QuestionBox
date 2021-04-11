<?php
$username =$_POST['username'];
$passwd =$_POST['passwd'];
$truepasswd='';

if($truepasswd==sha1($passwd))
{
    {
        mysqli_close($con);
            session_start();
        $_SESSION["asklogin"] = true;
        $_SESSION['sitecode']='askohs';
        header('Location: ./?code=1');
        
    }
}
 
?>