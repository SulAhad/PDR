<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['top5problem'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <style>
        td input{
            height:40px;
        }
        .readonlyInput{
            font-size:12px;
        }
        .fontTr{
            font-size:12px;
            border:none;
        }
        .add{
            width:200px;
        }
        td button img{
            height:16px;
            width:16px;
            position: middle;
        }
        .topBtn{
          font-size:30px;
          color:black;
          border-bottom: 1px solid #f00;
        }
    </style>

    <body class="container-fluid">
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
        <div class="col-md-12"><p class="topBtn"><?php echo"$app_names->top5Problem"; ?></p>
            <fieldset class="card_hover form-group border card shadow-sm bg-light">
                <div class="table-responsive">
                    <table class="table-hover table-bordered table table-sm">
                        <thead>
                            <tr>
                                <th><p class="p_Index">Описание проблемы</p></th>
                                <th><p class="p_Index">Оператор линии</p></th>
                                <th><p class="p_Index">Причина</p></th>
                                <th><p class="p_Index">Непосредственное действие</p></th>
                                <th><p class="p_Index">Устранил</p></th>
                                <th><p class="p_Index">Коренная причина</p></th>
                                <th><p class="p_Index">Действие</p></th>
                                <th><p class="p_Index">Ответственный</p></th>
                                <th><p class="p_Index">Район / Участок</p></th>
                                <th><p class="p_Index">Простой, мин.</p></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><textarea id="description_problem" type="text" class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td><textarea id="operator"            type="text" class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td><textarea id="cause"               type="text" class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td><textarea id="immediate_action"    type="text" class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td><textarea id="eliminated"          type="text" class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td><textarea id="root_cause"          type="text" class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td><textarea id="action"              type="text" class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td>
                                    <select id="responce" class="form-select" aria-label="Default select example" autocomplete="on">
                                        <option value=""></option>
                                        <option value="Адушкин С"   >Адушкин С   </option>
                                        <option value="Калдин В "   >Калдин В    </option>
                                        <option value="Рагимов И"      >Рагимов И   </option>
                                        <option value="Канский В"   >Канский В   </option>
                                        <option value="Канский Д"   >Канский Д   </option>
                                        <option value="Костин А"     >Костин А    </option>
                                        <option value="Хритова И"     >Хритова И   </option>
                                        <option value="Бодряго С"   >Бодряго С   </option>
                                        <option value="Овчинников В">Овчинников В</option>
                                        <option value="Нефедов Д"   >Нефедов Д   </option>
                                        <option value="Максимов А"    >Максимов А  </option>
                                        <option value="Михайлов И"    >Михайлов И  </option>
                                        <option value="Перцева Е"    >Перцева Е   </option>
                                        <option value="Сулейманов А"  >Сулейманов А</option>
                                    </select>
                                </td>
                                <td><textarea id="area" type="text"   class="textarea_Top5Problem form-control form-control-sm"></textarea></td>
                                <td><input    id="downtime" type="number" class="form-control form-control-sm"/></td>
                                
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" id="myButton" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                    
                </div>
            </fieldset>
        </div>
        <div class="col-md-12 mt-4 mb-2">
            <fieldset class="form-group border card shadow-sm bg-light">
                <div class="table-responsive">
                    <table id="myTable" class="table-hover table-bordered table table-sm ">
                        <thead>
                            <tr>
                                <th><p class="p_Index">Дата</p></th>
                                <th><p class="p_Index">Описание проблемы</p></th>
                                <th><p class="p_Index">Оператор линии</p></th>
                                <th><p class="p_Index">Причина</p></th>
                                <th><p class="p_Index">Непосредственное действие</p></th>
                                <th><p class="p_Index">Устранил</p></th>
                                <th><p class="p_Index">Коренная причина</p></th>
                                <th><p class="p_Index">Действие</p></th>
                                <th><p class="p_Index">Ответственный</p></th>
                                <th><p class="p_Index">Район / Участок</p></th>
                                <th><p class="p_Index">Простой, мин.</p></th>
                                <th><p class="p_Index"></p></th>
                                <th><p class="p_Index"></p></th>
                            </tr>
                        </thead>
                        <tbody onload="myFunction()" class="animate-bottom table-hover">
                            <?php
                            $message = "SELECT * FROM Top5Problem ORDER BY date DESC";
                            $link->set_charset("utf8");
                            $result =  mysqli_query( $link,  $message);
                            while($row = mysqli_fetch_assoc($result)){
                                $date = $row['date'];
                                $readonly = '';
                                if (strtotime($date) < strtotime('-5 days')){
                                    $readonly = 'readonly';
                                }
                                echo "<tr>";
                                    $minDate = date('Y-m-d', strtotime('-4 days')); // вычисляем минимальную дату
                                    if ($readonly == ''){
                                        echo"<td><input style='width:90px;' type='date' class='fontTr form-control form-control-sm' id='input_date'                value='$row[date]'></input></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_description_problem' value='$row[description_problem]'>$row[description_problem]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_operator'            value='$row[operator]'>$row[operator]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_cause'               value='$row[cause]'>$row[cause]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_immediate_action'    value='$row[immediate_action]'>$row[immediate_action]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_eliminated'          value='$row[eliminated]'>$row[eliminated]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_root_cause'          value='$row[root_cause]'>$row[root_cause]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_action'              value='$row[action]'>$row[action]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_responce'            value='$row[responce]'>$row[responce]</textarea></td>";
                                        echo"<td><textarea type='text' class='fontTr form-control form-control-sm' id='input_area'                value='$row[area]'>$row[area]</textarea></td>";
                                        echo"<td><input type='number' class='fontTr form-control form-control-sm' id='input_downtime'          value='$row[downtime]'></input></td>";
                                        echo"<td><button type='button' class='updateTop5Problem btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/change.jpg'></button></td>";
                                        echo"<td><button type='button' class='deleteTop5Problem btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/trash.png'></button></td>";
                                    }
                                    else{
                                        echo "<td class='readonlyInput'> ". date('d.m.Y', strtotime($date)) ."</td>";
                                        echo "<td class='readonlyInput'>$row[description_problem]</td>";
                                        echo "<td class='readonlyInput'>$row[operator]</td>";
                                        echo "<td class='readonlyInput'>$row[cause]</td>";
                                        echo "<td class='readonlyInput'>$row[immediate_action]</td>";
                                        echo "<td class='readonlyInput'>$row[eliminated]</td>";
                                        echo "<td class='readonlyInput'>$row[root_cause]</td>";
                                        echo "<td class='readonlyInput'>$row[action]</td>";
                                        echo "<td class='readonlyInput'>$row[responce]</td>";
                                        echo "<td class='readonlyInput'>$row[area]</td>";
                                        echo "<td class='readonlyInput'>$row[downtime]</td>";
                                    }
                                echo"</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <script>
                        $("textarea").each(function () {
                        this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                        }).on("input", function () {
                        this.style.height = 0;
                        this.style.height = (this.scrollHeight) + "px";
                        });
                </script>
            </fieldset>
        </div>
        <div class="modal fade" id="myModalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        У вас недостаточно прав для удаления строки!
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModalErrorUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Изменить строку может только тот кто создал эту строку!
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Подтвердите удаление</h4>
                    </div>
                    <div class="modal-body">
                        Вы действительно хотите удалить эту запись?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="confirmDelete">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function()
            {
                $(".add").click(function()
        		{
        		    $(this).html('<img class="iconsButtons" src="/Engels/icons/sand-clock.png" />Сохранение...');
        		    var user = "<?php echo $a; ?>";
        		    var description_problem = document.getElementById('description_problem');
        		    var operator = document.getElementById('operator');
        		    var cause = document.getElementById('cause');
        		    var immediate_action = document.getElementById('immediate_action');
        		    var eliminated = document.getElementById('eliminated');
        		    var root_cause = document.getElementById('root_cause');
        		    var action = document.getElementById('action');
        		    var responce = document.getElementById('responce');
        		    var area = document.getElementById('area');
        		    var downtime = document.getElementById('downtime');
                    var add_top5_to_calendar = 'top5';
                    // $.ajax({
                    //     type: 'POST',
                    //     dataType: 'html',
                    //     url: '/Engels/personalArea/add.php',
                    //     data: {
                    //         name_event: description_problem.value,
                    //         text_event: immediate_action.value,
                    //         user:add_top5_to_calendar
                    //     },
                    //     success: function(response) {},
                    //     error: function(xhr, status, error) {
                    //         alert("Error: " + error);
                    //     }
                    // });
                    $.ajax(
                    {
                        type: 'POST',
                        dataType: 'html',
                        url: '/Engels/top5problem/addTop5Problem.php',
                        data: (
                            {
                                user:user,
                                description_problem:description_problem.value,
                                operator:operator.value,
                                cause:cause.value,
                                immediate_action:immediate_action.value,
                                eliminated:eliminated.value,
                                root_cause:root_cause.value,
                                action:action.value,
                                responce:responce.value,
                                area:area.value,
                                downtime:downtime.value
                            }),
                            success: function(response)
                            {
                                // Имитируем успешное сохранение данных с помощью задержки setTimeout
                                setTimeout(function()
                                {
                                  // Завершаем анимацию
                                  $("#myButton").html('<img class="iconsButtons" src="/Engels/icons/check.png" />Сохранено!');
                                  setTimeout(function()
                                  {
                                    // Устанавливаем обратное состояние кнопки
                                    $("#myButton").html('<img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить');
                                  }, 2000);
                                }, 2000);
                                description_problem.value = "";
                                operator.value = "";
                                cause.value = "";
                                immediate_action.value = "";
                                eliminated.value = "";
                                root_cause.value = "";
                                action.value = "";
                                responce.value = "";
                                area.value = "";
                                downtime.value = "";
                                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                // Добавление новой строки в таблицу
                                var data = JSON.parse(response);
                                var newRow = "<tr><td><input id='input_date' class='fontTr form-control form-control-sm' style='border:none;' type='date' value='" +
                                  data.date + "'></input></td><td><input style='border:none;' id='input_description_problem'  class='fontTr form-control form-control-sm' value='" +
                                  data.description_problem + "'></input></td><td style='border:none;'><input id='input_operator'  style='border:none;'  class='fontTr form-control form-control-sm' value='" +
                                  data.operator + "'></input></td><td><input style='border:none;' id='input_cause'   class='fontTr form-control form-control-sm' value='" +
                                  data.cause + "'></input></td><td><input style='border:none;' id='input_immediate_action' class='fontTr form-control form-control-sm' value='" +
                                  data.immediate_action + "'></input></td><td><input id='input_eliminated' style='border:none;'  class='fontTr form-control form-control-sm' value='" +
                                  data.eliminated + "'></input></td><td><input id='input_root_cause'  style='border:none;' class='fontTr form-control form-control-sm' value='" +
                                  data.root_cause + "'></input></td><td><input id='input_action' style='border:none;' class='fontTr form-control form-control-sm' value='" +
                                  data.action + "'></input></td><td><input id='input_responce' style='border:none;'  class='fontTr form-control form-control-sm' value='" +
                                  data.responce + "'></input></td><td><input id='input_area'  style='border:none;'  class='fontTr form-control form-control-sm' value='" +
                                  data.area + "'></input></td><td><input id='input_downtime' type='number' style='border:none;' class='fontTr form-control form-control-sm' value='" +
                                  data.downtime + "'></input></td><td><button type='button' class='fontTr updateTop5Problem btn btn-outline btn-sm btn-light' value='" +
                                  data.id + "'><img src='/Engels/icons/change.jpg'></button></td><td style='font-size:10px;'><button type='button' class='deleteTop5Problem btn btn-outline btn-sm btn-light' value='" +
                                  data.id + "'><img src='/Engels/icons/trash.png'></button></td></tr>";
                                $('#myTable tbody').prepend(newRow);
                            },
                            error: function(xhr, status, error) {
                                alert("Error: " + error);
                            }
                        });
        		    });
                });
        </script>
        <?php
            $message = "SELECT accessForDelete FROM Settings_KPI ORDER BY id DESC LIMIT 1";
            $link->set_charset("utf8");
            $result =  mysqli_query($link, $message);
            while($row = mysqli_fetch_assoc($result))
            {
                $accessForDelete = $row['accessForDelete'];
            }
        ?>
        <script>
        $(document).on("click", ".deleteTop5Problem", function()
        {
            var user = "<?php echo $a; ?>";
            var deleteUser = this.value;
            var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
            var accessForDelete = <?php echo $accessForDelete; ?>;
            if (<?php echo $_SESSION['access']; ?> >= accessForDelete) // если access > 80 то удаляем
            {
                $('#myModal').modal('show'); // показываем модальное окно
                $('#myModal').on('click', '#confirmDelete', function()
                {
                    $.ajax({
                        type: 'POST',
                        dataType: 'html',
                        url: '/Engels/top5problem/deleteTop5Problem.php',
                        data: {user:user,
                                idUser: deleteUser},
                        success: function(response)
                        {
                            if(response == "true")
                            {
                                row.remove(); // удаляем строку таблицы
                                $('#myModal').modal('hide'); // скрываем модальное окно
                                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                            }
                            else
                            {
                                $('#myModalErrorUpdate').modal('show'); // показываем модальное окно
                                $('#myModal').modal('hide'); // скрываем модальное окно
                            }
                        }
                    });
                });
            }
            else
            {   $('#myModalError').modal('show'); // показываем модальное окно
                $('#myModal').modal('hide'); // скрываем модальное окно
            }});
        </script>
        <script>
            $(document).on("click", ".updateTop5Problem", function()
            {var user = "<?php echo $a; ?>";
                var idTop5Problem = $(this).val();
                var input_date = $(this).closest("tr").find("#input_date").val();
                var input_description_problem = $(this).closest("tr").find("#input_description_problem").val();
                var input_operator = $(this).closest("tr").find("#input_operator").val();
                var input_cause = $(this).closest("tr").find("#input_cause").val();
                var input_immediate_action = $(this).closest("tr").find("#input_immediate_action").val();
                var input_eliminated = $(this).closest("tr").find("#input_eliminated").val();
                var input_root_cause = $(this).closest("tr").find("#input_root_cause").val();
                var input_action = $(this).closest("tr").find("#input_action").val();
                var input_responce = $(this).closest("tr").find("#input_responce").val();
                var input_area = $(this).closest("tr").find("#input_area").val();
                var input_downtime = $(this).closest("tr").find("#input_downtime").val();
                $.ajax({
        type: 'POST',
        dataType: 'html',
        url: '/Engels/top5problem/checkUserTop5Problem.php',
        data: {
            id: idTop5Problem,
            user: user
        },
        success: function(response) {
            if(response == "true"){
                $.ajax({
                    type: 'POST',
                    dataType: 'html',
                    url: '/Engels/top5problem/updateTop5Problem.php',
                    data: {
                        id: idTop5Problem,
                        user: user,
                        input_date: input_date,
                        input_description_problem: input_description_problem,
                        input_operator: input_operator,
                        input_cause: input_cause,
                        input_immediate_action: input_immediate_action,
                        input_eliminated: input_eliminated,
                        input_root_cause: input_root_cause,
                        input_action: input_action,
                        input_responce: input_responce,
                        input_area: input_area,
                        input_downtime: input_downtime
                    },
                    success: function(response) {
                        $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                    }
                });
            } else {
                $('#myModalErrorUpdate').modal('show'); // показываем модальное окно
                //$('#myModalUpdate').modal('hide'); // скрываем модальное окно
            }
        }
    });
});
        </script>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
