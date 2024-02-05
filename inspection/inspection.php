<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['inspection'] === 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php'); ?>
        <script>
            $(document).ready(function()
            {
                updateTable();
                updateTableTiming();
            });
        </script>
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
    </head>
    <body>
        <div class="container">
            <div class="row card shadow-sm">
                <div class="col-md-12">
                    <fieldset class="form-group border p-3 m-2 card shadow-sm justify-content-center align-items-center bg-light">
                        <div class="col-md-6">
                        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                            <form method="post" class="needs-validation">
                                <div class="row">
                                    <input type="date" style="border-bottom: 2px solid gray; width:28%;"
                                    value="<?php echo date('Y-m-d'); ?>" id="date" class="form-control m-1"
                                    max="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" min="<?php echo date('Y-m-d', strtotime('-2 days')); ?>" onkeydown="return false"  required>
                                    <input value="<?php echo" $_SESSION[surName] $_SESSION[nameUser]" ?>" id='name' class="form-control m-1" list="datalistOptions" style="border-bottom: 2px solid gray; width:68%;" placeholder="Введите Фамилию" required>
                                    <datalist id="datalistOptions">
                                        <?php
                                            $message = "SELECT DISTINCT name FROM `InspectionList`";
                                            $link->set_charset("utf8");
                                            $results  =  mysqli_query( $link,  $message );
                                            while($row = mysqli_fetch_assoc($results))
                                            {
                                                echo"<option value='$row[name]'>";
                                            }
                                        ?>
                                    </datalist>
                                    <label for="textForList" style="font-size:12px;" class="mt-2">Примечание (описание несоответствий)</label>
                                    <select style="border-bottom: 2px solid gray;" id="textForList" class="form-select" aria-label="Default select example" autocomplete="on">
                                        <option value="безопасное поведение на рабочем месте">безопасное поведение на рабочем месте</option>
                                        <option value="состояние и применение СИЗ">состояние и применение СИЗ</option>
                                        <option value="работы по наряд-допускам">работы по наряд-допускам</option>
                                        <option value="знание и соблюдение инструкций по ОТ">знание и соблюдение инструкций по ОТ</option>
                                        <option value="безопасное вождение и перемещение">безопасное вождение и перемещение</option>
                                        <option value="обращение с химически опасными веществами">обращение с химически опасными веществами</option>
                                        <option value="соблюдение процедуры LOTOTO">соблюдение процедуры LOTOTO</option>
                                        <option value="инструменты и оборудование">инструменты и оборудование</option>
                                        <option value="состояние знаков эвакуации, средств пожаротушения, электрощитовых">состояние знаков эвакуации, средств пожаротушения, электрощитовых</option>
                                        <option value="оценка рисков на рабочих местах">оценка рисков на рабочих местах</option>
                                    </select>
                                    <div class="btn-group mt-4" role="group" id="btnradio" aria-label="Basic radio toggle button group">
                                        <input value="Небезопасно" type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                                        <label class="btn btn-outline-danger" for="btnradio1">Небезопасно</label>
                                        <input value="Безопасно" type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" checked>
                                        <label class="btn btn-outline-success" for="btnradio3">Безопасно</label>
                                    </div>
                                    <label for="comment" style="font-size:12px;" class="mt-2">Комментарий по обходу (опишите своими словами)</label>
                                    <textarea id='comment' class="form-control" type="text" style="border-bottom: 2px solid gray; height:100px;" required placeholder="комментарий"></textarea>
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        пожалуйста, заполните это поле
                                    </div>
                                    <div id="fedback" class="valid-feedback">
                                        окей
                                    </div>
                                    <div style="width:50%;" class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="intervention1">
                                        <label for="intervention1" class="form-check-label" for="flexCheckDefault">Вмешательство на месте</label>
                                    </div>
                                    <div style="width:50%;" class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="intervention2">
                                        <label for="intervention2" class="form-check-label" for="flexCheckDefault">Вопрос перенесен в AL</label>
                                    </div>
                                    <div style="width:50%;">
                                        <label for="duration" style="font-size:12px;" class="mt-2">Длительность, мин</label>
                                        <input value="10" id='duration' class="form-control" placeholder="0" type="number" style="border-bottom: 2px solid gray;" min="10" max="480" step="5" required>
                                    </div>
                                    <div style="width:50%;">
                                        <label for="staff" style="font-size:12px;" class="mt-2">Штатный персонал</label>
                                        <input value="0" id='staff' min="0" class="form-control" type="number" style="border-bottom: 2px solid gray;" placeholder="количество наблюдаемых" required>
                                    </div>
                                    <div style="width:50%;">
                                        <label for="contract" style="font-size:12px;" class="mt-2">Подрядный персонал</label>
                                        <input value="0" id='contract' min="0" class="form-control" type="number" style="border-bottom: 2px solid gray;" placeholder="количество наблюдаемых" required>
                                    </div>
                                    <label for="production" style="font-size:12px;" class="mt-2">Производство</label>
                                    <select style="border-bottom: 2px solid gray;" id="production" onchange="showList2()" name="production" class="form-select" aria-label="Default select example">
                                        <option value=""></option>
                                        <option value="Сульфирования">Сульфирования</option>
                                        <option value="СМС">СМС</option>
                                        <option value="ALL">ALL</option>
                                    </select>
                                    <label for="areaCMC" style="font-size:12px;" class="mt-2">Участок</label>
                                    <select style="border-bottom: 2px solid gray;" id="areaCMC" onchange="showList3()" name="areaCMC" class="form-select" aria-label="Default select example" placeholder="Участок">
                                        <option value=""></option>
                                    </select>
                                    <button type="button" class="mt-4 add btn btn-outline-success shadow-sm"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                                    
                                    <div id="response"></div>
                                </div>
                            </form>
                        </div>
                        <script src="/Engels/inspection/show_list.js"></script>
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <fieldset class="form-group border m-2 p-3 card shadow-sm bg-light">
                        <legend class="m-2 text-danger">Количество обходов - 2023 г</legend>
                        <div class="table-responsive">
                            <table class="table-hover table-bordered table table-sm">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Фамилия И.О.</th>
                                        <th>Август</th>
                                        <th>Сентябрь</th>
                                        <th>Октябрь</th>
                                        <th>Ноябрь</th>
                                        <th>Декабрь</th>
                                        <th>Общее</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBodyStatTiming">
                                <!-- Table data will be updated here -->
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <fieldset class="form-group border m-2 p-3 card shadow-sm bg-light">
                        <legend class="m-2 text-danger">Количество обходов - 2024 г</legend>
                        <div class="table-responsive">
                            <table class="table-hover table-bordered table table-sm">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Фамилия И.О.</th>
                                        <th>Январь</th>
                                        <th>Февраль</th>
                                        <th>Март</th>
                                        <th>Апрель</th>
                                        <th>Май</th>
                                        <th>Июнь</th>
                                        <th>Июль</th>
                                        <th>Август</th>
                                        <th>Сентябрь</th>
                                        <th>Октябрь</th>
                                        <th>Ноябрь</th>
                                        <th>Декабрь</th>
                                        <th>Общее</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBodyStat">
                                <!-- Table data will be updated here -->
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
     
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div> 
                </div>
            </div>
        </div>
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="form-group border card shadow-sm bg-light">
                        <div class="table-responsive">
                            <table  id="myTable" class="table-hover table-bordered table table-sm ">
                                <thead>
                                    <tr>
                                        <th><p style="text-align: center">№</p></th>
                                        <th><p style="text-align: center">Дата</p></th>
                                        <th class="col-1"><p style="text-align: center">Фамилия</p></th>
                                        <th><p style="text-align: center">Описание несоответствий</p></th>
                                        <th><p style="text-align: center">Безопасно/Небезопасно</p></th>
                                        <th class="col-5"><p style="text-align: center">Комментарий</p></th>
                                        <th style="writing-mode:vertical-rl;"><p style="text-align: center">Вмешательство на месте</p></th>
                                        <th style="writing-mode:vertical-rl;"><p style="text-align: center">Вопрос перенесен в AL</p></th>
                                        <th style="writing-mode:vertical-rl;"><p style="text-align: center">Длительность</p></th>
                                        <th style="writing-mode:vertical-rl;"><p style="text-align: center">Штатный персонал</p></th>
                                        <th style="writing-mode:vertical-rl;"><p style="text-align: center">Подрядный персонал</p></th>
                                        <th><p style="text-align: center">Производство</p></th>
                                        <th><p style="text-align: center">Участок</p></th>
                                        <th style="writing-mode:vertical-rl;"></th>
                                        <th style="writing-mode:vertical-rl;"></th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyRed" onload="myFunction()" class="animate-bottom">
                                    <?php $message = "SELECT * FROM InspectionList ORDER BY date DESC LIMIT 25";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $date = $row['date'];
                                        $readonly = '';
                                        if (strtotime($date) < strtotime('-3 days')) {
                                            $readonly = 'readonly';}
                                        echo "<tr>";
                                        $minDate = date('Y-m-d', strtotime('-2 days')); // вычисляем минимальную дату
                                        if ($readonly == '')
                                        {
                                            echo "<td><p>$row[id]</p></td>";
                                            echo "<td><input type='date' style='width:90px;' id='input_date' class='fontTr col form-control form-control-sm border-0' value='$date'  min='$minDate'></td>";
                                            echo "<td><textarea type='text' class='fontTr col form-control form-control-sm border-0' id='input_name' value='$row[name]' >$row[name]</textarea></td>";
                                            echo "<td><textarea type='text' class='fontTr col-2 form-control form-control-sm border-0' id='input_textForList' value='$row[textForList]' >$row[textForList]</textarea></td>";
                                            if($row['typeSafety'] == 'Небезопасно')
                                            {echo "<td><input style='background:lightcoral;' type='text' class='fontTr form-control form-control-sm border-0' id='input_typeSafety' value='$row[typeSafety]' ></input></td>";}
                                            else
                                            {echo "<td><input type='text' class='fontTr form-control form-control-sm border-0' id='input_typeSafety' value='$row[typeSafety]' ></input></td>";}
                                            echo "<td><textarea type='text' class='fontTr form-control form-control-sm border-0' id='input_comment' value='$row[comment]' >$row[comment]</textarea></td>";
                                            echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention1' value='$row[intervention1]' " . ($row['intervention1'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                            echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention2' value='$row[intervention2]' " . ($row['intervention2'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                            echo "<td><input style='width:50px;' type='number' class='fontTr form-control form-control-sm border-0' id='input_duration' value='$row[duration]' ></input></td>";
                                            echo "<td><input type='number' class='fontTr form-control form-control-sm border-0' id='input_staff' value='$row[staff]' ></input></td>";
                                            echo "<td><input type='number' class='fontTr form-control form-control-sm border-0' id='input_contract' value='$row[contract]' ></input></td>";
                                            echo "<td><input type='text' class='fontTr form-control form-control-sm border-0' id='input_production' value='$row[production]' ></input></td>";
                                            echo "<td><input type='text' class='fontTr form-control form-control-sm border-0' id='input_area' value='$row[area]' ></input></td>";
                                            echo "<td><button type='button' class='updateInspection btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                                            echo "<td><button type='button' class='deleteInspection btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";}
                                            else {echo "<td><p>$row[id]</p></td>";
                                                echo "<td><p> ". date('d.m.Y', strtotime($date)) ."</p></td>";
                                                echo "<td><p>$row[name]</p></td>";
                                                echo "<td><p>$row[textForList]</p></td>";
                                                if($row['typeSafety'] == 'Небезопасно' ){
                                                    echo "<td style='background:lightcoral;'><p>$row[typeSafety]</p></td>";}
                                                else{ echo "<td><p>$row[typeSafety]</p></td>";}
                                                echo "<td><p>$row[comment]</p></td>";
                                                echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention1' value='$row[intervention1]' " . ($row['intervention1'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                                echo "<td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' id='input_intervention2' value='$row[intervention2]' " . ($row['intervention2'] == 1 ? 'checked' : 'unchecked') . " ></td>";
                                                echo "<td><p>$row[duration]</p></td>";
                                                echo "<td><p>$row[staff]</p></td>";
                                                echo "<td><p>$row[contract]</p></td>";
                                                echo "<td><p>$row[production]</p></td>";
                                                echo "<td><p>$row[area]</p></td>";}
                                        echo"</tr>";} ?>
                                </tbody>
                            </table>
                            <script>
                                $("textarea").each(function () {
                                    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                                    }).on("input", function () {
                                    this.style.height = 0;
                                    this.style.height = (this.scrollHeight) + "px";
                                    });
                            </script>
                            <!-- Добавление кнопки Показать еще и скрипт -->
                            <button class="btn btn-secondary btn-sm m-2" id="loadMoreButton">показать еще..</button>
                            <script>
                                $(document).ready(function() {
                                    var offset = 25;
                                    $('#loadMoreButton').click(function() {
                                        $.ajax({
                                            url: '/Engels/inspection/fetch_more_rows.php',
                                            method: 'POST',
                                            data: { offset: offset },
                                            success: function(response) {
                                                $('#tbodyRed').append(response);
                                                offset += 25;
                                            },
                                            error: function() {
                                                alert('Ошибка в загрузке файлов');
                                            }
                                        });
                                    });
                                });
                            </script>
                        </div>
                        <?php
                            $message = "SELECT accessForDelete FROM Settings_KPI ORDER BY id DESC LIMIT 1";
                            $link->set_charset("utf8");
                            $result = mysqli_query($link, $message);
                            $accessForDelete = 0;
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $accessForDelete = $row['accessForDelete'];
                                }
                            }
                        ?>
                        <script>
                            $(document).on("click", ".deleteInspection", function() {
                                var user = "<?php echo $a; ?>";
                                var deleteUser = this.value;
                                var row = $(this).closest("tr");
                                var accessForDelete = <?php echo $accessForDelete; ?>;
                                if (<?php echo $_SESSION['access']; ?> >= accessForDelete) {
                                    $('#myModal').modal('show');
                                    $('#myModal').on('click', '#confirmDelete', function() {
                                        $.ajax({
                                            type: 'POST',
                                            dataType: 'html',
                                            url: '/Engels/inspection/deleteInspectionNew.php',
                                            data: { user:user, idUser: deleteUser },
                                            success: function(response)
                                            {
                                                if(response == "true")
                                                {
                                                    var data = JSON.parse(response);
                                                    row.remove();
                                                    updateTable();
                                                    updateTableTiming();
                                                    $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                                                    $('#myModal').modal('hide');
                                                    $('#idUser').val('');
                                                }
                                                else
                                                {
                                                    $('#myModalErrorUpdate').modal('show'); // показываем модальное окно
                                                    $('#myModal').modal('hide'); // скрываем модальное окно
                                                }

                                            }
                                        });
                                    });
                                } else {
                                    $('#myModalError').modal('show');
                                    $('#myModal').modal('hide');
                                }
                            });
                        </script>
                        <div class="modal fade" id="myModalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        У вас недостаточно прав для удаления строки!
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
                    </fieldset>
                </div>
            </div>
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
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
    <script src="/Engels/inspection/update_table.js"></script>
    <script>
        $(document).ready(function()
        { $(".add").click(function()
            {
                var comment = $("#comment").val();
                if (comment === "") {
                    $("#comment").addClass("is-invalid");
                    $("#validationServer03Feedback").show();
                } else 
                {
                    $("#comment").removeClass("is-invalid");
                    $("#comment").addClass("is-valid");
                    $("#validationServer03Feedback").hide();
                    $(this).html('<img class="iconsButtons" src="/Engels/icons//sand-clock.png" />Сохранение...');
                    var user = "<?php echo $a; ?>";
                    var intervention1 = document.getElementById('intervention1');
                    var intervention2 = document.getElementById('intervention2');
                    var isButton1Pressed = false;
                    var isButton2Pressed = false;
                    if (intervention1.checked) {isButton1Pressed = 1;}
                    else{isButton1Pressed = 0;}
                    if (intervention2.checked) {isButton2Pressed = 1;}
                    else{isButton2Pressed = 0;}
                    var date = document.getElementById('date').value;
                    var name = document.getElementById('name').value;
                    var textForList = document.getElementById('textForList').value;
                    const selectedButton = document.querySelector('#btnradio1:checked');
                    const typeSafety = selectedButton ? selectedButton.value : 'Безопасно';
                    var comment = document.getElementById('comment').value;
                    var duration = document.getElementById('duration').value;
                    var staff = document.getElementById('staff').value;
                    var contract = document.getElementById('contract').value;
                    var production = document.getElementById('production').value;
                    var area = document.getElementById('areaCMC').value;
                    if(name != "")
                    {
                        if (typeSafety == 'Небезопасно')
                        {
                            var nameUser = 'Небезопасное замечание по листу обходов';
                            var email = "production-daily-monitor@lab-industries-engels.ru";
                            // Объявляем переменные name, textForList и comment
                            var message = name + "\r\n" + textForList + "\r\n" + comment;
                            $.ajax({
                                type: 'POST',
                                url: '/Engels/inspection/send_email.php',
                                data:
                                {
                                    name: name,
                                    email: email,
                                    message: message
                                },
                                success: function(response)
                                {
                                    $('#response').html(response);
                                }
                            });
                        }
                        $.ajax({
                        type: 'POST',
                        dataType: 'html',
                        url: '/Engels/inspection/addInspectionNew.php',
                        data: {
                            user:user,
                            date: date,
                            name: name,
                            textForList: textForList,
                            comment: comment,
                            duration: duration,
                            staff: staff,
                            contract: contract,
                            production: production,
                            isButton1Pressed: isButton1Pressed,
                            isButton2Pressed: isButton2Pressed,
                            typeSafety: typeSafety,
                            area: area
                        },
                        success: function(response)
                                    {
                                        $("#fedback").hide();

                                        $('#textForList').val('');
                                        $('#typeSafety').val('');
                                        $('#comment').val('');
                                        $('#intervention1').prop('checked', false);
                                        $('#intervention2').prop('checked', false);
                                        $('#duration').val('10');
                                        $('#staff').val('0');
                                        $('#contract').val('0');
                                        $('#production').val('');
                                        $('#area').val('');
                                        var data = JSON.parse(response);
                                        var newRow = "<tr><td><p>" +
                                        data.id + "</p></td><td><input id='input_date' type='date' class='fontTr form-control border-0' value='" +
                                        data.date + "'></td><td><input id='input_name' type='text' class='fontTr form-control border-0' value='" +
                                        data.name + "'></td><td><input id='input_textForList' type='text' class='fontTr form-control border-0' value='" +
                                        data.textForList + "'></td><td><input id='input_typeSafety' type='text' class='fontTr form-control border-0' value='" +
                                        data.typeSafety + "'></td><td><input id='input_comment' type='text' class='fontTr form-control border-0' value='" +
                                        data.comment + "'></td><td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' value='" + data.intervention1 + "' " + (data.intervention1 == 1 ? 'checked' : 'unchecked') + "></td><td><input onclick='return false;' type='checkbox' class='fontTr form-check-input' value='" +
                                        data.intervention2 + "' " + (data.intervention2 == 1 ? 'checked' : 'unchecked') + "></td><td><input id='input_duration' type='number' class='fontTr form-control border-0' value='" +
                                        data.duration + "'></td><td><input id='input_staff' type='number' class='fontTr form-control border-0' value='" +
                                        data.staff + "'></td><td><input id='input_contract' type='number' class='fontTr form-control border-0' value='" +
                                        data.contract + "'></td><td><input id='input_production' type='text' class='fontTr form-control border-0' value='" +
                                        data.production + "'></td><td><input id='input_area' type='text' class='fontTr form-control border-0' value='" +
                                        data.area + "'></td><td><button type='button' class='fontTr updateInspection btn btn-outline btn-sm btn-light' value='" +
                                        data.id + "'><img src='/Engels/icons/change.jpg' style='height:13px;'></button></td><td style='font-size:10px;'><button type='button' class='deleteInspection btn btn-outline btn-sm btn-light' value='" +
                                        data.id + "'><img src='/Engels/icons/trash.png' style='height:13px;'></button></td></tr>";
                                        $('#myTable tbody').prepend(newRow);
                                        updateTable();
                                        updateTableTiming();
                                        $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                        // Имитируем успешное сохранение данных с помощью задержки setTimeout
                                        setTimeout(function(){
                                        // Завершаем анимацию
                                        $(".add").html('<img class="iconsButtons" src="/Engels/icons/check.png" />Сохранено!');
                                        setTimeout(function(){
                                            // Устанавливаем обратное состояние кнопки
                                            $(".add").html('<img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить');
                                        }, 2000);
                                        }, 2000);
                        },
                        error: function(xhr, status, error) {
                                            alert("Error: " + error);
                                        }
                    });
                    }
                    else{
                        $('.alert-success_noname').fadeIn(1000).delay(3000).fadeOut(1000);
                        $(".add").html('<img class="iconsButtons" />Ошибка!');
                    }
                }
            });
        });
    </script>
    <script>
        $(document).on("click", ".updateInspection", function()
        {
            var user = "<?php echo $a; ?>";
            var idInspect = $(this).val();
            var input_date = $(this).closest("tr").find("#input_date").val();
            var input_name = $(this).closest("tr").find("#input_name").val();
            var input_textForList = $(this).closest("tr").find("#input_textForList").val();
            var input_typeSafety = $(this).closest("tr").find("#input_typeSafety").val();
            var input_comment = $(this).closest("tr").find("#input_comment").val();
            var input_duration = $(this).closest("tr").find("#input_duration").val();
            var input_staff = $(this).closest("tr").find("#input_staff").val();
            var input_contract = $(this).closest("tr").find("#input_contract").val();
            var input_production = $(this).closest("tr").find("#input_production").val();
            var input_area = $(this).closest("tr").find("#input_area").val();
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '/Engels/inspection/checkUserInspection.php',
                data: {
                    id: idInspect,
                    user: user
                },
                success: function(response)
                {
                    if(response == "true"){
                        $.ajax({
                            type: 'POST',
                            dataType: 'html',
                            url: '/Engels/inspection/updateInspectionNew.php',
                            data: {
                                id: idInspect,
                                input_date: input_date,
                                input_name: input_name,
                                input_textForList: input_textForList,
                                input_typeSafety: input_typeSafety,
                                input_comment: input_comment,
                                input_duration: input_duration,
                                input_staff: input_staff,
                                input_contract: input_contract,
                                input_production: input_production,
                                input_area: input_area
                            },
                            success: function(response) {
                                updateTable();
                                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                            }
                        });
                    }
                    else{
                        $('#myModalErrorUpdate').modal('show'); // показываем модальное окно
                    }
                }
            });
        });
    </script>
</html>
