<?php
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $date = date("Y-m-d H:i:s");

    // $target_total_water = htmlspecialchars($_POST['target_total_water']);
    $current_total_water = htmlspecialchars($_POST['current_total_water']);
    // $day_total_water_devide_weight = htmlspecialchars($_POST['day_total_water_devide_weight']);
    $day_total_water = htmlspecialchars($_POST['day_total_water']);
    // $target_production_water = htmlspecialchars($_POST['target_production_water']);
    $current_production_water = htmlspecialchars($_POST['current_production_water']);
    // $day_production_water_devide_weight = htmlspecialchars($_POST['day_production_water_devide_weight']);
    $day_production_water = htmlspecialchars($_POST['day_production_water']);
    // $target_sulfirovanie_water = htmlspecialchars($_POST['target_sulfirovanie_water']);
    $current_sulfirovanie_water = htmlspecialchars($_POST['current_sulfirovanie_water']);
    // $day_sulfirovanie_water_devide_weight = htmlspecialchars($_POST['day_sulfirovanie_water_devide_weight']);
    $day_sulfirovanie_water = htmlspecialchars($_POST['day_sulfirovanie_water']);
    // $target_warehouse_water = htmlspecialchars($_POST['target_warehouse_water']);
    $current_warehouse_water = htmlspecialchars($_POST['current_warehouse_water']);
    // $day_warehouse_water_devide_weight = htmlspecialchars($_POST['day_warehouse_water_devide_weight']);
    $day_warehouse_water = htmlspecialchars($_POST['day_warehouse_water']);
    // $target_utility_water = htmlspecialchars($_POST['target_utility_water']);
    $current_utility_water = htmlspecialchars($_POST['current_utility_water']);
    // $day_utility_water_devide_weight = htmlspecialchars($_POST['day_utility_water_devide_weight']);
    $day_utility_water = htmlspecialchars($_POST['day_utility_water']);

    // $target_total_energy = htmlspecialchars($_POST['target_total_energy']);
    $current_total_energy = htmlspecialchars($_POST['current_total_energy']);
    // $day_total_energy_devide_weight = htmlspecialchars($_POST['day_total_energy_devide_weight']);
    $day_total_energy = htmlspecialchars($_POST['day_total_energy']);
    // $target_production_energy = htmlspecialchars($_POST['target_production_energy']);
    $current_production_energy = htmlspecialchars($_POST['current_production_energy']);
    // $day_production_energy_devide_weight = htmlspecialchars($_POST['day_production_energy_devide_weight']);
    $day_production_energy = htmlspecialchars($_POST['day_production_energy']);
    // $target_sulfirovanie_energy = htmlspecialchars($_POST['target_sulfirovanie_energy']);
    $current_sulfirovanie_energy = htmlspecialchars($_POST['current_sulfirovanie_energy']);
    // $day_sulfirovanie_energy_devide_weight = htmlspecialchars($_POST['day_sulfirovanie_energy_devide_weight']);
    $day_sulfirovanie_energy = htmlspecialchars($_POST['day_sulfirovanie_energy']);
    // $target_warehouse_energy = htmlspecialchars($_POST['target_warehouse_energy']);
    $current_warehouse_energy = htmlspecialchars($_POST['current_warehouse_energy']);
    // $day_warehouse_energy_devide_weight = htmlspecialchars($_POST['day_warehouse_energy_devide_weight']);
    $day_warehouse_energy = htmlspecialchars($_POST['day_warehouse_energy']);
    // $target_utility_energy = htmlspecialchars($_POST['target_utility_energy']);
    $current_utility_energy = htmlspecialchars($_POST['current_utility_energy']);
    // $day_utility_energy_devide_weight = htmlspecialchars($_POST['day_utility_energy_devide_weight']);
    $day_utility_energy = htmlspecialchars($_POST['day_utility_energy']);
    $date = htmlspecialchars($_POST['date']);
    $link->set_charset("utf8");
    mysqli_query($link, "INSERT INTO `energoresurs`
  (`id`,
  `date`,
  -- `target_total_energy`,
  `current_total_energy`,
  -- `day_total_energy_devide_weight`,
  `day_total_energy`,
  -- `target_production_energy`,
  `current_production_energy`,
  -- `day_production_energy_devide_weight`,
  `day_production_energy`,
  -- `target_sulfirovanie_energy`,
  `current_sulfirovanie_energy`,
  -- `day_sulfirovanie_energy_devide_weight`,
  `day_sulfirovanie_energy`,
  -- `target_warehouse_energy`,
  `current_warehouse_energy`,
  -- `day_warehouse_energy_devide_weight`,
  `day_warehouse_energy`,
  -- `target_utility_energy`,
  `current_utility_energy`,
  -- `day_utility_energy_devide_weight`,
  `day_utility_energy`,
  -- `target_total_water`,
  `current_total_water`,
  -- `day_total_water_devide_weight`,
  `day_total_water`,
  -- `target_production_water`,
  `current_production_water`,
  -- `day_production_water_devide_weight`,
  `day_production_water`,
  -- `target_sulfirovanie_water`,
  `current_sulfirovanie_water`,
  -- `day_sulfirovanie_water_devide_weight`,
  `day_sulfirovanie_water`,
  -- `target_warehouse_water`,
  `current_warehouse_water`,
  -- `day_warehouse_water_devide_weight`,
  `day_warehouse_water`,
  -- `target_utility_water`,
  `current_utility_water`,
  -- `day_utility_water_devide_weight`,
  `day_utility_water`)
  VALUES (NULL,
  '$date',
  -- '$target_total_energy',
  '$current_total_energy',
  -- '$day_total_energy_devide_weight',
  '$day_total_energy',
  -- '$target_production_energy',
  '$current_production_energy',
  -- '$day_production_energy_devide_weight',
  '$day_production_energy',
  -- '$target_sulfirovanie_energy',
  '$current_sulfirovanie_energy',
  -- '$day_sulfirovanie_energy_devide_weight',
  '$day_sulfirovanie_energy',
  -- '$target_warehouse_energy',
  '$current_warehouse_energy',
  -- '$day_warehouse_energy_devide_weight',
  '$day_warehouse_energy',
  -- '$target_utility_energy',
  '$current_utility_energy',
  -- '$day_utility_energy_devide_weight',
  '$day_utility_energy',
  -- '$target_total_water',
  '$current_total_water',
  -- '$day_total_water_devide_weight',
  '$day_total_water',
  -- '$target_production_water',
  '$current_production_water',
  -- '$day_production_water_devide_weight',
  '$day_production_water',
  -- '$target_sulfirovanie_water',
  '$current_sulfirovanie_water',
  -- '$day_sulfirovanie_water_devide_weight',
  '$day_sulfirovanie_water',
  -- '$target_warehouse_water',
  '$current_warehouse_water',
  -- '$day_warehouse_water_devide_weight',
  '$day_warehouse_water',
  -- '$target_utility_water',
  '$current_utility_water',
  -- '$day_utility_water_devide_weight',
  '$day_utility_water')");
?>
