<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');

$id = htmlspecialchars($_POST['id']);
$date = htmlspecialchars($_POST['date']);
$plan = htmlspecialchars($_POST['plan']);
$fact = htmlspecialchars($_POST['fact']);
$plan_output_cars = htmlspecialchars($_POST['plan_output_cars']);
$fact_output_cars = htmlspecialchars($_POST['fact_output_cars']);
$comment = htmlspecialchars($_POST['comment']);

// Creating a prepared statement to prevent SQL injection
$stmt = $link->prepare("UPDATE sulfirovanie SET date = ?, plan = ?, fact = ?, plan_output_cars = ?, fact_output_cars = ?, comment = ? WHERE id = ?");
$stmt->bind_param("sssissi", $date, $plan, $fact, $plan_output_cars, $fact_output_cars, $comment, $id);
$stmt->execute();

// Check for success
if ($stmt->affected_rows > 0) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "error" => "Failed to update"));
}

$stmt->close();
$link->close();
?>