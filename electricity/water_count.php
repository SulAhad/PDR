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
    <style>
       .fontTr
       {
           font-size:12px;
       }
       p{
            margin: 1px;
            margin: 1em;
            font-size:12px;
        }
   </style>
    <body class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div data-bs-interval="9999999" class="carousel-item active">
                    <?php require('items_water_count/file_1.php') ?>
                </div>
                <div data-bs-interval="9999999" class="carousel-item">
                    <?php require('items_water_count/file_2.php') ?>
                </div>
                <div data-bs-interval="9999999" class="carousel-item">
                    <?php require('items_water_count/file_3.php') ?>
                </div>
                <div data-bs-interval="9999999" class="carousel-item">
                    <?php require('items_water_count/file_4.php') ?>
                </div>
                <div data-bs-interval="9999999" class="carousel-item">
                    <?php require('items_water_count/file_5.php') ?>
                </div>
                <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-prev" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a style="width:25px; height:25px; background:gray; position:absolute; top:50%;" class="carousel-control-next" role="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </body>
</html>
