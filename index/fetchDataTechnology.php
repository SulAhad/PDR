<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
$message = "SELECT DATE(date) AS day,
SUM(Params_limits) AS params_limits,
SUM(Compositsia) AS compositsia,
SUM(Compaund) AS compaund,
SUM(Postdobavki) AS postdobavki,
SUM(Fasovka) AS fasovka,
SUM(Slivnaya) AS slivnaya,
SUM(Uch_sirya) AS uch_sirya,
SUM(Udeln_potr_gaza_teamA) AS udeln_potr_gaza_teamA,
SUM(Udeln_potr_gaza_gotoviy_prod_teamA) AS udeln_potr_gaza_gotoviy_prod_teamA,
SUM(Udeln_potr_gaza_teamB) AS udeln_potr_gaza_teamB,
SUM(Udeln_potr_gaza_gotoviy_prod_teamB) AS udeln_potr_gaza_gotoviy_prod_teamB,
SUM(Udeln_potr_gaza_total) AS udeln_potr_gaza_total,
SUM(Udeln_potr_gaza_gotoviy_prod_total) AS udeln_potr_gaza_gotoviy_prod_total,
GROUP_CONCAT(Params_limits_comment SEPARATOR '') AS params_limits_comment,
GROUP_CONCAT(Compositsia_comment SEPARATOR '') AS compositsia_comment,
GROUP_CONCAT(Compaund_comment SEPARATOR '') AS compaund_comment,
GROUP_CONCAT(Postdobavki_comment SEPARATOR '') AS postdobavki_comment,
GROUP_CONCAT(Fasovka_comment SEPARATOR '') AS fasovka_comment,
GROUP_CONCAT(Slivnaya_comment SEPARATOR '') AS slivnaya_comment,
GROUP_CONCAT(Uch_sirya_comment SEPARATOR '') AS uch_sirya_comment,
GROUP_CONCAT(Udeln_potr_gaza_teamA_comment SEPARATOR '') AS udeln_potr_gaza_teamA_comment,
GROUP_CONCAT(Udeln_potr_gaza_gotoviy_prod_teamA_comment SEPARATOR '') AS udeln_potr_gaza_gotoviy_prod_teamA_comment,
GROUP_CONCAT(Udeln_potr_gaza_teamB_comment SEPARATOR '') AS udeln_potr_gaza_teamB_comment,
GROUP_CONCAT(Udeln_potr_gaza_gotoviy_prod_teamB_comment SEPARATOR '') AS udeln_potr_gaza_gotoviy_prod_teamB_comment,
GROUP_CONCAT(Udeln_potr_gaza_total_comment SEPARATOR '') AS udeln_potr_gaza_total_comment,
GROUP_CONCAT(Udeln_potr_gaza_gotoviy_prod_total_comment SEPARATOR '') AS udeln_potr_gaza_gotoviy_prod_total_comment
    FROM Technology_KPI
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
    echo"    <td class='td_Index'>кол-во парам.не в лимитах</td>";
    if($row['params_limits'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[params_limits_comment]'><p class='p_Index'>$row[params_limits]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[params_limits_comment]'><p class='p_Index'>$row[params_limits]</p></td>";
    }
    echo"<td class='td_Index' col='5'><label>$row[params_limits_comment]</label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>композиция</td>";
    if($row['compositsia'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[compositsia_comment]'><p class='p_Index'>$row[compositsia]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[compositsia_comment]'><p class='p_Index'>$row[compositsia]</p></td>";
    }
    echo"<td class='td_Index' col='5'><label>$row[compositsia_comment]</label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>компаунд</td>";
    if($row['compaund'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[compaund_comment]'><p class='p_Index'>$row[compaund]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[compaund_comment]'><p class='p_Index'>$row[compaund]</p></td>";
    }
    echo"<td class='td_Index' col='5'><label>$row[compaund_comment]</label></td>";
   /* echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>постдобавки</td>";
    if($row['postdobavki'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[postdobavki_comment]'><p class='p_Index'>$row[postdobavki]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[postdobavki_comment]'><p class='p_Index'>$row[postdobavki]</p></td>";
    }
    echo"<td class='trIndex' col='5'><label>$row[postdobavki_comment]</label></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>фасовка</td>";
    if($row['fasovka'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[fasovka_comment]'><p class='p_Index'>$row[fasovka]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[fasovka_comment]'><p class='p_Index'>$row[fasovka]</p></td>";
    }
    echo"<td class='td_Index' col='5'><label>$row[fasovka_comment]</label></td>";
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>сливная станция</td>";
    if($row['slivnaya'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[slivnaya_comment]'><p class='p_Index'>$row[slivnaya]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[slivnaya_comment]'><p class='p_Index'>$row[slivnaya]</p></td>";
    }
    echo"<td class='td_Index' col='5'><label>$row[slivnaya_comment]</label></td>";
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>участок сырья</td>";
    if($row['uch_sirya'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[uch_sirya_comment]'><p class='p_Index'>$row[uch_sirya]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[uch_sirya_comment]'><p class='p_Index'>$row[uch_sirya]</p></td>";
    }
    echo"<td class='trIndex' col='5'><label>$row[uch_sirya_comment]</label></td>";
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    echo"    <td class='td_Index'><p class='p_Index'>CMC</p></td>";
    echo"    <td class='td_Index' col='5'><p class='p_Index'>ОБЩЕЕ</p></td>";
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>удельное потребление газа на башенный продукт</td>";
    if($row['udeln_potr_gaza_teamA'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[udeln_potr_gaza_teamA_comment]'><p class='p_Index'>$row[udeln_potr_gaza_teamA]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[udeln_potr_gaza_teamA_comment]'><p class='p_Index'>$row[udeln_potr_gaza_teamA]</p></td>";
    }
    /*if($row['udeln_potr_gaza_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_teamB_comment]'><label>$row[udeln_potr_gaza_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_teamB_comment]'><label>$row[udeln_potr_gaza_teamB]</label></td>";
    }*/
    if($row['udeln_potr_gaza_total'] <= 0)
    {
        echo"<td class='td_Index' col='5' class='success' title='$row[udeln_potr_gaza_total_comment]'><p class='p_Index'>$row[udeln_potr_gaza_total]</p></td>";
    } else {
        echo"<td col='5' class='danger td_Index' title='$row[udeln_potr_gaza_total_comment]'><p class='p_Index'>$row[udeln_potr_gaza_total]</p></td>";
    }
    echo"</tr>";
    /*___________________________________________________________________________________________________________________*/
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>удельное потребление газа на готовый продукт</td>";
    if($row['udeln_potr_gaza_gotoviy_prod_teamA'] <= 0)
    {
        echo"<td class='success td_Index' title='$row[udeln_potr_gaza_gotoviy_prod_teamA_comment]'><p class='p_Index'>$row[udeln_potr_gaza_gotoviy_prod_teamA]</p></td>";
    } else {
        echo"<td class='danger td_Index' title='$row[udeln_potr_gaza_gotoviy_prod_teamA_comment]'><p class='p_Index'>$row[udeln_potr_gaza_gotoviy_prod_teamA]</p></td>";
    }
    /*if($row['udeln_potr_gaza_gotoviy_prod_teamB'] <= 0)
    {
        echo"<td class='success' title='$row[udeln_potr_gaza_gotoviy_prod_teamB_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_teamB]</label></td>";
    } else {
        echo"<td class='danger' title='$row[udeln_potr_gaza_gotoviy_prod_teamB_comment]'><label>$row[udeln_potr_gaza_gotoviy_prod_teamB]</label></td>";
    }*/
    if($row['udeln_potr_gaza_gotoviy_prod_total'] <= 0)
    {
        echo"<td class='td_Index' col='5' class='success' title='$row[udeln_potr_gaza_gotoviy_prod_total_comment]'><p class='p_Index'>$row[udeln_potr_gaza_gotoviy_prod_total]</p></td>";
    } else {
        echo"<td class='td_Index' col='5' class='danger' title='$row[udeln_potr_gaza_gotoviy_prod_total_comment]'><p class='p_Index'>$row[udeln_potr_gaza_gotoviy_prod_total]</p></td>";
    }
    echo"</tr>";
}
}
else
{
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>кол-во парам.не в лимитах</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>композиция</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>компаунд</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>постдобавки</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>фасовка</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>сливная станция</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>участок сырья</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    /*echo"    <td><label></label></td>";*/
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'><p class='p_Index'></p></td>";
    echo"    <td class='td_Index'><p class='p_Index'>СМС</p></td>";
    /*echo"    <td><label>СМЕНА-Б</label></td>";*/
    echo"    <td class='td_Index'><p class='p_Index'>ОБЩЕЕ</p></td>";
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>удельное потребление газа на башенный продукт</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>удельное потребление газа на готовый продукт</td>";
    echo"    <td class='success td_Index'><p class='p_Index'>0</p></td>";
    /*echo"    <td class='success'><label>0</label></td>";*/
    echo"    <td class='success td_Index'><p>0</p></td>";
    echo"</tr>";
}
?>
