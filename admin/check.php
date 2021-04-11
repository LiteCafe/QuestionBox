<?php
    session_start();
//  判断是否登陆
if (isset($_SESSION["asklogin"]) && $_SESSION["asklogin"] == true) {

} else {
    $_SESSION["asklogin"] = false;
    header('Location ../');
}
?>