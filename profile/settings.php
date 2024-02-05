<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container">
        <div class="row blur card shadow-sm">
            <div class="col-md-12">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-12">
                        <p style="font-size:22px; border-bottom: 1px solid #f00;">Настройки приложения</p>
                        <fieldset class="border card shadow-sm mb-3 bg-light">
                            <div class="row">
                                <div class="col-md-7 m-2">
                                    <label style="font-size: 12px;" for="targetOEE" class="mt-2">OEE Производство СМС</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="targetOEE" class="form-control mt-1" placeholder="OEE, %" >
                                        <?php
                                            $message = "SELECT targetOEE FROM Settings_KPI ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control border-0' style='width:200px;' id='input_targetOEE' readonly value='$row[targetOEE]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="emailResponce" class="mt-2">Адрес кому отправлять пиьсма если обход НЕБЕЗОПАСНЫЙ</label>
                                    <div style="display: flex;">
                                        <input type="text" min="0" id="emailResponce" class="form-control mt-1" placeholder="адрес эл.почты" >
                                        <?php
                                            $message = "SELECT emailResponce FROM Settings_KPI ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control border-0' style='width:200px;' id='input_emailResponce' readonly value='$row[emailResponce]'></input>";
                                            }
                                        ?>
                                    </div>
                                    <label style="font-size: 12px;" for="accessForDelete" class="mt-2">Уровень для удаления строк</label>
                                    <div style="display: flex;">
                                        <input type="number" min="0" id="accessForDelete" class="form-control mt-1" placeholder="уровень" >
                                        <?php
                                            $message = "SELECT accessForDelete FROM Settings_KPI ORDER BY id DESC LIMIT 1";
                                            $link->set_charset("utf8");
                                            $result = mysqli_query($link, $message);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<input class='form-control border-0' style='width:200px;' id='accessForDelete' readonly value='$row[accessForDelete]'></input>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-2 offset-md-2 d-flex" style="margin-top: auto;">
                                    <div class="row mt-auto">
                                        <button type="button" class="add btn btn-secondary m-2"><img class="iconsButtons" src="/Engels/icon-save.png" />Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset class="border card shadow-sm mb-3 bg-light">
                        <div class="row">
                          <div class="col-md-7 m-2">
                              <label style="font-size: 12px;" for="user" class="mt-2">Пользователь</label>
                              <div style="display: flex;">
                                  <input type="text" id="user" class="form-control mt-1" placeholder="введите имя" >
                              </div>
                              <label style="font-size: 12px;" for="ip" class="mt-2">ip_adress</label>
                              <div style="display: flex;">
                                  <input type="text" id="ip" class="form-control mt-1" placeholder="ip_adress" >
                              </div>
                          </div>
                          <div class="col-md-2 offset-md-2 d-flex" style="margin-top: auto;">
                              <div class="row mt-auto">
                                  <button type="button" class="add_ip btn btn-secondary m-2"><img class="iconsButtons" src="/Engels/icon-save.png" />Сохранить</button>
                              </div>
                          </div></div>
                        <div class="table-responsive">
                            <table id="myTable" class="mt-2 table-hover table-bordered table table-sm ">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Имя пользователя</th>
                                        <th>ip adress</th>
                                        <th>удалить</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $message = "SELECT * FROM ip_adress_users";
                                      $link->set_charset("utf8");
                                      $result = mysqli_query($link, $message);
                                      while ($row = mysqli_fetch_assoc($result))
                                      {
                                        echo "<tr>";
                                              echo "<td>$row[id]</td>";
                                              echo "<td>$row[user_name]</td>";
                                              echo "<td>$row[ip_adress]</td>";
                                              echo "<td><button type='button' class='btn btn-sm btn-outline delete' value='$row[id]'><img src='/Engels/trash.png' style='height:13px;'></button></td>";
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
                          $(".delete").click(function() {
                            var deleteUser = $(this).val();
                            var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
                            $.ajax({
                              type: 'POST',
                              dataType: 'html',
                              url: '/Engels/profile/delete_ip_user.php',
                              data: {idUser: deleteUser},
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
                          $(".add_ip").click(function() {
                              var user = document.getElementById('user');
                              var ip = document.getElementById('ip');
                              $.ajax({
                                  type: 'POST',
                                  dataType: 'html',
                                  url: '/Engels/profile/add_ip.php',
                                  data: {
                                      user: user.value,
                                      ip: ip.value
                                  },
                                  success: function(response) {
                                      $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                  }
                              });
                          });
                      });
                    </script>
                    <script>
                    $(document).ready(function() {
                        $(".add").click(function() {
                            var targetOEE = document.getElementById('targetOEE');
                            var emailResponce = document.getElementById('emailResponce');
                            var input_targetOEE = $("#input_targetOEE").val();
                            var input_emailResponce = $("#input_emailResponce").val();
                            var accessForDelete = $("#accessForDelete").val();
                            $.ajax({
                                type: 'POST',
                                dataType: 'html',
                                url: '/Engels/profile/add_settings.php',
                                data: {
                                    emailResponce: emailResponce.value,
                                    accessForDelete: accessForDelete,
                                    targetOEE: targetOEE.value
                                },
                                success: function(response) {
                                    var data = JSON.parse(response);
                                    $("#input_targetOEE").val(data.targetOEE);
                                    $("#input_emailResponce").val(data.emailResponce);
                                    $("#accessForDelete").val(data.accessForDelete);
                                    targetOEE.value = "";
                                    emailResponce.value = "";
                                    accessForDelete.value = "";
                                    $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                }
                            });
                        });
                    });
                    </script>
                </form>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
