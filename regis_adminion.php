<?php 
session_start();
require_once("database/connect.php");
$status=0;
if($_POST){
    $inputUsername = $_POST['txtUsername'];
    $inputPassword = $_POST['txtPassword'];
    $encode = sha1($inputPassword);
    $setStatus = "admin";

    $sql_check_user = "SELECT * FROM tb_login WHERE loginUsername= '".$inputUsername."'";
    $query_check_user = mysqli_query($link, $sql_check_user);
    $result_check_user = mysqli_fetch_array($query_check_user,MYSQLI_ASSOC);

	echo $inputUsername."/".$inputPassword."/".$encode."/".$setStatus;
    if($result_check_user)
	{
        $status=1;
    } else {
        $sql_add_login = "INSERT INTO tb_login (loginUsername,loginPassword,userStatus)
        VALUES ('".$inputUsername."','".$encode."', '".$setStatus."') ";
        $query_add_login = mysqli_query($link,$sql_add_login) or die ("Error in query: $sql_add_login " . mysqli_error());
     }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    <style>
        @import url("https://use.typekit.net/qwg8grf.css");
        * {
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
            font-family: ibm-plex-thai, sans-serif;
        }

        .regis-admin-page {
            width: 360px;
            padding-top: 150px;
            margin: auto;
        }

        .regis-admin-form {
            font-family: ibm-plex-thai, sans-serif;
            position: inherit;
            z-index: 1;
            background: #ededed;
            max-width: 360px;
            margin: 0 auto 150px;    
            padding: 55px;
            text-align: center;
        }

        .regis-admin-form h2 {
            font-family: ibm-plex-thai, sans-serif;
        }
        
        .regis-admin-form input {
            font-family: ibm-plex-thai, sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            border-radius: 15px;
            box-sizing: border-box;
            font-size: 14px;
            text-align: center;
        }

        .regis-admin-form button {
            font-family: ibm-plex-thai, sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4c87af;
            width: 100%;
            border: 0;
            border-radius: 5px;
            padding: 15px;
            color: #ffffff;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
            font-weight: bold;
        }

        .regis-admin-form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 15px;
        }

        .regis-admin-form .message a {
            font-weight: bolder;
            color: #4caf50;
            text-decoration: none;
        }
        
        .regis-admin-form .warning a {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="regis-admin-page">
        <form action="regis_adminion.php" method="post">
            <div class="regis-admin-form">
                <h2> ลงทะเบียนผู้ดูแลระบบ </h2>
                <input type="text"   name="txtUsername" placeholder="ชื่อผู้ใช้" required/>
                <input type="password"  name="txtPassword" placeholder="รหัสผ่าน" required />
                <button>ยืนยันการสมัคร</button>
                <p class="message">มีบัญชีแล้ว? <a href="sign_in.php">เข้าสู่ระบบ</a></p>
                <p class="warning"><a>
                <?php 
                if($_POST&&$status==1){echo "มีผู้ใช้ชื่อบัญชีนี้แล้ว กรุณาใช้ชื่ออื่น";}
                ?></a></p>
            </div>
        </form>
    </div>
</body>
</html>