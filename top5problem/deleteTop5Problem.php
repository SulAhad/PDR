<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $idUser = htmlspecialchars($_POST['idUser']);
    $user = htmlspecialchars($_POST['user']);
    
    $link->set_charset("utf8");
    $message = "SELECT id FROM Top5Problem WHERE user = '$user' AND id = '$idUser'";
    $result = mysqli_query($link, $message);
    if(mysqli_num_rows($result) > 0)
    {
        $sql = "DELETE FROM `Top5Problem` WHERE id = '$idUser' ";
        $link->set_charset("utf8");
        mysqli_query($link, $sql);
        // Возвращаем данные в виде JSON-объекта
        echo "true";
    }  
    else
    {
        echo "false";
    }
    
    
    
?>