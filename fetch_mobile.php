<?php 
include("database/connect.php"); //connect database

$output = '';
$countera = 1; //counter b
$searchword = $_POST['search'];
$sql = "SELECT * FROM tb_login INNER JOIN tb_members ON tb_login.loginId = tb_members.loginId  WHERE (tb_login.loginUsername LIKE '%".$_POST['search']."%' OR tb_members.memberFirstname LIKE '%".$_POST['search']."%' OR tb_members.memberLastname LIKE '%".$_POST['search']."%' ) AND tb_login.userStatus = 'member'";
$result2 = mysqli_query($link, $sql);

// Display
if(mysqli_num_rows($result2) > 0) {
     while($row = mysqli_fetch_array($result2)) {
        $output .= '
        <div class="card" id="result2">
        <div class="card-detail">
        <div class="detail-left">
            <div class="member-name">'.$row["loginUsername"].'</div>

        ';

        $sql2 = "SELECT count(registerId) AS total FROM tb_registers WHERE loginId = $row[loginId]";
        $result3 = mysqli_query($link,$sql2);
        $values = mysqli_fetch_assoc($result3);
        $num_rows = $values['total'];
        $countera++;
        $output .= '
        <div class="reg-date-text">วันที่ลงทะเบียน
        <p>'.$row['date'].'</p>
      </div>
     
  </div>
  <div class="detail-right">
      
  <div class="Num-Farm">จำนวนไร่ที่ลงทะเบียน
     <p>'.$num_rows.'
     </p>
     </div>
 </div>
</div>

<div class="card-manage">
       <div class="manage-left"><div></div></div>
       <div class="manage-right">
       <a href="mem_profile.php?fid='.$row['loginId'].'" class="button-view"><i class="fas fa-search"></i> ดูโปรไฟล์</a>
       <a class="button-del" href="mem_del.php?lid='.$row['loginId'].'"><i class="far fa-trash-alt"></i> ลบ</a>
            </div>
       </div>
     </div>
     </div>
        ';
     }
     echo $output;
} 
else {
    echo '<div class="card-container"> ไม่พบ "'.$searchword.'"</div>';
}
?>