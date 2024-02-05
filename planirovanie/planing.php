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
    <body class="container">
        <div class="row card shadow-sm blur bg-light">

              <div class="col-md-5">
              <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                  <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                      <p style="font-size:21px; border-bottom: 1px solid #f00;">Планирование</p>
                      <label style="font-size:12px;" for="avtomat" class="mt-2">Автомат</label>
                      <select id="avtomat" class="form-select" aria-label="Default select example" autocomplete="on">
                          <option value="Innotech-1"   >Innotech-1</option>
                          <option value="Innotech-2"   >Innotech-2</option>
                          <option value="Innotech-3"   >Innotech-3</option>
                          <option value="UVA-4"   >UVA-4</option>
                          <option value="UVA-5"   >UVA-5</option>
                          <option value="ACMA-4"     >ACMA-4</option>
                      </select>
                      <label style="font-size:12px;" for="name" class="mt-2">Наименование</label>
                      <input type="text" style="border-bottom: 2px solid gray;"  id="name" class="form-control mt-1" placeholder="наименование" required>

                      <label style="font-size:12px;" for="format" class="mt-2">Формат</label>
                      <input type="number" style="border-bottom: 2px solid gray;" id="format" class="form-control mt-1" placeholder="формат" required>

                      <label style="font-size: 12px;" for="dateTime" class="mt-1">Выберите дату и время начала партии</label>
                      <input type="datetime-local" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d\TH:i'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>

                      <label style="font-size:12px;" for="con" class="mt-2">con</label>
                      <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="con" class="form-control mt-1" placeholder="con" required>

                      <label style="font-size:12px;" for="pcs_min" class="mt-2">пачек в минуту</label>
                      <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="pcs_min" class="form-control mt-1" placeholder="пачек в минуту" required>

                      <label style="font-size:12px;" for="pcs_h" class="mt-2">Дата окончания партии</label>
                      <input value="" required min="0" type="text" style="border-bottom: 2px solid gray;"  id="pcs_h" class="form-control mt-1" placeholder="Дата окончания партии" required>
                      <!-- <script>
                      // Получение элементов из DOM
const selectElement = document.getElementById('avtomat');
const formatInput = document.getElementById('format');
const pcsMinInput = document.getElementById('pcs_min');

// Обработчик события при изменении значения в списке
selectElement.addEventListener('change', function() {
  // Получение выбранных опций
  const selectedOptions = Array.from(selectElement.selectedOptions, option => option.value);

  // Загрузка значений из базы данных в зависимости от выбранных опций
  if (selectedOptions.includes('Иннотех-1')) {
    if (formatInput.value === '1.50') {
      pcsMinInput.value = '26';
    }
    if (formatInput.value === '2.00') {
      pcsMinInput.value = '26.2';
    }
    if (formatInput.value === '2.10') {
      pcsMinInput.value = '26.2';
    }
    // ... дополнительные условия для других значений формата
  } else {
    // Очистка значений, если другая опция выбрана
    formatInput.value = '';
    pcsMinInput.value = '';
  }
});
                      </script> -->
                      <script>
                      // Функция для расчета даты окончания партии
                        function calculateEndDate() {
                          // Получаем значения из полей
                          var dateTimeValue = new Date(document.getElementById('dateTime').value);
                          var conValue = parseInt(document.getElementById('con').value);
                          var pcsMinValue = parseInt(document.getElementById('pcs_min').value);

                          // Вычисляем результат
                          var minutesToAdd = conValue / pcsMinValue;
                          var endDate = new Date(dateTimeValue.getTime() + minutesToAdd * 60000); // Добавляем минуты

                          // Форматируем дату и время в нужный формат
                          var day = String(endDate.getDate()).padStart(2, '0');
                          var month = String(endDate.getMonth() + 1).padStart(2, '0');
                          var year = endDate.getFullYear();
                          var hours = String(endDate.getHours()).padStart(2, '0');
                          var minutes = String(endDate.getMinutes()).padStart(2, '0');

                          // Записываем результат обратно в поле "Дата окончания партии"
                          var endDateField = document.getElementById('pcs_h');
                          endDateField.value = year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
                        }

                        // Привязываем функцию к событию ввода на каждом из полей
                        document.getElementById('dateTime').addEventListener('input', calculateEndDate);
                        document.getElementById('con').addEventListener('input', calculateEndDate);
                        document.getElementById('pcs_min').addEventListener('input', calculateEndDate);
                      </script>
                  </fieldset>
              </div>
              <button style="width:200px;" type="button" id="myButton" class="add1 btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
             
              <div>
                <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                  <table class="table-hover table-bordered table table-sm">
                      <thead>
                          <tr>
                              <th>№</th>
                              <th>Автомат</th>
                              <th>Наименование</th>
                              <th>Формат, кг</th>
                              <th>Дата начала партии</th>
                              <th>con</th>
                              <th>пачек в минуту</th>
                              <th>Дата завершения партии</th>
                              <th style='writing-mode:vertical-rl;'>Изменить</th>
                              <th style='writing-mode:vertical-rl;'>Удалить</th>
                          </tr>
                      </thead>
                      <tbody id="tableBodyStat">
                        <?php
                        $message = "SELECT * FROM planSMS";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result))
                        {
                          echo "<tr>";
                          echo "<td>$row[id]</td>";
                          echo "<td><input id='avtomat' type='text' class='form-control border-0' value='$row[avtomat]' /></td>";
                          echo "<td><input id='name' type='text' class='form-control border-0' value='$row[name]' /></td>";

                          echo "<td><input id='format' type='number' class='form-control border-0' value='$row[format]' /></td>";
                          echo "<td><input id='date_start' type='datetime-local' class='form-control border-0' value='$row[date_start]' /></td>";
                          echo "<td><input id='con' type='number' class='form-control border-0' value='$row[con]' /></td>";
                          echo "<td><input id='pcs_min' type='number' class='form-control border-0' value='$row[pcs_min]' /></td>";
                          echo "<td><input id='date_end' type='form-control' class='form-control border-0' value='$row[date_end]' /></td>";
                          echo "<td><button type='button' class='update btn btn-outline btn-sm btn-light' title='Изменить' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                          echo "<td><button type='button' class='delete btn btn-outline btn-sm btn-light' title='Удалить' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                      <!-- <script>
                        // Функция для автоматического обновления date_end при вводе значений
      function updateDateEnd() {
        // Получаем значения из con и pcs_min
        var conValue = parseFloat(document.getElementById('con').value);
        var pcsMinValue = parseFloat(document.getElementById('pcs_min').value);

        // Выполняем вычисления
        var minutesToAdd = conValue / pcsMinValue; // Разделили con на pcs_min
        var dateStartValue = new Date(document.getElementById('date_start').value); // Получаем значение date_start
        dateStartValue.setMinutes(dateStartValue.getMinutes() + minutesToAdd); // Прибавляем вычисленные минуты

        // Форматируем дату для вывода в формате "год-месяц-день час:минута:секунда"
        var year = dateStartValue.getFullYear();
        var month = (dateStartValue.getMonth() + 1).toString().padStart(2, '0');
        var day = dateStartValue.getDate().toString().padStart(2, '0');
        var hours = dateStartValue.getHours().toString().padStart(2, '0');
        var minutes = dateStartValue.getMinutes().toString().padStart(2, '0');
        var seconds = dateStartValue.getSeconds().toString().padStart(2, '0');
        var formattedDate = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;

        // Записываем результат в date_end
        document.getElementById('date_end').value = formattedDate; // Записываем отформатированную дату и время
      }

      // Вешаем обработчики событий на изменение значений con и pcs_min
      document.getElementById('con').addEventListener('input', updateDateEnd);
      document.getElementById('pcs_min').addEventListener('input', updateDateEnd);
                      </script> -->
                  </table>
                </fieldset>
              </div>
        </div>
        <script>
        $(document).ready
            (function()
                {$(".update").click
                    (function()
                    {
                        var id = $(this).val();
                        var avtomat = $(this).closest("tr").find("#avtomat").val();
                        var format = $(this).closest("tr").find("#format").val();
                        var date_start = $(this).closest("tr").find("#date_start").val();
                        var con = $(this).closest("tr").find("#con").val();
                        var pcs_min = $(this).closest("tr").find("#pcs_min").val();
                        var date_end = $(this).closest("tr").find("#date_end").val();
                        var name = $(this).closest("tr").find("#name").val();
                      $.ajax(
                                {type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/planirovanie/updatePlan.php',
                                    data: ({
                                      avtomat:avtomat,
                                      name:name,
                                      format:format,
                                      date_start:date_start,
                                      con:con,
                                      pcs_min:pcs_min,
                                      date_end:date_end,
                                      id:id}),
                                    success: function(response)
                                    {
                                        $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                        var data = JSON.parse(response);
                                    },

                                    error: function(xhr, status, error)
                                    {
                                    alert("Error: " + error);
                                    }
                                      });});});
        </script>
        <script>
        $(document).ready(function() {
          $(".delete").click(function() {
            var deleteUser = $(this).val();
            var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
            $.ajax({
              type: 'POST',
              dataType: 'html',
              url: '/Engels/planirovanie/deleteRowPlaning.php',
              data: {idUser: deleteUser},
              success: function(response) {
                var data = JSON.parse(response);
                row.remove(); // удаляем строку таблицы
                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
              }
            });
          });
        });
        </script>
        <script>
            $("#myButton").click(function()
            {
                $(this).html('<img class="iconsButtons" src="/Engels/sand-clock.png" />Сохранение...');
                    var avtomat = document.getElementById('avtomat');
                    var format = document.getElementById('format');
                    var dateTime = document.getElementById('dateTime');
                    var con = document.getElementById('con');
                    var pcs_min = document.getElementById('pcs_min');
                    var pcs_h = document.getElementById('pcs_h');
                    var name = document.getElementById('name');
                    $.ajax(
                        {
                            type: 'POST',
                            dataType: 'html',
                            url: '/Engels/planirovanie/addPlanSMS.php',
                            data:
                            {
                                avtomat:avtomat.value,
                                format:format.value,
                                dateTime:dateTime.value,
                                con:con.value,
                                pcs_min:pcs_min.value,
                                name:name.value,
                                pcs_h:pcs_h.value
                            },
                                success: function(response)
                                {
                                    var data = JSON.parse(response);
                                    $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    setTimeout(function()
                                    {
                                    $("#myButton").html('<img class="iconsButtons" src="/Engels/check.png" />Сохранено!');
                                    setTimeout(function()
                                    {
                                        $("#myButton").html('<img class="iconsButtons" src="/Engels/icon-save.png" />Сохранить');
                                    }, 2000);
                                    }, 2000);
                                },
                                error: function(xhr, status, error) {
                                    alert("Error: " + error);
                                }
                        });
                    });
                </script>
<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
