<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $name = mysqli_real_escape_string($link, $_POST['satisfaction']);
    $color_value = mysqli_real_escape_string($link, $_POST['color_value']);
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE statusforuserscalendar SET $name = '$color_value'
    WHERE id = '$id'");
?>
