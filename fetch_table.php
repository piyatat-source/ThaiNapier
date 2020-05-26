<?php 
include("database/connect.php"); //connect database

$output = '';
$counterb = 1; //counter b
$searchword = $_POST['search'];
$sql = "SELECT * FROM tb_login INNER JOIN tb_members ON tb_login.loginId = tb_members.loginId  WHERE (tb_login.loginUsername LIKE '%".$_POST['search']."%' OR tb_members.memberFirstname LIKE '%".$_POST['search']."%' OR tb_members.memberLastname LIKE '%".$_POST['search']."%' ) AND tb_login.userStatus = 'member'";
$result = mysqli_query($link, $sql);

// Display
if(mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_array($result)) {
        $output .= '
            <tr>
                <td>'.$counterb.'</td>
                <td>'.$row["loginUsername"].'</td>
                <td>'.$row["memberFirstname"]."   ".$row["memberLastname"].'</td>
                <td>
        ';

        $sql2 = "SELECT count(registerId) AS total FROM tb_registers WHERE loginId = $row[loginId]";
        $result2 = mysqli_query($link,$sql2);
        $values = mysqli_fetch_assoc($result2);
        $num_rows = $values['total'];
        $counterb++;
        $output .= '
                '.$num_rows.'
                </td>
                <td>'.$row['date'].'</td>
                <td>
                    <a href="mem_profile.php?lid='.$row['loginId'].'" class="button-view"><i class="fas fa-search"></i> ดูโปรไฟล์</a>
                    <a class="button-del" href="mem_del.php?lid='.$row['loginId'].'"><i class="far fa-trash-alt"></i> ลบ</a>
                </td>
            </tr>
        ';
     }
     echo $output;
} 
else {
    echo '<tr><td colspan="6">ไม่พบ "'.$searchword.'"</td></tr>';
}

?>