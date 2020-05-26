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
        include("header.php"); 
        ?>
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