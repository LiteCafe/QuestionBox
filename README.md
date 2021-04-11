# 提问箱 | QuestionBox

自己写的一个提问箱小程序

## TO DO LIST

- [ ] 安装程序

## 安装 | Install

如果你想安装，你可以

1.手动创建一个数据库

2.在数据库中执行以下SQL查询

```sql
CREATE TABLE `ask_questions` (
  `id` int(6) UNSIGNED NOT NULL,
  `creator` varchar(30) NOT NULL,
  `question` text,
  `answer` text,
  `reg_date` timestamp NULL DEFAULT NULL
)
```

3.修改根目录下的 config.php 文件
```PHP
<?php
$dbhost = "localhost"; // 你的数据库地址 （默认为localhost）
$dbname = ""; // 你的数据库名称
$dbuser = ""; // 你的数据库用户名
$dbpasswd = ""; // 你的数据库密码
$dbprefix = "ask_"; //暂不开放前缀修改
?>
```

4.打开 根目录/admin/login.php 修改你自己的管理密码，记得使用SHA1加密后复制粘贴

SHA1加密网站：http://tools.jb51.net/password/sha1encode

```PHP
<?php
$username =$_POST['username'];//无用
$passwd =$_POST['passwd'];
$truepasswd='d2f1afe2eb794c3c99722e3101b60dcd5a3d8f62';//你的密码 ，记得使用SHA1 加密

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
```

5.敬请享用

**BTW：管理员面板登录安全已测试**

