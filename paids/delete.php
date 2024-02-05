<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $idUser = htmlspecialchars($_POST['idUser']);
    $avtomat = htmlspecialchars($_POST['avtomat']);
    $sql = "DELETE FROM $avtomat WHERE id = '$idUser'";
    $link->set_charset("utf8");
    mysqli_query($link, $sql);
    // Возвращаем данные в виде JSON-объекта
    echo json_encode(array('idUser' => $idUser));
?>