<?php
$dbname = $_POST['dbname'];
$dbpasswd = $_POST['dbpasswd'];
$dbuser = $_POST['dbuser'];
$dbprefix = $_POST['dbprefix'];
$dbhost = $_POST['dbhost'];

$sitename = $_POST['sitetitle'];
$describe = $_POST['describe'];

$adminname = $_POST['adminusername'];
$adminpasswd = $_POST['adminpasswd'];

$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$sqlquestion = $dbprefix . 'questions';
$sqluser = $dbprefix . 'user';

if($con)
{
    $test1 = "SELECT * FROM ".$sqlquestion;
    $test2 = "SELECT * FROM ".$sqluser;
    if(mysqli_query($con,$test1) && mysqli_query($con,$test2))
    {
        echo "提问箱 数据库: ".$sqlsentence.' & '.$sqluser." 已创建<br>如想在同一数据库内创建多个站点，请更改表前缀";
        echo '<meta http-equiv="refresh" content = "5;url=../">';
        
    }
    else
    {
        $sql1 = "CREATE TABLE ".$sqlquestion." (
  `id` int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `creator` varchar(30) NOT NULL,
  `question` text,
  `answer` text,
  `ishide` int(2) DEFAULT '0',
  `istop` int(2) DEFAULT '0',
  `reg_date` timestamp NULL DEFAULT NULL
)";
        $sql2 = "CREATE TABLE ".$sqluser." (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
passwd VARCHAR(45) NOT NULL,
usergroup VARCHAR(30)
)";
    

        mysqli_query($con,$sql1);
        mysqli_query($con,$sql2);
        if (mysqli_query($con,$sql1) && mysqli_query($con,$sql2)) {
            $com=1;
        } else {
            echo "创建数据表错误: " . $con->error;
        }
        
        mkdir("../config/");
        
        touch("../config/database.php");
        $CONFIGfile = fopen("../config/database.php", "w");
        $txt = (
            "<?php\n"
.'$dbhost = "'.$dbhost."\";
".'$dbname = "'.$dbname."\";
".'$dbuser = "'.$dbuser."\";
".'$dbpasswd = "' .$dbpasswd . "\";
".'$dbprefix = "'. $dbprefix."\";
?>");
        fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);
        
        touch("../config/siteinfo.php");
        $CONFIGfile = fopen("../config/siteinfo.php", "w");
        $txt = (
            "<?php\n"
.'$sitename = "'.$sitename."\";//The Title Of WebSite\n"
.'$describe = "'.$describe."\";//The Describe Of WebSite\n"
.'$keyword = "'."\";//KeyWord"."
?>");
        fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);
        
        touch('./userdata.php');
        $CONFIGfile=fopen('./userdata.php',"w");
        $txt=('<?php
$name =$_GET["username"];
$passwd =$_GET["passwd"];

include "../config/database.php";
$con = mysqli_connect($dbhost,$dbuser,$dbpasswd,$dbname);

$passwdsha1 = sha1($passwd);

$sqluser =$dbprefix."user";

$sql = "INSERT INTO ".$sqluser." (username, passwd, usergroup)
VALUES (\'".$name."\', \'".$passwdsha1."\', \'admin\')";

mysqli_query($con, $sql);

header("Location: ./?code=complete");

?>');
fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);

        $url ="Location: ./userdata.php?username=".$adminname."&&passwd=".$adminpasswd;
        
        if($com=1)
            header($url);
           
    }
    
}


?>