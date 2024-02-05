<?php
require_once 'names.php';
$app_names = new App_names();

?>
<button class="bodyBackground" style="border:none; margin:4px; font-size:24px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">☰ </button>
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
<link href="/Engels/style/sidebars.css" rel="stylesheet">
<div style="width:300px; backdrop-filter: blur(15px); radial-gradient(#E0FFFF, #E0FFFF)"  class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">ЕЖЕДНЕВНЫЙ МОНИТОРИНГ ПРОИЗВОДСТВА</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <hr>
    <style>
        .iconsSidebar
        {
            height:16px;
            margin: 2px 6px 6px 2px;
            vertical-align: middle;
            horizontal-align: center;
            padding:2px;
        }
        .iconsTitleSidebar
        {
            height:18px;
            margin: 2px 6px 2px 2px;
            vertical-align: middle;
            horizontal-align: center;
            padding:2px;
        }
    </style>
    <div class="offcanvas-body">
        <div class="flex-shrink-0 p-3">
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        <img class='iconsTitleSidebar' src='/Engels/icons/house.png' /><?php echo "$app_names->main"; ?>
                    </button>
                    
                    <script>
                        function downloadFile() 
                        {
                            const excelFileURL = 'OPL.xls';
                            const a = document.createElement('a');
                            a.href = excelFileURL;
                            a.download = '/Engels/shablon/OPL.xls';
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                        }
                    </script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Получаем текущий URL страницы
                            var currentUrl = window.location.href;
                            
                            // Генерируем произвольный хеш длиной в 128 символов
                            var randomHash = '';
                            var randomHash2 = '';
                            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                            var charactersLength = characters.length;
                            for (var i = 0; i < 32; i++) {
                                randomHash += characters.charAt(Math.floor(Math.random() * charactersLength));
                                randomHash2 += characters.charAt(Math.floor(Math.random() * charactersLength));
                            }

                            // Заменяем адрес URL влево, добавляя произвольный хеш
                            window.location.href = '#' + '/' + '?' + randomHash2 + '.php' + '?' + randomHash;
                            var newUrl = window.location.href.substring(0, window.location.href.length - 5).replace(randomHash, '');
                            window.location.href = newUrl;
                        });
                    </script>
                    <div class="collapse show" id="home-collapse">
                      <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                          <?php if($_SESSION['index'] == 1)
                            {  echo"<li><a href='/Engels/index.php' class='nav-link text-dark' style='display: inline-block; vertical-align: middle;'>$app_names->main</a></li>";}
                            else{}

                            if($_SESSION['top5problem'] == 1)
                            {  echo"<li><a href='/Engels/top5problem/top5problem.php' class='nav-link text-dark'>$app_names->_top5Problem</a></li>";}
                            else{}

                            if($_SESSION['inspection'] == 1)
                            { echo"<li><a href='/Engels/inspection/inspection.php' class='nav-link text-dark'>$app_names->inspection</a></li>";}
                            else{}
                           
                            
                            ?>
                      </ul>
                    </div>
                </li>
                </li>
                <?php
                    if($_SESSION['index'] == 1){
                        echo"<li class='mb-1'>";
                        echo"    <button class='btn btn-toggle align-items-center rounded collapsed' data-bs-toggle='collapse' data-bs-target='#shablon-collapse' aria-expanded='false'>";
                        echo"        <img class='iconsTitleSidebar' src='/Engels/icons/shablon.png' />$app_names->shablon";
                        echo"    </button>";
                        echo"    <div class='collapse' id='shablon-collapse'>";
                        echo"        <ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small'>";
                        echo"            <li><li><a type='button' onclick='downloadFile()' class='nav-link text-dark'>$app_names->opl</a></li>";
                        echo"        </ul>";
                        echo"    </div>";
                        echo"</li>";}
                    else{}
                    
                    if($_SESSION['safety'] == 1){
                        echo"<li class='mb-1'>";
                        echo"    <button class='btn btn-toggle align-items-center rounded collapsed' data-bs-toggle='collapse' data-bs-target='#dashboard-collapse' aria-expanded='false'>";
                        echo"        <img class='iconsTitleSidebar' src='/Engels/icons/security.png' />$app_names->_safety";
                        echo"    </button>";
                        echo"    <div class='collapse' id='dashboard-collapse'>";
                        echo"        <ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small'>";
                        echo"            <li><a href='/Engels/safety/Safety.php' class='nav-link text-dark'>$app_names->_safety</a></li>";
                        echo"            <li><a href='/Engels/safety/statSafety.php' class='nav-link text-dark'>$app_names->statistic</a></li>";
                        echo"            <li><a href='/Engels/safety/redactSafety.php' class='nav-link text-dark'>$app_names->redact</a></li>";
                        echo"        </ul>";
                        echo"    </div>";
                        echo"</li>";}
                    else{}

                    if($_SESSION['quality'] == 1){
                        echo"<li class='mb-1'>";
                        echo"    <button class='btn btn-toggle align-items-center rounded collapsed' data-bs-toggle='collapse' data-bs-target='#quality-collapse' aria-expanded='false'>";
                        echo"        <img class='iconsTitleSidebar' src='/Engels/icons/quality.png' />$app_names->_quality";
                        echo"    </button>";
                        echo"    <div class='collapse' id='quality-collapse'>";
                        echo"        <ul class='btn-toggle-nav list-unstyled fw-normal pb-1 small'>";
                        echo"            <li><a href='/Engels/quality/quality.php' class='nav-link text-dark'>$app_names->_quality</a></li>";
                        echo"            <li><a href='/Engels/quality/statQuality.php' class='nav-link text-dark'>$app_names->statistic</a></li>";
                        echo"            <li><a href='/Engels/quality/redactQuality.php' class='nav-link text-dark'>$app_names->redact</a></li>";
                        echo"            <li><a href='/Engels/quality/qualityPaids.php' class='nav-link text-dark'>$app_names->premirovanie</a></li>";
                        echo"        </ul>";
                        echo"    </div>";
                        echo"</li>";
                    }else{}
                ?>
                <?php if($_SESSION['technology'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#technology-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/technology.png' /><?php echo"$app_names->technology"; ?>
                        </button>
                        <div class="collapse" id="technology-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/technology/technology.php" class="nav-link text-dark"><?php echo"$app_names->technology"; ?></a></li>
                                <li><a href="/Engels/technology/statTechnology.php" class="nav-link text-dark"><?php echo"$app_names->statistic"; ?></a></li>
                                <li><a href="/Engels/technology/redactTechnology.php" class="nav-link text-dark"><?php echo"$app_names->redact"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['production'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#production-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/production.png' /><?php echo"$app_names->_production"; ?>
                        </button>
                        <div class="collapse" id="production-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/production/production.php" class="nav-link text-dark"><?php echo"$app_names->_production"; ?></a></li>
                                <li><a href="/Engels/production/statProduction.php" class="nav-link text-dark"><?php echo"$app_names->statistic"; ?></a></li>
                                <li><a href="/Engels/production/totalFact_2023.php" class="nav-link text-dark"><?php echo"$app_names->statistic $app_names->year"; ?></a></li>
                                <li><a href="/Engels/production/redactProduction.php" class="nav-link text-dark"><?php echo"$app_names->redact"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['sulfirovanie'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#productionSulf-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/production.png' /><?php echo"$app_names->sulfirovanie"; ?>
                        </button>
                        <div class="collapse" id="productionSulf-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/sulfonation/productionSulf.php" class="nav-link text-dark"><?php echo"$app_names->sulfirovanie"; ?></a></li>
                                <li><a href="/Engels/sulfonation/statProductionSulf.php" class="nav-link text-dark"><?php echo"$app_names->statistic"; ?></a></li>
                                <li><a href="/Engels/sulfonation/redactProductionSulf.php" class="nav-link text-dark"><?php echo"$app_names->redact"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['sirye'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#sirye-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/materials.png' /><?php echo"$app_names->_sirye"; ?>
                        </button>
                        <div class="collapse" id="sirye-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/sirye/sirye.php" class="nav-link text-dark"><?php echo"$app_names->_sirye"; ?></a></li>
                                <li><a href="/Engels/sirye/redactSirye.php" class="nav-link text-dark"><?php echo"$app_names->redact"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['active_water'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#active_water-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/barrel.png' /><?php echo"$app_names->_active_water"; ?>
                        </button>
                        <div class="collapse" id="active_water-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/activeWater/active_water.php" class="nav-link text-dark"><?php echo"$app_names->_active_water"; ?></a></li>
                                <li><a href="/Engels/activeWater/redact_active_water.php" class="nav-link text-dark"><?php echo"$app_names->redact"; ?></a></li>
                                <li><a href="/Engels/activeWater/staticWater.php" class="nav-link text-dark"><?php echo"$app_names->statistic"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['safety'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#electricity-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/electricity.png' />Энергоресурсы
                        </button>
                        <div class="collapse" id="electricity-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/electricity/electricity.php" class="nav-link text-dark">Форма ввода</a></li>
                                <li><a href="/Engels/electricity/main.php" class="nav-link text-dark">Электроэнергия</a></li>
                                <li><a href="http://10.167.173.5/DRWeb/" class="nav-link text-dark">Счетчики</a></li>
                                <li><a href="/Engels/electricity/water_count.php" class="nav-link text-dark">Вода</a></li>
                                <li><a href="/Engels/electricity/settings.php" class="nav-link text-dark">Настройки</a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['palletizer'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#palletizer_quality-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/box.png' /><?php echo"$app_names->palletizer"; ?>
                        </button>
                        <div class="collapse" id="palletizer_quality-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/palletizer/palletizer_quality.php" class="nav-link text-dark"><?php echo"$app_names->quality_sheet"; ?></a></li>
                                <li><a href="" class="nav-link text-dark"><?php echo"$app_names->process_audit"; ?></a></li>
                                <li><a href="/Engels/palletizer/stat_palletizer.php" class="nav-link text-dark"><?php echo"$app_names->summary_sheet"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['innotech1'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#innotech1_quality-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->innotech1"; ?>
                        </button>
                        <div class="collapse" id="innotech1_quality-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/innotech1/innotech1_quality.php" class="nav-link text-dark"><?php echo"$app_names->quality_sheet"; ?></a></li>
                                <li><a href="/Engels/innotech1/process_audit_inn1.php" class="nav-link text-dark"><?php echo"$app_names->process_audit"; ?></a></li>
                                <li><a href="/Engels/innotech1/innotech1_CILT.php" class="nav-link text-dark"><?php echo"$app_names->cilt"; ?></a></li>
                                <li><a href="/Engels/innotech1/statInnotech1.php" class="nav-link text-dark"><?php echo"$app_names->summary_sheet"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['innotech2'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#innotech2_quality-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->innotech2"; ?>
                        </button>
                        <div class="collapse" id="innotech2_quality-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->quality_sheet"; ?></a></li>
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->summary_sheet"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['innotech3'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#innotech3_quality-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->innotech2"; ?>
                        </button>
                        <div class="collapse" id="innotech3_quality-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->quality_sheet"; ?></a></li>
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->summary_sheet"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['uva4'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#uva4_quality-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->uva4"; ?>
                        </button>
                        <div class="collapse" id="uva4_quality-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->quality_sheet"; ?></a></li>
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->summary_sheet"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['uva5'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#uva5_quality-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->uva5"; ?>
                        </button>
                        <div class="collapse" id="uva5_quality-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->quality_sheet"; ?></a></li>
                                <li><a href="#" class="nav-link text-dark"><?php echo"$app_names->summary_sheet"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['planing'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#planing-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->planing"; ?>
                        </button>
                        <div class="collapse" id="planing-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/planirovanie/add_format.php" class="nav-link text-dark"><?php echo"$app_names->add_format"; ?></a></li>
                                <li><a href="/Engels/planirovanie/planing.php" class="nav-link text-dark"><?php echo"$app_names->planing"; ?></a></li>
                                <li><a href="/Engels/planirovanie/timeline.php" class="nav-link text-dark"><?php echo"$app_names->calendar"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['index'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#calendar-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->calendar"; ?>
                        </button>
                        <div class="collapse" id="calendar-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/personalArea/new_calendar.php" class="nav-link text-dark">Календарь</a></li>
                                <?php
                                if($_SESSION['premirovanie'] == 1)
                                    {  echo"<li><a href='/Engels/personalArea/all.php' class='nav-link text-dark'>$app_names->all_users</a></li>";}
                                    else{}
                                ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['premirovanie'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#paids-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/conveyor.png' /><?php echo"$app_names->premirovanie"; ?>
                        </button>
                        <div class="collapse" id="paids-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/paids/static.php" class="nav-link text-dark"><?php echo"$app_names->statistic"; ?></a></li>
                                <li><a href="/Engels/paids/static_avtomat.php" class="nav-link text-dark">Статистика по автоматам</a></li>
                                <li><a href="/Engels/paids/redact.php" class="nav-link text-dark"><?php echo"$app_names->redact"; ?></a></li>
                                <li><a href="/Engels/paids/settings.php" class="nav-link text-dark"><?php echo"$app_names->settings"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if($_SESSION['support'] == 1):?>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#developer-collapse" aria-expanded="false">
                            <img class='iconsTitleSidebar' src='/Engels/icons/support.png' /><?php echo"$app_names->support"; ?>
                        </button>
                        <div class="collapse" id="developer-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="/Engels/support/support.php" class="nav-link text-dark"><?php echo"$app_names->visited_ip"; ?></a></li>
                                <li><a href="/Engels/support/users_visits.php" class="nav-link text-dark"><?php echo"$app_names->visited_users"; ?></a></li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <script src="/Engels/sidebars.js"></script>
    <hr>
    <div class="dropdown" style="margin: 0 auto; margin-bottom:10px;">
        <a class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="/Engels/icons/avatar.png" alt="mdo" width="32" height="32" class="rounded-circle"><small style="font-size: 14px; margin:2px; width:70px;"><?php echo "$_COOKIE[first_name]"; ?></small>
        </a>
        <ul class="dropdown-menu text-small shadow dropdown-menu-end">
            <?php if($_SESSION['access'] >= '99')
                {
                ?>
                <li><a class="dropdown-item" href="/Engels/profile/newProfile.php" ><?php echo"$app_names->new_profile"; ?></a></li>
                <li><a class="dropdown-item" href="/Engels/profile/settings.php" ><?php echo"$app_names->settings"; ?></a></li>
                <li><a class="dropdown-item" href="/Engels/profile/profile.php" ><?php echo"$app_names->profile"; ?></a></li>
                <?php
                } else { ?>
                    <li><a class="dropdown-item disabled" href="#" ><?php echo"$app_names->new_profile"; ?></a></li>
                    <li><a class="dropdown-item disabled" href="#" ><?php echo"$app_names->settings"; ?></a></li>
                    <li><a class="dropdown-item" href="/Engels/profile/profile.php" ><?php echo"$app_names->profile"; ?></a></li>
                <?php } ?>

                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/Engels/logOut.php"><?php echo"$app_names->logout"; ?></a></li>
        </ul>
    </div>
</div>
