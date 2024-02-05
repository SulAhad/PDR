<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
// $sql = "CREATE TABLE IF NOT EXISTS `InspectionList` (
//     `id` int(11) NOT NULL AUTO_INCREMENT,
//     `date` date NOT NULL,
//     `name` text NOT NULL,
//     `textForList` text NOT NULL,
//     `typeSafety` text NOT NULL,
//     `comment` text NOT NULL,
//     `intervention1` int(11) NOT NULL,
//     `intervention2` int(11) NOT NULL,
//     `duration` int(11) NOT NULL,
//     `staff` int(11) NOT NULL,
//     `contract` int(11) NOT NULL,
//     `production` text NOT NULL,
//     `area` text NOT NULL,
//     `file` longblob NOT NULL,
//     `user` text NOT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
//mysqli_query($link, $sql);
$user = mysqli_real_escape_string($link, $_POST['user']);
$date = mysqli_real_escape_string($link, $_POST['date']);
$name = mysqli_real_escape_string($link, $_POST['name']);
$textForList = mysqli_real_escape_string($link, $_POST['textForList']);
$comment = mysqli_real_escape_string($link, $_POST['comment']);
$duration = mysqli_real_escape_string($link, $_POST['duration']);
$staff = mysqli_real_escape_string($link, $_POST['staff']);
$contract = mysqli_real_escape_string($link, $_POST['contract']);
$isButton1Pressed = $_POST['isButton1Pressed'];
$isButton2Pressed = $_POST['isButton2Pressed'];
$typeSafety = mysqli_real_escape_string($link, $_POST['typeSafety']);
$production = mysqli_real_escape_string($link, $_POST['production']);
$area = mysqli_real_escape_string($link, $_POST['area']);
$link->set_charset("utf8");

$query = "INSERT INTO inspectionlist 
    (id, 
    date, 
    name, 
    textForList, 
    typeSafety, 
    comment,
    intervention1, 
    intervention2, 
    duration, 
    staff, 
    contract,
    production, 
    area, 
    user) 
    VALUES (NULL, 
    '$date', 
    '$name', 
    '$textForList', 
    '$typeSafety', 
    '$comment',
    '$isButton1Pressed', 
    '$isButton2Pressed', 
    '$duration', 
    '$staff', 
    '$contract', 
    '$production', 
    '$area', 
    '$user')";

mysqli_query($link, $query);
// mysqli_query($link, "INSERT INTO `inspectionnums` 
// (`id`, 
// `intervention1`, 
// `intervention2`, 
// `duration`, 
// `staff`, 
// `contract`) 
// VALUES (NULL,  
// '$intervention1', 
// '$intervention2', 
// '$duration', 
// '$staff', 
// '$contract')");


$id = mysqli_insert_id($link);
echo json_encode(array('id' => $id, 
'date' => $date, 
'name' => $name, 
'textForList' => $textForList, 
'typeSafety' => $typeSafety, 
'comment' => $comment, 
'intervention1' => $isButton1Pressed, 
'intervention2' => $isButton2Pressed, 
'duration' => $duration, 
'staff' => $staff, 
'contract' => $contract, 
'production' => $production, 
'area' => $area));
?>