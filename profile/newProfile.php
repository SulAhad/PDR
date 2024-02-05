<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>

    <body class="container-fluid">
    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
        <div class="row card shadow-sm blur">
            <div class="col-md-12">
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-12">
                        <p style="font-size:22px; border-bottom: 1px solid #f00;">Создание нового пользователя</p>
                        <fieldset class="form-group border card shadow-sm">
                            <div class="row">
                                <div class="col-md-6 m-2">
                                    <div class="table-responsive">
                                        <label style="font-size:12px;" for="surName" class="mt-2">Фамилия</label>
                                        <input type="text" min="0" id="surName" class="form-control mt-1" placeholder="Фамилия" >
                                        <label style="font-size:12px;" for="name" class="mt-2">Имя</label>
                                        <input type="text" min="0" id="name" class="form-control mt-1" placeholder="Имя" >
                                        <label style="font-size:12px;" for="position" class="mt-2">Должность</label>
                                        <input type="text" min="0" id="position" class="form-control mt-1" placeholder="Должность" >
                                        <label style="font-size:12px;" for="login" class="mt-2">Login</label>
                                        <input type="text" min="0" id="login" class="form-control mt-1" placeholder="Login">
                                        <label style="font-size:12px;" for="pass" class="mt-2">Пароль</label>
                                        <input type="password" min="0" id="pass" class="form-control mt-1" placeholder="Пароль" >
                                        <label style="font-size:12px;" for="access" class="mt-2">Уровень доступа</label>
                                        <input type="number" min="0" id="access" class="form-control mt-1" placeholder="Уровень доступа" >
                                    </div>
                                </div>
                                <div class="col-md-2 offset-md-2 d-flex" style="margin-top: auto;">
                                <div class="row mt-auto">
                                    <button type="button" class="add btn btn-secondary m-2"><img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить</button>
                                </div>
                            </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-md-4 border-1">
                                <fieldset class="form-group border card shadow-sm mt-4 p-1">
                                    <p>Пользователи с уровнем больше 99 могут создавать новых пользователей</p>
                                </fieldset>
                            </div>
                            <div class="col-md-4 border-1">
                                <fieldset class="form-group border card shadow-sm mt-4 p-1">
                                    <p>Уровень доступа настраивется только с уровнем выше 99</p>
                                </fieldset>
                            </div>
                            <div class="col-md-4 border-1">
                                <fieldset class="form-group border card shadow-sm mt-4 p-1">
                                    <p>Изменить пароль невозможно - только удаление и/или создание нового пользователя</p>
                                </fieldset>
                            </div>
                        </div>
                        <fieldset class="form-group border card shadow-sm mt-4 mb-3 bg-light">
                            <div class="table-responsive">
                                <table id="table_add_user" class="table-hover table-bordered table table-sm ">
                                    <thead>
                                            <td class="col-1">№</td>
                                            <td class="col-2">Login</td>
                                            <td class="col-1">Уровень доступа</td>
                                            <td class="col-2">Фамилия</td>
                                            <td class="col-2">Имя</td>
                                            <td>Должность</td>
                                            <td class="col-2">Дата регистрации</td>
                                            <td style='writing-mode:vertical-rl;'>Главное меню</td>
                                            <td style='writing-mode:vertical-rl;'>Топ-5 Проблем</td>
                                            <td style='writing-mode:vertical-rl;'>Лист Обходов</td>
                                            <td style='writing-mode:vertical-rl;'>Безопасность</td>
                                            <td style='writing-mode:vertical-rl;'>Качество</td>
                                            <td style='writing-mode:vertical-rl;'>Технология</td>
                                            <td style='writing-mode:vertical-rl;'>Производство СМС</td>
                                            <td style='writing-mode:vertical-rl;'>Сульфирование</td>
                                            <td style='writing-mode:vertical-rl;'>Сырье</td>
                                            <td style='writing-mode:vertical-rl;'>Вторичная вода</td>
                                            <td style='writing-mode:vertical-rl;'>Паллетайзер</td>
                                            <td style='writing-mode:vertical-rl;'>Иннотех 1</td>
                                            <td style='writing-mode:vertical-rl;'>Иннотех 2</td>
                                            <td style='writing-mode:vertical-rl;'>Иннотех 3</td>
                                            <td style='writing-mode:vertical-rl;'>UVA-4</td>
                                            <td style='writing-mode:vertical-rl;'>UVA-5</td>
                                            <td style='writing-mode:vertical-rl;'>AKMA-4</td>
                                            <td style='writing-mode:vertical-rl;'>Планирование</td>
                                            <td style='writing-mode:vertical-rl;'>Премирование</td>
                                            <td style='writing-mode:vertical-rl;'>Распорядок дня</td>
                                            <td style='writing-mode:vertical-rl;'>Support</td>
                                            <td></td>
                                            <td></td>
                                            <style>
                                                .center {
                                                margin: 0 auto;
                                                justify-content: center;
                                                align-items: center;
                                                }
                                                .fontTr{
                                                    border: none;
                                                }
                                            </style>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $message = "SELECT * FROM Users_KPI";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            $i;
                                            while ($row = mysqli_fetch_assoc($result))
                                            {
                                              $i++;
                                                echo "<tr>";
                                                    echo "<td><input type='text' class='border-0 form-control form-control-sm' value='$i' readonly></input></td>";
                                                    echo "<td><input type='text' class='border-0 form-control form-control-sm' value='$row[name]' readonly></input></td>";
                                                    echo "<td><input type='number'  id='input_access'    class='border-0 form-control form-control-sm' value='$row[access]'></input></td>";
                                                    echo "<td><input type='text'    id='input_surName'   class='border-0 form-control form-control-sm' value='$row[surName]'></input></td>";
                                                    echo "<td><input type='text'    id='input_nameUser'  class='border-0 form-control form-control-sm' value='$row[nameUser]'></input></td>";
                                                    echo "<td><input type='text'    id='input_position'  class='border-0 form-control form-control-sm' value='$row[position]'></input></td>";
                                                    echo "<td><input type='datetime-local' class='border-0 form-control form-control-sm' value='$row[date]' readonly></input></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input form-check-input-sm input_main' id='input_main' value='$row[main]'" . ($row['main'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_top5problem' id='input_top5problem' value='$row[top5problem]' " . ($row['top5problem'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_inspection' id='input_inspection' value='$row[inspection]' " . ($row['inspection'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_safety' id='input_safety' value='$row[safety]' " . ($row['safety'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_quality' id='input_quality' value='$row[quality]' " . ($row['quality'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_technology' id='input_technology' value='$row[technology]' " . ($row['technology'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_production' id='input_production' value='$row[production]' " . ($row['production'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_sulf' id='input_sulf' value='$row[sulfirovanie]' " . ($row['sulfirovanie'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_sirye' id='input_sirye' value='$row[sirye]' " . ($row['sirye'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_active_water' id='input_active_water' value='$row[active_water]' " . ($row['active_water'] == 1 ? 'checked' : '') . " ></td>";
                                                    
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_palletizer' id='input_palletizer' value='$row[palletizer]' " . ($row['palletizer'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_innotech1' id='input_innotech1' value='$row[innotech1]' " . ($row['innotech1'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_innotech2' id='input_innotech2' value='$row[innotech2]' " . ($row['innotech2'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_innotech3' id='input_innotech3' value='$row[innotech3]' " . ($row['innotech3'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_uva4' id='input_uva4' value='$row[uva4]' " . ($row['uva4'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_uva5' id='input_uva5' value='$row[uva5]' " . ($row['uva5'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_acma4' id='input_acma4' value='$row[acma4]' " . ($row['acma4'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_planing' id='input_planing' value='$row[planing]' " . ($row['planing'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_premirovanie' id='input_premirovanie' value='$row[premirovanie]' " . ($row['premirovanie'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_technical' id='input_technical' value='$row[technical]' " . ($row['technical'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td class='center'><input type='checkbox' class='fontTr form-check-input input_support' id='input_support' value='$row[support]' " . ($row['support'] == 1 ? 'checked' : '') . " ></td>";
                                                    echo "<td><button type='button' class='update btn btn-outline btn-sm btn-light' title='Изменить' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:19px;'></button></td>";
                                                    echo "<td><button type='button' class='delete btn btn-outline btn-sm btn-light' title='Удалить' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:19px;'></button></td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $(".update").click(function() {
                                        var id_user = $(this).val();
                                        var access = $(this).closest("tr").find("#input_access").val();
                                        var surName = $(this).closest("tr").find("#input_surName").val();
                                        var nameUser = $(this).closest("tr").find("#input_nameUser").val();
                                        var position = $(this).closest("tr").find("#input_position").val();
                                        var input_main = $('.input_main').prop('checked') ? 1 : 0;
                                        var input_top5problem = $(this).closest("tr").find("#input_top5problem").prop('checked') ? 1 : 0;
                                        var input_inspection = $(this).closest("tr").find("#input_inspection").prop('checked') ? 1 : 0;
                                        var input_safety = $(this).closest("tr").find("#input_safety").prop('checked') ? 1 : 0;
                                        var input_quality = $(this).closest("tr").find("#input_quality").prop('checked') ? 1 : 0;
                                        var input_technology = $(this).closest("tr").find("#input_technology").prop('checked') ? 1 : 0;
                                        var input_production = $(this).closest("tr").find("#input_production").prop('checked') ? 1 : 0;
                                        var input_sulf = $(this).closest("tr").find("#input_sulf").prop('checked') ? 1 : 0;
                                        var input_sirye = $(this).closest("tr").find("#input_sirye").prop('checked') ? 1 : 0;
                                        var input_active_water = $(this).closest("tr").find("#input_active_water").prop('checked') ? 1 : 0;
                                        var input_support = $(this).closest("tr").find("#input_support").prop('checked') ? 1 : 0;
                                        var input_palletizer = $(this).closest("tr").find("#input_palletizer").prop('checked') ? 1 : 0;
                                        var input_innotech1 = $(this).closest("tr").find("#input_innotech1").prop('checked') ? 1 : 0;
                                        var input_innotech2 = $(this).closest("tr").find("#input_innotech2").prop('checked') ? 1 : 0;
                                        var input_innotech3 = $(this).closest("tr").find("#input_innotech3").prop('checked') ? 1 : 0;
                                        var input_uva4 = $(this).closest("tr").find("#input_uva4").prop('checked') ? 1 : 0;
                                        var input_uva5 = $(this).closest("tr").find("#input_uva5").prop('checked') ? 1 : 0;
                                        var input_acma4 = $(this).closest("tr").find("#input_acma4").prop('checked') ? 1 : 0;
                                        var input_planing = $(this).closest("tr").find("#input_planing").prop('checked') ? 1 : 0;
                                        var input_premirovanie = $(this).closest("tr").find("#input_premirovanie").prop('checked') ? 1 : 0;
                                        var input_technical = $(this).closest("tr").find("#input_technical").prop('checked') ? 1 : 0;
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/profile/update_profileUser.php',
                                    data: {
                                        id_user:id_user,
                                        access:access,
                                        surName:surName,
                                        nameUser:nameUser,
                                        input_main: input_main,
                                        input_top5problem: input_top5problem,
                                        input_inspection: input_inspection,
                                        input_safety: input_safety,
                                        input_quality: input_quality,
                                        input_technology: input_technology,
                                        input_production: input_production,
                                        input_sulf: input_sulf,
                                        input_sirye: input_sirye,
                                        input_active_water: input_active_water,
                                        input_support: input_support,
                                        input_palletizer: input_palletizer,
                                        input_innotech1: input_innotech1,
                                        input_innotech2: input_innotech2,
                                        input_innotech3: input_innotech3,
                                        input_uva4: input_uva4,
                                        input_uva5: input_uva5,
                                        input_acma4: input_acma4,
                                        input_planing: input_planing,
                                        input_premirovanie: input_premirovanie,
                                        input_technical:input_technical
                                    },
                                    success: function(response) {
                                        $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                        var data = JSON.parse(response);
                                    },
                                    error: function(xhr, status, error) {
                                        alert("Error: " + error + "items not null");
                                    }
                                });
                            });
                        });
                    </script>
                    <script>
                    $(document).ready(function() {
                        $(".add").click(function() {
                            var surName = document.getElementById('surName');
                            var name = document.getElementById('name');
                            var position = document.getElementById('position');
                            var login = document.getElementById('login');
                            var pass = document.getElementById('pass');
                            var access = document.getElementById('access');
                            $.ajax({
                                type: 'POST',
                                dataType: 'html',
                                url: '/Engels/profile/check_newUser.php',
                                data: {login: login.value},
                                success: function(response) {
                                    if(response === "true") {
                                        $.ajax({
                                            type: 'POST',
                                            dataType: 'html',
                                            url: '/Engels/profile/add_newUser.php',
                                            data: {
                                                surName: surName.value,
                                                name: name.value,
                                                position: position.value,
                                                login: login.value,
                                                pass: pass.value,
                                                access: access.value
                                            },
                                            success: function(response) {
                                                var data = JSON.parse(response);
                                                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                                var newRow = "<tr><td><input id='input_name' type='text' class='fontTr form-control border-0' value='" +
                                                    data.name + "'></td><td><input readonly type='password' class='fontTr form-control border-0' value='" +
                                                    data.pass + "'></td><td><input id='input_access' type='number' class='fontTr form-control border-0' value='" +
                                                    data.access + "'></td><td><input id='input_surName' type='text' class='fontTr form-control border-0' value='" +
                                                    data.surName + "'></td><td><input id='input_nameUser' type='text' class='fontTr form-control border-0' value='" +
                                                    data.nameUser + "'></td><td><input id='input_position' type='text' class='fontTr form-control border-0' value='" +
                                                    data.position + "'></td><td><input readonly type='date' class='fontTr form-control border-0' value='" +
                                                    data.date_user + "'></td><td><button type='button' class='fontTr update btn btn-outline btn-sm btn-light' value='" +
                                                    data.id + "'><img src='/Engels/change.jpg' style='height:23px;'></button></td><td style='font-size:10px;'><button type='button' class='delete btn btn-outline btn-sm btn-light' value='" +
                                                    data.id + "'><img src='/Engels/trash.png' style='height:23px;'></button></td></tr>";
                                                $('#table_add_user tbody').append(newRow);
                                            }
                                        });
                                    }
                                    if(response === "false"){
                                        $('.alert-success_UserError').fadeIn(1000).delay(3000).fadeOut(1000);
                                    }
                                }
                            });
                        });
                    });
                    </script>
                    <script>
                        $(document).on("click", ".delete", function() {
                        var deleteUser = this.value;
                        var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
                        $.ajax({
                            type: 'POST',
                            dataType: 'html',
                            url: '/Engels/profile/delete_userProfile.php',
                            data: { idUser: deleteUser },
                            success: function(response) {
                                var data = JSON.parse(response);
                                row.remove(); // удаляем строку таблицы
                                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                            }
                        });
                    });
                    </script>
                </form>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
