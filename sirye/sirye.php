<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['sirye'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container">
        <div class="row card   blur">
            <div class="col-md-12">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-12">
                        <p style="font-size:22px; border-bottom: 1px solid #f00;">Сырьё</p>
                            <fieldset class="form-group border card shadow-sm">
                                <div class="col-md-4">
                                    <label for="dateTime" style="font-size:12px;" class="m-2">Выберите дату</label>
                                    <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>
                                </div>
                            <div class="table-responsive mt-4">

                                <table class="table-hover table table-sm">
                                    <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                        <tr>
                                            <th>Сырье</th>
                                            <th>Было</th>
                                            <th>Приход</th>
                                            <th>Расход</th>
                                            <th>Остаток</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Брак СМС, т</td>
                                            <td><input value="0" required min="0" type="number" id="brak_sms_bilo" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sms_prihod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sms_rashod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sms_ostatok" class="form-control border-0" required></td>
                                        </tr>
                                        <tr>
                                            <td>Брак Сульфирование, т</td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_bilo" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_prihod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_rashod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_ostatok" class="form-control border-0" required></td>
                                        </tr>
                                        <tr>
                                            <td>Брак Сульфирование (на растворение), т</td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_rastvor_bilo" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_rastvor_prihod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_rastvor_rashod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="brak_sulf_rastvor_ostatok" class="form-control border-0" required></td>
                                        </tr>
                                        <tr>
                                            <td>Изолятор, т</td>
                                            <td><input value="0" required min="0" type="number" id="isolator_bilo" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="isolator_prihod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="isolator_rashod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="isolator_ostatok" class="form-control border-0" required></td>
                                        </tr>
                                        <tr>
                                            <td>Пыль, т</td>
                                            <td><input value="0" required min="0" type="number" id="pil_bilo" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="pil_prihod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="pil_rashod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="pil_ostatok" class="form-control border-0" required></td>
                                        </tr>
                                        <tr>
                                            <td>Отсев на растворение, т</td>
                                            <td><input value="0" required min="0" type="number" id="otsev_bilo" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="otsev_prihod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="otsev_rashod" class="form-control border-0" required></td>
                                            <td><input value="0" required min="0" type="number" id="otsev_ostatok" class="form-control border-0" required></td>
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

                		    $(this).html('<img class="iconsButtons" src="/Engels/icons/sand-clock.png" />Сохранение...');
                		    var dateTime = document.getElementById('dateTime');
                		    var brak_sms_bilo = document.getElementById('brak_sms_bilo');
                		    var brak_sms_prihod = document.getElementById('brak_sms_prihod');
                		    var brak_sms_rashod = document.getElementById('brak_sms_rashod');
                		    var brak_sms_ostatok = document.getElementById('brak_sms_ostatok');
                		    var brak_sulf_bilo = document.getElementById('brak_sulf_bilo');
                		    var brak_sulf_prihod = document.getElementById('brak_sulf_prihod');
                		    var brak_sulf_rashod = document.getElementById('brak_sulf_rashod');
                		    var brak_sulf_ostatok = document.getElementById('brak_sulf_ostatok');
                		    var brak_sulf_rastvor_bilo = document.getElementById('brak_sulf_rastvor_bilo');
                		    var brak_sulf_rastvor_prihod = document.getElementById('brak_sulf_rastvor_prihod');
                		    var brak_sulf_rastvor_rashod = document.getElementById('brak_sulf_rastvor_rashod');
                		    var brak_sulf_rastvor_ostatok = document.getElementById('brak_sulf_rastvor_ostatok');
                		    var isolator_bilo = document.getElementById('isolator_bilo');
                		    var isolator_prihod = document.getElementById('isolator_prihod');
                		    var isolator_rashod = document.getElementById('isolator_rashod');
                		    var isolator_ostatok = document.getElementById('isolator_ostatok');
                		    var pil_bilo = document.getElementById('pil_bilo');
                		    var pil_prihod = document.getElementById('pil_prihod');
                		    var pil_rashod = document.getElementById('pil_rashod');
                		    var pil_ostatok = document.getElementById('pil_ostatok');
                		    var otsev_bilo = document.getElementById('otsev_bilo');
                		    var otsev_prihod = document.getElementById('otsev_prihod');
                		    var otsev_rashod = document.getElementById('otsev_rashod');
                		    var otsev_ostatok = document.getElementById('otsev_ostatok');
                            $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/sirye/addSirye.php',
                                    data:
                                    {
                                        dateTime:dateTime.value, brak_sms_bilo:brak_sms_bilo.value,
                                        brak_sms_prihod:brak_sms_prihod.value,
                                        brak_sms_rashod:brak_sms_rashod.value,
                                        brak_sms_ostatok:brak_sms_ostatok.value,
                                        brak_sulf_bilo:brak_sulf_bilo.value,
                                        brak_sulf_prihod:brak_sulf_prihod.value,
                                        brak_sulf_rashod:brak_sulf_rashod.value,
                                        brak_sulf_ostatok:brak_sulf_ostatok.value,
                                        brak_sulf_rastvor_bilo:brak_sulf_rastvor_bilo.value,
                                        brak_sulf_rastvor_prihod:brak_sulf_rastvor_prihod.value,
                                        brak_sulf_rastvor_rashod:brak_sulf_rastvor_rashod.value,
                                        brak_sulf_rastvor_ostatok:brak_sulf_rastvor_ostatok.value,
                                        isolator_bilo:isolator_bilo.value,
                                        isolator_prihod:isolator_prihod.value,
                                        isolator_rashod:isolator_rashod.value,
                                        isolator_ostatok:isolator_ostatok.value,
                                        pil_bilo:pil_bilo.value,
                                        pil_prihod:pil_prihod.value,
                                        pil_rashod:pil_rashod.value,
                                        pil_ostatok:pil_ostatok.value,
                                        otsev_bilo:otsev_bilo.value,
                                        otsev_prihod:otsev_prihod.value,
                                        otsev_rashod:otsev_rashod.value,
                                        otsev_ostatok:otsev_ostatok.value
                                    },
                                    success: function(response)
                                    {
                                        var data = JSON.parse(response);
                                        brak_sms_bilo.value = "0";
                                        brak_sms_prihod.value = "0";
                                        brak_sms_rashod.value = "0";
                                        brak_sms_ostatok.value = "0";
                                        brak_sulf_bilo.value = "0";
                                        brak_sulf_prihod.value = "0";
                                        brak_sulf_rashod.value = "0";
                                        brak_sulf_ostatok.value = "0";
                                        brak_sulf_rastvor_bilo.value = "0";
                                        brak_sulf_rastvor_prihod.value = "0";
                                        brak_sulf_rastvor_rashod.value = "0";
                                        brak_sulf_rastvor_ostatok.value = "0";
                                        isolator_bilo.value = "0";
                                        isolator_prihod.value = "0";
                                        isolator_rashod.value = "0";
                                        isolator_ostatok.value = "0";
                                        pil_bilo.value = "0";
                                        pil_prihod.value = "0";
                                        pil_rashod.value = "0";
                                        pil_ostatok.value = "0";
                                        otsev_bilo.value = "0";
                                        otsev_prihod.value = "0";
                                        otsev_rashod.value = "0";
                                        otsev_ostatok.value = "0";
                                        $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                         // Имитируем успешное сохранение данных с помощью задержки setTimeout
                                        setTimeout(function()
                                        {
                                          // Завершаем анимацию
                                          $(".add").html('<img class="iconsButtons" src="/Engels/icons/check.png" />Сохранено!');
                                          setTimeout(function()
                                          {
                                            // Устанавливаем обратное состояние кнопки
                                            $(".add").html('<img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить');
                                          }, 2000);
                                        }, 2000);
                                    },
                                    error: function(xhr, status, error)
                                    {
                                    alert("Error: " + error);
                                    }
                                });
                        }
            	    );
                });
                </script>
                </form>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
