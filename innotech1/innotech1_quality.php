<?php require($_SERVER['DOCUMENT_ROOT'].'/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /bridge.php');}
if($_SESSION['innotech1'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/head.php');?></head>
    <body class="container">
        <style>
            .btn_quality_innotech1{
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
        <?php require('../innotech1/form_body_quality.php') ?>
        <?php
        if(isset($_POST['inno2'])) {
            echo"<p>Иннотех 2</p>";
        }
        ?>
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
                            <?php require('../innotech1/load_innotech1_quality.php') ?>
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
            url: "../innotech1/load_innotech1_quality.php",
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
            url: '../innotech1/save_inotech1_quality_notes.php',
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
            url: '../innotech1/save_innotech1_quality.php',
            method: 'POST',
            data: { btnValue: btnValue, user: user },
            success: function(response) {
                $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                updateTable();
            },
            error: function(xhr, status, error) {
                
            }
          });
    })
    </script>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/footer/footer.php'); ?>
</html>