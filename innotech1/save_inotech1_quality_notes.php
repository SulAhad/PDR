<?php
    require('../connect_db.php');
    $date = date("Y-m-d H:i:s");
    $notes = htmlspecialchars($_POST['notes']);
    $user = $_POST['user'];
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO innotech_quality 
      (`id`, `notes`, `name_operator`,
      `date`) 
      VALUES (NULL, '$notes', '$user',
      '$date')");
?>