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

    <body class="container ">
        <form  method="post" id="formToSend">
            <div class="row card shadow-sm mt-4 blur bg-light">
                <p style="font-size:22px; border-bottom: 1px solid #f00;">Качество СМС</p>
                <script src="/Engels/script.js"></script>
                <div class="col-md-12">
                    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                    <div class="row" method="post" id="formToSend">
                        <div class="row">
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                                    <label style="font-size:12px;" for="BrakQuality" class="mt-4">Брак,t.</label>
                                    <div class="form-group row">
                                        <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="BrakQuality" class="form-control mt-1" placeholder="брак,t." required>
                                    </div>
                                </fieldset>
                            </div>
                        <div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-2"></th>
                                    <th  style='writing-mode:vertical-rl; width:10px;'>Замечания по хим. составу</th>
                                    <th  style='writing-mode:vertical-rl; width:10px;'>Замечания по упаковке</th>
                                    <th  style='writing-mode:vertical-rl; width:10px;'>Претензии</th>
                                    <th  style='writing-mode:vertical-rl; width:10px;'>Забракованный материал</th>
                                    <th  style='writing-mode:vertical-rl; width:10px;'>Вторичная вода</th>
                                    <th  class="col-8">Комментарий</th>
                                </tr>
                            </thead>
                                <tr>
                                    <td><label>Innotech 1</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn1_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn1_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn1_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input"></td>
                                    <td><input type="text" id="inn1_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Innotech 2</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn2_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn2_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn2_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="inn2_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Innotech 3</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn3_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn3_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="inn3_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="inn3_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>UVA4</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="uva4_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="uva4_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="uva4_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="uva4_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>UVA5</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="uva5_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="uva5_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="uva5_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="uva5_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>ACMA</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="acma_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="acma_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="acma_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="acma_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Prasmatic</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="shrink_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="shrink_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="shrink_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="shrink_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Паллетйзер</label></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="pallet_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="pallet_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="pallet_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input  type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="pallet_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Бункера</label></td>
                                    <td><input id="bunker_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="bunker_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="bunker_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="bunker_quality4" type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="bunker_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Сушильная башня</label></td>
                                    <td><input id="sushka_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="sushka_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="sushka_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="sushka_quality4" type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="sushka_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Сухая нейтрализация</label></td>
                                    <td><input id="bashnya_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="bashnya_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="bashnya_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="bashnya_quality4" type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="bashnya_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Газогенерация</label></td>
                                    <td><input id="gazgen_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="gazgen_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="gazgen_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="gazgen_quality4" type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="gazgen_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Приготовление</label></td>
                                    <td><input id="prigotovlenie_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="prigotovlenie_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="prigotovlenie_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="prigotovlenie_quality4" type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="prigotovlenie_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                                <tr>
                                    <td><label>Постдобавки</label></td>
                                    <td><input id="postobavki_quality1" type="checkbox" class="form-check-input" ></td>
                                    <td style="background:lightgray;"><input disabled type="checkbox" class="form-check-input" ></td>
                                    <td><input id="postobavki_quality2" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="postobavki_quality3" type="checkbox" class="form-check-input" ></td>
                                    <td><input id="postobavki_quality4" type="checkbox" class="form-check-input" ></td>
                                    <td><input type="text" id="postobavki_comment" class="form-control border-0" placeholder="введите комментарий" ></input></td>
                                </tr>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <button style="width:200px;" type="button" class="add btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
                    
                    <div class="alert alert-plan" style="display:none; position: fixed;">ОШИБКА СОХРАНЕНИЯ! Строка "План" не может быть пустым!</div>
                </div>
            </div>
            <script>
                $(document).ready
            (function()
                {
                    $(".add").click
                    (
                		function()
                		{
                            var inn1_comment = document.getElementById('inn1_comment').value;
                            var inn2_comment = document.getElementById('inn2_comment').value;
                            var inn3_comment = document.getElementById('inn3_comment').value;
                            var uva4_comment = document.getElementById('uva4_comment').value;
                            var uva5_comment = document.getElementById('uva5_comment').value;
                            var acma_comment = document.getElementById('acma_comment').value;
                            var shrink_comment = document.getElementById('shrink_comment').value;
                            var pallet_comment = document.getElementById('pallet_comment').value;
                            var bunker_comment = document.getElementById('bunker_comment').value;
                            var sushka_comment = document.getElementById('sushka_comment').value;
                            var bashnya_comment = document.getElementById('bashnya_comment').value;
                            var gazgen_comment = document.getElementById('gazgen_comment').value;
                            var prigotovlenie_comment = document.getElementById('prigotovlenie_comment').value;
                            var postobavki_comment = document.getElementById('postobavki_comment').value;

                            var dateTime = document.getElementById('dateTime').value;
                            var team = document.querySelector('input[name="flexRadioDefault"]:checked').value;

                            var inn1_quality1 = document.getElementById("inn1_quality1").checked ? 1 : 0;
                            var inn1_quality2 = document.getElementById("inn1_quality2").checked ? 1 : 0;
                            var inn1_quality3 = document.getElementById("inn1_quality3").checked ? 1 : 0;

                            var inn2_quality1 = document.getElementById("inn2_quality1").checked ? 1 : 0;
                            var inn2_quality2 = document.getElementById("inn2_quality2").checked ? 1 : 0;
                            var inn2_quality3 = document.getElementById("inn2_quality3").checked ? 1 : 0;

                            var inn3_quality1 = document.getElementById("inn3_quality1").checked ? 1 : 0;
                            var inn3_quality2 = document.getElementById("inn3_quality2").checked ? 1 : 0;
                            var inn3_quality3 = document.getElementById("inn3_quality3").checked ? 1 : 0;

                            var uva4_quality1 = document.getElementById("uva4_quality1").checked ? 1 : 0;
                            var uva4_quality2 = document.getElementById("uva4_quality2").checked ? 1 : 0;
                            var uva4_quality3 = document.getElementById("uva4_quality3").checked ? 1 : 0;

                            var uva5_quality1 = document.getElementById("uva5_quality1").checked ? 1 : 0;
                            var uva5_quality2 = document.getElementById("uva5_quality2").checked ? 1 : 0;
                            var uva5_quality3 = document.getElementById("uva5_quality3").checked ? 1 : 0;

                            var acma_quality1 = document.getElementById("acma_quality1").checked ? 1 : 0;
                            var acma_quality2 = document.getElementById("acma_quality2").checked ? 1 : 0;
                            var acma_quality3 = document.getElementById("acma_quality3").checked ? 1 : 0;

                            var shrink_quality1 = document.getElementById("shrink_quality1").checked ? 1 : 0;
                            var shrink_quality2 = document.getElementById("shrink_quality2").checked ? 1 : 0;
                            var shrink_quality3 = document.getElementById("shrink_quality3").checked ? 1 : 0;

                            var pallet_quality1 = document.getElementById("pallet_quality1").checked ? 1 : 0;
                            var pallet_quality2 = document.getElementById("pallet_quality2").checked ? 1 : 0;
                            var pallet_quality3 = document.getElementById("pallet_quality3").checked ? 1 : 0;

                            var bunker_quality1 = document.getElementById("bunker_quality1").checked ? 1 : 0;
                            var bunker_quality2 = document.getElementById("bunker_quality2").checked ? 1 : 0;
                            var bunker_quality3 = document.getElementById("bunker_quality3").checked ? 1 : 0;
                            var bunker_quality4 = document.getElementById("bunker_quality4").checked ? 1 : 0;

                            var sushka_quality1 = document.getElementById("sushka_quality1").checked ? 1 : 0;
                            var sushka_quality2 = document.getElementById("sushka_quality2").checked ? 1 : 0;
                            var sushka_quality3 = document.getElementById("sushka_quality3").checked ? 1 : 0;
                            var sushka_quality4 = document.getElementById("sushka_quality4").checked ? 1 : 0;

                            var bashnya_quality1 = document.getElementById("bashnya_quality1").checked ? 1 : 0;
                            var bashnya_quality2 = document.getElementById("bashnya_quality2").checked ? 1 : 0;
                            var bashnya_quality3 = document.getElementById("bashnya_quality3").checked ? 1 : 0;
                            var bashnya_quality4 = document.getElementById("bashnya_quality4").checked ? 1 : 0;

                            var gazgen_quality1 = document.getElementById("gazgen_quality1").checked ? 1 : 0;
                            var gazgen_quality2 = document.getElementById("gazgen_quality2").checked ? 1 : 0;
                            var gazgen_quality3 = document.getElementById("gazgen_quality3").checked ? 1 : 0;
                            var gazgen_quality4 = document.getElementById("gazgen_quality4").checked ? 1 : 0;

                            var prigotovlenie_quality1 = document.getElementById("prigotovlenie_quality1").checked ? 1 : 0;
                            var prigotovlenie_quality2 = document.getElementById("prigotovlenie_quality2").checked ? 1 : 0;
                            var prigotovlenie_quality3 = document.getElementById("prigotovlenie_quality3").checked ? 1 : 0;
                            var prigotovlenie_quality4 = document.getElementById("prigotovlenie_quality4").checked ? 1 : 0;

                            var postobavki_quality1 = document.getElementById("postobavki_quality1").checked ? 1 : 0;
                            var postobavki_quality2 = document.getElementById("postobavki_quality2").checked ? 1 : 0;
                            var postobavki_quality3 = document.getElementById("postobavki_quality3").checked ? 1 : 0;
                            var postobavki_quality4 = document.getElementById("postobavki_quality4").checked ? 1 : 0;

                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateInnotech1.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        inn1_quality1:inn1_quality1,
                                        inn1_quality2:inn1_quality2,
                                        inn1_quality3:inn1_quality3,
                                        inn1_comment:inn1_comment
                                    },
                                    success: function(response)
                                    {},
                                    error: function(xhr, status, error)
                                    {alert("Error: " + error);}
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateInnotech2.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        inn2_quality1:inn2_quality1,
                                        inn2_quality2:inn2_quality2,
                                        inn2_quality3:inn2_quality3,
                                        inn2_comment:inn2_comment
                                    },
                                    success: function(response)
                                    {},
                                    error: function(xhr, status, error)
                                    {alert("Error: " + error);}
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateInnotech3.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        inn3_quality1:inn3_quality1,
                                        inn3_quality2:inn3_quality2,
                                        inn3_quality3:inn3_quality3,
                                        inn3_comment:inn3_comment
                                    },
                                    success: function(response)
                                    {},
                                    error: function(xhr, status, error)
                                    {alert("Error: " + error);}
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateuva4.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        uva4_quality1:uva4_quality1,
                                        uva4_quality2:uva4_quality2,
                                        uva4_quality3:uva4_quality3,
                                        uva4_comment:uva4_comment
                                    },
                                    success: function(response)
                                    {},
                                    error: function(xhr, status, error)
                                    {alert("Error: " + error);}
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateuva5.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        uva5_quality1:uva5_quality1,
                                        uva5_quality2:uva5_quality2,
                                        uva5_quality3:uva5_quality3,
                                        uva5_comment:uva5_comment
                                    },
                                    success: function(response)
                                    {},
                                    error: function(xhr, status, error)
                                    {alert("Error: " + error);}
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateacma.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        acma_quality1:acma_quality1,
                                        acma_quality2:acma_quality2,
                                        acma_quality3:acma_quality3,
                                        acma_comment:acma_comment
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateshrink.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        shrink_quality1:shrink_quality1,
                                        shrink_quality2:shrink_quality2,
                                        shrink_quality3:shrink_quality3,
                                        shrink_comment:shrink_comment
                                    },
                                    success: function(response)
                                    {
                                       
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updatepallet.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        pallet_quality1:pallet_quality1,
                                        pallet_quality2:pallet_quality2,
                                        pallet_quality3:pallet_quality3,
                                        pallet_comment:pallet_comment
                                    },
                                    success: function(response)
                                    {},
                                    error: function(xhr, status, error)
                                    { alert("Error: " + error); }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updatebunker.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        bunker_quality1:bunker_quality1,
                                        bunker_quality2:bunker_quality2,
                                        bunker_quality3:bunker_quality3,
                                        bunker_quality4:bunker_quality4,
                                        bunker_comment:bunker_comment
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updatesushka.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        sushka_quality1:sushka_quality1,
                                        sushka_quality2:sushka_quality2,
                                        sushka_quality3:sushka_quality3,
                                        sushka_quality4:sushka_quality4,
                                        sushka_comment:sushka_comment
                                    },
                                    success: function(response)
                                    {
                                       
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updatebashnya.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        bashnya_quality1:bashnya_quality1,
                                        bashnya_quality2:bashnya_quality2,
                                        bashnya_quality3:bashnya_quality3,
                                        bashnya_quality4:bashnya_quality4,
                                        bashnya_comment:bashnya_comment
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updategazgen.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        gazgen_quality1:gazgen_quality1,
                                        gazgen_quality2:gazgen_quality2,
                                        gazgen_quality3:gazgen_quality3,
                                        gazgen_quality4:gazgen_quality4,
                                        gazgen_comment:gazgen_comment
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updateprigotovlenie.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        prigotovlenie_quality1:prigotovlenie_quality1,
                                        prigotovlenie_quality2:prigotovlenie_quality2,
                                        prigotovlenie_quality3:prigotovlenie_quality3,
                                        prigotovlenie_quality4:prigotovlenie_quality4,
                                        prigotovlenie_comment:prigotovlenie_comment
                                    },
                                    success: function(response)
                                    {
                                        
                                    },
                                    error: function(xhr, status, error)
                                    {
                                        alert("Error: " + error);
                                    }
                                });
                                $.ajax(
                                {
                                    type: 'POST',
                                    dataType: 'html',
                                    url: '/Engels/quality/updatepostdobavki.php',
                                    data:
                                    {
                                        dateTime:dateTime,
                                        team:team,
                                        postdobavki_quality1:postdobavki_quality1,
                                        postdobavki_quality2:postdobavki_quality2,
                                        postdobavki_quality3:postdobavki_quality3,
                                        postdobavki_quality4:postdobavki_quality4,
                                        postdobavki_comment:postdobavki_comment
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
                        });
                    });
            </script>
        </form>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
    
</html>
