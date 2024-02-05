<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
if($_SESSION['production'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?></head>
    <body class="container">
        <div class="row card shadow-sm blur bg-light">

              <div class="col-md-5">
                  <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                      <p style="font-size:21px; border-bottom: 1px solid #f00;">Планирование</p>
                      <label style="font-size:12px;" for="avtomat" class="mt-2">Автомат</label>
                      <select id="avtomat" class="form-select" aria-label="Default select example" autocomplete="on">
                          <option value="Иннотех-1"   >Иннотех-1</option>
                          <option value="Иннотех-2"   >Иннотех-2</option>
                          <option value="Иннотех-3"   >Иннотех-3</option>
                          <option value="UVA-4"   >UVA-4</option>
                          <option value="UVA-5"   >UVA-5</option>
                          <option value="АКМА-4"     >АКМА-4</option>
                      </select>
                      <label style="font-size:12px;" for="format" class="mt-2">Формат</label>
                      <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="format" class="form-control mt-1" placeholder="формат" required>

                      <label style="font-size:12px;" for="oee" class="mt-2">OEE</label>
                      <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="oee" class="form-control mt-1" placeholder="oee" required>

                      <label style="font-size:12px;" for="pcs_min" class="mt-2">Pcs/min</label>
                      <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="pcs_min" class="form-control mt-1" placeholder="pcs/min" required>

                      <label style="font-size:12px;" for="pcs_h" class="mt-2">Pcs/h</label>
                      <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="pcs_h" class="form-control mt-1" placeholder="pcs/h" required>

                      <label style="font-size:12px;" for="oh" class="mt-2">OH</label>
                      <input value="0" required min="0" type="number" style="border-bottom: 2px solid gray;"  id="oh" class="form-control mt-1" placeholder="oh" required>
                  </fieldset>
              </div>
              <button style="width:200px;" id="myButton" type="button" class="add1 btn btn-outline-success m-3"><img class="iconsButtons" src="../icons/icon-save.png" />Сохранить</button>
              
              <div>
                <fieldset class="card_hover form-group border p-3 m-1 card shadow-sm bg-light">
                  <table class="table-hover table-bordered table table-sm">
                      <thead>
                          <tr>
                              <th>№</th>
                              <th>Автомат</th>
                              <th>Формат</th>
                              <th>OEE</th>
                              <th>Pcs/min</th>
                              <th>Pcs/h</th>
                              <th>OH</th>
                          </tr>
                      </thead>
                      <tbody id="tableBodyStat">
                        <?php
                        $message = "SELECT * FROM planing";
                        $link->set_charset("utf8");
                        $result = mysqli_query($link, $message);
                        while ($row = mysqli_fetch_assoc($result))
                        {
                          echo "<tr>";
                          echo "<td>$row[id]</td>";
                          echo "<td>$row[automat]</td>";
                          echo "<td>$row[format]</td>";
                          echo "<td>$row[oee]</td>";
                          echo "<td>$row[pcs_min]</td>";
                          echo "<td>$row[pcs_h]</td>";
                          echo "<td>$row[oh]</td>";
                          echo "</tr>";
                        }
                        ?>
                      </tbody>
                  </table>
                </fieldset>
              </div>
        </div>
        <script>
            $("#myButton").click(function()
            {
                $(this).html('<img class="iconsButtons" src="/Engels/sand-clock.png" />Сохранение...');
                    var avtomat = document.getElementById('avtomat');
                    var format = document.getElementById('format');
                    var oee = document.getElementById('oee');
                    var pcs_min = document.getElementById('pcs_min');
                    var pcs_h = document.getElementById('pcs_h');
                    var oh = document.getElementById('oh');
                    $.ajax(
                        {
                            type: 'POST',
                            dataType: 'html',
                            url: '/Engels/planirovanie/addPlaning.php',
                            data:
                            {
                                avtomat:avtomat.value,
                                format:format.value,
                                oee:oee.value,
                                pcs_min:pcs_min.value,
                                pcs_h:pcs_h.value,
                                oh:oh.value
                            },
                                success: function(response)
                                {
                                    var data = JSON.parse(response);
                                    format.value = "0";
                                    oee.value = "0";
                                    pcs_min.value = "0";
                                    pcs_h.value = "0";
                                    oh.value = "0";
                                    $('.alert-success').fadeIn(1000).delay(3000).fadeOut(1000);
                                    setTimeout(function()
                                    {
                                    $("#myButton").html('<img class="iconsButtons" src="/Engels/check.png" />Сохранено!');
                                    setTimeout(function()
                                    {
                                        $("#myButton").html('<img class="iconsButtons" src="/Engels/icon-save.png" />Сохранить');
                                    }, 2000);
                                    }, 2000);
                                },
                                error: function(xhr, status, error) {
                                    alert("Error: " + error);
                                }
                        });
                    });
                </script>
<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
