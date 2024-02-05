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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    </head>
    <body  class="container-fluid">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <p style="font-size:22px; border-bottom: 1px solid #f00;">редактирование - <?php echo"$app_names->_production"; ?></p>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table id="myTable"class="table-hover table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th><p>Смена</p></th>
                                    <th><p>Дата</p></th>
                                    <th style='writing-mode:vertical-rl;'><p>план(выпуск)</p></th>
                                    <th style='writing-mode:vertical-rl;'><p>факт(выпуск)</p></th>
                                    <th style='writing-mode:vertical-rl;'><p>Отклонение</p></th>
                                    <th style='writing-mode:vertical-rl;'><p>Общее OEE</p></th>
                                    <th style='writing-mode:vertical-rl;'><p>OEE team</p></th>
                                    <th><p><?php echo"$app_names->innotech1"; ?></p></th>
                                    <th><p><?php echo"$app_names->innotech2"; ?></p></th>
                                    <th><p><?php echo"$app_names->innotech3"; ?></p></th>
                                    <th><p><?php echo"$app_names->uva4"; ?></p></th>
                                    <th><p><?php echo"$app_names->uva5"; ?></p></th>
                                    <th><p><?php echo"$app_names->acma"; ?></p></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody onload="myFunction()" class="animate-bottom">
                                <?php
                                $message = "SELECT * FROM productionsms ORDER BY datetime DESC";
                                $link->set_charset("utf8");
                                $result =  mysqli_query( $link,  $message);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo"<tr class='border-2'>";
                                        echo "<td rowspan='2'><input style='width:70px;' id='team' type='text' value='$row[team]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td rowspan='2'><input style='width:100px;' id='datetime' type='date' value='$row[datetime]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td rowspan='2'><input style='width:80px;' id='plan_team' type='number' value='$row[plan_team]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td rowspan='2'><input style='width:80px;' id='fact_team' type='number' value='$row[fact_team]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td rowspan='2'><input style='width:70px;' id='deviation' type='number' value='$row[deviation]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td rowspan='2'><input style='width:70px;' id='oee_total' type='number' value='$row[oee_total]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td rowspan='2'><input style='width:70px;' id='OEE_team' type='number' value='$row[OEE_team]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td><input id='innotech1' type='number' value='$row[innotech1]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td><input id='innotech2' type='number' value='$row[innotech2]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td><input id='innotech3' type='number' value='$row[innotech3]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td><input id='uva4' type='number' value='$row[uva4]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td><input id='uva5' type='number' value='$row[uva5]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td><input id='acma' type='number' value='$row[acma]' class='form-control form-control-sm border-0' /></td>";
                                        echo "<td rowspan='2' style='height:20px;'><button style='height:100%;' type='button' class='updateProduction btn btn-outline btn-sm btn-light' title='Изменить' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                                        echo "<td rowspan='2' style='height:20px;'><button style='height:100%;' type='button' class='deleteProduction btn btn-outline btn-sm btn-light' title='Удалить' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";
                                    echo"</tr>";
                                    echo"<tr>";
                                        echo "<td><textarea id='innotech1_comment' type='text' value='$row[innotech1_comment]' class='form-control form-control-sm border-0' >$row[innotech1_comment]</textarea></td>";
                                        echo "<td><textarea id='innotech2_comment' type='text' value='$row[innotech2_comment]' class='form-control form-control-sm border-0' >$row[innotech2_comment]</textarea></td>";
                                        echo "<td><textarea id='innotech3_comment' type='text' value='$row[innotech3_comment]' class='form-control form-control-sm border-0' >$row[innotech3_comment]</textarea></td>";
                                        echo "<td><textarea id='uva4_comment' type='text' value='$row[uva4_comment]' class='form-control form-control-sm border-0' >$row[uva4_comment]</textarea></td>";
                                        echo "<td><textarea id='uva5_comment' type='text' value='$row[uva5_comment]' class='form-control form-control-sm border-0' >$row[uva5_comment]</textarea></td>";
                                        echo "<td><textarea id='acma_comment' type='text' value='$row[acma_comment]' class='form-control form-control-sm border-0' >$row[acma_comment]</textarea></td>";
                                        echo"</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <script>
                        // Добавляем обработчик события изменения значения в поле plan_team
                        $(document).on('input', '#plan_team', function() {
                        var planTeamInput = parseFloat($(this).closest("tr").find("#plan_team").val());
                        var factTeamInput = parseFloat($(this).closest("tr").find("#fact_team").val());
                        var deviationInput = (factTeamInput - planTeamInput).toFixed(3);
                        $(this).closest("tr").find("#deviation").val(deviationInput);
                        });

                        // Добавляем обработчик события изменения значения в поле fact_team
                        $(document).on('input', '#fact_team', function() {
                        var planTeamInput = parseFloat($(this).closest("tr").find("#plan_team").val());
                        var factTeamInput = parseFloat($(this).closest("tr").find("#fact_team").val());
                        var deviationInput = (factTeamInput - planTeamInput).toFixed(3);
                        $(this).closest("tr").find("#deviation").val(deviationInput);
                        });
                    </script>
                    <script>
                        $("textarea").each(function () {
                            this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
                            }).on("input", function () {
                            this.style.height = 0;
                            this.style.height = (this.scrollHeight) + "px";
                            });
                    </script>
                </fieldset>
                <script>
$(document).ready
    (function()
        {$(".updateProduction").click
            (function()
            {
                var user = "<?php echo $a; ?>";
                var idProduction = $(this).val();
                var datetime = $(this).closest("tr").find("#datetime").val();
                    var team = $(this).closest("tr").find("#team").val();
                    var plan_team = $(this).closest("tr").find("#plan_team").val();
                    var fact_team = $(this).closest("tr").find("#fact_team").val();
                    var deviation = $(this).closest("tr").find("#deviation").val();
                    var innotech1 = $(this).closest("tr").find("#innotech1").val();
                    var innotech2 = $(this).closest("tr").find("#innotech2").val();
                    var innotech3 = $(this).closest("tr").find("#innotech3").val();
                    var uva4 = $(this).closest("tr").find("#uva4").val();
                    var uva5 = $(this).closest("tr").find("#uva5").val();
                    var acma = $(this).closest("tr").find("#acma").val();
                    var OEE_team = $(this).closest("tr").find("#OEE_team").val();
                    var innotech1_comment = $(this).closest("tr").find("#innotech1_comment").val();
                    var innotech2_comment = $(this).closest("tr").find("#innotech2_comment").val();
                    var innotech3_comment = $(this).closest("tr").find("#innotech3_comment").val();
                    var uva4_comment = $(this).closest("tr").find("#uva4_comment").val();
                    var uva5_comment = $(this).closest("tr").find("#uva5_comment").val();
                    var acma_comment = $(this).closest("tr").find("#acma_comment").val();
              $.ajax(
                        {type: 'POST',
                            dataType: 'html',
                            url: '/Engels/production/updateProduction.php',
                            data: ({
                                user:user,
                              datetime:datetime,
                              team:team,
                              plan_team:plan_team,
                              fact_team:fact_team,
                              deviation:deviation,
                              innotech1:innotech1,
                              innotech2:innotech2,
                              innotech3:innotech3,
                              uva4:uva4,
                              uva5:uva5,
                              acma:acma,
                              OEE_team:OEE_team,
                              innotech1_comment:innotech1_comment,
                              innotech2_comment:innotech2_comment,
                              innotech3_comment:innotech3_comment,
                              uva4_comment:uva4_comment,
                              uva5_comment:uva5_comment,
                              acma_comment:acma_comment,
                              idProduction:idProduction}),
                            success: function(response)
                            {
                                $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                var data = JSON.parse(response);
                            },

                            error: function(xhr, status, error)
                            {
                            alert("Error: " + error);
                            }
                              });});});
</script>
<script>
  $(document).ready(function() {
    $(".deleteProduction").click(function() {
      var deleteUser = $(this).val();
      var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
      $.ajax({
        type: 'POST',
        dataType: 'html',
        url: '/Engels/production/deleteRowProduction.php',
        data: {idUser: deleteUser},
        success: function(response) {
          var data = JSON.parse(response);
          row.remove(); // удаляем строку таблицы
          $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
        }
      });
    });
  });
</script>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
        <script>
        var myVar;
        function myFunction()
        {
            myVar = setTimeout(showPage, 3000);
        }
        function showPage()
        {
          document.getElementById("myDiv").style.display = "block";
        }
    </script>
    </body>
</html>
