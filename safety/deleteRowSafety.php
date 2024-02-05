<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $idUser = htmlspecialchars($_POST['idUser']);
    $sql = "DELETE FROM `Safety_KPI` WHERE id = '$idUser'";
    $link->set_charset("utf8");
    mysqli_query($link, $sql);
    // Возвращаем данные в виде JSON-объекта
    echo json_encode(array('idUser' => $idUser));
?>