<?php 
session_start();
require_once("database/connect.php");
require_once("database/current_pk.php");
$status=0;
if($_POST){
    $inputUsername = $_POST['txtUsername'];
    $inputPassword = $_POST['txtPassword'];
    $inputrePassword = $_POST['txtrePassword'];
    $inputFirstname = $_POST['txtFirstname'];
    $inputLastname = $_POST['txtLastname'];
    $inputTel = $_POST['txtTel'];
    $inputAddress = $_POST['txtAddress'];
    $inputProvince = $_POST['txtProvince'];
    $inputPostcode = $_POST['txtPostcode'];

    //CheckUsername
    $sql_check_user = "SELECT * FROM tb_login WHERE loginUsername= '".$inputUsername."'";
    $query_check_user = mysqli_query($link,$sql_check_user);
    $result_check_user = mysqli_fetch_array($query_check_user,MYSQLI_ASSOC);
	if($result_check_user)
	{
        $status=1;
    }else{
        
        if($inputPassword!=$inputrePassword)
        {
            $status=2;
        }else{
            $sql_add_login = "INSERT INTO tb_login (loginId,loginUsername,loginPassword)
            VALUES ('','".$inputUsername."',sha1($inputPassword)) ";
            $query_add_login = mysqli_query($link,$sql_add_login) or die ("Error in query: $sql_add_login " . mysqli_error());
        

            $sql_add_members = "INSERT INTO tb_members (memberId,loginId,memberFirstname,memberLastname,memberTel,memberAddress,memberProvince,memberPostCode)
            VALUES ('',$login_pk,'$inputFirstname','$inputLastname','$inputTel','$inputAddress','$inputProvince','$inputPostcode')";
            $query_add_members = mysqli_query($link,$sql_add_members) or die ("Error in query: $sql_add_members " . mysqli_error());


            if($query_add_login&&$query_add_members){
                echo "<script type='text/javascript'>alert('สำเร็จ');window.location.replace('sign_in.php');</script>";
            }else{
                echo "<script type='text/javascript'>alert('เกิดข้อผิดพลาด กรุณาลองใหม่ภายหลัง');window.location.replace('sign_up.php');</script>";
            }
        }
    }

    
    // $username = mysqli_real_escape_string($link,$_POST['txtUsername']);
    // $password = mysqli_real_escape_string($link,$_POST['txtPassword']);
    // $encodePass = sha1($password);
    // // echo $username."+".$password."+".$encodePass;
    // $sql = "SELECT * FROM tb_login WHERE loginUsername = '".$username."' and loginPassword = '".$encodePass."'";
    // $query = mysqli_query($link,$sql);
    // $result = mysqli_fetch_array($query);
    //   if(!$result)
    //   {
    //   $status=1;
    //   }
    //   else
    //   {
    //   $_SESSION['Id'] = $result["loginId"];
    //   $_SESSION['Username'] = $result["loginUsername"];
    //   $_SESSION['Level'] = $result["userStatus"];
    //   header("location:index.php");
      
    //   }
    //   mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    <link rel="stylesheet" href="css/sign_up.css">
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>



   
  <div class="login-page">
     <form  action="sign_up.php" method="post">
     
     <div class="icon-back"><a href="index.php"><i class="fas fa-chevron-left"></i> กลับ</a></div>
         <div class="form">
         
            <div class="first" >
                <h2> ลงทะเบียนสมาชิก </h2>
                <input type="text"   name="txtUsername" placeholder="ชื่อผู้ใช้" required/>
                <input type="password"  name="txtPassword" placeholder="รหัสผ่าน" required />
                <input type="password"   name="txtrePassword" placeholder="ยืนยันรหัสผ่าน" required/>
      <!-- <a href="#">เข้าสู่ระบบ</a> -->
                <div class="ct">
                    <button type="button" class="switch reg" >ถัดไป</button>
                </div>
                
                <p class="warning"><a>
                 <?php 
                if($_POST&&$status==1){echo "มีผู้ใช้ชื่อบัญชีนี้แล้ว กรุณาใช้ชื่ออื่น";}
                else if($_POST&&$status==2){echo "***รหัสผ่านไม่ตรงกัน***";}
                ?></a></p>
                <p class="message">มีบัญชีแล้ว <a href="sign_in.php">เข้าสู่ระบบ</a></p>
                <p class="message2">©Copyright ThaiNapier</p>
            </div>

            
            <div class="second">
                <h2> กรอกข้อมูลทั่วไป </h2>
                <input type="text" name="txtFirstname" placeholder="ชื่อจริง" required />
                <input type="text" name="txtLastname" placeholder="นามสกุล" required />
                <input type="text" name="txtTel" placeholder="เบอร์โทร" required />
                <textarea rows="4" name="txtAddress" placeholder="ที่อยู่" required></textarea>
                <select name="txtProvince" require>
                    <option value="" selected>เลือกจังหวัด</option>
                    <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                    <option value="กระบี่">กระบี่ </option>
                    <option value="กาญจนบุรี">กาญจนบุรี </option>
                    <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                    <option value="กำแพงเพชร">กำแพงเพชร </option>
                    <option value="ขอนแก่น">ขอนแก่น</option>
                    <option value="จันทบุรี">จันทบุรี</option>
                    <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                    <option value="ชัยนาท">ชัยนาท </option>
                    <option value="ชัยภูมิ">ชัยภูมิ </option>
                    <option value="ชุมพร">ชุมพร </option>
                    <option value="ชลบุรี">ชลบุรี </option>
                    <option value="เชียงใหม่">เชียงใหม่ </option>
                    <option value="เชียงราย">เชียงราย </option>
                    <option value="ตรัง">ตรัง </option>
                    <option value="ตราด">ตราด </option>
                    <option value="ตาก">ตาก </option>
                    <option value="นครนายก">นครนายก </option>
                    <option value="นครปฐม">นครปฐม </option>
                    <option value="นครพนม">นครพนม </option>
                    <option value="นครราชสีมา">นครราชสีมา </option>
                    <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                    <option value="นครสวรรค์">นครสวรรค์ </option>
                    <option value="นราธิวาส">นราธิวาส </option>
                    <option value="น่าน">น่าน </option>
                    <option value="นนทบุรี">นนทบุรี </option>
                    <option value="บึงกาฬ">บึงกาฬ</option>
                    <option value="บุรีรัมย์">บุรีรัมย์</option>
                    <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                    <option value="ปทุมธานี">ปทุมธานี </option>
                    <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                    <option value="ปัตตานี">ปัตตานี </option>
                    <option value="พะเยา">พะเยา </option>
                    <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                    <option value="พังงา">พังงา </option>
                    <option value="พิจิตร">พิจิตร </option>
                    <option value="พิษณุโลก">พิษณุโลก </option>
                    <option value="เพชรบุรี">เพชรบุรี </option>
                    <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                    <option value="แพร่">แพร่ </option>
                    <option value="พัทลุง">พัทลุง </option>
                    <option value="ภูเก็ต">ภูเก็ต </option>
                    <option value="มหาสารคาม">มหาสารคาม </option>
                    <option value="มุกดาหาร">มุกดาหาร </option>
                    <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                    <option value="ยโสธร">ยโสธร </option>
                    <option value="ยะลา">ยะลา </option>
                    <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                    <option value="ระนอง">ระนอง </option>
                    <option value="ระยอง">ระยอง </option>
                    <option value="ราชบุรี">ราชบุรี</option>
                    <option value="ลพบุรี">ลพบุรี </option>
                    <option value="ลำปาง">ลำปาง </option>
                    <option value="ลำพูน">ลำพูน </option>
                    <option value="เลย">เลย </option>
                    <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                    <option value="สกลนคร">สกลนคร</option>
                    <option value="สงขลา">สงขลา </option>
                    <option value="สมุทรสาคร">สมุทรสาคร </option>
                    <option value="สมุทรปราการ">สมุทรปราการ </option>
                    <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                    <option value="สระแก้ว">สระแก้ว </option>
                    <option value="สระบุรี">สระบุรี </option>
                    <option value="สิงห์บุรี">สิงห์บุรี </option>
                    <option value="สุโขทัย">สุโขทัย </option>
                    <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                    <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                    <option value="สุรินทร์">สุรินทร์ </option>
                    <option value="สตูล">สตูล </option>
                    <option value="หนองคาย">หนองคาย </option>
                    <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                    <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                    <option value="อุดรธานี">อุดรธานี </option>
                    <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                    <option value="อุทัยธานี">อุทัยธานี </option>
                    <option value="อุบลราชธานี">อุบลราชธานี</option>
                    <option value="อ่างทอง">อ่างทอง </option>
                    <option value="อื่นๆ">อื่นๆ</option>
                </select>
                <input type="text" name="txtPostcode" placeholder="รหัสไปรษณีย์" required/>
                
                <button>ยืนยันการสมัคร</button>
                <button type="button" class="switch">ย้อนกลับ</button>
                
            </div>

        
        
    </div> 
</form>
</div>

<!--    <div class="login-page">
            <div class="form">
                <form class="register-form">
                    <input type="text" placeholder="name"/>
                    <input type="password" placeholder="password"/>
                    <input type="text" placeholder="email address"/>
                    <button>create</button>
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>

                <form class="login-form">
                    <input type="text" placeholder="username"/>
                    <input type="password" placeholder="password"/>
                    <button>login</button>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>
-->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="js/sweet.js"></script>

<script type="text/javascript">

$('.first .switch').click(function(){
    $('div .first').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('div .second').animate({height: "toggle", opacity: "toggle"}, "slow");
});
$('.second .switch').click(function(){
    $('div .second').animate({height: "toggle", opacity: "toggle"}, "slow");
    $('div .first').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="js/sweet.js"></script>

<script>
    $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});


</script>

</body>
</html>