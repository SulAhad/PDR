<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['technology'] == 0){
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
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                        <div data-bs-interval="9999999" class="carousel-item active">
                            <div class="col-md-12">
                            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                                <form class="row" method="post" id="formToSend">
                                    <p style="font-size:22px; border-bottom: 1px solid #f00;"><?php echo"$app_names->technology"; ?></p>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <label style="font-size:12px;" for="dateTime" class="mt-1">Выберите дату</label>
                                            <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>
                                            <div class="form-group row">
                                                <label style="font-size:12px;" for="Params_limits" class="mt-2">Кол-во парам.не в лимитах</label>
                                                <input value="0" required min="0" type="number" readonly style="border-bottom: 2px solid gray;" id="Params_limits" class="form-control mt-1" placeholder="кол-во парам.не в лимитах" required>
                                                <label style="font-size:12px;" for="Compositsia" class="mt-2">Композиция</label>
                                                <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Compositsia" class="form-control mt-1" placeholder="композиция" required>
                                                <label style="font-size:12px;" for="Compaund" class="mt-2">Компаунд</label>
                                                <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Compaund" class="form-control mt-1" placeholder="компаунд" required>
                                                <label style="font-size:12px;" for="Postdobavki" class="mt-2">Постдобавки</label>
                                                <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Postdobavki" class="form-control mt-1" placeholder="постдобавки" required>
                                                <label style="font-size:12px;" for="Fasovka" class="mt-2">Фасовка</label>
                                                <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Fasovka" class="form-control mt-1" placeholder="фасовка" required>
                                                <label style="font-size:12px;" for="Slivnaya" class="mt-2">Сливная станция</label>
                                                <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Slivnaya" class="form-control mt-1" placeholder="сливная станция" required>
                                                <label style="font-size:12px;" for="Uch_sirya"  class="mt-2">Участок сырья</label>
                                                <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Uch_sirya" class="form-control mt-1" placeholder="участок сырья" required>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <p style="font-size:30px; border-bottom: 1px solid #f00;">Смена A</p>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_teamA" class="mt-2">Удельное потребление газа на башенный продукт</label>
                                            <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_teamA" class="form-control mt-1" placeholder="удельное потребление газа на башенный продукт" required>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_gotoviy_prod_teamA" class="mt-2">Удельное потребление газа на готовый продукт</label>
                                            <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_gotoviy_prod_teamA" class="form-control mt-1" placeholder="удельное потребление газа на готовый продукт" required>
                                            <label style="font-size:12px;" for="proizvidit_bashni" class="mt-2">Производительность башни</label>
                                            <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="proizvidit_bashni" class="form-control mt-1" placeholder="т/час" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <p style="font-size:30px; border-bottom: 1px solid #f00;">Смена Б</p>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_teamB" class="mt-2">Удельное потребление газа на башенный продукт</label>
                                            <input value="0" required min="0" readonly type="number"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_teamB" class="form-control mt-1" placeholder="удельное потребление газа на башенный продукт" required>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_gotoviy_prod_teamB" class="mt-2">Удельное потребление газа на готовый продукт</label>
                                            <input value="0" required min="0" readonly type="number"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_gotoviy_prod_teamB" class="form-control mt-1" placeholder="удельное потребление газа на готовый продукт" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <p style="font-size:30px;  border-bottom: 1px solid #f00;">Общее</p>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_total" class="mt-2">Удельное потребление газа на башенный продукт</label>
                                            <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_total" class="form-control mt-1" placeholder="удельное потребление газа на башенный продукт" required>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_gotoviy_prod_total" class="mt-2">Удельное потребление газа на готовый продукт</label>
                                            <input value="0" required min="0" type="number"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_gotoviy_prod_total" class="form-control mt-1" placeholder="удельное потребление газа на готовый продукт" required>
                                        </fieldset>
                                    </div>
                                    <script>
                                        const Compositsia = document.getElementById("Compositsia");
                                        const Compaund = document.getElementById("Compaund");
                                        const Postdobavki = document.getElementById("Postdobavki");
                                        const Fasovka = document.getElementById("Fasovka");
                                        const Slivnaya = document.getElementById("Slivnaya");
                                        const Uch_sirya = document.getElementById("Uch_sirya");
                                        const Params_limits = document.getElementById("Params_limits");

                                        const calculateSum = () => {
                                          const sum = Number(Compositsia.value) + Number(Compaund.value) + Number(Postdobavki.value) + Number(Fasovka.value) + Number(Slivnaya.value) + Number(Uch_sirya.value);
                                          Params_limits.value = sum;
                                        };

                                        Compositsia.addEventListener("input", calculateSum);
                                        Compaund.addEventListener("input", calculateSum);
                                        Postdobavki.addEventListener("input", calculateSum);
                                        Fasovka.addEventListener("input", calculateSum);
                                        Slivnaya.addEventListener("input", calculateSum);
                                        Uch_sirya.addEventListener("input", calculateSum);
                                    </script>
                                </form>
                            </div>
                        </div>
                        <div data-bs-interval="9999999" class="carousel-item">
                            <div class="col-md-12">
                                <form class="row" method="post" id="formToSend">
                                    <p style="font-size:22px; border-bottom: 1px solid #f00;">комментарии</p>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <div class="form-group row">
                                                <label style="font-size:12px;" for="Params_limits_comment" class="mt-2">Кол-во парам.не в лимитах</label>
                                                <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Params_limits_comment" class="form-control mt-1" placeholder="кол-во парам.не в лимитах" required></textarea>
                                                <label style="font-size:12px;" for="Compositsia_comment" class="mt-2">Композиция</label>
                                                <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Compositsia_comment" class="form-control mt-1" placeholder="композиция" required></textarea>
                                                <label style="font-size:12px;" for="Compaund_comment" class="mt-2">Компаунд</label>
                                                <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Compaund_comment" class="form-control mt-1" placeholder="компаунд" required></textarea>
                                                <label style="font-size:12px;" for="Postdobavki_comment" class="mt-2">Постдобавки</label>
                                                <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Postdobavki_comment" class="form-control mt-1" placeholder="постдобавки" required></textarea>
                                                <label style="font-size:12px;" for="Fasovka_comment" class="mt-2">Фасовка</label>
                                                <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Fasovka_comment" class="form-control mt-1" placeholder="фасовка" required></textarea>
                                                <label style="font-size:12px;" for="Slivnaya_comment" class="mt-2">Сливная станция</label>
                                                <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Slivnaya_comment" class="form-control mt-1" placeholder="сливная станция" required></textarea>
                                                <label style="font-size:12px;" for="Uch_sirya_comment" class="mt-2">Участок сырья</label>
                                                <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Uch_sirya_comment" class="form-control mt-1" placeholder="участок сырья" required></textarea>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <p style="font-size:30px; border-bottom: 1px solid #f00;">Смена A</p>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_teamA_comment" class="mt-2">Удельное потребление газа на башенный продукт</label>
                                            <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_teamA_comment" class="form-control mt-1" placeholder="удельное потребление газа на башенный продукт" required></textarea>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_gotoviy_prod_teamA_comment" class="mt-2">Удельное потребление газа на готовый продукт</label>
                                            <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_gotoviy_prod_teamA_comment" class="form-control mt-1" placeholder="удельное потребление газа на готовый продукт" required></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <p style="font-size:30px; border-bottom: 1px solid #f00;">Смена Б</p>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_teamB_comment" class="mt-2">Удельное потребление газа на башенный продукт</label>
                                            <textarea value="" required min="0" readonly type="text"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_teamB_comment" class="form-control mt-1" placeholder="удельное потребление газа на башенный продукт" required></textarea>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_gotoviy_prod_teamB_comment" class="mt-2">Удельное потребление газа на готовый продукт</label>
                                            <textarea value="" required min="0" readonly type="text"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_gotoviy_prod_teamB_comment" class="form-control mt-1" placeholder="удельное потребление газа на готовый продукт" required></textarea>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-3">
                                        <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                            <p style="font-size:30px;  border-bottom: 1px solid #f00;">Общее</p>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_total_comment" class="mt-2">Удельное потребление газа на башенный продукт</label>
                                            <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_total_comment" class="form-control mt-1" placeholder="удельное потребление газа на башенный продукт" required></textarea>
                                            <label style="font-size:12px;" for="Udeln_potr_gaza_gotoviy_prod_total_comment" class="mt-2">Удельное потребление газа на готовый продукт</label>
                                            <textarea value="" required min="0" type="text"  style="border-bottom: 2px solid gray;" id="Udeln_potr_gaza_gotoviy_prod_total_comment" class="form-control mt-1" placeholder="удельное потребление газа на готовый продукт" required></textarea>
                                        </fieldset>
                                    </div>

                                </form>
                            </div>
                        </div>
                </div>
                <!--<a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-prev" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </a>-->
                <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-next" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            <button style="width:200px;" type="button" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
            
            </div>
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
                		    var Params_limits = document.getElementById('Params_limits');
                		    var Compositsia = document.getElementById('Compositsia');
                		    var Compaund = document.getElementById('Compaund');
                		    var Postdobavki = document.getElementById('Postdobavki');
                		    var Fasovka = document.getElementById('Fasovka');
                		    var Slivnaya = document.getElementById('Slivnaya');
                		    var Uch_sirya = document.getElementById('Uch_sirya');

                		    var Udeln_potr_gaza_teamA = document.getElementById('Udeln_potr_gaza_teamA');
                		    var Udeln_potr_gaza_gotoviy_prod_teamA = document.getElementById('Udeln_potr_gaza_gotoviy_prod_teamA');

                		    var Udeln_potr_gaza_teamB = document.getElementById('Udeln_potr_gaza_teamB');
                		    var Udeln_potr_gaza_gotoviy_prod_teamB = document.getElementById('Udeln_potr_gaza_gotoviy_prod_teamB');

                		    var Udeln_potr_gaza_total = document.getElementById('Udeln_potr_gaza_total');
                		    var Udeln_potr_gaza_gotoviy_prod_total = document.getElementById('Udeln_potr_gaza_gotoviy_prod_total');

                            var Params_limits_comment = document.getElementById('Params_limits_comment');
                		    var Compositsia_comment = document.getElementById('Compositsia_comment');
                		    var Compaund_comment = document.getElementById('Compaund_comment');
                		    var Postdobavki_comment = document.getElementById('Postdobavki_comment');
                		    var Fasovka_comment = document.getElementById('Fasovka_comment');
                		    var Slivnaya_comment = document.getElementById('Slivnaya_comment');
                		    var Uch_sirya_comment = document.getElementById('Uch_sirya_comment');

                		    var Udeln_potr_gaza_teamA_comment = document.getElementById('Udeln_potr_gaza_teamA_comment');
                		    var Udeln_potr_gaza_gotoviy_prod_teamA_comment = document.getElementById('Udeln_potr_gaza_gotoviy_prod_teamA_comment');

                		    var Udeln_potr_gaza_teamB_comment = document.getElementById('Udeln_potr_gaza_teamB_comment');
                		    var Udeln_potr_gaza_gotoviy_prod_teamB_comment = document.getElementById('Udeln_potr_gaza_gotoviy_prod_teamB_comment');

                		    var Udeln_potr_gaza_total_comment = document.getElementById('Udeln_potr_gaza_total_comment');
                		    var Udeln_potr_gaza_gotoviy_prod_total_comment = document.getElementById('Udeln_potr_gaza_gotoviy_prod_total_comment');
                            $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/technology/addTechnology.php',
                                    data:
                                        {
                                            dateTime:dateTime.value,
                                    Params_limits:Params_limits.value,
                                    Compositsia:Compositsia.value,
                                    Compaund:Compaund.value,
                                    Postdobavki:Postdobavki.value,
                                    Fasovka:Fasovka.value,
                                    Slivnaya:Slivnaya.value,
                                    Uch_sirya:Uch_sirya.value,

                                    Udeln_potr_gaza_teamA:Udeln_potr_gaza_teamA.value,
                                    Udeln_potr_gaza_gotoviy_prod_teamA:Udeln_potr_gaza_gotoviy_prod_teamA.value,

                                    Udeln_potr_gaza_teamB:Udeln_potr_gaza_teamB.value,
                                    Udeln_potr_gaza_gotoviy_prod_teamB:Udeln_potr_gaza_gotoviy_prod_teamB.value,

                                    Udeln_potr_gaza_total:Udeln_potr_gaza_total.value,
                                    Udeln_potr_gaza_gotoviy_prod_total:Udeln_potr_gaza_gotoviy_prod_total.value,

                                    Params_limits_comment:Params_limits_comment.value,
                                    Compositsia_comment:Compositsia_comment.value,
                                    Compaund_comment:Compaund_comment.value,
                                    Postdobavki_comment:Postdobavki_comment.value,
                                    Fasovka_comment:Fasovka_comment.value,
                                    Slivnaya_comment:Slivnaya_comment.value,
                                    Uch_sirya_comment:Uch_sirya_comment.value,

                                    Udeln_potr_gaza_teamA_comment:Udeln_potr_gaza_teamA_comment.value,
                                    Udeln_potr_gaza_gotoviy_prod_teamA_comment:Udeln_potr_gaza_gotoviy_prod_teamA_comment.value,

                                    Udeln_potr_gaza_teamB_comment:Udeln_potr_gaza_teamB_comment.value,
                                    Udeln_potr_gaza_gotoviy_prod_teamB_comment:Udeln_potr_gaza_gotoviy_prod_teamB_comment.value,

                                    Udeln_potr_gaza_total_comment:Udeln_potr_gaza_total_comment.value,
                                    Udeln_potr_gaza_gotoviy_prod_total_comment:Udeln_potr_gaza_gotoviy_prod_total_comment.value
                                },
                                    success: function(response)
                                    {
                                        var data = JSON.parse(response);

                                        Params_limits.value = "";
                                        Compositsia.value = "";
                                        Compaund.value = "";
                                        Postdobavki.value = "";
                                        Fasovka.value = "";
                                        Slivnaya.value = "";
                                        Uch_sirya.value = "";
                                        proizvidit_bashni.value = "";
                                        Udeln_potr_gaza_teamA.value = "";
                                        Udeln_potr_gaza_gotoviy_prod_teamA.value = "";

                                        Udeln_potr_gaza_teamB.value = "";
                                        Udeln_potr_gaza_gotoviy_prod_teamB.value = "";

                                        Udeln_potr_gaza_total.value = "";
                                        Udeln_potr_gaza_gotoviy_prod_total.value = "";

                                        Params_limits_comment.value = "";
                                        Compositsia_comment.value = "";
                                        Compaund_comment.value = "";
                                        Postdobavki_comment.value = "";
                                        Fasovka_comment.value = "";
                                        Slivnaya_comment.value = "";
                                        Uch_sirya_comment.value = "";

                                        Udeln_potr_gaza_teamA_comment.value = "";
                                        Udeln_potr_gaza_gotoviy_prod_teamA_comment.value = "";

                                        Udeln_potr_gaza_teamB_comment.value = "";
                                        Udeln_potr_gaza_gotoviy_prod_teamB_comment.value = "";

                                        Udeln_potr_gaza_total_comment.value = "";
                                        Udeln_potr_gaza_gotoviy_prod_total_comment.value = "";
                                        $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                         // Имитируем успешное сохранение данных с помощью задержки setTimeout
                                        setTimeout(function(){
                                          // Завершаем анимацию
                                          $(".add").html('<img class="iconsButtons" src="/Engels/icons/check.png" />Сохранено!');
                                          setTimeout(function(){
                                            // Устанавливаем обратное состояние кнопки
                                            $(".add").html('<img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить');
                                          }, 2000);
                                        }, 2000);
                                    },
                                    error: function(xhr, status, error) {
                                    alert("Error: " + error);
                                }
                                });
                        }
            	    );
                }
            );
        </script>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
