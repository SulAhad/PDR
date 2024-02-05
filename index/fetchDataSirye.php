<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$date = $_GET['date'];
if(isset($_SESSION['login']) == "") {
    header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');
}
$message = "SELECT DATE(date) AS day,
SUM(brak_sms_bilo) AS brak_sms_bilo,
SUM(brak_sms_prihod) AS brak_sms_prihod,
SUM(brak_sms_rashod) AS brak_sms_rashod,
SUM(brak_sms_ostatok) AS brak_sms_ostatok,
SUM(brak_sulf_bilo) AS brak_sulf_bilo,
SUM(brak_sulf_prihod) AS brak_sulf_prihod,
SUM(brak_sulf_rashod) AS brak_sulf_rashod,
SUM(brak_sulf_ostatok) AS brak_sulf_ostatok,
SUM(brak_sulf_rastvor_bilo) AS brak_sulf_rastvor_bilo,
SUM(brak_sulf_rastvor_prihod) AS brak_sulf_rastvor_prihod,
SUM(brak_sulf_rastvor_rashod) AS brak_sulf_rastvor_rashod,
SUM(brak_sulf_rastvor_ostatok) AS brak_sulf_rastvor_ostatok,
SUM(isolator_bilo) AS isolator_bilo,
SUM(isolator_prihod) AS isolator_prihod,
SUM(isolator_rashod) AS isolator_rashod,
SUM(isolator_ostatok) AS isolator_ostatok,
SUM(pil_bilo) AS pil_bilo,
SUM(pil_prihod) AS pil_prihod,
SUM(pil_rashod) AS pil_rashod,
SUM(pil_ostatok) AS pil_ostatok,
SUM(otsev_bilo) AS otsev_bilo,
SUM(otsev_prihod) AS otsev_prihod,
SUM(otsev_rashod) AS otsev_rashod,
SUM(otsev_ostatok) AS otsev_ostatok
    FROM Sirye_KPI
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
    echo"    <td class='td_Index'></td>";
    echo"    <td class='td_Index'>БЫЛО</td>";
    echo"    <td class='td_Index'>ПРИХОД</td>";
    echo"    <td class='td_Index'>РАСХОД</td>";
    echo"    <td class='td_Index'>ОСТАТОК</td>";
    echo"</tr>";
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>брак смс, т</td>";
    if($row['brak_sms_bilo'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sms_bilo'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sms_bilo'], 2).   "</p></td>";
    }
    if($row['brak_sms_prihod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sms_prihod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sms_prihod'], 2).   "</p></td>";
    }
    if($row['brak_sms_rashod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sms_rashod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sms_rashod'], 2).   "</p></td>";
    }
    if($row['brak_sms_ostatok'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sms_ostatok'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sms_ostatok'], 2).   "</p></td>";
    }
    echo"</tr>";
    // _______________________________________________________________________________________________________-
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>брак сульфирование, т</td>";
    if($row['brak_sulf_bilo'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_bilo'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_bilo'], 2).   "</p></td>";
    }
    if($row['brak_sulf_prihod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_prihod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_prihod'], 2).   "</p></td>";
    }
    if($row['brak_sulf_rashod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rashod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rashod'], 2).   "</p></td>";
    }
    if($row['brak_sulf_ostatok'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_ostatok'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_ostatok'], 2).   "</p></td>";
    }
    echo"</tr>";
        // _______________________________________________________________________________________________________-
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>брак сульфирование (на растворение), т</td>";
    if($row['brak_sulf_rastvor_bilo'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_bilo'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_bilo'], 2).   "</p></td>";
    }
    if($row['brak_sulf_rastvor_prihod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_prihod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_prihod'], 2).   "</p></td>";
    }
    if($row['brak_sulf_rastvor_rashod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_rashod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_rashod'], 2).   "</p></td>";
    }
    if($row['brak_sulf_rastvor_ostatok'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_ostatok'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['brak_sulf_rastvor_ostatok'], 2).   "</p></td>";
    }
    echo"</tr>";
    // _______________________________________________________________________________________________________-
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>изолятор, т</td>";
    if($row['isolator_bilo'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['isolator_bilo'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['isolator_bilo'], 2).   "</p></td>";
    }
    if($row['isolator_prihod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['isolator_prihod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['isolator_prihod'], 2).   "</p></td>";
    }
    if($row['isolator_rashod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['isolator_rashod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['isolator_rashod'], 2).   "</p></td>";
    }
    if($row['isolator_ostatok'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['isolator_ostatok'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['isolator_ostatok'], 2).   "</p></td>";
    }
    echo"</tr>";
    // _______________________________________________________________________________________________________-
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>пыль, т</td>";
    if($row['pil_bilo'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['pil_bilo'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['pil_bilo'], 2).   "</p></td>";
    }
    if($row['pil_prihod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['pil_prihod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['pil_prihod'], 2).   "</p></td>";
    }
    if($row['pil_rashod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['pil_rashod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['pil_rashod'], 2).   "</p></td>";
    }
    if($row['pil_ostatok'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['pil_ostatok'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['pil_ostatok'], 2).   "</p></td>";
    }
    echo"</tr>";
    // _______________________________________________________________________________________________________-
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>отсев на растворение, т</td>";
    if($row['otsev_bilo'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['otsev_bilo'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['otsev_bilo'], 2).   "</p></td>";
    }
    if($row['otsev_prihod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['otsev_prihod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['otsev_prihod'], 2).   "</p></td>";
    }
    if($row['otsev_rashod'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['otsev_rashod'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['otsev_rashod'], 2).   "</p></td>";
    }
    if($row['otsev_ostatok'] <= 0)
    {
        echo"<td class='success td_Index'><p class='p_Index'>".number_format($row['otsev_ostatok'], 2).   "</p></td>";
    } else {
        echo"<td class='danger td_Index'><p class='p_Index'>".number_format($row['otsev_ostatok'], 2).   "</p></td>";
    }
    echo"</tr>";
}
}
else
{
    echo"<tr class='trIndex'>";
    echo"    <td class='td_Index'>нет заполненных данных...</td>";
    echo"</tr>";
}

?>
