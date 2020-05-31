<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>THAINAPIER เว็บไทยเนเปียร์</title>
        <link rel="icon" href="img/iconweb.ico" type="image/ico">
        <!-- <link rel="stylesheet" href="css/mem_profile.css"> -->
        <!-- <link rel="stylesheet" href="css/webstyle.css"> -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/bb7f694074.js"></script>
        <script src= "https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
@import url("https://use.typekit.net/qwg8grf.css");
* {
    padding: 0;
    margin: 0;
    font-size: 16px;
    text-decoration: none;
    list-style: none;
    box-sizing: border-box;
    font-family: ibm-plex-thai, sans-serif;
}

::-webkit-scrollbar {
    width: 15px;
    border-radius:20px;
}

      /* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1; 
}
      
      /* Handle */
::-webkit-scrollbar-thumb {
    background: #888; 
    border-radius: 10px;
    border: 3px solid #f1f1f1;
}

      /* Handle on hover */
::-webkit-scrollbar-thumb:hover {
        background: #555; 
}

.title-register {
  width: 80%;
  margin: auto;
  padding-top: 50px;
  font-weight: 500;
  padding-bottom: 10px;
  color: #111111;
}

.register-detail tr {
  width: 90%;
  text-align: center;
  padding: 10px;
  margin: auto;
}

.register-detail th,
td {
  padding: 10px;
  height:30px
}

table {
  cursor:pointer;
  border-collapse: collapse;
  width: 100%;
  margin: auto;
}

th,
td {
  text-align: center;
  padding: 8px;
  height: 30px;
  font-size: 15px;
  color: #5d5d5d;
  /* text-align: left */
}

tr {
  text-align:center;
  border-bottom: 2px solid #fafafa;
  padding: 0;
}

tr:hover {
  background-color: #f4f4f4;
}

th {
  /* background: #fafafa; */
  border-bottom: 2px solid #fafafa;
  /* color: #636363; */
  color: #ffffff;
  background: #3c8238;
  /* rgba(166,162,249,0) */
    /* background: #a6a2f9; */
    /* background-image: linear-gradient(rgba(82,99,218,1),rgba(166,162,249,1) ); */
  height: 60px;
  text-align: center;
}
th.sticky-header {
  position: sticky;

  top: 0;
  z-index: 10;
  /*To not have transparent background.
  background-color: white;*/
}

@media (max-width: 480px) {
  .eh{
    display:none;
  }

}

    </style>
    </head>
    <body>
       
        <?php
        require_once("database/connect.php");
        ?>

        <section class="content2">

                <!-- <div class="register-page">  -->
                    <?php
                    $count = 1; 
                    $sql_get_register = "SELECT * FROM tb_registers,tb_members where tb_registers.loginId = tb_members.loginId";
                    $query_get_register = mysqli_query($link,$sql_get_register); 
                    $num = mysqli_num_rows($query_get_register);
                    
                    ?>
                    <div class="register-detail">

                    <!-- <div class="sticky">
                        <div class="container-sticky">
                                <div class="type1">
                                  <div class="title-detail"></i> แบบที่ 1 ปลูกโดยใช้น้ำประปา</div>
                                </div>
                                <div class="type2">  
                                  <div class="title-detail"></i> แบบที่ 2 ปลูกโดยใช้น้ำทิ้งจากบ่อปลา</div>
                                </div><br style="clear: both" />
                          </div>
                        </div> -->
                        <!-- class="table-th" -->
                        <table style="width:100%">
                            <tr>
                                <th class="sticky-header" width="15%" text-align= "center">ชื่อไร่</th>
                                <th class="sticky-header eh" width="35%">ที่อยู่ไร่</th>
                                <th class="sticky-header" width="10%">จังหวัด</th>
                                <th class="sticky-header" width="15%">ขนาดพื้นที่</th>
                                <th class="sticky-header" width="25%">เจ้าของไร่</th>
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
                                   
                                    <td text-align="center"><?php echo $result_get_register['farmName'];?></td>
                                    <td style="" class="eh"><?php echo $address;?></td>
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
                                    <td><?php
                                 
                                    $counterb = 1;
                                    
                                     ?>
                                     <?php echo $result_get_register['memberFirstname']." ".$result_get_register['memberLastname'];$counterb++;?>
                                    </td>
                                </tr>
                                <?php $count++; $counterb ++;} ?>
                                    
                        </table>
                        
                    </div>
                <!-- </div> -->
            <!-- <br style="clear: both" /> -->
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script type="text/javascript" src="js/sweet.js"></script>
    </body>
        
</html>