<?php require($_SERVER['DOCUMENT_ROOT'].'/connect_db.php');
if(empty($_SESSION['login']))
{
header($_SERVER['DOCUMENT_ROOT'].'Location: /bridge.php');}
if($_SESSION['palletizer'] === 0){
    require($_SERVER['DOCUMENT_ROOT'].'/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
<head><?php require('../Engels/head.php')?></head>
    <body class="container">
        <style>
            .btn_quality_palletizer{
                height:150px;
                width:200px;
                margin:5px;
                font-size:16px;
                background:SteelBlue;
            }
            textarea{
                height:150px;
                margin:5px;
                font-size:18px;
            }
            .btn_quality_palletizer_save_comment{
                margin:5px;
                font-size:18px;
            }
        </style>
        <div class="row card shadow-sm blur">
            <div class="col-md-12">
                <?php require('../notification/notification.php') ?>
                <div class="row">
                    <div class="col-md-2">
                        <button id="open_box" value="open_box" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Плохая проклейка короба, открытые бандероли</button>
                    </div>
                    <div class="col-md-2">
                        <button id="label_offset" value="label_offset" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Смещение угловой этикетки</button>
                    </div>
                    <div class="col-md-2">
                        <button id="bad_corner_label" value="bad_corner_label" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Плохая проклейка угловой этикетки</button>
                    </div>
                    <div class="col-md-2">
                        <button id="corner_offset" value="corner_offset" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Смещение уголков</button>
                    </div>
                    <div class="col-md-2">
                        <button id="bad_corner" value="bad_corner" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Кривые/замятые уголки (в упаковке)</button>
                    </div>
                    <div class="col-md-2">
                        <button id="bad_read_corner_label" value="bad_read_corner_label" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Плохо считывается угловая этикетка</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <button id="missing_top_sheet_on_pallet" value="missing_top_sheet_on_pallet" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Отсутствие верхнего листа на паллете</button>
                    </div>
                    <div class="col-md-2">
                        <button id="pago_label_inconsistency" value="pago_label_inconsistency" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Несоответствие данных на этикетке PAGO</button>
                    </div>
                    <div class="col-md-2">
                        <button id="brak_stretch" value="brak_stretch" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Брак стретч пленки</button>
                    </div>
                    <div class="col-md-2">
                        <button id="pallet_defects" value="pallet_defects" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Дефекты поддона</button>
                    </div>
                    <div class="col-md-2">
                        <button id="incorrect_pago_scales" value="incorrect_pago_scales" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Некорректная работа весов PAGO</button>
                    </div>
                     <div class="col-md-2">
                        <button id="coming_pallets_correct" value="coming_pallets_correct" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Продукт, приходящий на паллетайзер соответствует нарабатываемому на автоматах</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <button id="weight_deviation" value="weight_deviation" class="btn_nums btn_quality_palletizer btn btn-primary btn-block">Отклонение веса</button>
                    </div>
                    <div class="col-md-8">
                        <textarea id="notes" value="notes" type="text" class="form-control" placeholder="Примечание"></textarea>
                    </div>
                    <div class="col-md-2">
                        <button id="save_comment" value="save_comment" class="btn_quality_palletizer_save_comment btn btn-success btn-block">Сохранить примечание</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row card shadow-sm mt-4">
            <fieldset class="form-group border card shadow-sm">
                <div class="table-responsive">
                    <table id="myTable" class="mt-2 table-hover table-bordered table table-sm ">
                        <thead>
                            <tr>
                                <th>Наименование</th>
                                <th>Количество</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <?php require('../palletizer/load_palletizer_quality.php') ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </div>
    </body>
    <script>
        function updateTable() 
        {
           $.ajax({
            url: "../palletizer/load_palletizer_quality.php",
            success: function(data) 
            {
             $("#tableBody").html(data);
            }
           });
        }
    </script>
    <script>
       $(document).on('click', '#save_comment', function(){
        var notes = document.getElementById('notes');
        var user = "<?php echo $a; ?>";
          $.ajax({
            url: '../palletizer/save_palletizer_quality_notes.php',
            method: 'POST',
            data: { notes: notes.value, user: user },
            success: function(response) {
                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                updateTable();
                notes: notes.value = "";
            },
            error: function(xhr, status, error) {
               
            }
          });
    })
    </script>
    <script>
       $(document).on('click', '.btn_nums', function(){
        var btnValue = $(this).val();
        var user = "<?php echo $a; ?>";
        // Отправка POST-запроса на сервер
          $.ajax({
            url: '../palletizer/save_palletizer_quality.php',
            method: 'POST',
            data: { btnValue: btnValue, user: user},
            success: function(response) {
                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                updateTable();
            },
            error: function(xhr, status, error) {
                
            }
          });
    })
    </script>
    
    <?php require('../footer/footer.php') ?>
</html>