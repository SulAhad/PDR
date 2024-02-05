<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['quality'] == 0){
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
            <form method="post" id="formToSend">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                            <div data-bs-interval="9999999" class="carousel-item active">
                                <div class="col-md-12 bg-light">
                                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                                    <div class="row bg-light" >
                                        <p style="font-size:22px; border-bottom: 1px solid #f00;"><?php echo"$app_names->quality"; ?></p>
                                        <div class="col-md-3">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                                <label style="font-size:12px;" for="dateTime" class="mt-1">Выберите дату</label>
                                                <input type="date" style="border-bottom: 2px solid gray;" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="form-control mt-1" placeholder="" required>
                                            </fieldset>
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                                <label style="font-size:12px;" for="BrakQuality" class="mt-4">Брак,t.</label>
                                                <div class="form-group row">
                                                    <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="BrakQuality" class="form-control mt-1" placeholder="брак,t." required>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                                        <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->_production"; ?></p>
                                                        <label style="font-size:12px;" for="Kol_zam_him_sostav_teamA" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                        <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_him_sostav_teamA" class="form-control mt-1" placeholder="кол-во замечаний по хим. составу" required>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_teamA" class="mt-2">Кол-во замечаний Упаковка</label>
                                                        <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_teamA" class="form-control mt-1" placeholder="кол-во замечаний Упаковка" required>
                                                        <label style="font-size:12px;" for="Kol_pretenziy_teamA" class="mt-2">Кол-во претензий</label>
                                                        <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_teamA" class="form-control mt-1" placeholder="кол-во претензий" required>
                                                        <label style="font-size:12px;" for="Zabrakov_mat_teamA" class="mt-2">Забракованный материал</label>
                                                        <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_teamA" class="form-control mt-1" placeholder="забракованный материал" required>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_Sulf" class="mt-2">Активная вода</label>
                                                        <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_Sulf" class="form-control mt-1" placeholder="активная вода" required>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                                            <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->sulfirovanie"; ?></p>
                                                            <label style="font-size:12px;" for="Kol_zam_him_sostav_Sulf" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                            <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;" style="border-bottom: 2px solid gray;" id="Kol_zam_him_sostav_Sulf" class="form-control mt-1" placeholder="кол-во замечаний по хим. составу" required>
                                                            <label style="font-size:12px;" for="Kol_pretenziy_Sulf" class="mt-2">Кол-во претензий</label>
                                                            <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_Sulf" class="form-control mt-1" placeholder="кол-во претензий" required>
                                                            <label style="font-size:12px;" for="Zabrakov_mat_Sulf" class="mt-2">Забракованный материал</label>
                                                            <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_Sulf" class="form-control mt-1" placeholder="забракованный материал" required>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div data-bs-interval="9999999" class="carousel-item">
                                <div class="col-md-12">
                                     <div class="row" >
                                        <p style="font-size:22px; border-bottom: 1px solid #f00;">комментарии</p>
                                        <div class="col-md-3">

                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                                <label style="font-size:12px;" for="BrakQuality_comment" class="mt-4">Брак,t.</label>
                                                <div class="form-group row">
                                                    <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="BrakQuality_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                                        <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->_production"; ?></p>
                                                        <label style="font-size:12px;" for="Kol_zam_him_sostav_teamA_comment" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                        <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_him_sostav_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_teamA_comment" class="mt-2">Кол-во замечаний Упаковка</label>
                                                        <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Kol_pretenziy_teamA_comment" class="mt-2">Кол-во претензий</label>
                                                        <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Zabrakov_mat_teamA_comment" class="mt-2">Забракованный материал</label>
                                                        <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_teamA_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                        <label style="font-size:12px;" for="Kol_zam_upakovka_Sulf_comment" class="mt-2">Активная вода</label>
                                                        <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_zam_upakovka_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                                            <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->sulfirovanie"; ?></p>
                                                            <label style="font-size:12px;" for="Kol_zam_him_sostav_Sulf_comment" class="mt-2">Кол-во замечаний по хим. составу</label>
                                                            <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"   style="border-bottom: 2px solid gray;" id="Kol_zam_him_sostav_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                            <label style="font-size:12px;" for="Kol_pretenziy_Sulf_comment" class="mt-2">Кол-во претензий</label>
                                                            <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Kol_pretenziy_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                            <label style="font-size:12px;" for="Zabrakov_mat_Sulf_comment" class="mt-2">Забракованный материал</label>
                                                            <textarea value="" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="Zabrakov_mat_Sulf_comment" class="form-control mt-1" placeholder="комментарий" required></textarea>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-next" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                    </div>
                    <button style="width:200px;" id="myButton" type="button" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
            </form>
        </div>
        <script>
            $("#myButton").click(function()
            {
                $(this).html('<img class="iconsButtons" src="/Engels/icons/sand-clock.png" />Сохранение...');
                    var dateTime = document.getElementById('dateTime');

                    var BrakQuality = document.getElementById('BrakQuality');
                    var Kol_zam_him_sostav_teamA = document.getElementById('Kol_zam_him_sostav_teamA');
                    var Kol_zam_upakovka_teamA = document.getElementById('Kol_zam_upakovka_teamA');
                    var Kol_pretenziy_teamA = document.getElementById('Kol_pretenziy_teamA');
                    var Zabrakov_mat_teamA = document.getElementById('Zabrakov_mat_teamA');

                    var Kol_zam_him_sostav_Sulf = document.getElementById('Kol_zam_him_sostav_Sulf');
                    var Kol_zam_upakovka_Sulf = document.getElementById('Kol_zam_upakovka_Sulf');
                    var Kol_pretenziy_Sulf = document.getElementById('Kol_pretenziy_Sulf');
                    var Zabrakov_mat_Sulf = document.getElementById('Zabrakov_mat_Sulf');

                    var BrakQuality_comment = document.getElementById('BrakQuality_comment');

                    var Kol_zam_him_sostav_teamA_comment = document.getElementById('Kol_zam_him_sostav_teamA_comment');
                    var Kol_zam_upakovka_teamA_comment = document.getElementById('Kol_zam_upakovka_teamA_comment');
                    var Kol_pretenziy_teamA_comment = document.getElementById('Kol_pretenziy_teamA_comment');
                    var Zabrakov_mat_teamA_comment = document.getElementById('Zabrakov_mat_teamA_comment');

                    var Kol_zam_him_sostav_Sulf_comment = document.getElementById('Kol_zam_him_sostav_Sulf_comment');
                    var Kol_zam_upakovka_Sulf_comment = document.getElementById('Kol_zam_upakovka_Sulf_comment');
                    var Kol_pretenziy_Sulf_comment = document.getElementById('Kol_pretenziy_Sulf_comment');
                    var Zabrakov_mat_Sulf_comment = document.getElementById('Zabrakov_mat_Sulf_comment');
                    $.ajax(
                        {
                            type: 'POST',
                            dataType: 'html',
                            url: '/Engels/quality/addQuality.php',
                            data:
                            {
                                dateTime:dateTime.value,

                                BrakQuality_comment:BrakQuality_comment.value,
                                Kol_zam_him_sostav_teamA_comment:Kol_zam_him_sostav_teamA_comment.value,
                                Kol_zam_upakovka_teamA_comment:Kol_zam_upakovka_teamA_comment.value,
                                Kol_pretenziy_teamA_comment:Kol_pretenziy_teamA_comment.value,
                                Zabrakov_mat_teamA_comment:Zabrakov_mat_teamA_comment.value,

                                Kol_zam_him_sostav_Sulf_comment:Kol_zam_him_sostav_Sulf_comment.value,
                                Kol_zam_upakovka_Sulf_comment:Kol_zam_upakovka_Sulf_comment.value,
                                Kol_pretenziy_Sulf_comment:Kol_pretenziy_Sulf_comment.value,
                                Zabrakov_mat_Sulf_comment:Zabrakov_mat_Sulf_comment.value,

                                BrakQuality:BrakQuality.value,

                                Kol_zam_him_sostav_teamA:Kol_zam_him_sostav_teamA.value,
                                Kol_zam_upakovka_teamA:Kol_zam_upakovka_teamA.value,
                                Kol_pretenziy_teamA:Kol_pretenziy_teamA.value,
                                Zabrakov_mat_teamA:Zabrakov_mat_teamA.value,

                                Kol_zam_him_sostav_Sulf:Kol_zam_him_sostav_Sulf.value,
                                Kol_zam_upakovka_Sulf:Kol_zam_upakovka_Sulf.value,
                                Kol_pretenziy_Sulf:Kol_pretenziy_Sulf.value,
                                Zabrakov_mat_Sulf:Zabrakov_mat_Sulf.value
                            },
                                success: function(response)
                                {
                                    var data = JSON.parse(response);
                                    BrakQuality.value = "0";

                                    Kol_zam_him_sostav_teamA.value = "0";
                                    Kol_zam_upakovka_teamA.value = "0";
                                    Kol_pretenziy_teamA.value = "0";
                                    Zabrakov_mat_teamA.value = "0";

                                    Kol_zam_him_sostav_Sulf.value = "0";
                                    Kol_zam_upakovka_Sulf.value = "0";
                                    Kol_pretenziy_Sulf.value = "0";
                                    Zabrakov_mat_Sulf.value = "0";

                                    BrakQuality_comment.value = "";

                                    Kol_zam_him_sostav_teamA_comment.value = "";
                                    Kol_zam_upakovka_teamA_comment.value = "";
                                    Kol_pretenziy_teamA_comment.value = "";
                                    Zabrakov_mat_teamA_comment.value = "";


                                    Kol_zam_him_sostav_Sulf_comment.value = "";
                                    Kol_zam_upakovka_Sulf_comment.value = "";
                                    Kol_pretenziy_Sulf_comment.value = "";
                                    Zabrakov_mat_Sulf_comment.value = "";
                                    $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    // Имитируем успешное сохранение данных с помощью задержки setTimeout
                                    setTimeout(function()
                                    {
                                    // Завершаем анимацию
                                    $("#myButton").html('<img class="iconsButtons" src="/Engels/icons/check.png" />Сохранено!');
                                    setTimeout(function()
                                    {
                                        // Устанавливаем обратное состояние кнопки
                                        $("#myButton").html('<img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить');
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
