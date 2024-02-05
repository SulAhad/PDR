<div class="table-responsive mt-4">
        <table class="table-hover table table-sm table-bordered">
            <thead  class="text-light" style="background:darkgray; position: sticky; top:0px;">
                <th>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">Цель, КВт/т</td>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">КВт/т, текущее</td>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">КВт/т, за сутки</td>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">КВт, за сутки</td>
                </th>
            </thead>
            <tbody>
                <tr class="trIndex">
                    <td>общее энергопотребление </td>
                    <?php
                        $message = "SELECT target_total_energy FROM target_energoresurs WHERE target_total_energy > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_total_energy]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>производство СМС</td>
                    <?php
                        $message = "SELECT target_production_energy FROM target_energoresurs WHERE target_production_energy > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_production_energy]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>производство сульфирования</td>
                    <?php
                        $message = "SELECT target_sulfirovanie_energy FROM target_energoresurs WHERE target_sulfirovanie_energy > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_sulfirovanie_energy]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>склад готовой продукции</td>
                    <?php
                        $message = "SELECT target_warehouse_energy FROM target_energoresurs WHERE target_warehouse_energy > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_warehouse_energy]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>утилиты</td>
                    <?php
                        $message = "SELECT target_utility_energy FROM target_energoresurs WHERE target_utility_energy > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_utility_energy]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
            </tbody>
        </table>
        <table class="table-hover table table-sm table-bordered">
            <thead class="text-light" style="background:darkgray; position: sticky; top:0px;">
                <th>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">Цель, m3/т</td>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">m3/т, текущее</td>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">m3/т, за сутки</td>
                    <td class="td_Index col-3" style="font-size:10px; width:80px;">m3, за сутки</td>
                </th>
            </thead>
            <tbody>
                <tr class="trIndex">
                    <td>общее водопотребление </td>
                    <?php
                        $message = "SELECT target_total_water FROM target_energoresurs WHERE target_total_water > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_total_water]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>производство СМС</td>
                    <?php
                        $message = "SELECT target_production_water FROM target_energoresurs WHERE target_production_water > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_production_water]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>производство сульфирования</td>
                    <?php
                        $message = "SELECT target_sulfirovanie_water FROM target_energoresurs WHERE target_sulfirovanie_water > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_sulfirovanie_water]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>склад готовой продукции</td>
                    <?php
                        $message = "SELECT target_warehouse_water FROM target_energoresurs WHERE target_warehouse_water > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_warehouse_water]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
                <tr class="trIndex">
                    <td>утилиты</td>
                    <?php
                        $message = "SELECT target_utility_water FROM target_energoresurs WHERE target_utility_water > 0 ORDER BY id DESC LIMIT 1";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<td>$row[target_utility_water]</td>";
                        }
                    ?>
                    <td>0.000</td>
                    <td>0.000</td>
                    <td>0.000</td>
                </tr>
            </tbody>
        </table>
</div>