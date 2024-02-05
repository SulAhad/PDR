<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $login = htmlspecialchars($_POST['login']);
    $link->set_charset("utf8");
    $message = "SELECT * FROM users_kpi WHERE name = '$login'";
    $link->set_charset("utf8");
    $result =  mysqli_query($link, $message);
    if(mysqli_num_rows($result) > 0)
    {
        echo "false";
    }  
    else
    {
        echo "true";
    }
?>