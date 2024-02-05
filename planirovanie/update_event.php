<?php

$link = mysqli_connect('127.0.0.1', 'root', 'root', 'u1851636_default');

$id = mysqli_real_escape_string($link, $_POST['id']);
$avtomat = htmlspecialchars($_POST['res']);
// $format = 3.0;
$date_start = mysqli_real_escape_string($link, $_POST['start']);
// $con = 0;
// $pcs_min = 3.0;
$date_end = mysqli_real_escape_string($link, $_POST['end']);
// $eventColor = 'b';
//  $name = 'Persil';

$link->set_charset("utf8");
$query = "UPDATE plansms
          SET avtomat = '$avtomat',
          -- format = '$format',
          date_start = '$date_start',
          -- con = '$con',
          -- pcs_min = '$pcs_min',
          date_end = '$date_end'
          -- eventColor = '$eventColor',
          -- name = '$name'
          WHERE id = '$id'";

if (mysqli_query($link, $query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($link);
}

mysqli_close($link);
?>