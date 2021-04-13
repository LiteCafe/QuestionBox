<?php
$title=$_POST['title'];
$describe=$_POST['describe'];
$keywords=$_POST['keywords'];
$con = mysqli_connect($dbhost, $dbuser, $dbpasswd, $dbname);
$CONFIGfile = fopen("../../config/siteinfo.php", "w");
        $txt = (
            "<?php\n"
.'$sitename = "'.$title."\";//The Title Of WebSite\n"
.'$describe = "'.$describe."\";//The Describe Of WebSite\n"
.'$keyword = "'.$keywords."\";//KeyWord"."
?>");
        fwrite($CONFIGfile, $txt);
        fclose($CONFIGfile);

    header('Location: ./');
?>