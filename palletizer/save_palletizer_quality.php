<?php
    require($_SERVER['DOCUMENT_ROOT'].'/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $btnValue = $_POST['btnValue'];
    $user = $_POST['user'];
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO palletizer_quality 
      (`id`, `$btnValue`, `name_operator`,
      `date`) 
      VALUES (NULL, '1', '$user',
      '$date')");
?>