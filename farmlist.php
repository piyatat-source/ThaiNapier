<?php 
session_start();
$session_value=(isset($_SESSION['Id']))?$_SESSION['Id']:'';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="css/tablestyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    <script type="text/javascript">
        var sessionNum = '<?php echo $session_value;?>';
    </script>

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
   <div class="header-form">รายการลงทะเบียนของท่าน </div>


  <!-- CARD สำหรับ Mobile -->
   <div class="card-container">


     <div class="card">
       <div class="card-detail">
          <div class="detail-left">
              <div class="farm-name">ไร่ปิยากร</div>
              <div class="reg-date-text">วันที่ลงทะเบียน
                <p>14/05/2563</p>
              </div>
          </div>
          <div class="detail-right">
            <div class="area-text">พื้นที่</div>
            <div class="area-value">1 ไร่ 3 งาน 23 ตร.ว</div>
          </div>
       </div>
       <div class="card-manage">
          <a href="#" class="button-cal"><i class="fas fa-calculator"></i> คำนวณต้นทุน</a>
          <a href="#" class="button-edit"><i class="fas fa-pen"></i> แก้ไข</a>
          <a href="#" class="button-del"><i class="fas fa-trash"></i> ลบ</a> 
       </div>
     </div>

     <div class="card">
       <div class="card-detail">
          <div class="detail-left">
              <div class="farm-name">ไร่พรหมพัฒน์</div>
              <div class="reg-date-text">วันที่ลงทะเบียน
                <p>14/05/2563</p>
              </div>
          </div>
          <div class="detail-right">
            <div class="area-text">พื้นที่</div>
            <div class="area-value">3 ไร่ 3 งาน</div>
          </div>
       </div>
       <div class="card-manage">
          <a href="#" class="button-cal"><i class="fas fa-calculator"></i> คำนวณต้นทุน</a>
          <a href="#" class="button-edit"><i class="fas fa-pen"></i> แก้ไข</a>
          <a href="#" class="button-del"><i class="fas fa-trash"></i> ลบ</a> 
       </div>
     </div>

   </div>


   <!-- TABLE สำหรับ Desktop PC-->
    <div class="table-container">
            
          <table>
            <tr>
              <th width="10%">#</th>
              <th width="15%">ชื่อไร่</th>
              <th width="15%">วันที่ลงทะเบียน</th>
              <th width="20%">พื้นที่การเกษตร</th>
              <th width="40%">การจัดการ</th>
            </tr>
            <tr>
              <td>1</td>
              <td>ไร่ปิยากร</td>
              <td>14/5/2563</td>
              <td>1 ไร่ 3 งาน</td>
              <td>
                  <a href="#" class="button-cal"><i class="fas fa-calculator"></i> คำนวณต้นทุน</a>
                  <a href="#" class="button-edit"><i class="fas fa-pen"></i> แก้ไข</a>
                  <a href="#" class="button-del"><i class="fas fa-trash"></i> ลบ</a> 
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>ไร่พรหมพัฒน์</td>
              <td>14/5/2563</td>
              <td>3 ไร่ 1 งาน</td>
              <td>
                  <a href="#" class="button-cal"><i class="fas fa-calculator"></i> คำนวณต้นทุน</a>
                  <a href="#" class="button-edit"><i class="fas fa-pen"></i> แก้ไข</a>
                  <a href="#" class="button-del"><i class="fas fa-trash"></i> ลบ</a>
              </td>
            </tr>
            </table>
</div>
        <?php }?> 
    

    

</section>
  

 <?php
include("footer.php"); 
  ?>

<script type="text/javascript" src="js/sweet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/map-api.js"></script>
<script src="js/event.js"></script> 




 

</body>
</html>