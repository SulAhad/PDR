<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['sirye'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            th{
                text-align: center;
            }
            .fontTr{
                font-size:12px;
            }
            p{
                margin: 1px;
                margin: 1em;
                font-size:12px;
            }
        </style>
    </head>
    <body class="container-fluid">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12 mb-4">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <p style="font-size:22px; border-bottom: 1px solid #f00;">редактирование - Сырьё</p>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table id="myTable" class="table-hover table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Дата</th>
                                    <th colspan="4">Брак СМС</th>
                                    <th colspan="4">Брак Сульф</th>
                                    <th colspan="4">Брак Сульф Раствор</th>
                                    <th colspan="4">Изолятор</th>
                                    <th colspan="4">Пыль</th>
                                    <th colspan="4">Отсев</th>
                                    <th rowspan="2" style="writing-mode:vertical-rl">Изменить</th>
                                    <th rowspan="2" style="writing-mode:vertical-rl">Удалить</th>
                                </tr>
                                <tr>
                                    <th style="writing-mode:vertical-rl">Было</th>
                                    <th style="writing-mode:vertical-rl">Приход</th>
                                    <th style="writing-mode:vertical-rl">Расход</th>
                                    <th style="writing-mode:vertical-rl">Остаток</th>

                                    <th style="writing-mode:vertical-rl">Было</th>
                                    <th style="writing-mode:vertical-rl">Приход</th>
                                    <th style="writing-mode:vertical-rl">Расход</th>
                                    <th style="writing-mode:vertical-rl">Остаток</th>

                                    <th style="writing-mode:vertical-rl">Было</th>
                                    <th style="writing-mode:vertical-rl">Приход</th>
                                    <th style="writing-mode:vertical-rl">Расход</th>
                                    <th style="writing-mode:vertical-rl">Остаток</th>

                                    <th style="writing-mode:vertical-rl">Было</th>
                                    <th style="writing-mode:vertical-rl">Приход</th>
                                    <th style="writing-mode:vertical-rl">Расход</th>
                                    <th style="writing-mode:vertical-rl">Остаток</th>

                                    <th style="writing-mode:vertical-rl">Было</th>
                                    <th style="writing-mode:vertical-rl">Приход</th>
                                    <th style="writing-mode:vertical-rl">Расход</th>
                                    <th style="writing-mode:vertical-rl">Остаток</th>

                                    <th style="writing-mode:vertical-rl">Было</th>
                                    <th style="writing-mode:vertical-rl">Приход</th>
                                    <th style="writing-mode:vertical-rl">Расход</th>
                                    <th style="writing-mode:vertical-rl">Остаток</th>
                                </tr>
                            </thead>
                            <tbody onload="myFunction()" class="animate-bottom">
                            <?php
                            $message = "SELECT * FROM Sirye_KPI ORDER BY date DESC";
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $date = $row['date'];
                                                $readonly = '';
                                                if (strtotime($date) < strtotime('-4 days'))
                                                {
                                                    $readonly = 'readonly';
                                                }
                                                echo"<tr>";
                                                if ($readonly == '') {
                                                    $minDate = date('Y-m-d', strtotime('-3 days')); // вычисляем минимальную дату
                                                    echo"<td><input type='date' class='redactInput fontTr form-control' id='dateSirye' value='$date' min='$minDate'></input></td>";

                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sms_bilo'    title='$row[brak_sms_bilo]' oninput='validateInput(this)'  value='$row[brak_sms_bilo]'    ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sms_prihod'        title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'       value='$row[brak_sms_prihod]'     ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sms_rashod'        title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'       value='$row[brak_sms_rashod]'        ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sms_ostatok'       title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'       value='$row[brak_sms_ostatok]'   ></input></td>";

                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_bilo'             title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[brak_sulf_bilo]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_prihod'           title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[brak_sulf_prihod]'    ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_rashod'           title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[brak_sulf_rashod]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_ostatok'          title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[brak_sulf_ostatok]'></input></td>";

                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_rastvor_bilo'      title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[brak_sulf_rastvor_bilo]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_rastvor_prihod'    title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[brak_sulf_rastvor_prihod]'    ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_rastvor_rashod'    title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[brak_sulf_rastvor_rashod]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='brak_sulf_rastvor_ostatok'   title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[brak_sulf_rastvor_ostatok]'></input></td>";

                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='isolator_bilo'               title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[isolator_bilo]' ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='isolator_prihod'             title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[isolator_prihod]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='isolator_rashod'             title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[isolator_rashod]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='isolator_ostatok'            title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[isolator_ostatok]' ></input></td>";

                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='pil_bilo'                   title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[pil_bilo]'    ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='pil_prihod'                 title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[pil_prihod]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='pil_rashod'                 title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[pil_rashod]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='pil_ostatok'                title='Нельзя вводить буквы и запятые' oninput='validateInput(this)'  value='$row[pil_ostatok]' ></input></td>";

                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='otsev_bilo'                 title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[otsev_bilo]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='otsev_prihod'               title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[otsev_prihod]'></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='otsev_rashod'               title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[otsev_rashod]' ></input></td>";
                                                    echo"<td><input type='text' class='redactInput fontTr form-control' min='0' id='otsev_ostatok'              title='Нельзя вводить буквы и запятые' oninput='validateInput(this)' value='$row[otsev_ostatok]' ></input></td>";

                                                    echo "<td><button type='button' class='updateSirye btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:13px;'></button></td>";
                                                    echo "<td><button type='button' class='deleteSirye btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:13px;'></button></td>";
                                                    }
                                                    else{
                                                        echo "<td><p> ". date('d.m.Y', strtotime($date)) ."</p></td>";
                                                        echo "<td><p>$row[brak_sms_bilo]</p></td>";
                                                        echo "<td><p>$row[brak_sms_prihod]</p></td>";
                                                        echo "<td><p>$row[brak_sms_rashod]</p></td>";
                                                        echo "<td><p>$row[brak_sms_ostatok]</p></td>";

                                                        echo "<td><p>$row[brak_sulf_bilo]</p></td>";
                                                        echo "<td><p>$row[brak_sulf_prihod]</p></td>";
                                                        echo "<td><p>$row[brak_sulf_rashod]</p></td>";
                                                        echo "<td><p>$row[brak_sulf_ostatok]</p></td>";

                                                        echo "<td><p>$row[brak_sulf_rastvor_bilo]</p></td>";
                                                        echo "<td><p>$row[brak_sulf_rastvor_prihod]</p></td>";
                                                        echo "<td><p>$row[brak_sulf_rastvor_rashod]</p></td>";
                                                        echo "<td><p>$row[brak_sulf_rastvor_ostatok]</p></td>";

                                                        echo "<td><p>$row[isolator_bilo]</p></td>";
                                                        echo "<td><p>$row[isolator_prihod]</p></td>";
                                                        echo "<td><p>$row[isolator_rashod]</p></td>";
                                                        echo "<td><p>$row[isolator_ostatok]</p></td>";

                                                        echo "<td><p>$row[pil_bilo]</p></td>";
                                                        echo "<td><p>$row[pil_prihod]</p></td>";
                                                        echo "<td><p>$row[pil_rashod]</p></td>";
                                                        echo "<td><p>$row[pil_ostatok]</p></td>";

                                                        echo "<td><p>$row[otsev_bilo]</p></td>";
                                                        echo "<td><p>$row[otsev_prihod]</p></td>";
                                                        echo "<td><p>$row[otsev_rashod]</p></td>";
                                                        echo "<td><p>$row[otsev_ostatok]</p></td>";
                                                    }
                                                echo"</tr>";
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
                    <script>
                                    $(document).ready
                                        (function()
                                            {$(".updateSirye").click
                                                (function()
                                            		{
                                            		    var idSirye = $(this).val();
                                            		    var dateSirye = $(this).closest("tr").find("#dateSirye").val();

                                                        var brak_sms_bilo = $(this).closest("tr").find("#brak_sms_bilo").val();
                                                        var brak_sms_prihod = $(this).closest("tr").find("#brak_sms_prihod").val();
                                                        var brak_sms_rashod = $(this).closest("tr").find("#brak_sms_rashod").val();
                                                        var brak_sms_ostatok = $(this).closest("tr").find("#brak_sms_ostatok").val();

                                                        var brak_sulf_bilo = $(this).closest("tr").find("#brak_sulf_bilo").val();
                                                        var brak_sulf_prihod = $(this).closest("tr").find("#brak_sulf_prihod").val();
                                                        var brak_sulf_rashod = $(this).closest("tr").find("#brak_sulf_rashod").val();
                                                        var brak_sulf_ostatok = $(this).closest("tr").find("#brak_sulf_ostatok").val();

                                                        var brak_sulf_rastvor_bilo = $(this).closest("tr").find("#brak_sulf_rastvor_bilo").val();
                                                        var brak_sulf_rastvor_prihod = $(this).closest("tr").find("#brak_sulf_rastvor_prihod").val();
                                                        var brak_sulf_rastvor_rashod = $(this).closest("tr").find("#brak_sulf_rastvor_rashod").val();
                                                        var brak_sulf_rastvor_ostatok = $(this).closest("tr").find("#brak_sulf_rastvor_ostatok").val();

                                                        var isolator_bilo = $(this).closest("tr").find("#isolator_bilo").val();
                                                        var isolator_prihod = $(this).closest("tr").find("#isolator_prihod").val();
                                                        var isolator_rashod = $(this).closest("tr").find("#isolator_rashod").val();
                                                        var isolator_ostatok = $(this).closest("tr").find("#isolator_ostatok").val();

                                                        var pil_bilo = $(this).closest("tr").find("#pil_bilo").val();
                                                        var pil_prihod = $(this).closest("tr").find("#pil_prihod").val();
                                                        var pil_rashod = $(this).closest("tr").find("#pil_rashod").val();
                                                        var pil_ostatok = $(this).closest("tr").find("#pil_ostatok").val();

                                                        var otsev_bilo = $(this).closest("tr").find("#otsev_bilo").val();
                                                        var otsev_prihod = $(this).closest("tr").find("#otsev_prihod").val();
                                                        var otsev_rashod = $(this).closest("tr").find("#otsev_rashod").val();
                                                        var otsev_ostatok = $(this).closest("tr").find("#otsev_ostatok").val();

                                            			$.ajax(
                                                            {type: 'POST',
                                                                dataType: 'html',
                                                                url: '/Engels/sirye/updateSirye.php',

                                                                data: ({dateSirye:dateSirye,

                                                                        brak_sms_bilo:brak_sms_bilo,
                                                                        brak_sms_prihod:brak_sms_prihod,
                                                                        brak_sms_rashod:brak_sms_rashod,
                                                                        brak_sms_ostatok:brak_sms_ostatok,

                                                                        brak_sulf_bilo:brak_sulf_bilo,
                                                                        brak_sulf_prihod:brak_sulf_prihod,
                                                                        brak_sulf_rashod:brak_sulf_rashod,
                                                                        brak_sulf_ostatok:brak_sulf_ostatok,

                                                                        brak_sulf_rastvor_bilo:brak_sulf_rastvor_bilo,
                                                                        brak_sulf_rastvor_prihod:brak_sulf_rastvor_prihod,
                                                                        brak_sulf_rastvor_rashod:brak_sulf_rastvor_rashod,
                                                                        brak_sulf_rastvor_ostatok:brak_sulf_rastvor_ostatok,

                                                                        isolator_bilo:isolator_bilo,
                                                                        isolator_prihod:isolator_prihod,
                                                                        isolator_rashod:isolator_rashod,
                                                                        isolator_ostatok:isolator_ostatok,

                                                                        pil_bilo:pil_bilo,
                                                                        pil_prihod:pil_prihod,
                                                                        pil_rashod:pil_rashod,
                                                                        pil_ostatok:pil_ostatok,

                                                                        otsev_bilo:otsev_bilo,
                                                                        otsev_prihod:otsev_prihod,
                                                                        otsev_rashod:otsev_rashod,
                                                                        otsev_ostatok:otsev_ostatok,

                                                                        idSirye:idSirye}),
                                                                success: function(response)
                                                                {
                                                                    $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                                                    var data = JSON.parse(response);}});});});
                                    </script>
                    <script>
                            $(document).ready(function() {
                              $(".deleteSirye").click(function() 
                              {
                                var deleteUser = $(this).val();
                                var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
                                if (confirm("Вы действительно хотите удалить?")) {
                                    $.ajax({
                                      type: 'POST',
                                      dataType: 'html',
                                      url: '../sirye/deleteRowSirye.php',
                                      data: {idUser: deleteUser},
                                      success: function(response) {
                                        var data = JSON.parse(response);
                                        row.remove(); // удаляем строку таблицы
                                        $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                                      }
                                    });
                                };
                              });
                            });
                            </script>
                </fieldset>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
