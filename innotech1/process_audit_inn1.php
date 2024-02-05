<?php require($_SERVER['DOCUMENT_ROOT'].'/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /bridge.php');}
if($_SESSION['innotech1'] == 0){
    require($_SERVER['DOCUMENT_ROOT'].'/accessBlock.php');
    exit();
}
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
    <head><?php require($_SERVER['DOCUMENT_ROOT'].'/head.php');?></head>
    <body class="container">
        <div class="row card shadow-sm mt-4">
            <fieldset class="form-group border card shadow-sm">
              <div class="table-responsive">
                <select style="border-bottom: 2px solid gray;" id="textForList" class="form-select" aria-label="Default select example" autocomplete="on" onchange="sendRequest(this.value)">
                  <option value="xlse">1.35</option>
                  <option value="xlsf">1.5</option>
                  <option value="xlsg">1.8</option>
                  <option value="xlsh">2.1</option>
                  <option value="xlsi">2.43</option>
                  <option value="xlsj">2.7</option>
                  <option value="xlsk">3</option>
                  <option value="xlsl">4.05</option>
                  <option value="xlsm">4.5</option>
                  <option value="xlsn">5.4</option>
                  <option value="xlso">6</option>
                  <option value="xlsp">8.1</option>
                  <option value="xlsq">10</option>
                </select>
                <table id="myTable" class="mt-2 table-hover table-bordered table table-sm">
                  <!-- Table structure remains the same -->
                </table>
                </div>
                <script>
                function sendRequest(selectedValue) {
                  var xhttp = new XMLHttpRequest();
                  xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("myTable").innerHTML = this.responseText;
                    }
                  };
                  xhttp.open("GET", "../innotech1/get_data.php?value=" + selectedValue, true);

                  xhttp.send();
                }
                </script>
            </fieldset>
        </div>
    </body>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/footer/footer.php'); ?>
</html>
