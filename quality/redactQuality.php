<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['quality'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru"> 
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container-fluid">
        
        <div class="row bg-light card shadow-sm">
            
            <div class="col-md-12">
                <p style="font-size:22px; border-bottom: 1px solid #f00;">Качество</p>
                <fieldset class="form-group border card shadow-sm">
                    
                    <div class="table-responsive">
                    <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                        <table id="myTable" class="table-hover table table-sm">
                            <thead>
                                <tr>
                                    <th rowspan="2" style='vertical-align: middle;' class="mx-auto">Дата</th>
                                    <th rowspan="2" style='vertical-align: middle;' class="mx-auto">Брак,t.</th>
                                    <th colspan="4" style='vertical-align: middle;' class="mx-auto">СМС</th>
                                    <th colspan="4" style='vertical-align: middle;' class="mx-auto">Сульфирование</th>
                                    <th rowspan="2" style="writing-mode:vertical-rl">Изменить</th>
                                    <th rowspan="2" style="writing-mode:vertical-rl">Удалить</th>
                                </tr>
                                <tr>
                                    <th>Кол-во замечаний по хим.составу</th>
                                    <th>Кол-во замечаний по упаковке</th>
                                    <th>Кол-во претензий</th>
                                    <th>Забракованные материалы</th>
                                    <th>Кол-во замечаний по хим.составу</th>
                                    <th>Кол-во замечаний по упаковке</th>
                                    <th>Кол-во претензий</th>
                                    <th>Забракованные материалы</th>
                                </tr>
                            </thead>
                            <tbody onload="myFunction()" class="animate-bottom">
                                <?php
                                    $message = "SELECT * FROM Quality_KPI ORDER BY date DESC";
                                    $link->set_charset("utf8");
                                    $result =  mysqli_query( $link,  $message);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $date = $row['date'];
                                        $readonly = '';
                                        if (strtotime($date) < strtotime('-4 days')) 
                                        {$readonly = 'readonly';}
                                        echo"<tr>";
                                            $minDate = date('Y-m-d', strtotime('-3 days')); // вычисляем минимальную дату
                                            if ($readonly == '') 
                                            {
                                                echo"<tr style='border-top: 3px solid lightGray;'>";
                                                    echo"<td rowspan='2' style='vertical-align: middle;'><input min='0' class='form-control'  id='dateTime'  value='$row[date]' type='date'></input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='BrakQuality'              type='number' value='$row[BrakQuality]'>               </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Kol_zam_him_sostav_teamA' type='number' value='$row[Kol_zam_him_sostav_teamA]'>  </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Kol_zam_upakovka_teamA'   type='number' value='$row[Kol_zam_upakovka_teamA]'>    </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Kol_pretenziy_teamA'      type='number' value='$row[Kol_pretenziy_teamA]'>       </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Zabrakov_mat_teamA'       type='number' value='$row[Zabrakov_mat_teamA]'>        </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Kol_zam_him_sostav_Sulf'  type='number' value='$row[Kol_zam_him_sostav_Sulf]'>   </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Kol_zam_upakovka_Sulf'    type='number' value='$row[Kol_zam_upakovka_Sulf]'>     </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Kol_pretenziy_Sulf'       type='number' value='$row[Kol_pretenziy_Sulf]'>        </input></td>";
                                                    echo"<td ><input min='0' class='form-control redactInput' id='Zabrakov_mat_Sulf'        type='number' value='$row[Zabrakov_mat_Sulf]'>         </input></td>";
                                                    echo "<td rowspan='2' style='vertical-align: middle;'><button type='button' class='updateQuality btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/change.jpg' style='height:13px;'></button></td>";
                                                    echo "<td rowspan='2' style='vertical-align: middle;'><button type='button' class='deleteQuality btn btn-outline btn-sm btn-light' value='$row[id]'><img src='/Engels/icons/trash.png' style='height:13px;'></button></td>";
                                                echo"</tr>";
                                                echo"<tr>";
                                                    echo"<td class='commentQuality'>$row[BrakQuality_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Kol_zam_him_sostav_teamA_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Kol_zam_upakovka_teamA_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Kol_pretenziy_teamA_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Zabrakov_mat_teamA_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Kol_zam_him_sostav_Sulf_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Kol_zam_upakovka_Sulf_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Kol_pretenziy_Sulf_comment]</td>";
                                                    echo"<td class='commentQuality'>$row[Zabrakov_mat_Sulf_comment]</td>";
                                                echo"</tr>";
                                            }
                                            else{
                                                echo"<tr style='border-top: 3px solid lightGray;'>";
                                                    echo"<td><p> ". date('d.m.Y', strtotime($date)) ."</p></td>";
                                                    echo"<td><p>$row[BrakQuality]               </p></td>";
                                                    echo"<td><p>$row[Kol_zam_him_sostav_teamA]  </p></td>";
                                                    echo"<td><p>$row[Kol_zam_upakovka_teamA]    </p></td>";
                                                    echo"<td><p>$row[Kol_pretenziy_teamA]       </p></td>";
                                                    echo"<td><p>$row[Zabrakov_mat_teamA]        </p></td>";
                                                    echo"<td><p>$row[Kol_zam_him_sostav_Sulf]   </p></td>";
                                                    echo"<td><p>$row[Kol_zam_upakovka_Sulf]     </p></td>";
                                                    echo"<td><p>$row[Kol_pretenziy_Sulf]        </p></td>";
                                                    echo"<td><p>$row[Zabrakov_mat_Sulf]         </p></td>";
                                                    
                                                echo"</tr>";
                                                echo"<tr>";
                                                    echo"<td class='commentQuality'><p></p></td>";
                                                    echo"<td class='commentQuality'><p>$row[BrakQuality_comment]             </p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Kol_zam_him_sostav_teamA_comment]</p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Kol_zam_upakovka_teamA_comment]  </p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Kol_pretenziy_teamA_comment]     </p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Zabrakov_mat_teamA_comment]      </p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Kol_zam_him_sostav_Sulf_comment] </p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Kol_zam_upakovka_Sulf_comment]   </p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Kol_pretenziy_Sulf_comment]      </p></td>";
                                                    echo"<td class='commentQuality'><p>$row[Zabrakov_mat_Sulf_comment]       </p></td>";
                                                echo"</tr>";
                                            }
                                    }
                                ?>
                            </tbody>
                            <script>
                            function validateInput(input) 
                            {
                              var value = input.value;
                              var regex = /^[0-9.]+$/; // только цифры и точка
                              if (!regex.test(value)) {
                                input.value = input.value.replace(/[^0-9.]/g, ''); // удаляем все символы кроме цифр и точки
                                input.style.backgroundColor = 'lightcoral'; // подсвечиваем красным
                                $(input).tooltip({ // инициализируем tooltip
                                  show: { effect: "fade", duration: 200 },
                                  hide: { effect: "fade", duration: 200 }
                                }).tooltip("open"); // открываем tooltip
                              } else {
                                var dotCount = (value.match(/\./g) || []).length; // считаем количество точек
                                if (dotCount > 1) {
                                  input.value = input.value.replace(/\./g, ''); // удаляем все точки кроме первой
                                  input.style.backgroundColor = 'red'; // подсвечиваем красным
                                  $(input).tooltip({ // инициализируем tooltip
                                    show: { effect: "fade", duration: 200 },
                                    hide: { effect: "fade", duration: 200 }
                                  }).tooltip("open"); // открываем tooltip
                                } else {
                                  input.style.backgroundColor = ''; // сбрасываем цвет
                                  $(input).tooltip("destroy"); // удаляем tooltip
                                }
                              }
                            }
                            </script>
                            <script>
                                    $(document).ready
                                        (function() 
                                            {$(".updateQuality").click
                                                (function()
                                            		{
                                            		    var idQuality = $(this).val();
                                                        var dateTime = $(this).closest("tr").find("#dateTime").val();
                                                        var BrakQuality = $(this).closest("tr").find("#BrakQuality").val();
                                                        var Kol_zam_him_sostav_teamA = $(this).closest("tr").find("#Kol_zam_him_sostav_teamA").val();
                                                        var Kol_zam_upakovka_teamA = $(this).closest("tr").find("#Kol_zam_upakovka_teamA").val();
                                                        var Kol_pretenziy_teamA = $(this).closest("tr").find("#Kol_pretenziy_teamA").val();
                                                        var Zabrakov_mat_teamA = $(this).closest("tr").find("#Zabrakov_mat_teamA").val();
                                                        var Kol_zam_him_sostav_teamB = $(this).closest("tr").find("#Kol_zam_him_sostav_teamB").val();
                                                        var Kol_zam_upakovka_teamB = $(this).closest("tr").find("#Kol_zam_upakovka_teamB").val();
                                                        var Kol_pretenziy_teamB = $(this).closest("tr").find("#Kol_pretenziy_teamB").val();
                                                        var Zabrakov_mat_teamB = $(this).closest("tr").find("#Zabrakov_mat_teamB").val();
                                                        var Kol_zam_him_sostav_Sulf = $(this).closest("tr").find("#Kol_zam_him_sostav_Sulf").val();
                                                        var Kol_zam_upakovka_Sulf = $(this).closest("tr").find("#Kol_zam_upakovka_Sulf").val();
                                                        var Kol_pretenziy_Sulf = $(this).closest("tr").find("#Kol_pretenziy_Sulf").val();
                                                        var Zabrakov_mat_Sulf = $(this).closest("tr").find("#Zabrakov_mat_Sulf").val();
                                            			$.ajax(
                                                            {type: 'POST',
                                                                dataType: 'html',
                                                                url: '/Engels/quality/updateQuality.php',
                                                                data: ({dateTime:dateTime, BrakQuality:BrakQuality,
                                                                        Kol_zam_him_sostav_teamA:Kol_zam_him_sostav_teamA,
                                                                        Kol_zam_upakovka_teamA:Kol_zam_upakovka_teamA,
                                                                        Kol_pretenziy_teamA:Kol_pretenziy_teamA,
                                                                        Zabrakov_mat_teamA:Zabrakov_mat_teamA,
                                                                        Kol_zam_him_sostav_teamB:Kol_zam_him_sostav_teamB,
                                                                        Kol_zam_upakovka_teamB:Kol_zam_upakovka_teamB,
                                                                        Kol_pretenziy_teamB:Kol_pretenziy_teamB,
                                                                        Zabrakov_mat_teamB:Zabrakov_mat_teamB,
                                                                        Kol_zam_him_sostav_Sulf:Kol_zam_him_sostav_Sulf,
                                                                        Kol_zam_upakovka_Sulf:Kol_zam_upakovka_Sulf,
                                                                        Kol_pretenziy_Sulf:Kol_pretenziy_Sulf,
                                                                        Zabrakov_mat_Sulf:Zabrakov_mat_Sulf,
                                                                        idQuality:idQuality}),
                                                                success: function(response) 
                                                                { 
                                                                    alert(response);
                                                                    $('.alert-success_Update').fadeIn(1000).delay(3000).fadeOut(1000);
                                                                    var data = JSON.parse(response);
                                                                },
                                                                error: function(xhr, status, error) {
                                                                    alert("Error: " + error);
                                                                }
                                                                });});});
                                    </script>
                        </table>
                    </div>
                    <script>
                        $(document).ready
                            (function() 
                                {
                                    $(".deleteQuality").click
                                    (
                                		function()
                                		{
                                		    var deleteUser = $(this).val();
                                            var row = $(this).closest("tr"); // получаем строку таблицы, которую нужно удалить
                                			$.ajax(
                                                {
                                                    type: 'POST',
                                                    dataType: 'html',
                                                    url: '/Engels/quality/deleteRowQuality.php',
                                                    data: ({idUser:deleteUser}),
                                                    success: function(response) 
                                                    {
                                                        var data = JSON.parse(response);
                                                        row.remove(); // удаляем строку таблицы
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