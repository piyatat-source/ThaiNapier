<?php 
session_start();
require_once("database/connect.php");
$status=0;
if($_POST){
  $username = mysqli_real_escape_string($link,$_POST['txtUsername']);
  $password = mysqli_real_escape_string($link,$_POST['txtPassword']);
  $encodePass = sha1($password);
  // echo $username."+".$password."+".$encodePass;
  $sql = "SELECT * FROM tb_login WHERE loginUsername = '".$username."' and loginPassword = '".$encodePass."'";
  $query = mysqli_query($link,$sql);
  $result = mysqli_fetch_array($query);
	if(!$result)
	{
    $status=1;
	}
	else
	{
    $_SESSION['Id'] = $result["loginId"];
    $_SESSION['Username'] = $result["loginUsername"];
    $_SESSION['Level'] = $result["userStatus"];
    header("location:index.php");
    
	}
	mysqli_close($link);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    <link rel="stylesheet" href="css/sign_in.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>


</head>
<body>



   
  <div class="login-page">
  <div class="icon-back"><a href="index.php"><i class="fas fa-chevron-left"></i> กลับ</a></div>
  <div class="form">
    <form class="login-form" action="sign_in.php" method="post">
        <h2> ลงชื่อเข้าใช้ </h2>
      <input type="text"  name="txtUsername" placeholder="ชื่อผู้ใช้" required/>
      <input type="password" name="txtPassword" placeholder="รหัสผ่าน" required />
     
      <button type="submit" >เข้าสู่ระบบ</button>
      <p class="warning"><a><?php 
      
      if($_POST&&$status==1)
      echo "***รหัสผ่านผิด***";
      
      ?></a></p>
      <p class="message">ยังไม่มีบัญชี? <a href="sign_up.php">ลงทะเบียน</a></p>

    
    </form>
  </div>
  
</div>



</body>
</html>