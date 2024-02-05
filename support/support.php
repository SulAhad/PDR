<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['support'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">

<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container-fluid">
        <fieldset class="form-group border card shadow-sm">
            <?php
                $message = "SELECT COUNT(*) AS visits_count, SUM(CASE WHEN referrer = 'ip_false' THEN 1 ELSE 0 END) AS ip_false_count FROM visitorsKPI WHERE DATE(timeEnter) = CURDATE()";
                $reserve->set_charset("utf8");
                $result = mysqli_query($reserve, $message);
                while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "Количество посещений за сегодня: $row[visits_count]<br>";
                        echo "Количество заблокированных посещений за сегодня: $row[ip_false_count]";
                    }
            ?>
            <div class="table-responsive">
                <table id="myTable" class="table-hover table table-sm ">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>ip_address</th>
                            <th>browser</th>
                            <th>timeEnter</th>
                            <th>referrer</th>
                            <th>language</th>
                            <th>full</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                        $message = "SELECT * FROM visitorsKPI ORDER BY id DESC limit 150";
                        $reserve->set_charset("utf8");
                        $link->set_charset("utf8");
                        $result = mysqli_query($reserve, $message);
                        $i;
                        while ($row = mysqli_fetch_assoc($result))
                        {
                          if($row['referrer'] == 'pass_false/trying to pass'){
                            $i++;
                            $ip_address = $row['ip_address'];
                            $city = '';
                            if (strpos($ip_address, '10.65.32') === 0) {
                                $city = 'Энгельс';
                            } elseif (strpos($ip_address, '10.65.165') === 0) {
                                $city = 'Пермь';
                            }
                            $check_query = "SELECT ip_adress, user_name FROM ip_adress_users WHERE ip_adress = '$ip_address'";
                            $check_result = mysqli_query($link, $check_query);
                            $user_row = mysqli_fetch_assoc($check_result);
                            echo "<tr style='font-size:12px; background:lightyellow;'>";
                            echo "<td>".$row['id']."</td>";
                            if($user_row) {
                                echo "<td>".$user_row['user_name']."</td>";
                            } else {
                                echo "<td>".$row['ip_address']." / ".$city."</td>";
                            }
                            echo "<td>".$row['browser']."</td>";
                            echo "<td>".$row['timeEnter']."</td>";
                            echo "<td>".$row['referrer']."</td>";
                            echo "<td>".$row['language']."</td>";
                            echo "<td>".$row['latitude']."</td>";
                            echo "</tr>";
                          }
                          else{
                            $i++;
                            $ip_address = $row['ip_address'];
                            $city = '';
                            if (strpos($ip_address, '10.65.32') === 0) {
                                $city = 'Энгельс';
                            } elseif (strpos($ip_address, '10.65.165') === 0) {
                                $city = 'Пермь';
                            }
                            $check_query = "SELECT ip_adress, user_name FROM ip_adress_users WHERE ip_adress = '$ip_address'";
                            $check_result = mysqli_query($link, $check_query);
                            $user_row = mysqli_fetch_assoc($check_result);
                            echo "<tr style='font-size:12px; background:lightgreen;'>";
                            echo "<td>".$row['id']."</td>";
                            if($user_row) {
                                echo "<td>".$user_row['user_name']."</td>";
                            } else {
                                echo "<td>".$row['ip_address']." / ".$city."</td>";
                            }
                            echo "<td>".$row['browser']."</td>";
                            echo "<td>".$row['timeEnter']."</td>";
                            echo "<td>".$row['referrer']."</td>";
                            echo "<td>".$row['language']."</td>";
                            echo "<td>".$row['latitude']."</td>";
                            echo "</tr>";
                          }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </body>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
</html>
