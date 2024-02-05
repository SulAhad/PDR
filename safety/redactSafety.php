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
    <body class="container-fluid">
        <div class="row bg-light card shadow-sm">
            <div class="col-md-12">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <p style="font-size:22px; border-bottom: 1px solid #f00;">Безопасность</p>
                <fieldset class="form-group border card shadow-sm">
                    <div class="table-responsive">
                        <table id="myTable" class="table-hover table-bordered table table-sm ">
                            <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Incedents</th>
                                    <th>Near miss</th>
                                    <th>BBSWA</th>
                                    <th>Количество замечаний</th>
                                    <th>Кол-во замечаний team A</th>
                                    <th>BBSWA</th>
                                    <th>R&PM Замечания</th>
                                    <th>R&PM BBSWA</th>
                                    <th>Кол-во замечаний team B</th>
                                    <th>BBSWA</th>
                                    <th>R&PM Замечания</th>
                                    <th>R&PM BBSWA</th>
                                    <th>Кол-во замечаний Сульф</th>
                                    <th>BBSWA</th>
                                    <th>R&PM Замечания</th>
                                    <th>R&PM BBSWA</th>
                                    <th>Изменить</th>
                                    <th>Удалить</th>
                                </tr>
                            </thead>
                            <tbody onload="myFunction()" class="animate-bottom">
                            <?php
                            $message = "SELECT * FROM Safety_KPI ORDER BY date DESC";
                                            $link->set_charset("utf8");
                                            $result =  mysqli_query( $link,  $message);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                echo"<tr>";
                                                    echo"<td><input type='date'   class='redactInput form-control' min='0' id='dateSafety' value='$row[date]'    ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Incedents_comment]' min='0' id='Incedents' value='$row[Incedents]'    ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[NearMiss_comment]' min='0'  id='NearMiss'value='$row[NearMiss]'     ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Bbswa_comment]' min='0'     id='Bbswa'value='$row[Bbswa]'        ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Kol_vo_zam_comment]' min='0' id='Kol_vo_zam'value='$row[Kol_vo_zam]'   ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Kol_zam_teamA_comment]' min='0' id='Kol_zam_teamA'value='$row[Kol_zam_teamA]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Bbs_teamA_comment]' min='0'     id='Bbs_teamA'value='$row[Bbs_teamA]'    ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Rpm_zam_teamA_comment]' min='0' id='Rpm_zam_teamA'value='$row[Rpm_zam_teamA]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Rpm_bbs_teamA_comment]' min='0' id='Rpm_bbs_teamA'value='$row[Rpm_bbs_teamA]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Rpm_bbs_teamA_comment]' min='0' readonly   id='Kol_zam_teamB'value='$row[Kol_zam_teamB]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Bbs_teamB_comment]' min='0'  readonly id='Bbs_teamB'value='$row[Bbs_teamB]'    ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Rpm_zam_teamB_comment]' min='0' readonly  id='Rpm_zam_teamB'value='$row[Rpm_zam_teamB]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Rpm_bbs_teamB_comment]' min='0' readonly  id='Rpm_bbs_teamB'value='$row[Rpm_bbs_teamB]'></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Kol_zam_Sulf_comment]' min='0' id='Kol_zam_Sulf' value='$row[Kol_zam_Sulf]' ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Bbs_Sulf_comment]' min='0' id='Bbs_Sulf'value='$row[Bbs_Sulf]'     ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Rpm_zam_Sulf_comment]' min='0' id='Rpm_zam_Sulf'value='$row[Rpm_zam_Sulf]' ></input></td>";
                                                    echo"<td><input type='number' class='redactInput form-control' title='$row[Rpm_bbs_Sulf_comment]' min='0' id='Rpm_bbs_Sulf'value='$row[Rpm_bbs_Sulf]' ></input></td>";
                                                    echo"<td style='width:5%;'><button type='button' class='updateSafety btn btn-outline btn-sm btn-secondary' value='$row[id]'>Изменить</button></td>";
                                                    echo"<td style='width:5%;'><button type='button' class='deleteSafety btn btn-outline btn-sm btn-secondary' value='$row[id]'>Удалить</button></td>";
                                                echo"</tr>";
                                            }
                                        ?>
                                    </tbody>
                        </table>
                        <script src="/Engels/safety/validate_input.js"></script>
                        <script src="/Engels/safety/update.js"></script>
                        <script src="/Engels/safety/deleteRow.js"></script>
                    </div>
                </fieldset>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>