<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['active_water'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container">
        <div class="row card shadow-sm blur">
            <div class="col-md-12">
                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-12">
                        <p style="font-size:22px; border-bottom: 1px solid #f00;"><?php echo"$app_names->_active_water"; ?></p>
                            <fieldset class="form-group border card shadow-sm">
                                <div class="col-md-4">
                                    <label for="date" style="font-size:12px;" class="m-2">Выберите дату</label>
                                    <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d');?>" id="date" class="form-control m-1"
                                            max="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" min="<?php echo date('Y-m-d', strtotime('-4 days')); ?>" onkeydown="return false" class="form-control mt-1" onchange="fetchData()">
                                </div>
                                <script>window.onload = function() {fetchData();};</script>
                                <script>
                                    function fetchData() {
                                        var selectedDate = document.getElementById("date").value;

                                            var xhttp = new XMLHttpRequest();

                                            xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("table-active-water").innerHTML = this.responseText;
                                                }
                                            };
                                            xhttp.open("GET", "/Engels/activeWater/fetchDataRedactActiveWater.php?date=" + selectedDate, true);
                                            xhttp.send();
                                        }
                                </script>
                                <div class="table-responsive mt-4">

                                      <table class="table-hover table table-sm ">
                                          <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                                              <th>
                                                  <td>63 +16 м3</td>
                                                  <td>250 м3</td>
                                                  <td>75 м3 (ХР)</td>
                                                  <td style="background:gray;">Сульфирование</td>
                                              </th>
                                          </thead>
                                          <tbody id="table-active-water">
                                          </tbody>
                                      </table>

                                </div>
                            </fieldset>

                    </div>
                    <button style="width:200px;" type="button" class="add_activ_water btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                    
                    <script>
        $(document).ready
            (function()
                {
                    $(".add_activ_water").click
                    (
                		function()
                		{
                		    $(this).html('<img class="iconsButtons" src="/Engels/icons/sand-clock.png" />Сохранение...');
                            var user = "<?php echo $a; ?>";
                		    var date = document.getElementById('date');
                		    var w1 = document.getElementById('w1');
                		    var w2 = document.getElementById('w2');
                            var input_w2 = document.getElementById('input_w2');
                		    var w3 = document.getElementById('w3');
                		    var w4 = document.getElementById('w4');
                		    var w5 = document.getElementById('w5');
                		    var w6 = document.getElementById('w6');
                            var w7 = document.getElementById('w7');
                            var w8 = document.getElementById('w8');
                		    var w9 = document.getElementById('w9');
                            var w10 = document.getElementById('w10');
                            var sumValue = parseInt(w2.value) + parseInt(input_w2.value);
                            if(sumValue > 250){
                                $('.alert-error_SUM_water').fadeIn(1000).delay(3000).fadeOut(1000);
                            }
                            else
                            {
                                $.ajax(
                                {
                                type: 'POST',
                                dataType: 'html',
                                url: '/Engels/activeWater/addActive_water.php',
                                data: ({date:date.value,
                                user:user,
                                w1:w1.value,
                                w2:w2.value,
                                w3:w3.value,
                                w4:w4.value,
                                w5:w5.value,
                                w7:w7.value,
                                w8:w8.value,
                                w9:w9.value,
                                w10:w10.value,
                                w6:w6.value}),
                                success: function(response)
                                {
                                    var data = JSON.parse(response);
                                    w1:w1.value = "0";
                                    w2:w2.value = "0";
                                    w3:w3.value = "0";
                                    w4:w4.value = "0";
                                    w5:w5.value = "0";
                                    w6:w6.value = "0";
                                    w7:w7.value = "0";
                                    w8:w8.value = "0";
                                    w9:w9.value = "0";
                                    w10:w10.value = "0";
                                    $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    // Имитируем успешное сохранение данных с помощью задержки setTimeout
                                    setTimeout(function(){
                                      // Завершаем анимацию
                                      $(".add_activ_water").html('<img class="iconsButtons" src="/Engels/icons/check.png" />Сохранено!');
                                      setTimeout(function(){
                                        // Устанавливаем обратное состояние кнопки
                                        $(".add_activ_water").html('<img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить');
                                      }, 2000);
                                    }, 2000);
                                        },
                                        error: function(xhr, status, error)
                                        {
                                        alert("Error: " + error);
                                        }
                                    });
                            }
                            
                        }
            	    );
                }
            );
        </script>
                </form>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
