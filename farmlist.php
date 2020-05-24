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
    <script src= "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        var sessionNum = '<?php echo $session_value;?>';
    </script>

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
   <div class="header-form">รายการลงทะเบียนของท่าน </div>
   <?php 
              include("database/connect.php");
              $countera = 1;
              $counterb = 1;
              $id =  $_SESSION['Id']; 
              $sql = "SELECT * FROM tb_registers where loginId = $id";
              $query_mobile = mysqli_query($link,$sql); 
              $query_desktop = mysqli_query($link,$sql); 
              $num = mysqli_num_rows($query_mobile);
              ?>

  <!-- CARD สำหรับ Mobile -->
   <div class="card-container">
    <?php 
      if ($num == 0){
        echo "<tr><td colspan=\"5\">ไม่พบข้อมูลเกษตรของท่าน</td></tr>";
      }

      while($result = mysqli_fetch_assoc($query_mobile))
      { ?>

      <div class="card">
       <div class="card-detail">
          <div class="detail-left">
              <div class="farm-name"><?php echo $result['farmName'];?></div>
              <div class="reg-date-text">วันที่ลงทะเบียน
                <p>14/05/2563</p>
              </div>
          </div>
          <div class="detail-right">
            <div class="area-text">พื้นที่</div>
            <div class="area-value"><?php  
            $area = explode("-", $result['farmArea']); 
                      if($area[0]>0){
                        echo $area[0]." ไร่ ";
                      }if($area[1]>0){
                        echo $area[1]." งาน ";
                      }if($area[2]>0){
                        echo $area[2]." ตารางวา ";} 
                    ?></div>
          </div>
       </div>
       <div class="card-manage">
          <a href="calculating.php?r=<?php echo $area[0];?>&n=<?php echo $area[1];?>&s=<?php echo $area[2];?>&id=<?php echo $result['farmId'];?>" class="button-cal"><i class="fas fa-calculator"></i> คำนวณต้นทุน</a>
          <a href="farm_edit.php?fid=<?php echo $result['registerId'];?>" class="button-edit"><i class="fas fa-pen"></i> แก้ไข</a>
          <a onclick="confirmation(event)" value="<?php echo $result['farmName'];?>" class="button-del" href="farm_del.php?fid=<?php echo $result['registerId'];?>"><i class="far fa-trash-alt"></i> ลบ</a>
       </div>
     </div>
     <?php
      $countera++;
      }
     ?>
   </div>


   <!-- TABLE สำหรับ Desktop PC-->
    <div class="table-container">         
          <table>
            <tr>
              <th width="5%">#</th>
              <th width="15%">ชื่อไร่</th>
              <th width="20%">วันที่ลงทะเบียน</th>
              <th width="20%">พื้นที่การเกษตร</th>
              <th width="40%">การจัดการ</th>
            </tr>
            <?php 
              if ($num == 0){
                echo "<tr><td colspan=\"5\">ไม่พบข้อมูลเกษตรของท่าน</td></tr>";
            }

            while($result = mysqli_fetch_assoc($query_desktop)){ 
              ?>
                
            <tr>
              <td><?php echo $counterb;?></td>
              <td><?php echo $result['farmName'];?></td>
              <td>14/5/2563</td>
              <td><?php  
                      $area = explode("-", $result['farmArea']); 
                      if($area[0]>0){
                        echo $area[0]." ไร่ ";
                      }if($area[1]>0){
                        echo $area[1]." งาน ";
                      }if($area[2]>0){
                        echo $area[2]." ตารางวา ";} 
                    ?>
              </td>
              <td>
                  <a href="calculating.php?r=<?php echo $area[0];?>&n=<?php echo $area[1];?>&s=<?php echo $area[2];?>&id=<?php echo $result['registerId'];?>" class="button-cal"><i class="fas fa-calculator"></i> คำนวณต้นทุน</a>
                  <a href="farm_edit.php?fid=<?php echo $result['registerId'];?>" class="button-edit"><i class="fas fa-pen"></i> แก้ไข</a>
                  <!-- <a href="" id="btn-del" class="button-del"><i class="fas fa-trash"></i> ลบ</a>  -->
                  <a onclick="confirmation(event)" value="<?php echo $result['farmName'];?>" class="button-del" href="farm_del.php?fid=<?php echo $result['registerId'];?>"><i class="far fa-trash-alt"></i> ลบ</a>
              </td>
            </tr>
              <?php
                   $counterb++;
              }
             ?>
            </table>
    </div>
  <?php }?> 
    

</section>
  
 <?php
include("footer.php"); 
?>

<script type="text/javascript" src="js/sweet.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/map-api.js"></script>
<script src="js/event.js"></script> 
</body>
</html>