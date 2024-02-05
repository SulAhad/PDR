<?php
require('../connect_db.php');
$link->set_charset("utf8");

if(isset($_GET['value'])) {
  $selectedValue = $_GET['value'];
  $message = "SELECT xlsa, xlsb, xlsc, xlsd, $selectedValue FROM process_audit_inn1";
  $result = mysqli_query($link, $message);

  $output = "<thead><th>№</th><th>Перечень параметров</th><th>Ед. Измерения</th><th>Лимиты</th><th>Основные параметры</th><th>Введите данные</th></thead><tbody>";
  $i = 0; // Initialize $i
  while ($row = mysqli_fetch_assoc($result)) {
    $i++;
    $output .= "<tr>";
    $output .= "<td>$i</td>";
    $output .= "<td>" . $row['xlsb'] . "</td>";
    $output .= "<td>" . $row['xlsc'] . "</td>";
    $output .= "<td>" . $row['xlsd'] . "</td>";
    $output .= "<td>" . $row[$selectedValue] . "</td>";
    $output .= "<td><input type='text' class='form-control'/></td>";
    $output .= "</tr>";
  }
  $output .= "</tbody>";

  echo $output;
}
?>
