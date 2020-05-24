<?php 
   include("database/connect.php");
    
    $id = $_GET['lid'];

    $sql = "DELETE tb_login, tb_members, tb_registers 
            FROM tb_login
            LEFT JOIN tb_members ON (tb_members.loginId = '".$id."')
            LEFT JOIN tb_registers ON (tb_registers.loginId = '".$id."')
            WHERE tb_login.loginId = '".$id."'";
    
    if (mysqli_query($link, $sql)) {
        header("location: manage_members.php");
    } else {
        echo "ผิดพลาด";
    }

    mysqli_close($link);
?>