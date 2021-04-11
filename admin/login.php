<?php
$username =$_POST['username'];
$passwd =$_POST['passwd'];
$truepasswd='d2f1afe2eb794c3c99722e3101b60dcd5a3d8f62';

if($truepasswd==sha1($passwd))
{
    {
        mysqli_close($con);
        session_start();
                $_SESSION["login"] = true;
        header('Location: ./');
        
    }
}
else header('Location: ../login.php?code=1');



?>