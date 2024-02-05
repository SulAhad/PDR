<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");
    $target_total_water = htmlspecialchars($_POST['target_total_water']);
    $target_production_water = htmlspecialchars($_POST['target_production_water']);
    $target_sulfirovanie_water = htmlspecialchars($_POST['target_sulfirovanie_water']);
    $target_warehouse_water = htmlspecialchars($_POST['target_warehouse_water']);
    $target_utility_water = htmlspecialchars($_POST['target_utility_water']);
    $target_total_energy = htmlspecialchars($_POST['target_total_energy']);
    $target_production_energy = htmlspecialchars($_POST['target_production_energy']);
    $target_sulfirovanie_energy = htmlspecialchars($_POST['target_sulfirovanie_energy']);
    $target_warehouse_energy = htmlspecialchars($_POST['target_warehouse_energy']);
    $target_utility_energy = htmlspecialchars($_POST['target_utility_energy']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `target_energoresurs`
      (`id`,
      `target_total_water`,
      `target_production_water`,
      `target_sulfirovanie_water`,
      `target_warehouse_water`, `target_utility_water`,
      `target_total_energy`,
      `target_production_energy`,
      `target_sulfirovanie_energy`,
      `target_warehouse_energy`, `target_utility_energy`)
      VALUES (NULL,
      '$target_total_water',
      '$target_production_water',
      '$target_sulfirovanie_water',
      '$target_warehouse_water',
      '$target_utility_water',
      '$target_total_energy',
      '$target_production_energy',
      '$target_sulfirovanie_energy',
      '$target_warehouse_energy',
      '$target_utility_energy')");
?>
