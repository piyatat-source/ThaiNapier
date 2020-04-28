<?php

$login_pk = current_login_pk();
$members_pk = current_members_pk();
$registers_pk = current_registers_pk();

function current_login_pk(){
    $link = @mysqli_connect("localhost", "root", "", "thainapier") or die(mysqli_connect_error());
    mysqli_set_charset($link,"utf8");
    $sql = "SELECT AUTO_INCREMENT
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'thainapier'
    AND   TABLE_NAME   = 'tb_login'";
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    return $result["AUTO_INCREMENT"];
 }

 function current_members_pk(){
    $link = @mysqli_connect("localhost", "root", "", "thainapier") or die(mysqli_connect_error());
    mysqli_set_charset($link,"utf8");
    $sql = "SELECT AUTO_INCREMENT
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'thainapier'
    AND   TABLE_NAME   = 'tb_members'";
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    return $result["AUTO_INCREMENT"];
 }

 function current_registers_pk(){
    $link = @mysqli_connect("localhost", "root", "", "thainapier") or die(mysqli_connect_error());
    mysqli_set_charset($link,"utf8");
    $sql = "SELECT AUTO_INCREMENT
    FROM  INFORMATION_SCHEMA.TABLES
    WHERE TABLE_SCHEMA = 'thainapier'
    AND   TABLE_NAME   = 'tb_registers'";
    $query = mysqli_query($link,$sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    return $result["AUTO_INCREMENT"];
 }
    

?>