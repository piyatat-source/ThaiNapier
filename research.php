<?php 
session_start();
error_reporting(0);
$session_value=(isset($_SESSION['Id']))?$_SESSION['Id']:'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="css/webstyle2.css">
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <!-- <link rel="stylesheet" href="css/webstyle3.css"> -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
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
              <li><a href="research.php" class="active">การทดลอง</a></li>
              <?php if($_SESSION['Level']=="admin"){ ?>
                          <li><a href="dashboard.php" >สถิติข้อมูลการเกษตร</a></li>
              <?php }else{ ?>
                          <li><a href="#" id="btn-reg">ลงทะเบียนเกษตรกร</a></li>
                          <li><a href="../../" >เว็บไซต์หลัก</a></li>
             <?php } ?> 
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


  <section class="contentt">
  <section class="content-article">
    <div class="container-topic"><div class="title-article">
    การผลิตหญ้าอาหารสัตว์โดยใช้น้้าทิ้งจากการเพาะเลี้ยงปลาน้้าจืดในจังหวัดหนองคาย
    </div>
    <div class="line-article"></div>
    <div class="title-article2">
    คู่มือการปลูกหญ้าเนเปียร์ปากช่อง 1 โดย ดร.ไกรลาศ เขียวทอง</div>
    <div class="article">
    
    จากการทดลองผลิตหญ้าอาหารสัตว์โดยใช้น้้าทิ้งจากการเพาะเลี้ยงปลาน้้าจืดในจังหวัดหนองคาย นั้นใน 1 ปีนั้นเราจะได้ผลผลิตจากหญ้าเนเปียร์ 100 ตัน โดยตัดหญ้าเนเปียร์ปีละ 5 รอบ รอบแรกนั้นจะใช้เวลา 75 วัน และต่อจากนั้นให้ตัดทุกๆ 45-60 วัน
    จากการทดลองเราจึงนำกลุ่มทดลองมา 2 วิธีเพื่อให้เห็นความแตกต่างของวิธีการปลูก ได้แก่ ปลูกโดยใช้น้ำประปา และ ปลูกโดยใช้น้ำทิ้งจากบ่อปลา โดยมีวิธีทำและต้นทุนดังนี้
    </div>
  </div>
  </section>
  </section>
  

  
  <div class="sticky">
    <div class="container-sticky">
            <div class="type1">
              <div class="title-detail"></i> แบบที่ 1 ปลูกโดยใช้น้ำประปา</div>
            </div>
            <div class="type2">  
              <div class="title-detail"></i> แบบที่ 2 ปลูกโดยใช้น้ำทิ้งจากบ่อปลา</div>
            </div><br style="clear: both" />
      </div>
    </div>

    <div class="compair">

      <div class="compair-content">
        <div class="title-no">อุปกรณ์เริ่มต้นการปลูก</div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/grass.png" alt=""><div class="txt">ใช้ท่อนพันธุ์ 1600 ท่อน</div><div class="sub-txt"><i class="fas fa-coins"></i> 3,200 บาท</div>
              </div>
          <div class="pair-type2">
          <img src="img/grass.png" alt=""><div class="txt">ใช้ท่อนพันธุ์ 1600 ท่อน</div><div class="sub-txt"><i class="fas fa-coins"></i> 3,200 บาท</div>
          </div>
        </div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/manure.png" alt=""><div class="txt">ใช้ปุ๋ยคอก 2,000 กก.</div><div class="sub-txt"><i class="fas fa-coins"></i> 4,000 บาท</div>
          </div>
          <div class="pair-type2">
            <img src="img/manure.png" alt=""><div class="txt">ใช้ปุ๋ยคอก 2,000 กก.</div><div class="sub-txt"><i class="fas fa-coins"></i> 4,000 บาท</div>
          </div>
        </div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/seed2.png" alt=""><div class="txt">ใช้ปุ๋ยสูตร 15-15-15 ปริมาณ 50 กก.</div><div class="sub-txt"><i class="fas fa-coins"></i> 1,000 บาท</div>
          </div>
          <div class="pair-type2">
          <img src="img/seed2.png" alt=""><div class="txt">ใช้ปุ๋ยสูตร 15-15-15 ปริมาณ 50 กก.</div><div class="sub-txt"><i class="fas fa-coins"></i> 1,000 บาท</div>
          </div>
        </div>

      </div>
      <!-- ---------------------------------------------------------------------------- -->
      <div class="compair-content">
        <div class="title-no">การปลูกรอบที่ 1</div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/seed1.png" alt=""><div class="txt">ใช้ปุ๋ยยูเรีย 20 กก.</div><div class="sub-txt"><i class="fas fa-coins"></i> 400 บาท</div>
          </div>
          <div class="pair-type2">
          <img src="img/seed1.png" alt=""><div class="txt">ใช้ปุ๋ยยูเรีย 10 กก.</div><div class="sub-txt"><i class="fas fa-coins"></i> 200 บาท</div>
          </div>
        </div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/water.png" alt=""><div class="txt">ใช้น้ำประปา 2400 ลบ.ม.</div><div class="sub-txt"><i class="fas fa-coins"></i> 4,800 บาท</div>
          </div>
          <div class="pair-type2">
          <img src="img/water2.png" alt=""><div class="txt">ใช้น้ำทิ้ง 2400 ลบ.ม.</div><div class="sub-txt"><i class="fas fa-coins"></i> 160 บาท</div>
          </div>
        </div>
      </div>
      <br><!-- ---------------------------------------------------------------------------- -->
      <div class="compair-conclude">
        <div class="title-no">สรุปผลการปลูกรอบที่ 1 + อุปกรณ์เริ่มต้นการปลูก</div>


        <div class="pair">
          <div class="pair-type1">
            <img src="img/grass2.png" alt=""><div class="txt">ได้ผลผลิต 20,000 กก.</div>
          </div>

          <div class="pair-type2">
            <img src="img/grass2.png" alt=""><div class="txt">ได้ผลผลิต 14,000 กก.</div>
          </div>
        </div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/money.png" alt=""><div class="txt">มีค่าใช้จ่าย 13,400 บาท</div>
          </div>
          <div class="pair-type2">
          <img src="img/money.png" alt=""><div class="txt">มีค่าใช้จ่าย 8,560 บาท</div>
          </div>
        </div>

      </div>

    <br><br><br>
    
    <!-- ---------------------------------------------------------------------------- -->

      <div class="compair-content">
        <div class="title-no">การปลูกรอบที่ 2-5 <a>(ใช้เพียงปุ๋ยยูเรียและน้ำ)</a></div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/seed1.png" alt=""><div class="txt">ใช้ปุ๋ยยูเรีย 20 กก./รอบ</div><div class="sub-txt"><i class="fas fa-coins"></i> 400 บาท/รอบ</div>
          </div>
          <div class="pair-type2">
          <img src="img/seed1.png" alt=""><div class="txt">ใช้ปุ๋ยยูเรีย 10 กก./รอบ</div><div class="sub-txt"><i class="fas fa-coins"></i> 200 บาท/รอบ</div>
          </div>
        </div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/water.png" alt=""><div class="txt">ใช้น้ำประปา 2400 ลบ.ม/รอบ</div><div class="sub-txt"><i class="fas fa-coins"></i> 4,800 บาท/รอบ</div>
          </div>
          <div class="pair-type2">
          <img src="img/water2.png" alt=""><div class="txt">ใช้น้ำทิ้ง 2400 ลบ.ม./รอบ</div><div class="sub-txt"><i class="fas fa-coins"></i> 160 บาท/รอบ</div>
          </div>
        </div>
      </div>
      <br><!-- ---------------------------------------------------------------------------- -->
      <div class="compair-conclude">
        <div class="title-no">สรุปผลการปลูกรอบที่ 2-5</div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/grass2.png" alt=""><div class="txt">ได้ผลผลิต 20,000 กก./รอบ</div>
          </div>

          <div class="pair-type2">
            <img src="img/grass2.png" alt=""><div class="txt">ได้ผลผลิต 14,000 กก./รอบ</div>
          </div>
        </div>

        <div class="pair">
          <div class="pair-type1">
            <img src="img/money.png" alt=""><div class="txt">มีค่าใช้จ่าย 5,200 บาท/รอบ</div>
          </div>
          <div class="pair-type2">
          <img src="img/money.png" alt=""><div class="txt">มีค่าใช้จ่าย 360 บาท/รอบ</div>
          </div>
        </div>
      </div>
    <br><!-- ---------------------------------------------------------------------------- -->

    <div class="compair-end">
        <div class="title-no">สรุปค่าใช้จ่ายทั้งสิ้น</div>

        <div class="pair">
          <div class="pair-type1">34,200 <div class="sub-txt">บาท/ปี</div></div>
          <div class="pair-type2">10,000 <div class="sub-txt">บาท/ปี</div></div>
        </div>
      </div>
    
    <div class="note-under">
      หมายเหตุ : ค่าน้ำประปาคิดในอัตรา ลูกบาศก์เมตรละ 2บาท
    </div>
    </div>
  

  
  <br>
 <?php
include("footer.php"); 
  ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="js/sweet.js"></script>
<!-- <script src="js/event.js"></script> -->
</body>
</html>