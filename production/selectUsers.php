<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$message = "SELECT * FROM operator;";
$link->set_charset("utf8");
$result = mysqli_query($link, $message);
echo "<option value=''></option>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}
?>