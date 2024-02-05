<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['safety'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container">
    <script>window.onload = function() {fetchData();};</script>
        <div class="row card shadow-sm blur">
            <div class="col-md-12">
                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                    <div class="col-md-12">
                        <p style="font-size:22px; border-bottom: 1px solid #f00;">Энергопотребление</p>
                            <fieldset class="form-group border card shadow-sm">
                                <div class="col-md-4">
                                    <label for="date" style="font-size:12px;" class="m-2">Выберите дату</label>
                                    <input value="<?php echo date('Y-m-d');?>" type="date" style="border-bottom: 2px solid gray;" id="date" class="form-control m-1" class="form-control mt-1 ">
                                            <input type="hidden" id="fact">
                                            <input type="hidden" id="fact_sulf">
                                </div>
                                <div class="table-responsive mt-4">
                                      <table class="table-hover table table-sm table-bordered">
                                          <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                              <th>
                                                  <!-- <td>Цель, КВт/т</td> -->
                                                  <td>КВт/т, текущее</td>
                                                  <!-- <td>КВт/т, за сутки</td> -->
                                                  <td>КВт, за сутки</td>
                                              </th>
                                          </thead>
                                          <tbody>
                                            
                                                <tr>
                                                   <td>общее энергопотребление </td>
                                                    <!--  <?php
                                                        $message = "SELECT target_total_energy FROM target_energoresurs WHERE target_total_energy > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_total_energy]' type='number' id='target_total_energy' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_total_energy" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_total_energy_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_total_energy" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                     <td>производство СМС</td>
                                                   <!-- <?php
                                                        $message = "SELECT target_production_energy FROM target_energoresurs WHERE target_production_energy > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_production_energy]' type='number' id='target_production_energy' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_production_energy" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_production_energy_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_production_energy" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td>производство сульфирования</td>
                                                    <!-- <?php
                                                        $message = "SELECT target_sulfirovanie_energy FROM target_energoresurs WHERE target_sulfirovanie_energy > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_sulfirovanie_energy]' type='number' id='target_sulfirovanie_energy' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_sulfirovanie_energy" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_sulfirovanie_energy_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_sulfirovanie_energy" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td>склад готовой продукции</td>
                                                   <!--  <?php
                                                        $message = "SELECT target_warehouse_energy FROM target_energoresurs WHERE target_warehouse_energy > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_warehouse_energy]' type='number' id='target_warehouse_energy' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_warehouse_energy" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_warehouse_energy_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_warehouse_energy" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td>утилиты</td>
                                                   <!--  <?php
                                                        $message = "SELECT target_utility_energy FROM target_energoresurs WHERE target_utility_energy > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_utility_energy]' type='number' id='target_utility_energy' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_utility_energy" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_utility_energy_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_utility_energy" class="form-control border-0"></td>
                                                </tr>
                                            </tbody>
                                      </table>
                                      <table class="table-hover table table-sm table-bordered">
                                          <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                              <th>
                                                  <!-- <td>Цель, м3/т</td> -->
                                                  <td>м3/т, текущее</td>
                                                  <!-- <td>м3/т, за сутки</td> -->
                                                  <td>M3, за сутки</td>
                                              </th>
                                          </thead>
                                          <tbody>
                                                <tr>
                                                    <td>общее водопотребление </td>
                                                   <!--  <?php
                                                        $message = "SELECT target_total_water FROM target_energoresurs WHERE target_total_water > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_total_water]' type='number' id='target_total_water' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_total_water" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_total_water_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_total_water" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td>производство СМС</td>
                                                    <!-- <?php
                                                        $message = "SELECT target_production_water FROM target_energoresurs WHERE target_production_water > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_production_water]' type='number' id='target_production_water' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_production_water" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_production_water_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_production_water" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td>производство сульфирования</td>
                                                   <!--  <?php
                                                        $message = "SELECT target_sulfirovanie_water FROM target_energoresurs WHERE target_sulfirovanie_water > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_sulfirovanie_water]' type='number' id='target_sulfirovanie_water' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_sulfirovanie_water" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_sulfirovanie_water_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_sulfirovanie_water" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td>склад готовой продукции</td>
                                                   <!--  <?php
                                                        $message = "SELECT target_warehouse_water FROM target_energoresurs WHERE target_warehouse_water > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_warehouse_water]' type='number' id='target_warehouse_water' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_warehouse_water" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_warehouse_water_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_warehouse_water" class="form-control border-0"></td>
                                                </tr>
                                                <tr>
                                                    <td>утилиты</td>
                                                    <!-- <?php
                                                        $message = "SELECT target_utility_water FROM target_energoresurs WHERE target_utility_water > 0 ORDER BY id DESC LIMIT 1";
                                                        $link->set_charset("utf8");
                                                        $result = mysqli_query($link, $message);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            echo "<td><input min='0' readonly value='$row[target_utility_water]' type='number' id='target_utility_water' class='form-control border-0'></td>";
                                                        }
                                                    ?> -->
                                                    <td><input min="0" value="0" type="number" id="current_utility_water" class="form-control border-0"></td>
                                                    <!-- <td><input min="0" value="0" type="number" id="day_utility_water_devide_weight" class="form-control border-0"></td> -->
                                                    <td><input min="0" value="0" type="number" id="day_utility_water" class="form-control border-0"></td>
                                                </tr>
                                            </tbody>
                                      </table>
                                </div>
                            </fieldset>

                    </div>
                    <button style="width:200px;" type="button" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                    <script>
                        
                        $(document).ready
                            (function()
                                {
                                    $(".add").click
                                    (
                                        function()
                                        {
                                            var date = document.getElementById('date');
                                            // var target_total_energy = document.getElementById('target_total_energy');
                                            var current_total_energy = document.getElementById('current_total_energy');
                                            // var day_total_energy_devide_weight = document.getElementById('day_total_energy_devide_weight');
                                            var day_total_energy = document.getElementById('day_total_energy');

                                            // var target_production_energy = document.getElementById('target_production_energy');
                                            var current_production_energy = document.getElementById('current_production_energy');
                                            
                                            // var day_production_energy_devide = document.getElementById('day_production_energy_devide_weight').value;
                                            // var day_production_energy_devide_weight = (day_production_energy_devide / weight).toFixed(3);
                                            var day_production_energy = document.getElementById('day_production_energy');

                                            // var target_sulfirovanie_energy = document.getElementById('target_sulfirovanie_energy');
                                            var current_sulfirovanie_energy = document.getElementById('current_sulfirovanie_energy');

                                            //var day_sulfirovanie_energy_devide_weight = document.getElementById('day_sulfirovanie_energy_devide_weight').value;
                                            // var day_sulfirovanie_energy_devide_weight = (day_sulfirovanie_energy_devide / fact_).toFixed(3);
                                            
                                            var day_sulfirovanie_energy = document.getElementById('day_sulfirovanie_energy');

                                            // var target_warehouse_energy = document.getElementById('target_warehouse_energy');
                                            var current_warehouse_energy = document.getElementById('current_warehouse_energy');
                                            // var day_warehouse_energy_devide_weight = document.getElementById('day_warehouse_energy_devide_weight');
                                            var day_warehouse_energy = document.getElementById('day_warehouse_energy');

                                            // var target_utility_energy = document.getElementById('target_utility_energy');
                                            var current_utility_energy = document.getElementById('current_utility_energy');
                                            // var day_utility_energy_devide_weight = document.getElementById('day_utility_energy_devide_weight');
                                            var day_utility_energy = document.getElementById('day_utility_energy');

                                            // var target_total_water = document.getElementById('target_total_water');
                                            var current_total_water = document.getElementById('current_total_water');
                                            // var day_total_water_devide_weight = document.getElementById('day_total_water_devide_weight');
                                            var day_total_water = document.getElementById('day_total_water');

                                            // var target_production_water = document.getElementById('target_production_water');
                                            var current_production_water = document.getElementById('current_production_water');
                                            // var day_production_water_devide_weight = document.getElementById('day_production_water_devide_weight');
                                            var day_production_water = document.getElementById('day_production_water');

                                            // var target_sulfirovanie_water = document.getElementById('target_sulfirovanie_water');
                                            var current_sulfirovanie_water = document.getElementById('current_sulfirovanie_water');
                                            // var day_sulfirovanie_water_devide_weight = document.getElementById('day_sulfirovanie_water_devide_weight');
                                            var day_sulfirovanie_water = document.getElementById('day_sulfirovanie_water');

                                            // var target_warehouse_water = document.getElementById('target_warehouse_water');
                                            var current_warehouse_water = document.getElementById('current_warehouse_water');
                                            // var day_warehouse_water_devide_weight = document.getElementById('day_warehouse_water_devide_weight');
                                            var day_warehouse_water = document.getElementById('day_warehouse_water');

                                            // var target_utility_water = document.getElementById('target_utility_water');
                                            var current_utility_water = document.getElementById('current_utility_water');
                                            // var day_utility_water_devide_weight = document.getElementById('day_utility_water_devide_weight');
                                            var day_utility_water = document.getElementById('day_utility_water');
                                            $.ajax(
                                            {
                                                type: 'POST',
                                                dataType: 'html',
                                                url: '/Engels/electricity/add_electricity.php',
                                                data: ({ date:date.value,
                                                    // target_total_water:target_total_water.value,
                                                    current_total_water:current_total_water.value,
                                                    // day_total_water_devide_weight:day_total_water_devide_weight.value,
                                                    day_total_water:day_total_water.value,
                                                    // target_production_water:target_production_water.value,
                                                    current_production_water:current_production_water.value,
                                                    // day_production_water_devide_weight:day_production_water_devide_weight.value,
                                                    day_production_water:day_production_water.value,
                                                    // target_sulfirovanie_water:target_sulfirovanie_water.value,
                                                    current_sulfirovanie_water:current_sulfirovanie_water.value,
                                                    // day_sulfirovanie_water_devide_weight:day_sulfirovanie_water_devide_weight.value,
                                                    day_sulfirovanie_water:day_sulfirovanie_water.value,
                                                    // target_warehouse_water:target_warehouse_water.value,
                                                    current_warehouse_water:current_warehouse_water.value,
                                                    // day_warehouse_water_devide_weight:day_warehouse_water_devide_weight.value,
                                                    day_warehouse_water:day_warehouse_water.value,
                                                    // target_utility_water:target_utility_water.value,
                                                    current_utility_water:current_utility_water.value,
                                                    // day_utility_water_devide_weight:day_utility_water_devide_weight.value,
                                                    day_utility_water:day_utility_water.value,

                                                    // target_total_energy:target_total_energy.value,
                                                    current_total_energy:current_total_energy.value,
                                                    // day_total_energy_devide_weight:day_total_energy_devide_weight.value,
                                                    day_total_energy:day_total_energy.value,
                                                    // target_production_energy:target_production_energy.value,
                                                    current_production_energy:current_production_energy.value,
                                                    // day_production_energy_devide_weight:day_production_energy_devide_weight,
                                                    day_production_energy:day_production_energy.value,
                                                    // target_sulfirovanie_energy:target_sulfirovanie_energy.value,
                                                    current_sulfirovanie_energy:current_sulfirovanie_energy.value,
                                                    // day_sulfirovanie_energy_devide_weight:day_sulfirovanie_energy_devide_weight,
                                                    day_sulfirovanie_energy:day_sulfirovanie_energy.value,
                                                    // target_warehouse_energy:target_warehouse_energy.value,
                                                    current_warehouse_energy:current_warehouse_energy.value,
                                                    // day_warehouse_energy_devide_weight:day_warehouse_energy_devide_weight.value,
                                                    day_warehouse_energy:day_warehouse_energy.value,
                                                    // target_utility_energy:target_utility_energy.value,
                                                    current_utility_energy:current_utility_energy.value,
                                                    // day_utility_energy_devide_weight:day_utility_energy_devide_weight.value,
                                                    day_utility_energy:day_utility_energy.value,
                                            }),
                                                success: function(response)
                                                {
                                                    $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                                },
                                                error: function(xhr, status, error)
                                                {
                                                    alert("Error: " + status);
                                                }
                                            });
                                        }
                                    );
                                }
                            );
                    </script>

            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
