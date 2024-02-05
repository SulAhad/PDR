<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(Incedents) AS incedents, 
SUM(NearMiss) AS nearMiss, 
SUM(Bbswa) AS bbswa, 
SUM(Kol_vo_zam) AS kol_vo_zam,
SUM(Kol_zam_teamA) AS kol_zam_teamA,
SUM(Kol_zam_teamB) AS kol_zam_teamB,
SUM(Kol_zam_Sulf) AS kol_zam_Sulf,
SUM(Bbs_teamA) AS bbs_teamA,
SUM(Bbs_teamB) AS bbs_teamB,
SUM(Bbs_Sulf) AS bbs_Sulf,
SUM(Rpm_zam_teamA) AS rpm_zam_teamA,
SUM(Rpm_zam_teamB) AS rpm_zam_teamB,
SUM(Rpm_zam_Sulf) AS rpm_zam_Sulf,
SUM(Rpm_bbs_teamA) AS rpm_bbs_teamA,
SUM(Rpm_bbs_teamB) AS rpm_bbs_teamB,
SUM(Rpm_bbs_Sulf) AS rpm_bbs_Sulf,
GROUP_CONCAT(Incedents_comment SEPARATOR ' ') AS incedents_comment,
GROUP_CONCAT(NearMiss_comment SEPARATOR ' ') AS nearMiss_comment,
GROUP_CONCAT(Bbswa_comment SEPARATOR ' ') AS bbswa_comment,
GROUP_CONCAT(Kol_vo_zam_comment SEPARATOR ' ') AS kol_vo_zam_comment,
GROUP_CONCAT(Kol_zam_teamA_comment SEPARATOR ' ') AS kol_zam_teamA_comment,
GROUP_CONCAT(Kol_zam_teamB_comment SEPARATOR ' ') AS kol_zam_teamB_comment,
GROUP_CONCAT(Kol_zam_Sulf_comment SEPARATOR ' ') AS kol_zam_Sulf_comment,
GROUP_CONCAT(Bbs_teamA_comment SEPARATOR ' ') AS bbs_teamA_comment,
GROUP_CONCAT(Bbs_teamB_comment SEPARATOR ' ') AS bbs_teamB_comment,
GROUP_CONCAT(Bbs_Sulf_comment SEPARATOR ' ') AS bbs_Sulf_comment,
GROUP_CONCAT(Rpm_zam_teamA_comment SEPARATOR ' ') AS rpm_zam_teamA_comment,
GROUP_CONCAT(Rpm_zam_teamB_comment SEPARATOR ' ') AS rpm_zam_teamB_comment,
GROUP_CONCAT(Rpm_zam_Sulf_comment SEPARATOR ' ') AS rpm_zam_Sulf_comment,
GROUP_CONCAT(Rpm_bbs_teamA_comment SEPARATOR ' ') AS rpm_bbs_teamA_comment,
GROUP_CONCAT(Rpm_bbs_teamB_comment SEPARATOR ' ') AS rpm_bbs_teamB_comment,
GROUP_CONCAT(Rpm_bbs_Sulf_comment SEPARATOR ' ') AS rpm_bbs_Sulf_comment
    FROM Safety_KPI 
WHERE DATE(date) = '$date'
GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;
if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index' colspan='3'></td>";
    echo"    <td class='td_Index'>СМС</td>";
    echo"    <td class='td_Index'>СУЛЬФИРОВАНИЕ</td>";
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>инциденты</td>";
    if($row['incedents'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[incedents_comment]'><label>$row[incedents]</label></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[incedents_comment]'><label>$row[incedents]</label></td>";
    }
    echo"    <td class='td_Index'>количество замечаний</td>";
    if($row['kol_zam_teamA'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[kol_zam_teamA_comment]'><label>$row[kol_zam_teamA]</label></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[kol_zam_teamA_comment]'><label>$row[kol_zam_teamA]</label></td>";
    }
    
    if($row['kol_zam_Sulf'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[kol_zam_Sulf_comment]'><label>$row[kol_zam_Sulf]</label></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[kol_zam_Sulf_comment]'><label>$row[kol_zam_Sulf]</label></td>";
    }
    echo"</tr>";
    /*-----------------------------------------------------------------------------------------------------------------------*/
    echo"<tr class='trIndex'>";
    echo"    <td>действия на грани риска</td>";
    if($row['nearMiss'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[nearMiss_comment]'><label>$row[nearMiss]</label></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[nearMiss_comment]'><label>$row[nearMiss]</label></td>";
    }
    echo"    <td class='td_Index'>обход по безопасности</td>";
    if($row['bbs_teamA'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[bbs_teamA_comment]'><label>$row[bbs_teamA]</label></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[bbs_teamA_comment]'><label>$row[bbs_teamA]</label></td>";
    }
   
    if($row['bbs_Sulf'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[bbs_Sulf_comment]'><label>$row[bbs_Sulf]</label></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[bbs_Sulf_comment]'><label>$row[bbs_Sulf]</label></td>";
    }
    echo"</tr>";
        /*-----------------------------------------------------------------------------------------------------------------------*/
    
}
}
else
{
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index' colspan='3'><label></td>";
    echo"    <td class='td_Index'>СМС</td>";
    echo"    <td class='td_Index'>СУЛЬФИРОВАНИЕ</td>";
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>инциденты</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'>кол-во замечаний</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>действия на грани риска</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'>обход по безопасности</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"</tr>";
   
}
?>