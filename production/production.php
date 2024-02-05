<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['production'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>

    <body class="container ">
        <form  method="post" id="formToSend">
            <div class="row card shadow-sm mt-4 blur bg-light">
                <p style="font-size:22px; border-bottom: 1px solid #f00;"><?php echo"$app_names->_production"; ?></p>
                <script src="/Engels/script.js"></script>
                <div class="col-md-12">
                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                    <div class="row" method="post" id="formToSend">
                        <div class="col-md-3">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <div class="form-group row">
                                    <label style="font-size:12px;" for="dateTime" class="mt-2">Выберите дату</label>
                                    <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control form-control-sm  mt-1" placeholder="" required>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Смена А" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">Смена А</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Смена Б">
                                        <label class="form-check-label" for="flexRadioDefault2">Смена Б</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="Смена В">
                                        <label class="form-check-label" for="flexRadioDefault3">Смена В</label>
                                    </div>
                                    
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Выпуск</p>
                                <label style="font-size:12px;" for="plan_team" class="mt-1">План</label>
                                <input value="0" min="0" type="number" id="plan_team"  style="border-bottom: 2px solid gray;" class="form-control form-control-sm mt-1" placeholder="план" required>
                                <label style="font-size:12px;" for="fact_team" class="mt-1">Факт</label>
                                <input value="0" min="0" type="number" id="fact_team"  style="border-bottom: 2px solid gray;" class="form-control form-control-sm mt-1" placeholder="факт" required>
                            </fieldset>
                        </div>
                        
                        <div class="col-md-3">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Отклонение</p>
                                <label for="deviation" style="font-size:12px;" class="mt-1">Отклонение</label>
                                <input readonly value="0" min="0" type="number" id="deviation"  style="border-bottom: 2px solid gray;"  class="form-control form-control-sm mt-2" placeholder="отклонение" required>
                                <label for="oee_total" style="font-size:12px;" class="mt-1">Общее OEE</label>
                                <input value="0"  required min="0" type="number" id="oee_total" style="border-bottom: 2px solid gray;"  class="form-control form-control-sm mt-2" placeholder="oee" required>
                            </fieldset>
                        </div>
                        <script>
                            // Получаем элементы input
                            var factTeamInput = document.getElementById('fact_team');
                            var planTeamInput = document.getElementById('plan_team');
                            var deviation = document.getElementById('deviation');

                            // Добавляем обработчик события на изменение значений в factTeamInput и planTeamInput
                            factTeamInput.addEventListener('input', updateOEE);
                            planTeamInput.addEventListener('input', updateOEE);

                            // Функция для обновления значения в oeeTotalInput
                            function updateOEE() {
                            // Получаем значения из factTeamInput и planTeamInput и преобразуем их в формат с плавающей запятой (float)
                            var factValue = parseFloat(factTeamInput.value);
                            var planValue = parseFloat(planTeamInput.value);
                            
                            // Вычисляем отклонение
                            var dev = factValue - planValue;
                            
                            // Округляем результат до двух знаков после запятой
                            var roundedDeviation = dev.toFixed(2);
                            
                            // Выводим округленный результат в oeeTotalInput
                            deviation.value = roundedDeviation;
                            }
                        </script>
                    </div>
                </div>
                <div class="col-md-12">
                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                        <div class="form-group row">
                            <label for="OEE_team" style="font-size:12px;" class="mt-2">OEE, %</label>
                            <input value="0" required min="0" max="100" type="number" id="OEE_team" style="border-bottom: 2px solid gray;" class="form-control form-control-sm mt-1" placeholder="oee">
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label for="innotech1" style="width:10%; font-size:12px;" class="mt-2">Innotech 1, %</label>
                            <label for="innotech1_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="innotech1_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label for="innotech1_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input value="0" required min="0" max="100" type="number" id="innotech1" style="width:10%;" class="form-control form-control-sm mt-1" placeholder="innotech 1" required>
                            <input value="0" required min="0" max="100" type="number" id="innotech1_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="innotech1_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                                    <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM innotech1 WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                                </select>
                            <input type="text" id="innotech1_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->

                            <label for="innotech2" style="width:10%; font-size:12px;" class="mt-2">Innotech 2, %</label>
                            <label for="innotech2_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="innotech2_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label for="innotech2_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input value="0" required min="0" max="100" type="number" id="innotech2" style="width:10%;" class="form-control form-control-sm mt-1" placeholder="innotech 2" required>
                            <input value="0" required min="0" max="100" type="number" id="innotech2_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="innotech2_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM innotech2 WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input type="text" id="innotech2_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label for="innotech3" style="width:10%; font-size:12px;" class="mt-2">Innotech 3, %</label>
                            <label for="innotech3_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="innotech3_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label for="innotech3_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input value="0" required min="0" max="100" type="number" id="innotech3" style="width:10%;" class="form-control form-control-sm mt-1" placeholder="innotech 3" required>
                            <input value="0" required min="0" max="100" type="number" id="innotech3_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="innotech3_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM innotech3 WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input type="text" id="innotech3_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label for="uva4" style="width:10%; font-size:12px;" class="mt-2">UVA 4, %</label>
                            <label for="uva4_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="uva4_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label for="uva4_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input value="0" required min="0" max="100" type="number" id="uva4" style="width:10%;" class="form-control form-control-sm mt-1" placeholder="uva 4" required>
                            <input value="0" required min="0" max="100" type="number" id="uva4_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="uva4_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM uva4 WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input type="text" id="uva4_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->

                            <label for="uva5" style="width:10%; font-size:12px;" class="mt-2">UVA 5, %</label>
                            <label for="uva5_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="uva5_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label for="uva5_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input value="0" required min="0" max="100" type="number" id="uva5" style="width:10%;" class="form-control form-control-sm mt-1" placeholder="uva 5" required>
                            <input value="0" required min="0" max="100" type="number" id="uva5_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="uva5_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM uva5 WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input type="text" id="uva5_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label for="acma" style="width:10%; font-size:12px;" class="mt-2">ACMA, %</label>
                            <label for="acma_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="acma_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label for="acma_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input value="0" required min="0" max="100" type="number" id="acma" style="width:10%;" class="form-control form-control-sm mt-1" placeholder="acma" required>
                            <input value="0" required min="0" max="100" type="number" id="acma_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="acma_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM acma WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input type="text" id="acma_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="shrink" style="width:10%; font-size:12px;" class="mt-2">Shrink, %</label>
                            <label readonly for="shrink_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="shrink_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label readonly for="shrink_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" required min="0" max="100" type="number" id="shrink" style="width:10%;" class="form-control form-control-sm mt-1" placeholder="acma" required>
                            <input readonly value="0" required min="0" max="100" type="number" id="shrink_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="shrink_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM shrink WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="shrink_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="pallet" style="width:10%; font-size:12px;" class="mt-2">Паллетайзер, %</label>
                            <label readonly for="pallet_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="pallet_user" style="width:15%; font-size:12px;" class="mt-2">Оператор</label>
                            <label readonly for="pallet_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" required min="0" max="100" type="number" id="pallet" style="width:10%;" class="form-control form-control-sm mt-1" required>
                            <input readonly value="0" required min="0" max="100" type="number" id="pallet_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="pallet_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM pallet WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="pallet_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="bunker" style="width:10%; font-size:12px;" class="mt-2">Бункеровщик, %</label>
                            <label readonly for="bunker_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="bunker_user" style="width:15%; font-size:12px;" class="mt-2">Аппаратчик</label>
                            <label readonly for="bunker_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" required min="0" max="100" type="number" id="bunker" style="width:10%;" class="form-control form-control-sm mt-1">
                            <input readonly value="0" min="0" max="100" type="number" id="bunker_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="bunker_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM bunker WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="bunker_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="sushka" style="width:10%; font-size:12px;" class="mt-2">Сушка, %</label>
                            <label readonly for="sushka_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="sushka_user" style="width:15%; font-size:12px;" class="mt-2">Аппаратчик</label>
                            <label readonly for="sushka_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" required min="0" max="100" type="number" id="sushka" style="width:10%;" class="form-control form-control-sm mt-1">
                            <input readonly value="0" min="0" max="100" type="number" id="sushka_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="sushka_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM sushka WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="sushka_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="bashnya" style="width:10%; font-size:12px;" class="mt-2">Башня, %</label>
                            <label readonly for="bashnya_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="bashnya_user" style="width:15%; font-size:12px;" class="mt-2">Аппаратчик</label>
                            <label readonly for="bashnya_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" required min="0" max="100" type="number" id="bashnya" style="width:10%;" class="form-control form-control-sm mt-1">
                            <input readonly value="0" min="0" max="100" type="number" id="bashnya_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="bashnya_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM bashnya WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="bashnya_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="gazgen" style="width:10%; font-size:12px;" class="mt-2">Газогенерация, %</label>
                            <label readonly for="gazgen_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="gazgen_user" style="width:15%; font-size:12px;" class="mt-2">Аппаратчик</label>
                            <label readonly for="gazgen_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" required min="0" max="100" type="number" id="gazgen" style="width:10%;" class="form-control form-control-sm mt-1">
                            <input readonly value="0" min="0" max="100" type="number" id="gazgen_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="gazgen_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM gazgen WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="gazgen_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="prigotovlenie" style="width:10%; font-size:12px;" class="mt-2">Приготовление, %</label>
                            <label readonly for="prigotovlenie_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="prigotovlenie_user" style="width:15%; font-size:12px;" class="mt-2">Аппаратчик</label>
                            <label readonly for="prigotovlenie_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" required min="0" max="100" type="number" id="prigotovlenie" style="width:10%;" class="form-control form-control-sm mt-1">
                            <input readonly value="0" min="0" max="100" type="number" id="prigotovlenie_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="prigotovlenie_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM prigotovlenie WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="prigotovlenie_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                            <label readonly for="postdobavki" style="width:10%; font-size:12px;" class="mt-2">Постдобавки, %</label>
                            <label readonly for="postdobavki_trek" style="width:15%; font-size:12px;" class="mt-2">количество переходов, шт</label>
                            <label for="postdobavki_user" style="width:15%; font-size:12px;" class="mt-2">Аппаратчик</label>
                            <label readonly for="postdobavki_comment" style="width:60%; font-size:12px;" class="mt-2">Комментарий</label>

                            <input readonly value="0" min="0" max="100" type="number" id="postdobavki" style="width:10%;" class="form-control form-control-sm mt-1">
                            <input readonly value="0" min="0" max="100" type="number" id="postdobavki_trek" style="width:15%;" class="form-control form-control-sm mt-1" placeholder="количество переходов" required>
                            <select style="width:15%;" id="postdobavki_user" class="form-select mt-1" aria-label="Default select example" autocomplete="on">
                            <?php
                                    require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
                                    $message = "SELECT name_operator FROM postdobavki WHERE name_operator <> '' ORDER BY date DESC LIMIT 1";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);

                                    $message_all = "SELECT * FROM operator";
                                    $link->set_charset("utf8");
                                    $result_all = mysqli_query($link, $message_all);
                                    while ($row_all = mysqli_fetch_assoc($result_all)) {
                                        echo "<option value='" . $row_all['name'] . "'>" . $row_all['name'] . "</option>";
                                    }
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option selected value='" . $row['name_operator'] . "'>" . $row['name_operator'] . "</option>";
                                    }
                                    ?>
                            </select>
                            <input readonly type="text" id="postdobavki_comment" style="width:60%;" class="form-control form-control-sm mt-1" placeholder="введите комментарий" ></input>
<!-- ____________________________________________________________________________________________________________________________________________________________________________________________________ -->
                        </div>
                        </div>
                    </fieldset>
                    <script>
                        document.getElementById('OEE_team').addEventListener('input', function() {
                        var inputValue = this.value;
                        document.getElementById('pallet').value = inputValue;
                        document.getElementById('bunker').value = inputValue;
                        document.getElementById('sushka').value = inputValue;
                        document.getElementById('bashnya').value = inputValue;
                        document.getElementById('gazgen').value = inputValue;
                        document.getElementById('prigotovlenie').value = inputValue;
                        document.getElementById('postdobavki').value = inputValue;
                        });
                    </script>
                    <script>
                        document.getElementById('acma').addEventListener('input', function() {
                        var inputValueacma = this.value;
                        document.getElementById('shrink').value = inputValueacma;
                        
                        });
                    </script>
                </div>
                    </div>
                    <button style="width:200px;" type="button" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                    
                    <div class="alert alert-plan" style="display:none; position: fixed;">ОШИБКА СОХРАНЕНИЯ! Строка "План" не может быть пустым!</div>
                </div>
            </div>
            <script>
                $(document).ready
            (function()
                {
                    $(".add").click
                    (
                		function()
                		{
                            var user = "<?php echo $a; ?>";
                            var dateTime = document.getElementById('dateTime').value;
                            var team = document.querySelector('input[name="flexRadioDefault"]:checked').value;

                            var plan_team = document.getElementById('plan_team').value;
                            var fact_team = document.getElementById('fact_team').value;
                            var deviation = document.getElementById('deviation').value;
                            var oee_total = document.getElementById('oee_total').value;
                            var OEE_team = document.getElementById('OEE_team').value;

                            var innotech1 = document.getElementById('innotech1').value;
                            var innotech1_trek = document.getElementById('innotech1_trek').value;
                            var innotech1_user = document.getElementById('innotech1_user').value;
                            var innotech1_comment = document.getElementById('innotech1_comment').value;

                            var innotech2 = document.getElementById('innotech2').value;
                            var innotech2_trek = document.getElementById('innotech2_trek').value;
                            var innotech2_user = document.getElementById('innotech2_user').value;
                            var innotech2_comment = document.getElementById('innotech2_comment').value;

                            var innotech3 = document.getElementById('innotech3').value;
                            var innotech3_trek = document.getElementById('innotech3_trek').value;
                            var innotech3_user = document.getElementById('innotech3_user').value;
                            var innotech3_comment = document.getElementById('innotech3_comment').value;

                            var uva4 = document.getElementById('uva4').value;
                            var uva4_trek = document.getElementById('uva4_trek').value;
                            var uva4_user = document.getElementById('uva4_user').value;
                            var uva4_comment = document.getElementById('uva4_comment').value;
                            
                            var uva5 = document.getElementById('uva5').value;
                            var uva5_trek = document.getElementById('uva5_trek').value;
                            var uva5_user = document.getElementById('uva5_user').value;
                            var uva5_comment = document.getElementById('uva5_comment').value;

                            var acma = document.getElementById('acma').value;
                            var acma_trek = document.getElementById('acma_trek').value;
                            var acma_user = document.getElementById('acma_user').value;
                            var acma_comment = document.getElementById('acma_comment').value;

                            var shrink = document.getElementById('shrink').value;
                            var shrink_user = document.getElementById('shrink_user').value;

                            var pallet = document.getElementById('pallet').value;
                            var pallet_user = document.getElementById('pallet_user').value;

                            var bunker = document.getElementById('bunker').value;
                            var bunker_user = document.getElementById('bunker_user').value;

                            var sushka = document.getElementById('sushka').value;
                            var sushka_user = document.getElementById('sushka_user').value;

                            var bashnya = document.getElementById('bashnya').value;
                            var bashnya_user = document.getElementById('bashnya_user').value;

                            var gazgen = document.getElementById('gazgen').value;
                            var gazgen_user = document.getElementById('gazgen_user').value;

                            var prigotovlenie = document.getElementById('prigotovlenie').value;
                            var prigotovlenie_user = document.getElementById('prigotovlenie_user').value;

                            var postdobavki = document.getElementById('postdobavki').value;
                            var postdobavki_user = document.getElementById('postdobavki_user').value;
                            $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addProduction.php',
                                    data:
                                    {
                                        user:user,
                                        dateTime:dateTime,
                                        team:team,

                                        plan_team:plan_team,
                                        fact_team:fact_team,
                                        deviation:deviation,
                                        oee_total:oee_total,
                                        OEE_team:OEE_team,

                                        innotech1:innotech1,
                                        innotech1_trek:innotech1_trek,
                                        innotech1_user:innotech1_user,
                                        innotech1_comment:innotech1_comment,

                                        innotech2:innotech2,
                                        innotech2_trek:innotech2_trek,
                                        innotech2_user:innotech2_user,
                                        innotech2_comment:innotech2_comment,

                                        innotech3:innotech3,
                                        innotech3_trek:innotech3_trek,
                                        innotech3_user:innotech3_user,
                                        innotech3_comment:innotech3_comment,

                                        uva4:uva4,
                                        uva4_trek:uva4_trek,
                                        uva4_user:uva4_user,
                                        uva4_comment:uva4_comment,

                                        uva5:uva5,
                                        uva5_trek:uva5_trek,
                                        uva5_user:uva5_user,
                                        uva5_comment:uva5_comment,

                                        acma:acma,
                                        acma_trek:acma_trek,
                                        acma_user:acma_user,
                                        acma_comment:acma_comment
                                    },
                                    success: function(response)
                                    {
                                      
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addInnotech1.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        innotech1:innotech1,
                                        innotech1_user:innotech1_user
                                    },
                                    success: function(response)
                                    {
                                       
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addInnotech2.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        innotech2:innotech2,
                                        innotech2_user:innotech2_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addInnotech3.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        innotech3:innotech3,
                                        innotech3_user:innotech3_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/adduva4.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        uva4:uva4,
                                        uva4_user:uva4_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/adduva5.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        uva5:uva5,
                                        uva5_user:uva5_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addacma.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        acma:acma,
                                        acma_user:acma_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addshrink.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        shrink:shrink,
                                        shrink_user:shrink_user
                                    },
                                    success: function(response)
                                    {
                                       
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addpallet.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        pallet:pallet,
                                        pallet_user:pallet_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addbunker.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        bunker:bunker,
                                        bunker_user:bunker_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addsushka.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        sushka:sushka,
                                        sushka_user:sushka_user
                                    },
                                    success: function(response)
                                    {
                                       
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addbashnya.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        bashnya:bashnya,
                                        bashnya_user:bashnya_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addgazgen.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        gazgen:gazgen,
                                        gazgen_user:gazgen_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addprigotovlenie.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        prigotovlenie:prigotovlenie,
                                        prigotovlenie_user:prigotovlenie_user
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/production/addpostdobavki.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        postdobavki:postdobavki,
                                        postdobavki_user:postdobavki_user
                                    },
                                    success: function(response)
                                    {
                                        $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                        });
                    });
            </script>
        </form>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
    
</html>
