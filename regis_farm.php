<?php 
session_start();

if($_POST){
    require_once("database/connect.php");
    $farmName = $_POST["farmName"];
    $Rai = $_POST["Rai"]; 
    $Ngan = $_POST["Ngan"];
    $squareMeter = $_POST["squareMeter"];
    $Area = $Rai + ($Ngan/4) + ($squareMeter/400);
    $allArea = number_format($Area, 2, '.', '');

    $houseNo = $_POST["houseNo"];
    $villageNo = $_POST["villageNo"]; 
    $village = $_POST["village"]; 
    $alley = $_POST["alley"];
    $road = $_POST["road"]; 
    $postNo = $_POST["postNo"]; 
    $Subdistrict = $_POST["sub-District"];
    $district = $_POST["district"]; 
    $province = $_POST["province"];
    $loginId = $_SESSION['Id'];

    $address = "บ้านเลขที่ ".$houseNo." หมู่ ".$villageNo." หมู่บ้าน".$village." ซอย".$alley." ถนน".$road." ตำบล"
              .$Subdistrict." อำเภอ".$district." จังหวัด".$province." ".$postNo;

    $lat = $_POST["input-lat"];
    $lng = $_POST["input-lng"];

    $sql = "INSERT INTO tb_registers (registerID,loginId,farmName,area_Rai,address,district,province,lat,lng) 
    VALUES ('','".$loginId."','".$farmName."','".$allArea."','".$address."','".$district."','".$province."','".$lat."','".$lng."')";
    $query = mysqli_query($link,$sql);
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
    
    <link rel="stylesheet" href="css/webstyle.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>


</head>
<body>
<?php
include("header.php"); 
?>


<section class="content bg-gray"><br>
    

    
        
<?php if(!$_SESSION['Level']){ ?>
    <div class="header-form">403 Forbidden </div>
    <div class="warning-login"><p>สิทธิ์ไม่ถูกต้อง กรุณาเข้าสู่ระบบก่อนใช้งาน</p></div>
<?php }else{ ?>
    <div class="header-form">ลงทะเบียนเกษตรกร </div>
    <form id="register" method="post" action="regis_farm.php">
    <div class="form-reg">
        <div class="content">
            <div class="title">กรอกข้อมูลทั่วไป</div>

            <div class="content1row">
                <div class="content1row-1">
                    <div class="title-input">ชื่อไร่ <div class="requiredmark">*</div></div>
                    <input type="text" id="farmName"  name="farmName" placeholder="ชื่อไร่เกษตร" required> 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">เลขที่ <div class="requiredmark">*</div></div>
                    <input type="text" id="houseNo" name="houseNo" placeholder="เลขที่" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">หมู่ที่</div>
                    <input type="text" id="villageNo" name="villageNo" placeholder="หมู่ที่" > 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">หมู่บ้าน/อาคาร/ชั้น</div>
                    <input type="text" id="village" name="village"  placeholder="หมู่บ้าน/อาคาร/ชั้น" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">ตรอก/ซอย</div>
                    <input type="text" id="alley" name="alley" placeholder="ตรอก/ซอย" > 
                </div>
            </div>


            <div class="content1row">
                <div class="content1row-1">
                    <div class="title-input">ถนน</div>
                    <input type="text" id="road" name="road" placeholder="ถนน" > 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">รหัสไปรษณีย์ <div class="requiredmark">*</div></div>
                    <input type="text" id="postNo" name="postNo" placeholder="รหัสไปรษณีย์" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">ตำบล/แขวง <div class="requiredmark">*</div></div>
                    <input type="text" id="sub-District" name="sub-District" placeholder="ตำบล/แขวง" > 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">อำเภอ/เขต <div class="requiredmark">*</div></div>
                    <input type="text"  id="district" name="district" placeholder="อำเภอ/เขต" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">จังหวัด<div class="requiredmark">*</div></div>
                    <input type="text"  id="province" name="province" placeholder="จังหวัด" > 
                </div>
            </div>

            <div class="title">จำนวนพื้นที่ที่ทำการเกษตร<div class="requiredmark">*</div></div>
            
            <div class="content1row">
                <div class="content1row-ex">
                <input type="number" id="Rai" name="Rai" placeholder="จำนวนไร่" min="0" value="0"><p> ไร่ <p/>
                <input type="number" id="Ngan" name="Ngan" placeholder="จำนวนงาน"  min="0" max="3" value="0" ><p> งาน <p/>
                <input type="number" id="squareMeter" name="squareMeter" placeholder="จำนวนตารางวา" min="0" max="99" value="0" ><p> ตารางวา <p/>
                </div>
            </div><br><br><br>

            <div class="title">พิกัดพื้นที่ทำการเกษตร<div class="requiredmark">*</div></div>
            <input type="hidden" id="input-lat" name="input-lat" style="width: 300px;"><br>
            <input type="hidden" id="input-lng" name="input-lng" style="width: 300px;">
            <div class="map">
                <div class="search-box">
                    <input type="text" id="search" name="search" placeholder="ค้นหาด้วยชื่ออำเภอ/จังหวัด">
                    <button type="button" id="find">ค้นหา</button><br>
                </div>
                <div class="map-content">
                    <div id="map"></div>
                </div>
                <div class="position-selected">
                    พิกัดที่คุณเลือก : <p name="ll" id="ll">-</p>
                </div>
            
            </div>

            <div class="btn-submit">
                <input type="button"  value="ยืนยันการลงทะเบียน" onclick="check()">
            </div>

        
        
        </div>
        <?php }?> 
    </div>

    </form>

</section>
  

 <?php
include("footer.php"); 
  ?>

<script type="text/javascript" src="js/sweet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCupYjugVXX0hveSzf_PG8ESMvBstFgNXI&callback=initMap" async defer></script>
<script src="js/map-api.js"></script>
<script src="js/event.js"></script>
<script type="text/javascript" src="js/sweet.js"></script>
<script>
    function check() {
      var status = 0;
      if(document.getElementById("farmName").value == "" ||
          document.getElementById("houseNo").value == "" ||
          document.getElementById("postNo").value == "" ||
          document.getElementById("sub-District").value == "" ||
          document.getElementById("district").value == "" ||
          document.getElementById("province").value == "" ||
          document.getElementById("Rai").value == "" ||
          document.getElementById("Ngan").value == "" ||
          document.getElementById("input-lat").value == "" ||
          document.getElementById("input-lng").value == "" ||
          document.getElementById("squareMeter").value == "")
        {
          status = 1;
        } 

      if(status == 0){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'ลงทะเบียนสำเร็จ',
            showConfirmButton: false,
            timer: 5000
            });
            setTimeout(function(){
                document.getElementById("register").submit();
            },2500);
            
      }else {
            Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'ข้อมูลไม่ครบ',
            text: 'กรุณากรอกข้อมูลให้ครบ',
            showConfirmButton: false,
            timer: 2000
            });
      }
    }
  </script>

 

</body>
</html>