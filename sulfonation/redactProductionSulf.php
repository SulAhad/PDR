<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['sulfirovanie'] == 0){
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
        <div class="row card shadow-sm blur">
            <div class="col-md-12">
                <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <p style="font-size:22px; border-bottom: 1px solid #f00;">редактирование - Сульфирование</p>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table id="myTable"class="table-hover table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <td>План</td>
                                        <td>Факт</td>
                                        <td>Отгрузка машин, план</td>
                                        <td>Отгрузка машин, факт</td>
                                        <td class="col-5">Комментарий</td>
                                        <td>Изменить</td>
                                        <td>Удалить</td>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $message = "SELECT * FROM sulfirovanie ORDER BY date DESC";
                                    $link->set_charset("utf8");
                                    $result = mysqli_query($link, $message);
                                    while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                        echo "<tr>";
                                            echo "<td><input type='date' class='fontTr redactInput form-control' id='date' value='$row[date]'></input></td>";
                                            echo "<td><input type='number' class='fontTr redactInput form-control' min='0' id='plan' value='$row[plan]'></input></td>";
                                            echo "<td><input type='number' class='fontTr redactInput form-control' min='0' id='fact' value='$row[fact]'></input></td>";
                                            echo "<td><input type='number' class='fontTr redactInput form-control' min='0' id='plan_output_cars' value='$row[plan_output_cars]'></input></td>";
                                            echo "<td><input type='number' class='fontTr redactInput form-control' min='0' id='fact_output_cars' value='$row[fact_output_cars]'></input></td>";
                                            echo "<td><input type='text' class='fontTr redactInput form-control' id='comment' value='$row[comment]'></input></td>";
                                            echo "<td><button type='button' class='update btn btn-outline btn-sm btn-light' title='Изменить' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:16px;'></button></td>";
                                            echo "<td><button type='button' class='delete btn btn-outline btn-sm btn-light' title='Удалить' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:16px;'></button></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
                <script>
                $(document).ready
                    (function()
                        {$(".update").click
                            (function()
                                {
                                    var id = $(this).val();
                                    var date = $(this).closest("tr").find("#date").val();
                                    var plan = $(this).closest("tr").find("#plan").val();
                                    var fact = $(this).closest("tr").find("#fact").val();
                                    var plan_output_cars = $(this).closest("tr").find("#plan_output_cars").val();
                                    var fact_output_cars = $(this).closest("tr").find("#fact_output_cars").val();
                                    var comment = $(this).closest("tr").find("#comment").val();
                                    $.ajax(
                                        {type: 'POST',
                                            dataType: 'html',
                                            url: '/Engels/sulfonation/update.php',
                                            data: ({date:date,
                                                plan:plan,
                                                fact:fact,
                                                plan_output_cars:plan_output_cars,
                                                fact_output_cars:fact_output_cars,
                                                comment:comment,
                                                id:id}),
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
                    $(".delete").click(function() {
                        var idToDelete = $(this).val();
                        var row = $(this).closest("tr"); 
                        if (confirm("Вы действительно хотите удалить?")) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: '/Engels/sulfonation/delete.php',
                                data: {id: idToDelete},
                                success: function(response) {
                                    row.remove(); 
                                    $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                                }
                            });
                        };
                    });
                });
                </script>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
