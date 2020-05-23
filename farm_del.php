<?php

$farmId = $_GET['fid'];
include("database/connect.php");
$sql= "DELETE FROM tb_registers WHERE registerId = '$farmId'";
$query = mysqli_query($link, $sql);
header("location:farmlist.php");
?>