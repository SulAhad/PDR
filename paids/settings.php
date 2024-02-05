<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['premirovanie'] == 0){
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
                                <div class="col-md-7 m-2">
                                    <label style="font-size: 12px;" for="max_percent" class="mt-2">Максимальный процент премии</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="max_percent" class="form-control form-control-sm mt-1" placeholder="процент премии, %" >
                                        <?php
                                            $message = "SELECT max_percent FROM settings_for_paids ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm   mt-1 border-0' style='width:200px; height:30px;' id='max_percent' readonly value='$row[max_percent]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="max_value_for_quality" class="mt-2">Максимальное значение по качеству (это значение при котором уменьшается процент премии при обнаружении замечания)</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="max_value_for_quality" class="form-control form-control-sm  mt-1" placeholder="значение по премии" >
                                        <?php
                                            $message = "SELECT max_value_for_quality FROM settings_for_paids ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control form-control-sm  mt-1 border-0' style='width:200px; height:30px;' id='max_value_for_quality' readonly value='$row[max_value_for_quality]'></input>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2 offset-md-2 d-flex" style="margin-top: auto;">
                                    <div class="row mt-auto">
                                        <button type="button" class="add btn btn-sm btn-secondary m-2"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                            $(".add").click(function() {
                                                var max_percent = document.getElementById('max_percent');
                                                var max_value_for_quality = document.getElementById('max_value_for_quality');
                                                $.ajax({
                                                    type: 'POST',
                                                    dataType: 'json',
                                                    url: '/Engels/paids/_add.php',
                                                    data: {
                                                        max_percent: max_percent.value,
                                                        max_value_for_quality: max_value_for_quality.value
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
                    <div class="col-md-12">
                      <fieldset class="border card shadow-sm mb-3 bg-light">
                        <div class="row">
                          <div class="col-md-7 m-2">
                              <label style="font-size: 12px;" for="user" class="mt-2">Сотрудник</label>
                              <div style="display: flex;">
                                  <input type="text" id="user" class="form-control form-control-sm  mt-1" placeholder="фамилия имя отчество" >
                              </div>
                          </div>
                          <div class="col-md-2 offset-md-2 d-flex" style="margin-top: auto;">
                              <div class="row mt-auto">
                                  <button type="button" class="add_user btn-sm btn btn-secondary m-2"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                              </div>
                          </div></div>
                        <div class="table-responsive">
                            <table id="myTable" class="mt-2 table-hover table-bordered table table-sm ">
                                <thead>
                                    <tr>
                                        <th class="col-0">id</th>
                                        <th class="col-12">Имя пользователя</th>
                                        <th class="col-0"></th>
                                        <th class="col-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $message = "SELECT * FROM operator";
                                      $link->set_charset("utf8");
                                      $result = mysqli_query($link, $message);
                                      while ($row = mysqli_fetch_assoc($result))
                                      {
                                        echo "<tr>";
                                              echo "<td>$row[id]</td>";
                                              echo "<td><input type='text' id='input_name' class='form-control form-control-sm border-0' value='$row[name]'></input></td>";
                                              echo "<td><button title='Изменить' type='button' class='btn btn-sm btn-outline update' value='$row[id]'><img src='../icons/change.jpg' style='height:16px;'></button></td>";
                                              echo "<td><button title='Удалить' type='button' class='btn btn-sm btn-outline delete' value='$row[id]'><img src='../icons/trash.png' style='height:16px;'></button></td>";
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
