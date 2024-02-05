<?php require('../Engels/connect_db.php');
if(empty($_SESSION['login']))
{
    die(header('Location: ../Engels/bridge.php'));
}
if($_SESSION['index'] == '0'){
    require('../Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <!-- Очистка кеша -->
    
    <script>
    window.addEventListener('beforeunload', function() 
    {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../Engels/index.php?nocache=' + Date.now(), true);
        xhr.setRequestHeader('Cache-Control', 'no-cache, no-store, must-revalidate');
        xhr.setRequestHeader('Pragma', 'no-cache');
        xhr.setRequestHeader('Expires', '0');
        xhr.send();
        window.location.reload(true);
    });
</script>
    <head><?php require('../Engels/head.php')?></head>
    <body onload="showMyModal()" class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" style="display: flex; align-items: center;">
                    <div style="position: relative; width: 100%;   top: 0;">
                        
                        <input
                            placeholder="Введите дату"
                            value="<?php echo date('Y-m-d'); ?>"
                            style="margin:2px 1px 1px 35px; width:315px; padding-left: 10px;"
                            min="<?php echo date('2023-08-01'); ?>"
                            max="<?php echo date('Y-m-d'); ?>"
                            type="date"
                            class="form-control box"
                            id="selectedDate"
                            onchange="fetchData()"
                            onload="fetchData()"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div id="loader"></div>

        <div id="noLoader" class="mt-1">
            <div id="body" class="no-bootstrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <fieldset class="form-group card shadow bg-light">
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm ">
                                        <thead class="theadIndex">
                                            <tr class="trIndex"><th colspan="5"><?php echo"$app_names->safety"; ?></th></tr>
                                        </thead>
                                        <tbody id="tableSafety">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm">
                                        <tbody id="tableInspection">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm">
                                        <tbody>
                                            <tr class="trIndex" id="daysCount"></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm ">
                                        <thead class="theadIndex">
                                            <tr class="trIndex"><th colspan="4"><?php echo"$app_names->quality"; ?></th></tr>
                                        </thead>
                                        <tbody id="tableQuality">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm ">
                                        <thead class="theadIndex">
                                            <tr class="trIndex"><th colspan="5">ЭНЕРГОРЕСУРСЫ</th></tr>
                                        </thead>
                                        <tbody id="tableEnergoresurs">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <?php require('index/electricity.php') ?> -->
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset class="form-group card shadow bg-light">
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm ">
                                        <thead class="theadIndex">
                                            <tr class="trIndex"><th colspan="4"><?php echo"$app_names->check_params"; ?></th></tr>
                                        </thead>
                                        <tbody id="tableTechnology">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm ">
                                        <thead class="theadIndex">
                                            <tr class="trIndex"><th colspan='4'><?php echo"$app_names->active_water"; ?></th><th>Сульф..</th></tr>
                                        </thead>
                                        <tbody id="tableWater">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-5">
                            <fieldset class="form-group card shadow bg-light">
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm ">
                                        <thead class="theadIndex">
                                            <tr class="trIndex"><th colspan="13"><?php echo"$app_names->production"; ?></th></tr>
                                        </thead>
                                        <tbody id="tableProduction">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                        <tbody id="tableProductionTeamB">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                    <table class="table-bordered table table-sm ">
                                        
                                        <tbody id="tableSulfirovanie">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table-bordered table table-sm ">
                                        <thead class="theadIndex">
                                            <tr class="trIndex"><th colspan='5'><?php echo"$app_names->sirye"; ?></th></tr>
                                        </thead>
                                        <tbody id="tableSirye">
                                            <tr class="trIndex"><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <fieldset class="form-group card shadow bg-light">
                            <div class="table-responsive">
                                <table class="table-bordered table table-sm">
                                    <thead class="theadIndex">
                                        <tr class="trIndex"><th colspan="10"><?php echo"$app_names->top5Problem"; ?></th></tr>
                                    </thead>
                                    <tbody id="tableTop5Problem">
                                        <tr><td class="td_Index"><?php echo"$app_names->loading"; ?></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <script src="../Engels/script/fetchData.js"></script>
            <script src="../Engels/script/number_of_days_without_accidents.js"></script>
            <script> window.onload = function() { fetchData();  };</script>
            <script> $( function() { $( document ).tooltip(); });</script>
        </div>
    </body>
    <?php require('../Engels/footer/footer.php') ?>
</html>

