<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $id = htmlspecialchars($_POST['id']);
    $user = htmlspecialchars($_POST['user']);
    
    $link->set_charset("utf8");
    $message = "SELECT id FROM Top5Problem WHERE user = '$user' AND id = '$id'";
    $result = mysqli_query($link, $message);
    if(mysqli_num_rows($result) > 0)
    {
        echo "true";
    }  
    else
    {
        echo "false";
    }
?>