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
    header("Location: sign_in.php?status=wrong");
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
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <link rel="stylesheet" href="css/sign_in.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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
     
      <p class="message">ยังไม่มีบัญชี? <a href="sign_up.php">ลงทะเบียน</a></p>

    
    </form>
  </div>
  
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
</script>

<script>
        var status = getUrlParameter('status')
        $(document).ready(function() {
          if(status=="success"){
            Swal.fire({
                position: "center",
                icon: "success",
                title: "สมัครสมาชิกสำเร็จ",
                text: "กรุณาเข้าสู่ระบบ",
                showConfirmButton: false,
                timer: 3000,
            });
          }else if(status=="wrong"){
            Swal.fire({
                position: "center",
                icon: "error",
                title: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง",
                text: "กรุณาลองใหม่อีกครั้ง",
                showConfirmButton: false,
                timer: 3000,
            });
          }else{

          }
        });
      </script>


</body>
</html>