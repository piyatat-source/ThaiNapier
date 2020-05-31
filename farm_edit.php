<?php 
session_start();
$farmId = $_GET['fid'];

if($_POST){
    require_once("database/connect.php");
    $Rai = $_POST["Rai"]; 
    $Ngan = $_POST["Ngan"];
    $squareMeter = $_POST["squareMeter"];
    $farmArea = $Rai."-".$Ngan."-".$squareMeter;

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


    $sql = "UPDATE tb_registers 
    SET farmArea='$farmArea',farmHouseNo='$houseNo',farmVillageNo='$villageNo',farmVillage='$village',farmAlley='$alley',farmRoad='$road',farmPostNo='$postNo',farmSubDistric='$Subdistrict',farmDistrict='$district',farmProvince='$province'
    WHERE registerId = '$farmId'";
    $query = mysqli_query($link,$sql);
    mysqli_close($link);
    header("location:farmlist.php");

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
<?php }else{ 
    
    $farmId = $_GET['fid'];
    include("database/connect.php");
    $sql= "SELECT * FROM tb_registers WHERE registerId = '$farmId'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    extract($row);
    $area = explode("-", $farmArea);
    
    ?>
    <div class="header-form">แก้ไขข้อมูล </div>
    <form id="editfarm" method="post" action="farm_edit.php?fid=<?php echo $farmId; ?>">
    <div class="form-reg">
        <div class="content">
            <div class="title">กรอกข้อมูลทั่วไป</div>

            <div class="content1row">
                <div class="content1row-1">
                    <div class="title-input">ชื่อไร่ <div class="requiredmark">*</div></div>
                    <input type="text" id="farmName"  name="farmName" value="<?php echo $farmName; ?>" placeholder="ชื่อไร่เกษตร"  disabled> 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">เลขที่ <div class="requiredmark">*</div></div>
                    <input type="text" id="houseNo" name="houseNo" value="<?php echo $farmHouseNo; ?>" placeholder="เลขที่" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">หมู่ที่</div>
                    <input type="text" id="villageNo" name="villageNo" value="<?php echo $farmVillageNo; ?>" placeholder="หมู่ที่" > 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">หมู่บ้าน/อาคาร/ชั้น</div>
                    <input type="text" id="village" name="village" value="<?php echo $farmVillage; ?>"  placeholder="หมู่บ้าน/อาคาร/ชั้น" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">ตรอก/ซอย</div>
                    <input type="text" id="alley" name="alley" value="<?php echo $farmAlley; ?>" placeholder="ตรอก/ซอย" > 
                </div>
            </div>


            <div class="content1row">
                <div class="content1row-1">
                    <div class="title-input">ถนน</div>
                    <input type="text" id="road" name="road" value="<?php echo $farmRoad; ?>" placeholder="ถนน" > 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">รหัสไปรษณีย์ <div class="requiredmark">*</div></div>
                    <input type="text" id="postNo" name="postNo" value="<?php echo $farmPostNo; ?>" placeholder="รหัสไปรษณีย์" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">ตำบล/แขวง <div class="requiredmark">*</div></div>
                    <input type="text" id="sub-District" name="sub-District" value="<?php echo $farmSubDistric; ?>" placeholder="ตำบล/แขวง" > 
                </div>
            </div>

            <div class="content2row">
                <div class="content2row-1">
                    <div class="title-input">อำเภอ/เขต <div class="requiredmark">*</div></div>
                    <input type="text"  id="district" name="district" value="<?php echo $farmDistrict; ?>" placeholder="อำเภอ/เขต" > 
                </div>
                <div class="content2row-2">
                    <div class="title-input">จังหวัด<div class="requiredmark">*</div></div>
                    <!-- <input type="text"  id="province" name="province" placeholder="จังหวัด" >  -->
                    <select  id="province" name="province" require>
                    <option value="<?php echo $farmProvince; ?>" selected><?php echo $farmProvince; ?></option>
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
                </div>
            </div>

            <div class="title">จำนวนพื้นที่ที่ทำการเกษตร<div class="requiredmark">*</div></div>
            
            <div class="content1row">
                <div class="content1row-ex">
                <input type="number" id="Rai" name="Rai" placeholder="จำนวนไร่" min="0" value="<?php echo $area[0]; ?>"><p> ไร่ <p/>
                <input type="number" id="Ngan" name="Ngan" placeholder="จำนวนงาน"  min="0" max="3" value="<?php echo $area[1]; ?>" ><p> งาน <p/>
                <input type="number" id="squareMeter" name="squareMeter" placeholder="จำนวนตารางวา" min="0" max="99" value="<?php echo $area[2]; ?>" ><p> ตารางวา <p/>
                </div>
            </div>

            <div class="btn-submit">
                <input type="button"  value="ยืนยันแก้ไขข้อมูล" onclick="check()">
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
<script src="js/event.js"></script>
<script type="text/javascript" src="js/sweet.js"></script>
<script>
    function check() {
      var status = 0;
      if(
          document.getElementById("houseNo").value == "" ||
          document.getElementById("postNo").value == "" ||
          document.getElementById("sub-District").value == "" ||
          document.getElementById("district").value == "" ||
          document.getElementById("province").value == "" ||
          document.getElementById("Rai").value == "" ||
          document.getElementById("Ngan").value == "" ||
          document.getElementById("squareMeter").value == "")
        {
          status = 1;
        } 

      if(status == 0){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'แก้ไขสำเร็จแล้ว',
            showConfirmButton: false,
            timer: 5000
            });
            setTimeout(function(){
                document.getElementById("editfarm").submit();
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