<?php 
session_start();
error_reporting(0);
$session_value=(isset($_SESSION['Id']))?$_SESSION['Id']:'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>THAINAPIER เว็บไทยเนเปียร์</title>

    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="css/webstyle2.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script src= "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        var sessionNum = '<?php echo $session_value;?>';
    </script>
<style>

.container-ontop {
    max-width: 85%;
    margin: 0 auto;
    /* background: salmon; */
}
.title-head {
    border-radius:15px;
    padding:10px;
    background: #57982c;
}
.title-head .title{
    color:white;
}


.info-ontop {
    /* float: right; */
    display: inline;
    padding-left: 30px;
    float: left;
    margin: 0 auto;
    width: 100%;
    /* background: yellow; */
}
.info-ontop .title {
  text-align:center;
    font-weight: 900;
    font-size: 24px;
    color: #1b1b1b;
    /* background: red; */
}
.info-ontop .detail {
    text-align:left;
    margin-top: 15px;
    color: #656565;
    /* background: white; */
}
@media (max-width: 968px){
  .info-ontop .title {
  text-align:left;
}

.title-head .title{
  text-align:center;
}

.container-ontop div {
    float: none;
}
}
</style>
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
              <li><a href="planting.php" class="active" >การเพาะปลูก</a></li>
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


<a href="javascript:" id="return-to-top" onclick="topFunction()" style="display: none;" ><i class="fas fa-chevron-up" ></i></a>
 <br>
  <section class="content">
    <div class="container">
    <div class="info-grass1" >
    <div class="title-head">
    <div class="title" style="font-weight:600">หญ้าเนเปียร์ปากช่อง 1</div>
    </div>
    <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    ในส่วนของหน้านี้จะเป็นการอธิบายการปลูกหญ้าเนเปียร์ปากช่อง 1 หญ้าเนเปียร์ปากช่อง 1 เป็นหญ้าเนเปียร์ลูกผสมสายพันธุ์หนึ่ง ซึ่งเกิดจากการผสมข้ามระหว่างหญ้าเนเปียร์ยักษ์และหญ้าไข่มุก
    โดยที่หญ้าเนเปียร์ปากช่อง 1 นั้น ใบมีขนน้อย ไม่คันเมื่อสัมผัส ไม่มีโรคและแมลงรบกวน ให้ผลผลิตต่อไร่สูง
ให้ผลผลิตตลอดทั้งปีมีปริมาณน้ำตาลในใบและลำต้นสูง ปลูกครั้งเดียวเก็บเกี่ยวต่อเนื่องได้นาน 8-9 ปี</div>
    <!-- </div> -->
    
    <div class="title"><br>พื้นที่ปลูกที่เหมาะสม</div>
           <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           ปลูกได้ทั่วทุกภาคของประเทศไทย เจริญเติบโตได้ดีในดินหลายประเภท ไม่ว่าจะเป็นดินร่วนปนทราย ดินเหนียว หรือดินลูกรัง ชอบดินที่มีการระบายน้ำดีและมีความอุดมสมบูรณ์ ทนแล้ง แต่ไม่ทนน้ำท่วมขัง ต้องการน้ำฝน ประมาณ 1,000 มิลลิเมตร/ปีเมื่อเปรียบเทียบกับอ้อยที่ต้องการน้ำฝน 1,200-1,500 มิลลิเมตร/ปี
          </div>
          
      </div>
      <div class="img-show" > <img src="img/planting1.jpg" alt="" > </div>
    </div>
  </section>

<section class="bar-hist">
<section class="content2">
    <div class="container"><br>
      <div class="img-grass" > <img src="img/planting4.jpg" alt="" > </div>
      
      <div class="info-grass1" >
      
      <div class="title2">การให้น้ำ</div>
      <div class="detail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          หญ้าเนเปียร์สายพันธุ์นี้ตอบสนองต่อการให้น้ำได้ดีมาก ถ้าสามารถวางระบบการให้น้ำในแปลงปลูกได้จะมีการเจริญเติบโต และให้ผลผลิตสูงต่อเนื่องตลอดทั้งปีการให้น้ำสามารถให้ได้หลายระบบ เช่น สปริงเกิ้ลน้ำเหวี่ยง มินิสปริงเกิ้ล ท่อน้ำหยดเทปน้ำพุ่ง หรือปล่อยไหลไปตามร่องหน้าดิน
          </div>
         
          <div class="detail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          การให้น้ำแบบระบบน้ำหยดหากสามารถใส่ปุ๋ยไปพร้อมกับน้ำได้เลย จะยิ่งช่วยประหยัดเวลา และทําให้การใส่ปุ๋ยได้ผลดีมากขึ้น พบว่าการให้น้ำแบบระบบสปริงเกิ้ลเหวี่ยง และ มินิสปริงเกิ้ล ทุกๆ 3-5 วัน หรือปล่อยน้ำไหลไปตามร่องหน้าดินทุกๆ 7-10 วัน ทําให้หญ้าสามารถให้ผลผลิตได้ตลอดทั้งปี
          </div>
      </div>
    </div>
  </section>
  </section>
  <br>
  <section class="content2">
    <div class="container">
    <div class="info-grass1" >
    <div class="title">การเตรียมดิน</div>
           <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           ในพื้นที่ที่มีการปลูกพืชชนิดอื่นมาเป็นเวลานานและมีเครื่องจักรกลเข้าทํางานในแปลงบ่อย ๆ ทําให้เกิดการอัดตัวของดินจนเป็นชั้นดินดานแข็งล่างควรมีการไถระเบิดชั้นดินดาน ซึ่งไถดินได้ลึกไม่ต่ำกว่า 40 เซนติเมตรจะช่วยให้รากหญ้าที่ปลูกหยั่งลงไปในดินได้ลึกยิ่งขึ้น ทําให้หญ้าสามารถใช้น้ำใต้ดินได้อย่างเต็มที่ นอกจากนี้พบว่าดินด้านบนมักจะแน่นมาก มีผลให้ปัจจัยในดินที่จําเป็นสำหรับการเจริญเติบโตของหญ้าที่ปลูกซึ่งได้แก่ น้ำ อากาศ และอินทรียวัตถุอยู่ในสัดส่วนที่ไม้เหมาะสม
          </div>
          <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          หญ้าเนเปียร์สายพันธุ์นี้เป็นพืชที่ปลูกเพียงครั้งเดียว สามารถไว้ตอ และเก็บเกี่ยวผลผลิตได้ต่อเนื่องนาน 6-7 ปี โดยไม่ต้องปลูกใหม่ การเตรียมดินสำหรับปลูกมีหลักการสําคัญคือ ต้องไถดินให้ลึกมากที่สุดเท่าที่จะทําได้ โดยเฉพาะในกรณีที่ปลูกปลายฝน แต่ถ้าปลูกต้นฤดูฝนก็ไม่จำเป็นต้องไถให้ดินแตกมากนัก การไถดินแตกละเอียดเกินไป จะทําให้หน้าดินเกาะกันเป็นแผ่นเมื่อฝนตก มักเกิดการไหลบ่าท่วมผิวดินมากขึ้นและน้ำซึม ลงใต้ดินได้น้อยลง
          </div>
      </div>
      
      <div class="img-show" > <img src="img/planting2.jpg" alt="" > </div>
    </div>
  </section>

<section class="content2">
    <div class="container">
      <div class="img-grass" > <img src="img/planting3.jpg" alt="" > </div>
      
      <div class="info-grass1" >
      <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           เครื่องมือประกอบการไถเตรียมดินที่ใช้กันมาก คือ ไถจาน ทั้งแบบ 4 จานและ 7 จาน หรือไถหัวหมู การใช้ไถจานจะสามารถไถกลบดินได้ดี แต่มักมีปัญหาสําคัญอยู่ที่ไถดิน ได้ตื้นกว่าไถหัวหมู หากมีตอไม้ หิน และกรวดจะทําให้เครื่องมือเสียหายง่ายและมักเสียเวลาทํางานมาก ก่อนการไถเตรียมดินควรเก็บ กรวด หิน และตอไม้ออกจากแปลงเพื่อลดความเสียหายที่จะเกิดขึ้นกับเครื่องมือ
          </div>
         
          <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           การเตรียมดินและการปรับปรุงคุณสมบัติทางกายภาพของดินจึงเป็นสิ่งจําเป็นโดยการไถพรวนที่เหมาะสม และการเติมอินทรียวัตถุลงในดิน เพื่อช่วยให้ดินร่วนซุยขึ้นอินทรียวัตถุที่ใช้เติมลงในแปลปลูกมีหลายชนิด เช่น ปุ๋ยคอก ปุ๋ยหมัก ปุ๋ยพืชสดกากตะกอนของบ่อแก๊สชีวภาพจากโรงงานอุตสาหกรรมเกษตร อัตราปุ๋ยคอกและปุ๋ยหมักที่แนะนํา 2,000 กิโลกรัม/ไร่ หรือใส่ปุ๋ยรองพื้นโดยใช้ปุ๋ยเคมีสูตร 15-15-15อัตรา 50 กิโลกรัม/ไร่
          </div>
      </div>
    </div>
  </section>

  <section class="content2">
    <div class="container">
    <div class="info-grass1" >
    <div class="title">การกําจัดวัชพืช</div>
           <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           วัชพืชเป็นปัญหาอย่างหนึ่งที่มีความสําคัญและส่งผลให้ผลผลิตของหญ้าเนเปียร์สายพันธุ์นี้ลดลงเป็นอันมาก ควรจะมีการกําจัดวัชพืชตั้งแต่ยังมีขนาดเล็กอยู่เพราะวัชพืชอายุมากความยุ่งยากในการกําจัดก็เพิ่มสูงขึ้นเรื่อย ๆ และทําให้ผลผลิตลดลง ให้กําจัดวัชพืชครั้งแรก หลังจากปลูกประมาณ 2-3 สัปดาห์ โดยใช้แรงงานคนแรงงานสัตว์ หรือเครื่องจักรกลเกษตร การใช้แรงงานคนเป็นวิธีที่ใช้กันอยู่ทั่วไป ได้แก่ใช้มือถอน หรือใช้จอบถาก
          </div>
          <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          วิธีนี้เหมาะสมสำหรับเกษตรกรที่มีพื้นที่ปลูกน้อยๆแต่ในพื้นที่ขนาดใหญ่อาจจะทําได้ช้า ไม่ทันเวลากับการเติบโตของหญ้าที่ปลูก ส่วนการใช้แรงงานสัตว์นั้นเป็นการใช้วัวควายลากไถ เพื่อพรวนดินและกําจัดวัชพืช วิธีนี้สะดวกกว่าแรงคน และควรทําในขณะที่วัชพืชไม่โตจนเกินไป อย่างไรก็ตามการใช้แรงงานสัตว์จะมีความสะดวกบนดินเนื้อหยาบหรือดินเนื้อทรายมากกว่าดินเหนียวในทางปฏิบัติมักทําควบคู่ไปกับการใช้แรงงานคน โดยใช้จอบถากวัชพืชที่อยู่ใกล้บริเวณต้นหญ้าที่ปลูก
          </div>
      </div>
      
      <div class="info-grass1" >
          <div class="detail"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          การปลูกที่มีพื้นที่ขนาดใหญ่อาจใช้เครื่องจักรกลเกษตร เช่นรถไถดินเดินตาม หรือแทรกเตอร์ขนาดใหญ่ติดเครื่องมือพรวน (จอบหมุนตีนเปิดหรือคราดสปริง) เข้ากําจัดวัชพืชโดยวิ่งไประหว่างแถวหญ้าที่ปลูก ส่วนใหญ่จะกําจัดวัชพืชแค่ครั้งเดียว
          </div>
          <div class="detail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          หลังจากกําจัดวัชพืชให้ใส่ปุ๋ยยูเรีย (46-0-0) กอละ 1 ช้อนโต๊ะ เร่งให้หญ้าตั้งตัวและเจริญเติบโตเร็ว แตกกอดี ใบเขียวเข้มดกงาม ลำต้นสูงใหญ่ ทําให้คลุมวัชพืชที่เกิดขึ้นอีกในแปลงได้ ซึ่งวัชพืชจะชะงักการเจริญเติบโตและตายไป
          </div>
      </div>
    </div>
  </section>



  <section class="bar-hist">
  <section class="content2">
    <div class="container">
      <div class="info-grass1" >
        <div class="title2">การปลูก</div><br>
            <div class="detail2">ทําได้โดยใช้แรงงานคน หรือปลูกด้วยเครื่องปลูก<br>– สำหรับการปลูกพื้นที่ขนาดเล็กและใช้แรงงานคน<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ภายหลังจากที่เตรียมดินเสร็จ เพื่อป้องกันการสูญเสียความชื้นจากดินควรปลูกทันที ต้นพันธุ์ที่เตรียมไว้ให้ตัดเป็นท่อนๆ ให้มีข้อติดอยู่ท่อนละ 2 ข้อ นําไปปลูกโดยใช้ระยะปลูกระหว่างแถว 120 เซนติเมตร ระหว่างต้น 80 เซนติเมตร ปลูกหลุมละ 2 ท่อนปักไขว้ท่อนพันธุ์เอียง 30 องศา ให้ 1 ข้อจมอยู่ในดินประมาณ 1-2 นิ้ว
            <br>– การยกร่องปลูกหรือปลูกแบบอ้อย<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            เป็นวิธีการปลูกอีกวิธีหนึ่งที่ช่วยการปฏิบัติงานสะดวกมากขึ้น ทั้งในการปลูกการให้น้ำ และการระบายน้ำ ซึ่งจะช่วยให้รากสามารถหยั่งลึกลงไปในดินได้ดี
            การยกร่องควรวางแนวร่อง ขวางแนวลาดเอียงของพื้นที่ เพื่อลดการพัดพาของดินเนื่องจากน้ำและทําให้น้ำซึมลงดินได้ดีขึ้น การปลูกปลายฝนต้องไถให้ลึกและยกร่องให้สูง
            </div>
            <!-- <div class="detail2">– การยกร่องปลูกหรือปลูกแบบอ้อย<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            เป็นวิธีการปลูกอีกวิธีหนึ่งที่ช่วยการปฏิบัติงานสะดวกมากขึ้น ทั้งในการปลูกการให้น้ำ และการระบายน้ำ ซึ่งจะช่วยให้รากสามารถหยั่งลึกลงไปในดินได้ดี
            </div> -->
          </div>
        <!-- <div class="img-show" > <img src="img/planting5.jpg" alt="" > </div> -->
        <div class="info-grass1" >
        <div class="title2"></div>
          <div class="detail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             ภายหลังจากการยกร่องเสร็จควรปลูกทันที อย่าเปิดร่องไว้นานเพื่อป้องกันการสูญเสียความชื้นจากดิน การปลูกลึกจะช่วยให้ทนแล้งได้ดี ผลผลิตสูงและไว้ตอ ได้นานกว่าการปลูกตื้น การปลูกโดยการยกร่องปลูก ระยะร่องห่างกันประมาณ 85 เซนติเมตร นําต้นพันธุ์ทั้งลำวางลงในร่องลำต่อลำ แล้วใช้มีดสับให้ลำต้นขาดออกจากกัน ภายหลังจากวางต้นพันธุ์เรียบร้อยแล้ว ควรกลบดินให้มีความหนาพอประมาณ ถ้าปลูกข้ามแล้งจะต้องกลบดินให้หนากว่าการปลูกต้นฝน
            </div>
          </div>
        
      </div>
    </div>
    <div class="container">
          <!-- <div class="info-grass1" >
          <div class="detail2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            การยกร่องควรวางแนวร่อง ขวางแนวลาดเอียงของพื้นที่ เพื่อลดการพัดพาของดินเนื่องจากน้ำและทําให้น้ำซึมลงดินได้ดีขึ้น การปลูกปลายฝนต้องไถให้ลึกและยกร่องให้สูง ภายหลังจากการยกร่องเสร็จควรปลูกทันที อย่าเปิดร่องไว้นานเพื่อป้องกันการสูญเสียความชื้นจากดิน การปลูกลึกจะช่วยให้ทนแล้งได้ดี ผลผลิตสูงและไว้ตอ ได้นานกว่าการปลูกตื้น การปลูกโดยการยกร่องปลูก ระยะร่องห่างกันประมาณ 85 เซนติเมตร นําต้นพันธุ์ทั้งลำวางลงในร่องลำต่อลำ แล้วใช้มีดสับให้ลำต้นขาดออกจากกัน ภายหลังจากวางต้นพันธุ์เรียบร้อยแล้ว ควรกลบดินให้มีความหนาพอประมาณ ถ้าปลูกข้ามแล้งจะต้องกลบดินให้หนากว่าการปลูกต้นฝน
            </div>
          </div> -->
          
          <div class="info-grass1" >
            <div class="detail2">- การปลูกในพื้นที่ขนาดใหญ่อาจปลูกโดยใช้เครื่องปลูก<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            ซึ่งสามารถปลูกได้รวดเร็วและสม่ำเสมอ เครื่องปลูกสามารถทํางานได้หลายอย่างคือเริ่มตั้งแต่เป็ดร่อง ตัดต้นพันธุ์ทั้งลำออกเป็นท่อน วางท่อนพันธุ์ ใส่ปุ๋ยและกลบในเวลา 1 ชั่วโมงสามารถปลูกได้ประมาณ 3-4 ไร่ การปลูกอาจมีวิธีการปลูก ระยะปลูก และอัตราปลูกแตกต่างกันไป ขึ้นอยู่กับความพร้อมของเกษตรกร สภาพแวดล้อม พื้นที่ปลูก และความสะดวกในการใช้เครื่องมือปลูก ช่วงแรกของการปลูก ท่อนพันธุ์ต้องการน้ำมาก ควรรดน้ำให้ชุ่มทุกวัน จะทําให้อัตรางอกดี แต่อย่าให้น้ำท่วมขังแปลงปลูก จะทําให้ท่อนพันธุ์เน่าและตายได้
            </div>
          </div>
      </div>
    </div>
  </section>
  </section>

  <section class="content2"><br>
        <div class="info-grass3">
          <div class="box-left">
          <div class="infomation">
              <div class="title">การเตรียมวัสดุปลูก</div>
              <div class="detail">การเตรียมต้นพันธุ์สำหรับปลูกนับว่าเป็นขั้นตอนหนึ่ง ที่มีผลต่อความสำเร็จหรือล้มเหลวของการปลูกหญ้าเนเปียร์สายพันธุ์นี้ ต้นพันธุ์ที่ใช้ควรมาจากแปลงเพาะพันธุ์ที่มีความสมบูรณ์แข็งแรงและท่อนพันธุ์ต้องมีตาที่สมบูรณ์ท่อนพันธุ์ควรอายุประมาณ 3-4 เดือน
              </div>
            </div>
            <br style="clear: both" />
          </div>

          <div class="box-left">
            <div class="infomation">
              <div class="title">ช่วงเวลาปลูก</div>
              <div class="detail">
              ในเขตชลประทานหรือเขตที่ทําการให้น้ำได้ สามารถปลูกได้ตลอดทั้งปีส่วนการปลูกในเขตอาศัยน้ำฝนควรปลูกต้นฤดูฝน ประมาณเดือนพฤษภาคมถึงกรกฎาคม
              </div> 
            </div>
            <br style="clear: both" />
          </div>

          <div class="box-left">
          <div class="infomation">
              <div class="title">การใส่ปุ๋ยหลังเก็บเกี่ยวผลผลิต</div>
              <div class="detail">
              หลังการตัดหญ้าทุกครั้งให้ใส่ปุ๋ยคอกและปุ๋ยยูเรีย เพื่อหญ้าแตกกอมากได้ขนาดลำต้นใหญ่อวบ ใบดกเขียวเข้มงาม ทําให้ผลผลิตสูง และมีโปรตีนสูงสม่ำเสมอ สำหรับปุ๋ยยูเรียให้ใส่หลังจากหน่อใหม่ที่แตกจากใต้ดินโผล่ขึ้นมา ประมาณ 2 สัปดาห์โดยใส่กอละ 1 ช้อนโต๊ะ เมื่อเก็บเกี่ยวไปครบ 3 รอบ ถ้าจะให้ดีควรสลับมาให้ปุ๋ยสูตร15-15-15 แทนปุ๋ยยูเรียบ้าง ทั้งนี้เพื่อรักษาความสมดุลของธาตุอาหารหลักในแปลงหญ้าการใส่ปุ๋ยคอกควรใส่ประมาณครึ่งบุ่งกี๋โปะลงไปที่โคนกอ ไม่ว่าจะเป็นในรูปสดหรือแห้ง แล้วรีบให้น้ำทันที หรือทําบ่อเกรอะรองรับขี้วัวและน้ำฉีดล้างคอกให้ไหลมารวมกัน แล้วสูบไปรดแปลงหญ้าโดยตรงเลยก็ได้
              </div> 
            </div>
            <div class="mini-img"></div>
            <br style="clear: both" />
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