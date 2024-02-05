<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['premirovanie'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?>
</head>
<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
    <body class="container-fluid">
    
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Иннотех-1</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Иннотех-2</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-2" data-bs-toggle="tab" href="#simple-tabpanel-2" role="tab" aria-controls="simple-tabpanel-2" aria-selected="false">Иннотех-3</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-3" data-bs-toggle="tab" href="#simple-tabpanel-3" role="tab" aria-controls="simple-tabpanel-3" aria-selected="false">UVA-4</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-4" data-bs-toggle="tab" href="#simple-tabpanel-4" role="tab" aria-controls="simple-tabpanel-4" aria-selected="false">UVA-5</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-5" data-bs-toggle="tab" href="#simple-tabpanel-5" role="tab" aria-controls="simple-tabpanel-5" aria-selected="false">АКМА</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-6" data-bs-toggle="tab" href="#simple-tabpanel-6" role="tab" aria-controls="simple-tabpanel-6" aria-selected="false">Shrink</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-7" data-bs-toggle="tab" href="#simple-tabpanel-7" role="tab" aria-controls="simple-tabpanel-7" aria-selected="false">Паллетайзер</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-8" data-bs-toggle="tab" href="#simple-tabpanel-8" role="tab" aria-controls="simple-tabpanel-8" aria-selected="false">Бункеровщик</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-9" data-bs-toggle="tab" href="#simple-tabpanel-9" role="tab" aria-controls="simple-tabpanel-9" aria-selected="false">Сушка</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-10" data-bs-toggle="tab" href="#simple-tabpanel-10" role="tab" aria-controls="simple-tabpanel-10" aria-selected="false">Башня</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-11" data-bs-toggle="tab" href="#simple-tabpanel-11" role="tab" aria-controls="simple-tabpanel-11" aria-selected="false">Газогенерация</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-12" data-bs-toggle="tab" href="#simple-tabpanel-12" role="tab" aria-controls="simple-tabpanel-12" aria-selected="false">Приготовление</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="simple-tab-13" data-bs-toggle="tab" href="#simple-tabpanel-13" role="tab" aria-controls="simple-tabpanel-13" aria-selected="false">Постдобавки</a>
        </li>
    </ul>
    <div class="tab-content pt-1" id="tab-content">
        <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0"><?php require('tab_innotech1_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1"><?php require('tab_innotech2_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-2" role="tabpanel" aria-labelledby="simple-tab-2"><?php require('tab_innotech3_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-3" role="tabpanel" aria-labelledby="simple-tab-3"><?php require('tab_uva4_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-4" role="tabpanel" aria-labelledby="simple-tab-4"><?php require('tab_uva5_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-5" role="tabpanel" aria-labelledby="simple-tab-5"><?php require('tab_acma_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-6" role="tabpanel" aria-labelledby="simple-tab-6"><?php require('tab_shrink_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-7" role="tabpanel" aria-labelledby="simple-tab-7"><?php require('tab_pallet_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-8" role="tabpanel" aria-labelledby="simple-tab-8"><?php require('tab_bunker_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-9" role="tabpanel" aria-labelledby="simple-tab-9"><?php require('tab_sushka_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-10" role="tabpanel" aria-labelledby="simple-tab-10"><?php require('tab_bashnya_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-11" role="tabpanel" aria-labelledby="simple-tab-11"><?php require('tab_gazgen_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-12" role="tabpanel" aria-labelledby="simple-tab-12"><?php require('tab_prigitovlenie_content.php') ?></div>
        <div class="tab-pane" id="simple-tabpanel-13" role="tabpanel" aria-labelledby="simple-tab-13"><?php require('tab_postdobavki_content.php') ?></div>
    </div>
       <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>