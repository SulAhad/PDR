<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['index'] === 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['real_name'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php'); ?>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="style_calendar_day.css" />
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
        <script>
            $("textarea").each(function () 
                {
                    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                    }).on("input", function () 
                    {
                    this.style.height = 0;
                    this.style.height = (this.scrollHeight) + "px";
                });
        </script>
        <script>
  $( function() {
    $( "#sortable" ).sortable();
  } );
  </script>
    </head>
    <style>
            body {
            -webkit-user-select: none; /* Запрет выделения для Chrome, Safari, Opera */
            -moz-user-select: none; /* Запрет выделения для Firefox */
            -ms-user-select: none; /* Запрет выделения для Internet Explorer/Edge */
            user-select: none; /* Общий запрет выделения */
            }
        </style>
    <body style="background:GhostWhite;">
    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
        <div class="checkbox-container bg-light">
            <div class="btn-group" role="group" id="btnGroup1" aria-label="Basic radio toggle button group" style="border: 1px solid lightgray; border-radius:7px; margin:0 0 0 20px;">
            <a href="?week=prev&offset=<?= $weekOffset ?>" class="btn" >&lt;</a>
<input type="text" id="text_calendar_date" readonly class="form-control form-control-sm border-0 bg-white" value="<?php echo $startDate . ' - ' . $endDate; ?>" style="text-align:center;"></input>
<a href="?week=next&offset=<?= $weekOffset ?>" class="btn" >&gt;</a>
            </div>
            <div class="btn-group rounded" role="group" id="btnGroup2" aria-label="Basic radio toggle button group" style="margin-left: auto; margin-right: 20px; border: 1px solid lightgray;">
                <ul class="nav nav-tabs rounded" role="tablist">
                    <li class="nav-item rounded" role="presentation">
                        <input type="radio" class="btn-check " name="tabToggle" id="weekTab" autocomplete="off">
                        <a class="btn btn-sm active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">неделя</a>
                    </li>
                    <li class="nav-item rounded" role="presentation">
                        <input type="radio" class="btn-check" name="tabToggle" id="dayTab" autocomplete="off">
                        <a class="btn btn-sm" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">список</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <a href="https://caldav.yandex.ru/calendars/akhad.suleymanov%40lab-industries.ru/events-21883655/">Я Календарь</a> -->
        <div class="tab-content pt-1" id="tab-content">
            <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0"><?php require('calendar_table.php') ?></div>
            <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1"><?php require('calendar_day.php') ?></div>
        </div>
        <?php require('modal_from_update_row.php'); ?>
        <div style="position: fixed; right: 10px; bottom: 10px;">
            <a type="button" onclick="show_modal_add()" id='add_modal' class="modalBtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <img src='/Engels/icons/addReport.png' alt='Добавить' title='Добавить' />
            </a>
        </div>
        <script>
            function show_modal_add() 
                {
                    document.getElementById('modal_add_banner').style.display = 'block';
                    document.getElementById('input_name_event').focus();
                    
                }
            function previousWeek() 
                {
                    window.location.href = "?week=prev&offset=" + weekOffset;
                }
            function nextWeek() 
                {
                    window.location.href = "?week=prev&offset=" + weekOffset;
                }
            function hide_modal_add() 
                {
                    document.getElementById('modal_add_banner').style.display = 'none';
                }
        </script>
        <?php require('add_modal.php'); ?>
        <?php require('script.php'); ?>
        <?php require('../Engels/footer/footer.php') ?>
        

    </body>
    
</html>