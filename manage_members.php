
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THAINAPIER เว็บไทยเนเปียร์</title>
    <link rel="icon" href="img/iconweb.ico" type="image/ico">
    <link rel="stylesheet" href="css/webstyle.css">
    <link rel="stylesheet" href="css/tablestyle2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
    

</head>
<body>
<?php
include("header.php"); 
?>
<a href="javascript:" id="return-to-top" onclick="topFunction()" style="display: none;" ><i class="fas fa-chevron-up" ></i></a>

<section class="content bg-gray"><br>


<?php if(!$_SESSION['Level']){ ?>
    <div class="header-form">403 Forbidden </div>
    <div class="warning-login"><p>สิทธิ์ไม่ถูกต้อง กรุณาเข้าสู่ระบบก่อนใช้งาน</p></div>
        <?php }else{ ?>
   <div class="header-form">จัดการข้อมูลสมาชิก </div> 
   <div class="search-group">
   <div class="search-input">
      <!-- <input type="text" class="search-text" name="search_text" id="search_text" placeholder=" ค้นหาชื่อผู้ใช้" > -->
      <div class="input-icons"> 
                <i class="fa fa-search icon"> 
              </i> 
                <input class="input-field" 
                       type="text"
                       name="search_text" 
                       id="search_text"
                       placeholder="ค้นหาชื่อผู้ใช้"> 
            </div>
   </div>      
   </div>
  
   <?php 
              include("database/connect.php");
              $countera = 1;
              $counterb = 1;
              // $id =  $_SESSION['Id']; 
              $sql = "SELECT * FROM tb_login where userStatus = 'member'";
              $query_mobile = mysqli_query($link,$sql); 
              $query_desktop = mysqli_query($link,$sql); 
              $num = mysqli_num_rows($query_mobile);

              ?>


   <!-- TABLE สำหรับ Desktop PC-->
    <div class="table-container">   
          <table>
          <thead>
            <tr>
              <th width="5%">ลำดับ</th>
              <th width="15%">ชื่อผู้ใช้</th>
              <th width="25%">ชื่อ-นามสกุล</th>
              <th width="10%">จำนวนไร่ที่ลงทะเบียน</th>
              <th width="15%">วันที่ลงทะเบียน</th>
              <th width="30%">จัดการข้อมูล</th>
            </tr>
          </thead>
          <tbody id="result">
          </tbody> 

          </table>
    </div>
  <?php } ?>
  <!-- TABLE สำหรับ Mobile-->
    <!-- CARD สำหรับ Mobile -->
   <div class="card-container" id="result2">
     
   </div>

</section>
  
 <?php
include("footer.php"); 
  ?>

<script type="text/javascript" src="js/sweet.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/map-api.js"></script>
<script src="js/event.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="js/mem_manage.js"></script>
</body>
</html>