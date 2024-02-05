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
            <div class="table-responsive">
                <table id="myTable" class="table-hover table table-sm ">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Логин</th>
                            <th>Время входа</th>
                            <th>Посещенные страницы</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $message = "SELECT * FROM users_visit ORDER BY id DESC LIMIT 100";
                        $reserve->set_charset("utf8");
                        $result = mysqli_query($reserve, $message);
                        while ($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                                echo "<td>$row[id]</td>";
                                echo "<td>$row[name]</td>";
                                echo "<td>$row[timeEnter]</td>";
                                echo "<td>$row[pagesVisit]</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </fieldset>
    </body>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
</html>
