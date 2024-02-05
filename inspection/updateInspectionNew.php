<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $input_date = htmlspecialchars($_POST['input_date']);
    $input_name = htmlspecialchars($_POST['input_name']);
    $input_textForList = htmlspecialchars($_POST['input_textForList']);
    $input_typeSafety = htmlspecialchars($_POST['input_typeSafety']);
    $input_comment = htmlspecialchars($_POST['input_comment']);
    $input_duration = htmlspecialchars($_POST['input_duration']);
    $input_staff = htmlspecialchars($_POST['input_staff']);
    $input_contract = htmlspecialchars($_POST['input_contract']);
    $input_production = htmlspecialchars($_POST['input_production']);
    $input_area = htmlspecialchars($_POST['input_area']);
    $id = htmlspecialchars($_POST['id']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE InspectionList 
      SET date = '$input_date', 
      name = '$input_name',
      textForList = '$input_textForList',
      typeSafety = '$input_typeSafety',
      comment = '$input_comment',
      duration = '$input_duration',
      staff = '$input_staff',
      contract = '$input_contract',
      production = '$input_production',
      area = '$input_area' WHERE id = '$id'");
?>
