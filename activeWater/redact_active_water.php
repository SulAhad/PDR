<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['active_water'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <style>
       .fontTr
       {
           font-size:12px;
       }
       p{
            margin: 1px;
            margin: 1em;
            font-size:12px;
        }
   </style>
    <body class="container">
        <div class="row card shadow-sm blur">
            <div class="col-md-12">
                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <p style="font-size:22px; border-bottom: 1px solid #f00;">редактирование - <?php echo"$app_names->_active_water"; ?></p>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table id="myTable"class="table-hover table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                      <td colspan="3"><center>Приход, м3</center></td>
                                        <td colspan="3"><center>Остаток, м3</center></td>
                                        <td colspan="3"><center>Использовано вторичной воды, м3</center></td>
                                        <th rowspan="2" style="writing-mode:vertical-rl">Сульфирование</th>
                                        <th rowspan="2" style="writing-mode:vertical-rl">Изменить</th>
                                        <th rowspan="2" style="writing-mode:vertical-rl">Удалить</th>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <td>63 +16 м3</td>
                                        <td>250 м3</td>
                                        <td>75 м3 (ХР)</td>
                                        <td>63 +16 м3</td>
                                        <td>250 м3</td>
                                        <td>75 м3 (ХР)</td>
                                        <td>63 +16 м3</td>
                                        <td>250 м3</td>
                                        <td>75 м3 (ХР)</td>
                                    </th>
                                </tr>
                            </thead>
                            <tbody onload="myFunction()" class="animate-bottom">
                                <?php
                                    $message = "SELECT * FROM Active_water_KPI ORDER BY date DESC";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $date = $row['date'];
                                        $readonly = '';
                                        if (strtotime($date) < strtotime('-5 days')) {
                                            $readonly = 'readonly';
                                        }
                                        echo "<tr >";
                                        $minDate = date('Y-m-d', strtotime('-4 days')); // вычисляем минимальную дату
                                        if ($readonly == '') {
                                            echo "<td><input type='date' class='fontTr redactInput form-control' id='date_water' value='$date' min='$minDate'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w8' value='$row[w8]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w9' value='$row[w9]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w10' value='$row[w10]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w1' value='$row[w1]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w2' value='$row[w2]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w3' value='$row[w3]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w4' value='$row[w4]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w5' value='$row[w5]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w6' value='$row[w6]'></input></td>";
                                            echo "<td><input type='text' oninput='validateInput(this)' class='fontTr redactInput form-control'  min='0' id='w7' value='$row[w7]'></input></td>";
                                            echo "<td><button type='button' class='update_active_water btn btn-outline btn-sm btn-light' title='Изменить' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:13px;'></button></td>";
                                            echo "<td><button type='button' class='delete_active_water btn btn-outline btn-sm btn-light' title='Удалить' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:13px;'></button></td>";
                                        } else {
                                            echo "<td><p> ". date('d.m.Y', strtotime($date)) ."</p></td>";
                                            echo "<td><p>$row[w8]</p></td>";
                                            echo "<td><p>$row[w9]</p></td>";
                                            echo "<td><p>$row[w10]</p></td>";
                                            echo "<td><p>$row[w1]</p></td>";
                                            echo "<td><p>$row[w2]</p></td>";
                                            echo "<td><p>$row[w3]</p></td>";
                                            echo "<td><p>$row[w4]</p></td>";
                                            echo "<td><p>$row[w5]</p></td>";
                                            echo "<td><p>$row[w6]</p></td>";
                                            echo "<td><p>$row[w7]</p></td>";
                                        }
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                            <script>
                                    function validateInput(input) {
                                      var value = input.value;
                                      var regex = /^[0-9.]+$/; // только цифры и точка
                                      if (!regex.test(value)) {
                                        input.value = input.value.replace(/[^0-9.]/g, ''); // удаляем все символы кроме цифр и точки
                                        input.style.backgroundColor = 'lightcoral'; // подсвечиваем красным
                                        $(input).tooltip({ // инициализируем tooltip
                                          show: { effect: "fade", duration: 200 },
                                          hide: { effect: "fade", duration: 200 }
                                        }).tooltip("open"); // открываем tooltip
                                      } else {
                                        var dotCount = (value.match(/\./g) || []).length; // считаем количество точек
                                        if (dotCount > 1) {
                                          input.value = input.value.replace(/\./g, ''); // удаляем все точки кроме первой
                                          input.style.backgroundColor = 'red'; // подсвечиваем красным
                                          $(input).tooltip({ // инициализируем tooltip
                                            show: { effect: "fade", duration: 200 },
                                            hide: { effect: "fade", duration: 200 }
                                          }).tooltip("open"); // открываем tooltip
                                        } else {
                                          input.style.backgroundColor = ''; // сбрасываем цвет
                                          $(input).tooltip("destroy"); // удаляем tooltip
                                        }
                                      }
                                    }
                                    </script>
                        </table>
                    </div>
                </fieldset>
                <script>
$(document).ready
    (function()
        {$(".update_active_water").click
            (function()
        		{
        		    var id_water = $(this).val();
        		    var date_water = $(this).closest("tr").find("#date_water").val();

                    var w1 = $(this).closest("tr").find("#w1").val();
                    var w2 = $(this).closest("tr").find("#w2").val();
                    var w3 = $(this).closest("tr").find("#w3").val();
                    var w4 = $(this).closest("tr").find("#w4").val();
                    var w5 = $(this).closest("tr").find("#w5").val();
                    var w6 = $(this).closest("tr").find("#w6").val();
                    var w7 = $(this).closest("tr").find("#w7").val();
        			$.ajax(
                        {type: 'POST',
                            dataType: 'html',
                            url: '/Engels/activeWater/update_active_water.php',

                            data: ({date_water:date_water,
                                    w1:w1,
                                    w2:w2,
                                    w3:w3,
                                    w4:w4,
                                    w5:w5,
                                    w6:w6,
                                    w7:w7,
                                    id_water:id_water}),
                            success: function(response)
                            {
                                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                var data = JSON.parse(response);}});});});
</script>
                <script>
$(document).ready(function()
{
    $(".delete_active_water").click(function()
    {
        var deleteUser = $(this).val();
        var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
        $.ajax({
        type: 'POST',
        dataType: 'html',
        url: '/Engels/activeWater/deleteRowWater.php',
        data: {idUser: deleteUser},
        success: function(response)
        {
            var data = JSON.parse(response);
            row.remove(); // удаляем строку таблицы
            $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
        }
        });
    });
});
</script>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
