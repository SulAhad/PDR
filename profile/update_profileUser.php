<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
    $id_user = htmlspecialchars($_POST['id_user']);
    $access = htmlspecialchars($_POST['access']);
    $surName = htmlspecialchars($_POST['surName']);
    $name = htmlspecialchars($_POST['nameUser']);
    $position = htmlspecialchars($_POST['position']);

    $input_main = htmlspecialchars($_POST['input_main']);
    $input_top5problem = htmlspecialchars($_POST['input_top5problem']);
    $input_inspection = htmlspecialchars($_POST['input_inspection']);
    $input_safety = htmlspecialchars($_POST['input_safety']);
    $input_quality = htmlspecialchars($_POST['input_quality']);
    $input_technology = htmlspecialchars($_POST['input_technology']);
    $input_production = htmlspecialchars($_POST['input_production']);
    $input_sulf = htmlspecialchars($_POST['input_sulf']);
    $input_sirye = htmlspecialchars($_POST['input_sirye']);
    $input_active_water = htmlspecialchars($_POST['input_active_water']);
    $input_support = htmlspecialchars($_POST['input_support']);
    $input_palletizer = htmlspecialchars($_POST['input_palletizer']);
    $input_innotech1 = htmlspecialchars($_POST['input_innotech1']);
    $input_innotech2 = htmlspecialchars($_POST['input_innotech2']);
    $input_innotech3 = htmlspecialchars($_POST['input_innotech3']);
    $input_uva4 = htmlspecialchars($_POST['input_uva4']);
    $input_uva5 = htmlspecialchars($_POST['input_uva5']);
    $input_acma4 = htmlspecialchars($_POST['input_acma4']);
    $input_planing = htmlspecialchars($_POST['input_planing']);
    $input_premirovanie = htmlspecialchars($_POST['input_premirovanie']);
    $input_technical = htmlspecialchars($_POST['input_technical']);
    $link->set_charset("utf8");
    mysqli_query($link, "UPDATE `Users_KPI`
  SET
  `access` = '$access',
  `surName` = '$surName',
  `nameUser` = '$name',
  `position` = '$position',
  `main` = '$input_main',
  `top5problem` = '$input_top5problem',
  `inspection` = '$input_inspection',
  `safety` = '$input_safety',
  `quality` = '$input_quality',
  `technology` = '$input_technology',
  `production` = '$input_production',
  `sirye` = '$input_sirye',
  `active_water` = '$input_active_water',
  `support` = '$input_support',
  `palletizer` = '$input_palletizer',
  `innotech1` = '$input_innotech1',
  `innotech2` = '$input_innotech2',
  `innotech3` = '$input_innotech3',
  `uva4` = '$input_uva4',
  `uva5` = '$input_uva5',
  `acma4` = '$input_acma4',
  `premirovanie` = '$input_premirovanie',
  `sulfirovanie` = '$input_sulf',
  `technical` = '$input_technical',
  `planing` = '$input_planing'
  WHERE id = '$id_user'");
?>
