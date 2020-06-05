<?php 
session_start();
error_reporting(0);
$session_value=(isset($_SESSION['Id']))?$_SESSION['Id']:'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
     
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script src= "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">var sessionNum = '<?php echo $session_value;?>';</script>

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
              <li><a href="index.php" class="active">ข้อมูลหญ้าเนเปียร์</a></li>
              <li><a href="planting.php">การเพาะปลูก</a></li>
              <li><a href="research.php">การทดลอง</a></li>
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
  
<a href="javascript:" id="return-to-top" onclick="topFunction()" style="display: none;"><i class="fas fa-chevron-up"></i></a>

  
  <section class="content"><br>

    <div class="container">
      <div class="img-grass" > <img src="img/img-grass.jpg" alt="" > </div>
      <div class="info-grass1" >
          <div class="title">หญ้าเนเปียร์</div>
          <div class="detail">จัดเป็นหญ้าอาหารสัตว์ที่นิยมปลูกมาก เนื่องจาก ลำต้น และใบมีขนาดใหญ่
                และมีคุณค่างทางอาหารสัตว์สูง รวมถึงสามารถเติบโตเร็ว ให้ผลผลิตต่อไร่สูง 
                สามารถเก็บเกี่ยวต้นได้ตลอดทั้งปีและเก็บเกี่ยวได้นาน 5-7 ปี ต่อการปลูก 1 ครั้ง

          </div>
          <div class="list"><ul>
                              <li>วงศ์ : Gramineae</li>
                              <li>ชื่อวิทยาศาสตร์ : Pennisetum purpureum Schumaach</li>
                              <li>ชื่อสามัญ : Napier Grass , Elephant Grass</li>
                              <li>ชื่อท้องถิ่น : หญ้าเนเปียร์</li>
                              <li>ถิ่นกำเนิด : แถบประเทศของแอฟริกา</li>
                            </ul><br><br>
          </div>
      </div>
    </div>
    <br>
  </section>

  <section class="bar-hist">
    <div class="info-grass2">
      <div class="title">ประวัติความเป็นมา</div>
      <div class="detail">หญ้าเนเปียร์มีถิ่นกำเนิดในแถบประเทศของแอฟริกา ปัจจุบันพบปลูกแพร่กระจายทั่วโลกในแถบประเทศอบอุ่น
                      ส่วนประเทศไทยได้นำหญ้าเนเปียร์จากประเทศมาเลเซียเข้ามาปลูกครั้งแรกในปี พ.ศ. 2472 โดย นายอาร์ พี
                      โจนส์ และในช่วงปี พ.ศ. 2504 - 2507 ประเทศไทยได้นำเมล็ดพันธุ์จากต่างประเทศมาปลูกอย่างต่อเนื่อง
                      อาทิ  กรมปศุสัตว์ นำเข้าพันธุ์ลูกผสมจากประเทศอินเดียเข้ามาปลูก</div>
    </div>
  </section>


  <section class="content2"><br>
        <div class="info-grass3">
          <div class="header">ลักษณะทางพฤกษศาสตร์</div>

          
          <div class="box-left">
            <div class="mini-img"><img src="img/e1.jpg" alt=""></div>
            <div class="infomation">
              <div class="title">ใบ</div>
              <div class="detail">ใบหญ้าเนเปียร์ออกเป็นใบเดี่ยว ประกอบด้วยกาบใบที่ห่อหุ้มลำต้น และมีขนเล็กๆ นุ่มมือปกคลุม 
                    โดยตรงรอยต่อระหว่างกาบใบกับแผ่นใบมีลิ้นใบ ถัดมาเป็นแผ่นใบยาว แผ่นใบมีสีเขียวอ่อน 
                    ยาวประมาณ 70-100 เซนติเมตร กว้างประมาณ 2-3 เซนติเมตร แผ่นใบมีเส้นกลางใบขนาดใหญ่
              </div> 
            </div>
            <br style="clear: both" />
          </div>

          
          <div class="box-left">
            <div class="mini-img"><img src="img/e2.jpg" alt=""></div>
            <div class="infomation">
              <div class="title">ลำต้น</div>
              <div class="detail">หญ้าเนเปียร์ เป็นหญ้าที่มีลำต้นขนาดใหญ่ ลำต้นแตกเป็นกอหรือแตกต้นใหม่ได้ ลำต้นมีลักษณะแข็งแรงมีลำต้นสั้นๆ
บางส่วนอยู่ใต้ดิน ลำต้นเหนือดินมีลักษณะทรงกลม และตั้งตรง ขนาดลำต้น 2-2.5 เซนติเมตรสูง 2-6 เมตร 
ลำต้นมีลักษณะเป็นข้อปล้อง ประมาณ 15-20 ข้อ ส่วนรากมีเฉพาะระบบรากฝอยที่แตกออกจากเหง้าจำนวนมาก
              </div> 
            </div>
            <br style="clear: both" />
          </div>


          <div class="box-left">
            <div class="mini-img"><img src="img/e3.jpg" alt=""></div>
            <div class="infomation">
              <div class="title">ดอก</div>
              <div class="detail">ดอกหญ้าเนเปียร์ออกเป็นช่อ แบบ spike ช่อดอกมีรูปทรงกระบอก สีเหลือง ยาวประมาณ 15-22 เซนติเมตร 
                                  หนาประมาณ 2-3 เซนติเมตร ประกอบด้วยดอกย่อยจำนวนมาก ด้านในดอกมีเกสรตัวเมีย และตัวผู้
              </div> 
            </div>
            <br style="clear: both" />
          </div>

          <div class="box-left">
            <div class="mini-img"><img src="img/e4.jpg" alt=""></div>
            <div class="infomation down">
              <div class="title">ผลและเมล็ด</div>
              <div class="detail">หญ้าเนเปียร์พบติดผลได้น้อยมาก เปลือกผล และเมล็ดมีลักษณะหุ้มติดกันหุ้มติดกัน
              </div> 
            </div>
            <br style="clear: both" />
          </div>
         </div>
</section>

<section class="bar-hist">
    <div class="info-grass2">
      <div class="title">เกษตรกรผู้ปลูกหญ้าเนเปียร์</div>
      <div class="detail">ปัจจุบันมีเกษตรกรจำนวนมาก นิยมปลูกหญ้าเนเปียร์เพื่อใช้ทำเป็นอาหารสัตว์ โดยแผนที่ด้านล่างจะแสดงข้อมูลไร่ของเกษตรกรบ้างส่วน ที่ลงทะเบียนกับเรา</div>
      <div class="mapall"><iframe src="all_map.php" width="100%" height="540" style="border:0"></iframe></div>
    </div>
  </section>

 <?php
include("footer.php"); 
  ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="js/sweet.js"></script>
<script src="js/event.js"></script>

</body>
</html>