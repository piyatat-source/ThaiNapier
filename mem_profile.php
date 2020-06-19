<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>THAINAPIER เว็บไทยเนเปียร์</title>
        <link rel="icon" href="img/iconweb.ico" type="image/ico">
        <link rel="stylesheet" href="css/mem_profile.css">
        <link rel="stylesheet" href="css/webstyle.css">
        <link rel="stylesheet" href="css/tablestyle.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
        <script src= "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <?php
        session_start();
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
                          <li><a href="dashboard.php" >สถิติข้อมูลการเกษตร</a></li>
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
        <?php
        require_once("database/connect.php");

        $id = $_GET['lid'];

        $sql_get_profile = "SELECT * FROM tb_members where loginId = $id";
        $query_get_profile = mysqli_query($link,$sql_get_profile);
        $result_get_profile = mysqli_fetch_array($query_get_profile);
        ?>

        <section class="content bg-gray">
            <!-- content -->
                <div class="profile-page"> <!-- section profile -->
                    <div class="title-profile"> <!-- title -->
                        <i class="far fa-id-card"></i>&nbsp;ข้อมูลทั่วไป 
                    </div>
                    <div class="card-profile">
                    <div class="farmer-pic"> <!-- farmer picture -->
                        <img src="img/farmer.png" alt="Avatar">
                    </div>
                    <div class="farmer-detail">
                        <div class="show-name">
                            <b>ชื่อจริง - นามสกุล : </b><?php echo $result_get_profile['memberFirstname']." ".$result_get_profile['memberLastname'];?>
                        </div><br>
                        <div class="show-tel">
                            <b>เบอร์โทรติดต่อ : </b> <?php echo $result_get_profile['memberTel'];?>
                        </div><br>
                        <div class="show-address">
                            <b>ที่อยู่ภูมิลำเนา : </b> <?php echo $result_get_profile['memberAddress'];?>
                        </div>
                    </div>
                </div>
                    <br style="clear: both" />
                </div>

                <div class="register-page"> <!-- section register -->
                    <div class="title-register"> <!-- title -->
                        <i class="far fa-edit"></i>&nbsp;ข้อมูลการลงทะเบียนเกษตรกร 
                    </div>
                    <?php
                    $count = 1; 
                    $sql_get_register = "SELECT * FROM tb_registers where loginId = $id";
                    $query_get_register = mysqli_query($link,$sql_get_register); 
                    $num = mysqli_num_rows($query_get_register);
                    ?>
                    <div class="register-detail">

                    
                        <table style="width:80%">
                            <tr>
                                
                                <th width="25%">ชื่อไร่</th>
                                <th width="55%">ที่อยู่ไร่</th>
                                <th width="5%">จังหวัด</th>
                                <th width="10%">ขนาดพื้นที่</th>
                                <th width="5%">ดูแผนที่</th>
                            </tr>
                            <?php 
                            if ($num == 0){
                                echo "<tr><td colspan=\"6\">ไม่พบข้อมูลการลงทะเบียนเกษตร</td></tr>";
                            }

                            while($result_get_register = mysqli_fetch_assoc($query_get_register)){ 
                            $address = $result_get_register['farmHouseNo']
                            ." "."หมู่ ".$result_get_register['farmVillageNo']
                            ." "."หมู่บ้าน".$result_get_register['farmVillage']
                            ." "."ซอย".$result_get_register['farmAlley']
                            ." "."ถนน".$result_get_register['farmRoad']
                            ." "."ตำบล".$result_get_register['farmSubDistric']
                            ." "."อำเภอ".$result_get_register['farmDistrict']
                            ." "."จังหวัด".$result_get_register['farmProvince']
                            ." ".$result_get_register['farmPostNo'];
                            ?>


                                <tr>
                                   
                                    <td><?php echo $result_get_register['farmName'];?></td>
                                    <td style="text-align: left"><?php echo $address;?></td>
                                    <td><?php echo $result_get_register['farmProvince'];?></td>
                                    <td>
                                        <?php 
                                        $area = explode("-", $result_get_register['farmArea']); 
                                        if($area[0]>0){
                                          echo $area[0]." ไร่ ";
                                        }if($area[1]>0){
                                          echo $area[1]." งาน ";
                                        }if($area[2]>0){
                                          echo $area[2]." ตารางวา ";} 
                                        ?>
                                    </td>
                                    <td>
                                        <div class="iconMap">
                                            <a onclick="OpenWindow(<?php echo $result_get_register['registerId'];?>,<?php echo $result_get_register['lat'];?>,<?php echo $result_get_register['lng'];?>)"><i class="fas fa-map-marked-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
            <?php $count++; } ?>
                            
                        </table>
                        
                    </div>
                </div>
            <br style="clear: both" />
        </section><?php
include("footer.php"); 
  ?>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script type="text/javascript" src="js/sweet.js"></script>
        <script type="text/javascript">  
                function OpenWindow(rid,lat,lng) { 
                 window.open('profileMap.php?rid='+rid+'&lat='+lat+'&lng='+lng,'newwindow',
                 config='height=600,width=800,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');
            }
        </script>
    </body>
        
</html>