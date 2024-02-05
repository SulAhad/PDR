<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['technology'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>  
    <body class="container-fluid">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <p style="font-size:30px; border-bottom: 1px solid #f00;">Технология</p>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table  id="myTable" class="table-hover table table-sm ">
                            <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>кол-во парам.не в лимитах</th>
                                    <th>композиция</th>
                                    <th>компаунд</th>
                                    <th>постдобавки</th>
                                    <th>фасовка</th>
                                    <th>сливная станция</th>
                                    <th>участок сырья</th>
                                    <th>Удельное потребление газа на башенный продукт</th>
                                    <th>Удельное потребление газа на готовый продукт</th>
                                    <th>Удельное потребление газа на башенный продукт</th>
                                    <th>Удельное потребление газа на готовый продукт</th>
                                    <th>Удельное потребление газа на башенный продукт</th>
                                    <th>Удельное потребление газа на готовый продукт</th>
                                    <th>Производительность башни</th>
                                    <th>Изменить</th>
                                    <th>Удалить</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $message = "SELECT * FROM Technology_KPI ORDER BY date DESC";
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo"<tr>";
                                                    echo"<td><input type='date' class='redactInput form-control' min='0' id='dateTechnology' value='$row[date]'    ></input></td>";
                                                    
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Params_limits_comment]' min='0' id='Params_limits' value='$row[Params_limits]'    ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Compositsia_comment]' min='0' id='Compositsia'value='$row[Compositsia]'     ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Compaund_comment]' min='0' id='Compaund'value='$row[Compaund]'        ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Postdobavki_comment]' min='0' id='Postdobavki'value='$row[Postdobavki]'   ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Fasovka_comment]' min='0' id='Fasovka'value='$row[Fasovka]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Slivnaya_comment]' min='0' id='Slivnaya'value='$row[Slivnaya]'    ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Uch_sirya_comment]' min='0' id='Uch_sirya'value='$row[Uch_sirya]'></input></td>";
                                                    
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Udeln_potr_gaza_teamA_comment]' min='0' id='Udeln_potr_gaza_teamA'value='$row[Udeln_potr_gaza_teamA]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Udeln_potr_gaza_gotoviy_prod_teamA_comment]' min='0' id='Udeln_potr_gaza_gotoviy_prod_teamA'value='$row[Udeln_potr_gaza_gotoviy_prod_teamA]'></input></td>";
                                                     
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Udeln_potr_gaza_teamB_comment]' min='0' readonly  id='Udeln_potr_gaza_teamB'value='$row[Udeln_potr_gaza_teamB]'    ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Udeln_potr_gaza_gotoviy_prod_teamB_comment]' min='0' readonly  id='Udeln_potr_gaza_gotoviy_prod_teamB'value='$row[Udeln_potr_gaza_gotoviy_prod_teamB]'></input></td>";
                                                     
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Udeln_potr_gaza_total_comment]' min='0' id='Udeln_potr_gaza_total'value='$row[Udeln_potr_gaza_total]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Udeln_potr_gaza_gotoviy_prod_total_comment]' min='0' id='Udeln_potr_gaza_gotoviy_prod_total' value='$row[Udeln_potr_gaza_gotoviy_prod_total]' ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[proizvidit_bashni]' min='0' id='proizvidit_bashni' value='$row[proizvidit_bashni]' ></input></td>";
                                                    echo"<td style='width:5%;'><button type='button' class='updateTechnology btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                    echo"<td style='width:5%;'><button type='button' class='deleteTechnology btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                echo"</tr>";
                                            }
                                        ?>
                                    </tbody>
                        </table>
                    </div>
                    <script>
                                    $(document).ready
                                        (function() 
                                            {$(".updateTechnology").click
                                                (function()
                                            		{
                                            		    var idTechnology = $(this).val();
                                            		    var dateTechnology = $(this).closest("tr").find("#dateTechnology").val();
                                            		    var proizvidit_bashni = $(this).closest("tr").find("#proizvidit_bashni").val();
                                            		    
                                                        var Params_limits = $(this).closest("tr").find("#Params_limits").val();
                                                        var Compositsia = $(this).closest("tr").find("#Compositsia").val();
                                                        var Compaund = $(this).closest("tr").find("#Compaund").val();
                                                        var Postdobavki = $(this).closest("tr").find("#Postdobavki").val();
                                                        var Fasovka = $(this).closest("tr").find("#Fasovka").val();
                                                        var Slivnaya = $(this).closest("tr").find("#Slivnaya").val();
                                                        var Uch_sirya = $(this).closest("tr").find("#Uch_sirya").val();
                                                        
                                                        var Udeln_potr_gaza_teamA = $(this).closest("tr").find("#Udeln_potr_gaza_teamA").val();
                                                        var Udeln_potr_gaza_gotoviy_prod_teamA = $(this).closest("tr").find("#Udeln_potr_gaza_gotoviy_prod_teamA").val();
                                                        
                                                        var Udeln_potr_gaza_teamB = $(this).closest("tr").find("#Udeln_potr_gaza_teamB").val();
                                                        var Udeln_potr_gaza_gotoviy_prod_teamB = $(this).closest("tr").find("#Udeln_potr_gaza_gotoviy_prod_teamB").val();
                                                        
                                                        var Udeln_potr_gaza_total = $(this).closest("tr").find("#Udeln_potr_gaza_total").val();
                                                        var Udeln_potr_gaza_gotoviy_prod_total = $(this).closest("tr").find("#Udeln_potr_gaza_gotoviy_prod_total").val();
                                                        
                                            			$.ajax(
                                                            {type: 'POST',
                                                                dataType: 'html',
                                                                url: '/Engels/technology/updateTechnology.php',
                                                                
                                                                data: ({dateTechnology:dateTechnology, 
                                                                
                                                                        Params_limits:Params_limits,
                                                                        Compositsia:Compositsia,
                                                                        Compaund:Compaund,
                                                                        Postdobavki:Postdobavki,
                                                                        Fasovka:Fasovka,
                                                                        Slivnaya:Slivnaya,
                                                                        Uch_sirya:Uch_sirya,
                                                                        
                                                                        Udeln_potr_gaza_teamA:Udeln_potr_gaza_teamA,
                                                                        Udeln_potr_gaza_gotoviy_prod_teamA:Udeln_potr_gaza_gotoviy_prod_teamA,
                                                                        
                                                                        Udeln_potr_gaza_teamB:Udeln_potr_gaza_teamB,
                                                                        Udeln_potr_gaza_gotoviy_prod_teamB:Udeln_potr_gaza_gotoviy_prod_teamB,
                                                                        
                                                                        Udeln_potr_gaza_total:Udeln_potr_gaza_total,
                                                                        Udeln_potr_gaza_gotoviy_prod_total:Udeln_potr_gaza_gotoviy_prod_total,
                                                                        proizvidit_bashni:proizvidit_bashni,
                                                                        idTechnology:idTechnology}),
                                                                success: function(response) 
                                                                {
                                                                    $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                                                    var data = JSON.parse(response);
                                                                    
                                                                }});});});
                                    </script>
                    <script>
                $(document).ready
                    (function() 
                        {
                            $(".deleteTechnology").click
                            (
                        		function()
                        		{
                        		    var deleteUser = this.value;
                        		    const { target } = event;
                        			$.ajax(
                                        {
                                            type: 'POST',
                                            dataType: 'html',
                                            url: '/Engels/technology/deleteRowTechnology.php',
                                            data: ({idUser:deleteUser}),
                                            success: function(response) 
                                            {
                                                var data = JSON.parse(response);
                                                target.parentNode.parentNode.remove();
                                                $('.alert-success_Delete').fadeIn(1000).delay(3000).fadeOut(1000);
                                            }
                                        });
                        		}
                    	    );
                        }
                    );
                </script>
                </fieldset>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
