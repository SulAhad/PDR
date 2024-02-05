<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
$message = "SELECT DATE(date) AS day, 
SUM(BrakQuality) AS brakQuality, 
SUM(Kol_zam_him_sostav_teamA) AS kol_zam_him_sostav_teamA, 
SUM(Kol_zam_upakovka_teamA) AS kol_zam_upakovka_teamA, 
SUM(Kol_pretenziy_teamA) AS kol_pretenziy_teamA,
SUM(Zabrakov_mat_teamA) AS zabrakov_mat_teamA,
SUM(Kol_zam_him_sostav_Sulf) AS kol_zam_him_sostav_Sulf,
SUM(Kol_zam_upakovka_Sulf) AS kol_zam_upakovka_Sulf,
SUM(Kol_pretenziy_Sulf) AS kol_pretenziy_Sulf,
SUM(Zabrakov_mat_Sulf) AS zabrakov_mat_Sulf,
GROUP_CONCAT(BrakQuality_comment SEPARATOR '\t') AS brakQuality_comment,
GROUP_CONCAT(Kol_zam_him_sostav_teamA_comment SEPARATOR '\t') AS kol_zam_him_sostav_teamA_comment, 
GROUP_CONCAT(Kol_zam_upakovka_teamA_comment SEPARATOR '\t') AS kol_zam_upakovka_teamA_comment, 
GROUP_CONCAT(Kol_pretenziy_teamA_comment SEPARATOR '\t') AS kol_pretenziy_teamA_comment,
GROUP_CONCAT(Zabrakov_mat_teamA_comment SEPARATOR '\t') AS zabrakov_mat_teamA_comment,
GROUP_CONCAT(Kol_zam_him_sostav_Sulf_comment SEPARATOR '\t') AS kol_zam_him_sostav_Sulf_comment,
GROUP_CONCAT(Kol_zam_upakovka_Sulf_comment SEPARATOR '\t') AS kol_zam_upakovka_Sulf_comment,
GROUP_CONCAT(Kol_pretenziy_Sulf_comment SEPARATOR '\t') AS kol_pretenziy_Sulf_comment,
GROUP_CONCAT(Zabrakov_mat_Sulf_comment SEPARATOR '\t') AS zabrakov_mat_Sulf_comment
    FROM Quality_KPI WHERE DATE(date) = '$date' GROUP BY day";
$link->set_charset("utf8");
$result =  mysqli_query($link, $message);
$invoiceId = 1;

if(mysqli_num_rows($result) > 0)
{
while($row = mysqli_fetch_assoc($result)) 
{
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index' colspan='2'></td>";
    echo"     <td class='td_Index'>СМС</td>";
    echo"     <td class='td_Index'>СУЛЬФИРОВАНИЕ</td>";
    echo" </tr>";
   echo" <tr class='trIndex'>";
   echo"     <td class='td_Index'>брак, t.</td>";
   if($row['brakQuality'] <= 0)
    {
         echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brakQuality'], 2)."</p></td>";
    } else {
         echo"<td class='danger td_Index' title='$row[brakQuality_comment]'><p class='p_Index'>".number_format($row['brakQuality'], 2)."</p></td>";
    }
   
   echo"     <td class='td_Index'><p class='p_Index'></p></td>";
   echo"     <td class='td_Index'><p class='p_Index'></p></td>";
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr class='trIndex'>";
   echo"     <td class='td_Index' colspan='2'>количество замечаний по хим. составу</td>";
   if($row['kol_zam_him_sostav_teamA'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[kol_zam_him_sostav_teamA]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[kol_zam_him_sostav_teamA_comment]'><p class='p_Index'>$row[kol_zam_him_sostav_teamA]</p></td>";
    }
    if($row['kol_zam_him_sostav_Sulf'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[kol_zam_him_sostav_Sulf]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[kol_zam_him_sostav_Sulf_comment]'><p class='p_Index'>$row[kol_zam_him_sostav_Sulf]</p></td>";
    }
    
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr class='trIndex'>";
   echo"     <td class='td_Index' colspan='2'>количество замечаний по упаковке</td>";
   if($row['kol_zam_upakovka_teamA'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[kol_zam_upakovka_teamA]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[kol_zam_upakovka_teamA_comment]'><p class='p_Index'>$row[kol_zam_upakovka_teamA]</p></td>";
    }
   echo"<td class='td_Index'></td>";
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr class='trIndex'>";
   echo"     <td class='td_Index' colspan='2'>количество претензий</td>";
       if($row['kol_pretenziy_teamA'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[kol_pretenziy_teamA]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[kol_pretenziy_teamA_comment]'><p class='p_Index'>$row[kol_pretenziy_teamA]</p></td>";
    }
        if($row['kol_pretenziy_Sulf'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[kol_pretenziy_Sulf]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[kol_pretenziy_Sulf_comment]'><p class='p_Index'>$row[kol_pretenziy_Sulf]</p></td>";
    }
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
   echo" <tr class='trIndex'>";
   echo"     <td class='td_Index' colspan='2'>забракованный материал</td>";
   if($row['zabrakov_mat_teamA'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[zabrakov_mat_teamA]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[zabrakov_mat_teamA_comment]'><p class='p_Index'>$row[zabrakov_mat_teamA]</p></td>";
    }
    if($row['zabrakov_mat_Sulf'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[zabrakov_mat_Sulf]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[zabrakov_mat_Sulf_comment]'><p class='p_Index'>$row[zabrakov_mat_Sulf]</p></td>";
    }
   echo" </tr>";
       /*-----------------------------------------------------------------------------------------------------------------------*/
    echo" <tr class='trIndex'>";
       echo"     <td class='td_Index' colspan='2'>вторичная вода</td>";
    if($row['kol_zam_upakovka_Sulf'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>$row[kol_zam_upakovka_Sulf]</p></td>";
    } else {
        echo"<td class='danger td_Index'  title='$row[kol_zam_upakovka_Sulf_comment]'><p class='p_Index'>$row[kol_zam_upakovka_Sulf]</p></td>";
    }
    echo" </tr>";
}
}
else
{
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index' colspan='2'></td>";
    echo"     <td class='td_Index'>СМС</td>";
    echo"     <td class='td_Index'>СУЛЬФИРОВАНИЕ</td>";
    echo" </tr>";
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index'>брак, t.</td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"     <td class='td_Index'><p class='p_Index'></p></td>";
    echo"     <td class='td_Index'><p class='p_Index'></p></td>";
    echo" </tr>";
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index' colspan='2'>количество замечаний по хим. составу</td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo" </tr>";
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index' colspan='2'>количество замечаний по упаковке</td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo" </tr>";
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index' colspan='2'>количество претензий</td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo" </tr>";
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index' colspan='2'>забракованный материал</td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo" </tr>";
    echo" <tr class='trIndex'>";
    echo"     <td class='td_Index' colspan='2'>вторичная вода</td>";
    echo"     <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo" </tr>";
}
?>