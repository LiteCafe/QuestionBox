<?php
if(!file_exists('./config/database.php') || !file_exists('./config/siteinfo.php'))
{
    header("Location: ./install");
}
?>