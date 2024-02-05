<?php
require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
$messageName = "SELECT name,
 COUNT(*) AS rounds_count,
 SUM(CASE WHEN MONTH(date) = 1 THEN 1 ELSE 0 END) AS january_rounds,
 SUM(CASE WHEN MONTH(date) = 2 THEN 1 ELSE 0 END) AS february_rounds,
 SUM(CASE WHEN MONTH(date) = 3 THEN 1 ELSE 0 END) AS march_rounds,
 SUM(CASE WHEN MONTH(date) = 4 THEN 1 ELSE 0 END) AS april_rounds,
 SUM(CASE WHEN MONTH(date) = 5 THEN 1 ELSE 0 END) AS may_rounds,
 SUM(CASE WHEN MONTH(date) = 6 THEN 1 ELSE 0 END) AS june_rounds,
 SUM(CASE WHEN MONTH(date) = 7 THEN 1 ELSE 0 END) AS july_rounds,
 SUM(CASE WHEN MONTH(date) = 8 THEN 1 ELSE 0 END) AS august_rounds,
 SUM(CASE WHEN MONTH(date) = 9 THEN 1 ELSE 0 END) AS september_rounds,
 SUM(CASE WHEN MONTH(date) = 10 THEN 1 ELSE 0 END) AS october_rounds,
 SUM(CASE WHEN MONTH(date) = 11 THEN 1 ELSE 0 END) AS november_rounds,
 SUM(CASE WHEN MONTH(date) = 12 THEN 1 ELSE 0 END) AS december_rounds,
 SUM(CASE WHEN typeSafety = 'Небезопасно' THEN 1 ELSE 0 END) AS unsafe_rounds,
 GROUP_CONCAT(CASE WHEN typeSafety = 'Небезопасно' THEN MONTH(date) END) AS unsafe_months
FROM InspectionList WHERE YEAR(date) = '2024'
GROUP BY name
ORDER BY name, january_rounds, february_rounds, march_rounds, 
april_rounds, may_rounds, june_rounds, july_rounds, august_rounds, september_rounds, october_rounds, november_rounds, december_rounds;";
$link->set_charset("utf8");
$resultName = mysqli_query($link, $messageName);
$i = 1;
while ($rowName = mysqli_fetch_assoc($resultName)) 

{
    
    echo "<tr>";
        echo "<td>" . $i ++ . "</td>"; // Вывод нумерации строки
        echo "<td>" . $rowName['name'] . "</td>";
        if ($rowName['january_rounds'] != 0) 
        {
            if (strpos($rowName['unsafe_months'], '1') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['january_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['january_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['february_rounds'] != 0) 
        {
            if (strpos($rowName['unsafe_months'], '2') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['february_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['february_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['march_rounds'] != 0) 
        {
            if (strpos($rowName['unsafe_months'], '3') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['march_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['march_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['april_rounds'] != 0) 
        {
            if (strpos($rowName['unsafe_months'], '4') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['april_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['april_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['may_rounds'] != 0) 
        {
            if (strpos($rowName['unsafe_months'], '5') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['may_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['may_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['june_rounds'] != 0) 
        {
            if (strpos($rowName['june_rounds'], '6') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['june_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['may_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['july_rounds'] != 0) 
        {
            if (strpos($rowName['july_rounds'], '7') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['july_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['may_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['august_rounds'] != 0) 
        {
            if (strpos($rowName['unsafe_months'], '8') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['august_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['august_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['september_rounds'] != 0) 
        {
            if (strpos($rowName['unsafe_months'], '9') !== false) 
            {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['september_rounds'] . "</td>";
            } 
            else 
            {
                echo "<td style='color:green;'>" . $rowName['september_rounds'] . "</td>";
            }
        } 
        else 
        {
            echo "<td></td>";
        }
        if ($rowName['october_rounds'] != 0) {
            if (strpos($rowName['unsafe_months'], '10') !== false) {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['october_rounds'] . "</td>";
            } else {
                echo "<td style='color:green;'>" . $rowName['october_rounds'] . "</td>";
            }
        } else {
            echo "<td></td>";
        }
        if ($rowName['november_rounds'] != 0) {
            if (strpos($rowName['unsafe_months'], '11') !== false) {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['november_rounds'] . "</td>";
            } else {
                echo "<td style='color:green;'>" . $rowName['november_rounds'] . "</td>";
            }
        } else {
            echo "<td></td>";
        }
        if ($rowName['december_rounds'] != 0) {
            if (strpos($rowName['unsafe_months'], '12') !== false) {
                echo "<td style='color:red;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['december_rounds'] . "</td>";
            } else {
                echo "<td style='color:green;'>" . $rowName['december_rounds'] . "</td>";
            }
        } else {
            echo "<td></td>";
        }
        if ($rowName['unsafe_rounds'] != 0){
            echo "<td><a style='color:green; font-size:16px;'>" . $rowName['rounds_count'] ."</a> / <a style='color:red; font-size:16px;' title='Зафиксирован НЕБЕЗОПАНСНЫЙ обход'>" . $rowName['unsafe_rounds']. "</a></td>";
        }
        else{
            echo "<td style='color:green;'>" . $rowName['rounds_count'] . "</td>";
        }
    echo "</tr>";
}
mysqli_close($link);
?>