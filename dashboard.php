<?php 
session_start();
error_reporting(0);
$session_value=(isset($_SESSION['Id']))?$_SESSION['Id']:'';

$central = array("กรุงเทพมหานคร","กาญจนบุรี","ชัยนาท","นครนายก","นครปฐม","นนทบุรี","ปทุมธานี","ประจวบคีรีขันธ์","พระนครศรีอยุธยา","เพชรบุรี","ราชบุรี","ลพบุรีสมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระบุรี","สิงห์บุรีสุพรรณบุรี","อ่างทอง","จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ตราด","ปราจีนบุรี","ระยอง","สระแก้ว");
$north =  array("กำแพงเพชร","เชียงราย","เชียงใหม่","ตาก","นครสวรรค์","น่าน","พะเยา","พิจิตร","พิษณุโลก","เพชรบูรณ์" ,"แพร่","แม่ฮ่องสอน","ลำปาง","ลำพูน","สุโขทัย","อุตรดิตถ์","อุทัยธานี");
$east = array("กาฬสินธุ์","ขอนแก่น","ชัยภูมินครพนม","นครราชสีมา","บุรีรัมย์","มหาสารคาม","มุกดาหาร","ยโสธร","ร้อยเอ็ด","เลย","ศรีสะเกษ","สกลนคร","สุรินทร์","หนองคาย","หนองบัวลำภู","อำนาจเจริญ","อุดรธานี","อุบลราชธานี","บึงกาฬ");
$southern = array("กระบี่","ชุมพร","ตรัง","นครศรีธรรมราช","นราธิวาส","ปัตตานี","พังงา","พัทลุง","ภูเก็ต","ยะลา","ระนอง","สงขลา","สตูล","สุราษฎร์ธานี");

$reg_all = 0;
$reg_central = 0;
$reg_north = 0;
$reg_east = 0;
$reg_southern = 0;

require_once("database/connect.php");
$sql = "SELECT farmProvince FROM tb_registers";
$query = mysqli_query($link,$sql); 
$reg_all = mysqli_num_rows($query);

while($row = mysqli_fetch_assoc($query)){

  for ($i= 0; $i < count($central); $i++) {
    if ($central[$i] == $row['farmProvince']) {
      $reg_central ++;
    }
  }

  for ($i= 0; $i < count($north); $i++) {
    if ($north[$i] == $row['farmProvince']) {
      $reg_north ++;
    }
  }

  for ($i= 0; $i < count($east); $i++) {
    if ($east[$i] == $row['farmProvince']) {
      $reg_east ++;
    }
  }

  for ($i= 0; $i < count($southern); $i++) {
    if ($southern[$i] == $row['farmProvince']) {
      $reg_southern ++;
    }
  }
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
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" type="text/css" href="modules/chartjs/dist/Chart.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script src= "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        var sessionNum = '<?php echo $session_value;?>';
    </script>

</head>
<body>
<?php
//include("header.php"); 
?>

<header>
        <nav>
       
        <div class="header"></div>

          <!-- <input type="checkbox" id="check">
              <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
              </label>   -->
              <input type="checkbox" id="openmenu" class="hamburger-checkbox">
              <div class="hamburger-icon checkbtn">
                <label for="openmenu" id="hamburger-label">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </label>    
              </div>


              <input type="checkbox" id="check2">
              <label for="check2" class="checkbtn2">
                <i class="fas fa-user-circle"></i>
              </label>  
          

      
            <img src="img/logo_napier3.png" alt="logo" ></img>
            <ul class="all-mainmenu">
              <li><a href="index.php">ข้อมูลหญ้าเนเปียร์</a></li>
              <li><a href="planting.php">การเพาะปลูก</a></li>
              <li><a href="research.php">การทดลอง</a></li>
              <?php if($_SESSION['Level']=="admin"){ ?>
                          <li><a href="dashboard.php" class="active" >สถิติข้อมูลการเกษตร</a></li>
              <?php }else{ ?>
                          <li><a href="#" id="btn-reg">ลงทะเบียนเกษตรกร</a></li>      
             <?php } ?> 
             <li><a href="../../" >เว็บไซต์หลัก</a></li>
            </ul>
            
            <div id="user-control" class="user-control">
              <ul class="user-menu">
                <!-- ยังไม่ล็อกอิน --> 
                <?php 
                if($_SESSION['Level']==""){
                ?>          
                <li><a href="sign_in.php"><i class="fas fa-edit"></i> ลงชื่อเข้าใช้</a></li>
                <li><a href="sign_up.php"><i class="fas fa-user-plus"></i> สมัครสมาชิก</a></li>
                <?php
                }
                else if($_SESSION['Level']=="admin"){ ?>

                  <li><a href="#"><i class="fas fa-user"></i> ชื่อผู้ใช้ : <?php echo $_SESSION['Username']; ?></a></li>
                  <li><a href="#"> </a></li> 
                  <li><a href="manage_members.php">จัดการสมาชิก</a></li>
                  <input type="hidden" id="btn-reg"> <!-- JS ERROR -->
                  <?php
                }
                else if($_SESSION['Level']=="member"){ ?>

                  <li><a href="#"><i class="fas fa-user"></i> ชื่อผู้ใช้ : <?php echo $_SESSION['Username']; ?></a></li>
                  <li><a href="#"> </a></li> 
                  <li><a href="farmlist.php">รายการลงทะเบียน</a></li>
                  <?php
                }
                ?>
                <?php 
                if($_SESSION['Level']!=""){
                ?>   
                <li><a href="#" id="btn-signout" onclick="signout()">ออกจากระบบ</a></li>
                <?php } ?>
                
                
       
                <!-- ล็อกอินแล้ว -->
               

              </ul>
            </div>
        </nav>
        
  </header>




<section class="content bg-gray"><br>

<?php if(!$_SESSION['Level']){ ?>
    <div class="header-form">403 Forbidden </div>
    <div class="warning-login"><p>สิทธิ์ไม่ถูกต้อง กรุณาเข้าสู่ระบบก่อนใช้งาน</p></div>
<?php }else{ ?>

  <div class="dashboard-container">
  <div class="namepage">สถิติข้อมูลทั้งหมด</div>
    <div class="group1">
      <div class="map">
        <div class="content-map">
          <div class="title-dash">แผนที่พิกัดไร่เกษตรทั้งหมด</div>
          <div class="map-show">
          <iframe src="all_map.php" width="100%" height="440" style="border:0"></iframe>
          </div>
        </div>
      </div>
      <div class="counter noselect">
        <div class="content-counter">
          <div class="title-dash">จำนวนทะเบียนเกษตรกร</div>
          <div class="counter-containner">
            <div class="reg-all">
              <div class="title-inbox dark">ทั้งหมด</div>
              <div class="value-inbox dark">
                <div class="value"><?php echo $reg_all; ?></div>
                <div class="unit">ไร่</div>
              </div>
            </div>
              <div class="reg-pair">
                <div class="reg-left">
                  <div class="reg-cenrtal">
                  <div class="title-inbox">ภาคกลาง</div>
                  <div class="value-inbox">
                <div class="value sm-left "><?php echo $reg_central; ?></div>
                <div class="unit sm-right ">ไร่</div>
              </div>
                  </div>
                </div>
                <div class="reg-right">
                  <div class="reg-north">
                  <div class="title-inbox">ภาคเหนือ</div>
                  <div class="value-inbox">
                <div class="value sm-left "><?php echo $reg_north; ?></div>
                <div class="unit sm-right ">ไร่</div>
              </div>
                  </div>
                </div>
              </div>
              <div class="reg-pair" style="clear: both;">
                <div class="reg-left"><div class="reg-east">
                <div class="title-inbox">ภาคตะวันออก</div>
                  <div class="value-inbox">
                <div class="value sm-left "><?php echo $reg_east; ?></div>
                <div class="unit sm-right ">ไร่</div>
              </div>
                </div>
              </div>
                <div class="reg-right"><div class="reg-southern">
                <div class="title-inbox">ภาคใต้</div>
                  <div class="value-inbox">
                <div class="value sm-left "><?php echo $reg_southern; ?></div>
                <div class="unit sm-right ">ไร่</div>
              </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="group2 noselect">
      <div class="statistic">
        <div class="content-statistic">
          <div class="title-dash">ข้อมูลประเภทเกษตรกร</div>
          <div class="pie-show">
            <div class="pie-centent">
              <iframe src="pie_chart.php" id="chart" width="95%" height="350" style="border:0" scrolling="no"></iframe>
            </div>
          
          </div>
        </div>
      </div>
      <div class="farmlist ">
        <div class="content-farmlist">
          <div class="title-dash">รายชื่อไร่เกษตรกร</div>
          <div class="farm-show">
          <iframe src="all_farm.php" width="100%" height="340" style="border:0"></iframe>
          </div>
        </div>
      </div>
    </div>


  </div>
        
<?php }?>
   

</section>
  
 <?php
include("footer.php"); 
?>

<script type="text/javascript" src="js/sweet.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/event.js"></script> 
<script src="modules/chartjs/dist/Chart.js"></script>

</body>
</html>