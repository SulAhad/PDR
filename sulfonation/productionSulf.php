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

    <body class="container ">
        <form  method="post" id="formToSend">
            <div class="row card shadow-sm mt-4 blur bg-light">
                <p style="font-size:22px; border-bottom: 1px solid #f00;">Сульфирование</p>
                <div class="col-md-12">
                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                    <div class="row" method="post" id="formToSend">
                        <div class="col-md-4">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <div class="form-group row">
                                    <label style="font-size:12px;" for="dateTime" class="mt-2">Выберите дату</label>
                                    <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>
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
                        <div class="col-md-4">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                              <div class="form-group row">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;">Выпуск</p>
                                <label for="plan" style="width:50%; font-size:12px;" class="mt-1">План(выпуск продукции)</label>
                                <label for="plan_output_cars" style="width:50%; font-size:12px;" class="mt-1">План(отгрузка машин)</label>

                                <input value="0" oninput='validateInput(this)' min="0" type="number" id="plan"  style="width:50%; border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="план" required>
                                <input value="0"  oninput='validateInput(this)' min="0" type="number" id="plan_output_cars"  style="width:50%; border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="план" required>

                                <label for="fact" style="width:50%; font-size:12px;" class="mt-1">Факт(выпуск продукции)</label>
                                <label for="fact_output_cars" style="width:50%; font-size:12px;" class="mt-1">Факт(отгрузка машин)</label>

                                <input value="0" oninput='validateInput(this)'  min="0" type="number" id="fact"  style="width:50%; border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="факт" required>
                                <input value="0" oninput='validateInput(this)' min="0" type="number" id="fact_output_cars"  style="width:50%; border-bottom: 2px solid gray;" class="form-control mt-1" placeholder="факт" required>
                              </div>
                            </fieldset>
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
                        </div>
                        <div class="col-md-4">
                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                <p style="font-size:21px; border-bottom: 1px solid #f00;" class="mt-2">Комментарий</p>
                                <textarea value="" required min="0" type="text" id="comment" style="border-bottom: 2px solid gray; height: 370px;"  class="form-control mt-2" placeholder="введите комментарий" required></textarea>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button style="width:200px;" type="button" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                    
                    <div class="alert alert-plan" style="display:none; position: fixed;">ОШИБКА СОХРАНЕНИЯ! Строка "План" не может быть пустым!</div>
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
                                        var plan = document.getElementById('plan').value;
                                        var fact = document.getElementById('fact').value;
                                        var plan_output_cars = document.getElementById('plan_output_cars').value;
                                        var fact_output_cars = document.getElementById('fact_output_cars').value;
                                        var comment = document.getElementById('comment').value;
                                        $.ajax(
                                        {
                                            type: 'POST',
                                            dataType: 'html',
                                            url: '/Engels/sulfonation/add.php',
                                            data:
                                            {
                                                dateTime:dateTime,
                                                user:user,
                                                team:team,
                                                plan:plan,
                                                fact:fact,
                                                plan_output_cars:plan_output_cars,
                                                fact_output_cars:fact_output_cars,
                                                comment:comment
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
                                    }
                                )
                            }
                            );
                    
                    </script>
                </div>
            </div>
            
        </form>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
    
</html>
