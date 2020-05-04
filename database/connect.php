
<?php
    $link = @mysqli_connect("localhost", "root", "", "thainapier") or die(mysqli_connect_error());
    mysqli_set_charset($link,"utf8");
?>