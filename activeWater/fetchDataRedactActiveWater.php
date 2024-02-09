<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
$today = date('Y-m-d');
if(isset($_SESSION['login']) == "") {
  header('Location: /Engels/bridge.php');
}
$message = "SELECT
SUM(w1) AS w1_total,
SUM(w2) AS w2_total,
SUM(w3) AS w3_total,
SUM(w4) AS w4_total,
SUM(w5) AS w5_total,
SUM(w6) AS w6_total,
SUM(w7) AS w7_total,
SUM(w8) AS w8_total,
SUM(w9) AS w9_total,
SUM(w10) AS w10_total
FROM Active_water_KPI WHERE date = '$date'";
$link->set_charset("utf8");
$result =  mysqli_query( $link,  $message);
        while($row = mysqli_fetch_assoc($result))
        {
          echo"<style>";
          echo"    .input_color{";
          echo"        background: aliceblue;";
          echo"    }";
          echo"</style>";
          echo"    <input value='$row[w2_total]' min='0' type='hidden' id='input_w2' placeholder='' class='form-control border-0'>";
            echo"<tr>";
            echo"    <td>м3, приход</td>";
            echo"    <td><input min='0' type='number' id='w8' placeholder='$row[w8_total]' class='input_color form-control border-0'></td>";
            echo"    <td><input min='0' type='number' id='w9' placeholder='$row[w9_total]' class='input_color form-control border-0'></td>";
            echo"    <td><input min='0' type='number' id='w10' placeholder='$row[w10_total]' class='input_color form-control border-0'></td>";
            echo"    <td rowspan='3'><input style='height:auto;' min='0' type='number' id='w7' placeholder='$row[w7_total]' class='input_color form-control border-0'></td>";
            echo"</tr>";
            echo"<tr>";
            echo"    <td>м3, остаток</td>";
            echo"    <td><input min='0' type='number' id='w1' placeholder='$row[w1_total]' class='input_color form-control border-0'></td>";
            echo"    <td><input min='0' type='number' id='w2' placeholder='$row[w2_total]' class='input_color form-control border-0'></td>";
            echo"    <td><input min='0' type='number' id='w3' placeholder='$row[w3_total]' class='input_color form-control border-0'></td>";
            echo"</tr>";
            echo"<tr>";
            echo"    <td>Использовано вторичной воды, м3</td>";
            echo"    <td><input min='0' type='number' id='w4' placeholder='$row[w4_total]' class='input_color form-control border-0'></td>";
            echo"    <td><input min='0' type='number' id='w5' placeholder='$row[w5_total]' class='input_color form-control border-0'></td>";
            echo"    <td><input min='0' type='number' id='w6' placeholder='$row[w6_total]' class='input_color form-control border-0'></td>";
            echo"</tr>";
        }
?>
