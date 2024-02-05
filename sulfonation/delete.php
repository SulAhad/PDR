<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');

if(isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id']);
    $sql = "DELETE FROM sulfirovanie WHERE id = '$id'";
    $link->set_charset("utf8");
    mysqli_query($link, $sql);
    echo json_encode(array('id' => $id));
} else {
    // Handle the case when 'id' is not set in the POST data
    echo json_encode(array('error' => 'ID not received in POST data'));
}
?>