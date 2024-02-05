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
        <div class="row card shadow-sm blur">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
                    <div class="carousel-inner">
                            <div data-bs-interval="9999999" class="carousel-item active" >
                                <div class="col-md-12">
                                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                                    <div class="row">
                                        <p class="namesForTitle" style="font-size:22px;"><?php echo"$app_names->safety"; ?></p>
                                        <div class="col-md-6"  >
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="col-md-12">
                                                    <label style="font-size:12px;" for="dateTime" class="mt-2">Выберите дату</label>
                                                    <input type="date" value="<?php echo date('Y-m-d'); ?>" id="dateTime" class="borderSolid form-control mt-1">
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group row">
                                                            <label for="Incedents" class="col-sm-5 col-form-label mt-4">Инциденты</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" type="number" id="Incedents" class="borderSolid form-control mt-4" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="NearMiss" class="col-sm-5 col-form-label mt-2">Действия на грани риска</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" type="number" id="NearMiss" class="borderSolid form-control mt-2" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Bbswa" class="col-sm-5 col-form-label mt-2">Обход по безопасности</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" readonly type="number" id="Bbswa" class="borderSolid form-control mt-2" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Kol_vo_zam" class="col-sm-5 col-form-label mt-2">Количество замечаний</label>
                                                            <div class="col-sm-7">
                                                                <input min="0" readonly type="number" id="Kol_vo_zam" class="borderSolid form-control mt-2" placeholder="введите данные">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->_production"; ?></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamA" class="mt-2">Кол-во замечаний</label>
                                                    <input type="number" required min="0" id="Kol_zam_teamA" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" >
                                                    <label style="font-size:12px;" for="Bbs_teamA" class="mt-2">Обход по безопасности</label>
                                                    <input type="number" required min="0" id="Bbs_teamA" class="borderSolid form-control mt-1" placeholder="обход по безопасности" >
                                                    <label style="font-size:12px;" for="Rpm_zam_teamA" class="mt-2">R&PM Замечания</label>
                                                    <input type="number" required min="0" id="Rpm_zam_teamA" class="borderSolid form-control mt-1" placeholder="r&pm замечания" >
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamA" class="mt-2">R&PM BBSWA</label>
                                                    <input type="number" required min="0" id="Rpm_bbs_teamA" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" >
                                                </div>
                                            </fieldset>
                                        </div>
                                        <!--<div class="col-md-2 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamB" class="mt-2">Кол-во замечаний</label>
                                                    <input readonly type="number" required min="0" id="Kol_zam_teamB" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" >
                                                    <label style="font-size:12px;" for="Bbs_teamB" class="mt-2">Обход по безопасности</label>
                                                    <input readonly type="number" required min="0" id="Bbs_teamB" class="borderSolid form-control mt-1" placeholder="обход по безопасности" >
                                                    <label style="font-size:12px;" for="Rpm_zam_teamB" class="mt-2">R&PM Замечания</label>
                                                    <input readonly type="number" required min="0" id="Rpm_zam_teamB" class="borderSolid form-control mt-1" placeholder="r&pm замечания" >
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamB" class="mt-2">R&PM BBSWA</label>
                                                    <input readonly type="number" required min="0" id="Rpm_bbs_teamB" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" >
                                                </div>
                                            </fieldset>
                                        </div>-->
                                        <div class="col-md-3">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->sulfirovanie"; ?></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_Sulf" class="mt-2">Кол-во замечаний</label>
                                                    <input type="number" min="0" id="Kol_zam_Sulf" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" >
                                                    <label style="font-size:12px;" for="Bbs_Sulf" class="mt-2">Обход по безопасности</label>
                                                    <input type="number" min="0" id="Bbs_Sulf" class="borderSolid form-control mt-1" placeholder="обход по безопасности" >
                                                    <label style="font-size:12px;" for="Rpm_zam_Sulf" class="mt-2">R&PM Замечания</label>
                                                    <input type="number" min="0" id="Rpm_zam_Sulf" class="borderSolid form-control mt-1" placeholder="r&pm замечания" >
                                                    <label style="font-size:12px;" for="Rpm_bbs_Sulf" class="mt-2">R&PM BBSWA</label>
                                                    <input type="number" min="0" id="Rpm_bbs_Sulf" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" >
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-bs-interval="9999999" class="carousel-item">
                                <div class="col-md-12">
                                    <div class="row">
                                        <p style="font-size:30px; border-bottom: 1px solid #f00;">комментарии</p>
                                        <div class="col-md-6">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="form-group row">
                                                            <label for="Incedents_comment" class="col-sm-5 col-form-label mt-4">Инциденты</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0" type="text" id="Incedents_comment" class="borderSolid form-control mt-4" placeholder="комментарий"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="NearMiss_comment" class="col-sm-5 col-form-label mt-2">Действия на грани риска</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0" type="text" id="NearMiss_comment" class="borderSolid form-control mt-2" placeholder="комментарий" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Bbswa_comment" class="col-sm-5 col-form-label mt-2">Обход по безопасности</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0"  type="text" id="Bbswa_comment" class="borderSolid form-control mt-2" placeholder="комментарий" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Kol_vo_zam_comment" class="col-sm-5 col-form-label mt-2">Количество замечаний</label>
                                                            <div class="col-sm-7">
                                                                <textarea required min="0"  type="text" id="Kol_vo_zam_comment" class="borderSolid form-control mt-2" placeholder="комментарий" ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-3">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->_production"; ?></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamA_comment" class="mt-2">Кол-во замечаний</label>
                                                    <textarea type="text" min="0" id="Kol_zam_teamA_comment" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" ></textarea>
                                                    <label style="font-size:12px;" for="Bbs_teamA_comment" class="mt-2">Обход по безопасности</label>
                                                    <textarea type="text" min="0" id="Bbs_teamA_comment" class="borderSolid form-control mt-1" placeholder="обход по безопасности" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_zam_teamA_comment" class="mt-2">R&PM Замечания</label>
                                                    <textarea type="text" min="0" id="Rpm_zam_teamA_comment" class="borderSolid form-control mt-1" placeholder="r&pm замечания" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamA_comment" class="mt-2">R&PM BBSWA</label>
                                                    <textarea type="text" min="0" id="Rpm_bbs_teamA_comment" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" ></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <!--<div class="col-md-2 bg-light">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;">Смена Б</p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_teamB_comment" class="mt-2">Кол-во замечаний</label>
                                                    <textarea readonly type="text" min="0" id="Kol_zam_teamB_comment" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" ></textarea>
                                                    <label style="font-size:12px;" for="Bbs_teamB_comment" class="mt-2">Обход по безопасности</label>
                                                    <textarea readonly type="text" min="0" id="Bbs_teamB_comment" class="borderSolid form-control mt-1" placeholder="обход по безопасности" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_zam_teamB_comment" class="mt-2">R&PM Замечания</label>
                                                    <textarea readonly type="text" min="0" id="Rpm_zam_teamB_comment" class="borderSolid form-control mt-1" placeholder="r&pm замечания" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_bbs_teamB_comment" class="mt-2">R&PM BBSWA</label>
                                                    <textarea readonly type="text" min="0" id="Rpm_bbs_teamB_comment" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" ></textarea>
                                                </div>
                                            </fieldset>
                                        </div>-->
                                        <div class="col-md-3">
                                            <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm">
                                                <div class="form-group row">
                                                    <p style="font-size:21px; border-bottom: 1px solid #f00;"><?php echo"$app_names->_production"; ?></p>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="font-size:12px;" for="Kol_zam_Sulf_comment" class="mt-2">Кол-во замечаний</label>
                                                    <textarea type="text" min="0" id="Kol_zam_Sulf_comment" class="borderSolid form-control mt-1" placeholder="кол-во замечаний" ></textarea>
                                                    <label style="font-size:12px;" for="Bbs_Sulf_comment" class="mt-2">Обход по безопасности</label>
                                                    <textarea type="text" min="0" id="Bbs_Sulf_comment" class="borderSolid form-control mt-1" placeholder="обход по безопасности" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_zam_Sulf_comment" class="mt-2">R&PM Замечания</label>
                                                    <textarea type="text" min="0" id="Rpm_zam_Sulf_comment" class="borderSolid form-control mt-1" placeholder="r&pm замечания" ></textarea>
                                                    <label style="font-size:12px;" for="Rpm_bbs_Sulf_comment" class="mt-2">R&PM BBSWA</label>
                                                    <textarea type="text" min="0" id="Rpm_bbs_Sulf_comment" class="borderSolid form-control mt-1" placeholder="r&pm bbswa" ></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-next" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                <button style="width:200px;" type="button" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="/Engels/icons/icon-save.png" />Сохранить</button>
            </div>
            <script src="/Engels/safety/check_input.js"></script>
        </div>
        <script src="/Engels/safety/add_safety.js"></script>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
