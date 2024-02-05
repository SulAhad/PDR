<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $input_date = htmlspecialchars($_POST['input_date']);
    $input_description_problem = htmlspecialchars($_POST['input_description_problem']);
    $input_operator = htmlspecialchars($_POST['input_operator']);
    $input_cause = htmlspecialchars($_POST['input_cause']);
    $input_immediate_action = htmlspecialchars($_POST['input_immediate_action']);
    $input_eliminated = htmlspecialchars($_POST['input_eliminated']);
    $input_root_cause = htmlspecialchars($_POST['input_root_cause']);
    $input_action = htmlspecialchars($_POST['input_action']);
    $input_responce = htmlspecialchars($_POST['input_responce']);
    $input_area = htmlspecialchars($_POST['input_area']);
    $input_downtime = htmlspecialchars($_POST['input_downtime']);
    $id = htmlspecialchars($_POST['id']);
    $link->set_charset("utf8");
    $stmt = mysqli_prepare($link, "UPDATE Top5Problem 
      SET date = ?, 
      description_problem = ?,
      operator = ?,
      cause = ?,
      immediate_action = ?,
      eliminated = ?,
      root_cause = ?,
      action = ?,
      responce = ?,
      area = ?,
      downtime = ?
      WHERE id = ?");
    
    mysqli_stmt_bind_param($stmt, "sssssssssssi", $input_date, $input_description_problem, $input_operator, $input_cause, $input_immediate_action, $input_eliminated, $input_root_cause, $input_action, $input_responce, $input_area, $input_downtime, $id);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($link);
?>
