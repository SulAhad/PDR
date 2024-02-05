<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['index'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container">
        <div class="row blur card shadow-sm">
            <div class="col-md-12">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                    <div class="col-md-12">
                        <p style="font-size:22px; border-bottom: 1px solid #f00;">Настройка параметров</p>
                        <fieldset class="border card shadow-sm mb-3 bg-light">
                            <div class="row">
                                <div class="col-md-7 m-2">Энергопотребление<br>
                                    <label style="font-size: 12px;" for="target_total_energy" class="mt-2">Общее энергопотребление, цель КВт/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_total_energy" class="form-control form-control-sm mt-1" placeholder="цель КВт/т" >
                                        <?php
                                            $message = "SELECT target_total_energy FROM target_energoresurs WHERE target_total_energy > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_total_energy' readonly value='$row[target_total_energy]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_production_energy" class="mt-2">Производство-СМС, цель КВт/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_production_energy" class="form-control form-control-sm mt-1" placeholder="цель КВт/т" >
                                        <?php
                                            $message = "SELECT target_production_energy FROM target_energoresurs WHERE target_production_energy > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_production_energy' readonly value='$row[target_production_energy]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_sulfirovanie_energy" class="mt-2">Сульфирование, цель КВт/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_sulfirovanie_energy" class="form-control form-control-sm mt-1" placeholder="цель КВт/т" >
                                        <?php
                                            $message = "SELECT target_sulfirovanie_energy FROM target_energoresurs WHERE target_sulfirovanie_energy > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_sulfirovanie_energy' readonly value='$row[target_sulfirovanie_energy]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_warehouse_energy" class="mt-2">СГП, цель КВт/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_warehouse_energy" class="form-control form-control-sm mt-1" placeholder="цель КВт/т" >
                                        <?php
                                            $message = "SELECT target_warehouse_energy FROM target_energoresurs WHERE target_warehouse_energy > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_warehouse_energy' readonly value='$row[target_warehouse_energy]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_utility_energy" class="mt-2">Утилиты, цель КВт/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_utility_energy" class="form-control form-control-sm mt-1" placeholder="цель КВт/т" >
                                        <?php
                                            $message = "SELECT target_utility_energy FROM target_energoresurs WHERE target_utility_energy > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_utility_energy' readonly value='$row[target_utility_energy]'></input>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </fieldset>
                        <fieldset class="border card shadow-sm mb-3 bg-light">
                            <div class="row">
                                <div class="col-md-7 m-2">Водопотребление<br>
                                    <label style="font-size: 12px;" for="target_total_water" class="mt-2">Общее водопотребление, цель m3/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_total_water" class="form-control form-control-sm mt-1" placeholder="цель m3/т" >
                                        <?php
                                            $message = "SELECT target_total_water FROM target_energoresurs WHERE target_total_water > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_total_water' readonly value='$row[target_total_water]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_production_water" class="mt-2">Производство-СМС, цель m3/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_production_water" class="form-control form-control-sm mt-1" placeholder="цель m3/т" >
                                        <?php
                                            $message = "SELECT target_production_water FROM target_energoresurs WHERE target_production_water > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_production_water' readonly value='$row[target_production_water]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_sulfirovanie_water" class="mt-2">Сульфирование, цель m3/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_sulfirovanie_water" class="form-control form-control-sm mt-1" placeholder="цель m3/т" >
                                        <?php
                                            $message = "SELECT target_sulfirovanie_water FROM target_energoresurs WHERE target_sulfirovanie_water > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_sulfirovanie_water' readonly value='$row[target_sulfirovanie_water]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_warehouse_water" class="mt-2">СГП, цель m3/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_warehouse_water" class="form-control form-control-sm mt-1" placeholder="цель m3/т" >
                                        <?php
                                            $message = "SELECT target_warehouse_water FROM target_energoresurs WHERE target_warehouse_water > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_warehouse_water' readonly value='$row[target_warehouse_water]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="target_utility_water" class="mt-2">Утилиты, цель m3/т.</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="target_utility_water" class="form-control form-control-sm mt-1" placeholder="цель m3/т" >
                                        <?php
                                            $message = "SELECT target_utility_water FROM target_energoresurs WHERE target_utility_water > 0 ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='target_utility_water' readonly value='$row[target_utility_water]'></input>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2 offset-md-2 d-flex" style="margin-top: auto;">
                                    <div class="row mt-auto">
                                        <button type="button" class="add_water btn btn-sm btn-secondary m-2"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                            $(".add_water").click(function() {
                                                var target_total_water = document.getElementById('target_total_water');
                                                var target_production_water = document.getElementById('target_production_water');
                                                var target_sulfirovanie_water = document.getElementById('target_sulfirovanie_water');
                                                var target_warehouse_water = document.getElementById('target_warehouse_water');
                                                var target_utility_water = document.getElementById('target_utility_water');
                                                var target_total_energy = document.getElementById('target_total_energy');
                                                var target_production_energy = document.getElementById('target_production_energy');
                                                var target_sulfirovanie_energy = document.getElementById('target_sulfirovanie_energy');
                                                var target_warehouse_energy = document.getElementById('target_warehouse_energy');
                                                var target_utility_energy = document.getElementById('target_utility_energy');
                                                $.ajax({
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    url: '/Engels/electricity/add_target_water.php',
                                                    data: {
                                                        target_total_water: target_total_water.value,
                                                        target_production_water: target_production_water.value,
                                                        target_sulfirovanie_water: target_sulfirovanie_water.value,
                                                        target_warehouse_water: target_warehouse_water.value,
                                                        target_utility_water: target_utility_water.value,
                                                        target_total_energy: target_total_energy.value,
                                                        target_production_energy: target_production_energy.value,
                                                        target_sulfirovanie_energy: target_sulfirovanie_energy.value,
                                                        target_warehouse_energy: target_warehouse_energy.value,
                                                        target_utility_energy: target_utility_energy.value
                                                    },
                                                    success: function(response) {
                                                        $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                                    },
                                                    error: function(xhr, status, error) {
                                                        alert("Error: " + error);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                            </div>
                        </fieldset>
                    </div>
                    

                    <script>
                      $(document).ready(function() {
                            $(".update").click(function() {
                                var id = $(this).val();
                                var user = $(this).closest("tr").find("#input_name").val();
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'json',
                                    url: '/Engels/paids/update_user.php',
                                    data: {
                                        id: id,
                                        user: user
                                    },
                                    success: function(response) {
                                        $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    },
                                    error: function(xhr, status, error) {
                                        alert("Error: " + error);
                                    }
                                });
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                          $(".delete").click(function() {
                            var idUser = $(this).val();
                            var operator = "operator";
                            var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
                            $.ajax({
                              type: 'POST',
                              dataType: 'html',
                              url: '/Engels/paids/delete.php',
                              data: {idUser: idUser, avtomat: operator},
                              success: function(response) {
                                var data = JSON.parse(response);
                                row.remove(); // удаляем строку таблицы
                                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                              },
                              error: function(xhr, status, error) {
                                  alert("Error: " + error);
                              }
                            });
                          });
                        });
                    </script>
                    <script>
                      $(document).ready(function() {
                            $(".add_user").click(function() {
                                var user = document.getElementById('user');
                              $.ajax({
                                  type: 'POST',
                                  dataType: 'html',
                                  url: '/Engels/paids/add_user.php',
                                  data: {
                                      user: user.value
                                    },
                                    success: function(response) {
                                        $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                        
                                    },
                                    error: function(xhr, status, error) {
                                        alert("Error: " + error);
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
