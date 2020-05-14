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
    <script type="text/javascript">
        var sessionNum = '<?php echo $session_value;?>';
    </script>

</head>
<body>
<?php
include("header.php"); 
?>


  
  <section class="content"><br>

    <div class="container">
      <div class="img-grass" > <img src="img/img-grass.jpg" alt="" > </div>
      <div class="info-grass1" >
          <div class="title">หญ้าเนเปียร์</div>
          <div class="detail">จัดเป็นหญ้าอาหารสัตว์ที่นิยมปลูกมาก เนื่องจาก ลำต้น และใบมีขนาดใหญ่
                และมีคุณค่างทางอาหารสัตว์สูง รวมถึงสามารถเติบโตเร็ว ให้ผลผลิตต่อไร่สูง 
                สามารถเก็บเกี่ยวต้นได้ตลอดทั้งปีและเก็บเกี่ยวได้นาน 5-7 ปี ต่อการปลูก 1 ครั้ง
                จัดเป็นหญ้าอาหารสัตว์ที่นิยมปลูกมาก เนื่องจาก ลำต้น และใบมีขนาดใหญ่
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
            <div class="mini-img"><img src="img/leaf.png" alt=""></div>
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
            <div class="mini-img"><img src="img/s.png" alt=""></div>
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
            <div class="mini-img"><img src="img/d.png" alt=""></div>
            <div class="infomation">
              <div class="title">ดอก</div>
              <div class="detail">ดอกหญ้าเนเปียร์ออกเป็นช่อ แบบ spike ช่อดอกมีรูปทรงกระบอก สีเหลือง ยาวประมาณ 15-22 เซนติเมตร 
                                  หนาประมาณ 2-3 เซนติเมตร ประกอบด้วยดอกย่อยจำนวนมาก ด้านในดอกมีเกสรตัวเมีย และตัวผู้
              </div> 
            </div>
            <br style="clear: both" />
          </div>

          <div class="box-left">
            <div class="mini-img"><img src="img/seed.png" alt=""></div>
            <div class="infomation">
              <div class="title">ผลและเมล็ด</div>
              <div class="detail">หญ้าเนเปียร์พบติดผลได้น้อยมาก เปลือกผล และเมล็ดมีลักษณะหุ้มติดกันหุ้มติดกัน
              </div> 
            </div>
            <br style="clear: both" />
          </div>
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