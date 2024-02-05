<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['inspection'] === 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['real_name'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php'); ?>
<style>
    .col-md-3 {
        margin-top:60px;
  position: fixed;
  top: 0;
}
.col-md-9 {
  margin-left: 25%;
}
</style>
<script> $( function() { $( document ).tooltip(); });</script>
</head>
<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
    <body>
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <?php require('addEvent.php') ?>
                </div>
                <div class="col-md-9">
                    <?php require('all_event_user.php') ?>
                </div>
            </div>
        </div>
    </body>
    <?php require('../Engels/footer/footer.php') ?>
</html>