<?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/connect_db.php');
if(isset($_SESSION['login']) == "")
{header($_SERVER['DOCUMENT_ROOT'].'Location: /Engels/bridge.php');}
require($_SERVER['DOCUMENT_ROOT'].'/Engels/accessBlock.php');
$a = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="ru">
<head><?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/head.php');?>
    <style>
        .profile{
            margin:0px;
        }
    </style>
    </head>
    <body class="container">
        <div class="row blur card shadow-sm">
            <div class="col-md-12">
            <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/notification/notification.php') ?>
                <form class="row" method="post" id="formToSend">
                    <div class="col-md-12">
                        <p style="font-size:22px; border-bottom: 1px solid #f00;">Информация о пользователе</p>
                        <fieldset class="form-group border card shadow-sm m-2">
                            <div class="row">
                                <div class="col-md-5 m-2">
                                    <div class="table-responsive">
                                        <label style="font-size:12px;" for="id" class="mt-2">id</label>
                                        <p class='profile'><?php echo" $_SESSION[id]"; ?></p>

                                        <label style="font-size:12px;" for="login" class="mt-2">Логин</label>
                                        <p class='profile'><?php echo" $_SESSION[login]"; ?></p>

                                        <label style="font-size:12px;" for="sureName" class="mt-2">Фамилия</label>
                                        <p class='profile'><?php echo" $_SESSION[surName]"; ?></p>

                                        <label style="font-size:12px;" for="name" class="mt-2">Имя</label>
                                        <p class='profile'><?php echo" $_SESSION[nameUser]"; ?></p>

                                        <label style="font-size:12px;" for="position" class="mt-2">Должность</label>
                                        <p class='profile'><?php echo" $_SESSION[position]"; ?></p>

                                        <label style="font-size:12px;" for="access" class="mt-2">Уровень доступа</label>
                                        <p class='profile'><?php echo" $_SESSION[access]"; ?></p>

                                        <label style="font-size:12px;" for="access" class="mt-2">Открытые вкладки</label>

                                        <?php if (isset($_SESSION['index']) && $_SESSION['index'] == 1): ?>
                                            <p class='profile'>Главное меню
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['index']; ?>" <?php if ($_SESSION['index'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['top5problem']) && $_SESSION['top5problem'] == 1): ?>
                                            <p class='profile'>Топ 5 проблем
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['top5problem']; ?>" <?php if ($_SESSION['top5problem'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['inspection']) && $_SESSION['inspection'] == 1): ?>
                                            <p class='profile'>Лист обходов
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['inspection']; ?>" <?php if ($_SESSION['inspection'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['safety']) && $_SESSION['safety'] == 1): ?>
                                            <p class='profile'>Безопасность
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['safety']; ?>" <?php if ($_SESSION['safety'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['quality']) && $_SESSION['quality'] == 1): ?>
                                            <p class='profile'>Качество
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['quality']; ?>" <?php if ($_SESSION['quality'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['technology']) && $_SESSION['technology'] == 1): ?>
                                            <p class='profile'>Технология
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['technology']; ?>" <?php if ($_SESSION['technology'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['production']) && $_SESSION['production'] == 1): ?>
                                            <p class='profile'>Производство
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['production']; ?>" <?php if ($_SESSION['production'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['sirye']) && $_SESSION['sirye'] == 1): ?>
                                            <p class='profile'>Сырьё
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['sirye']; ?>" <?php if ($_SESSION['sirye'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['active_water']) && $_SESSION['active_water'] == 1): ?>
                                            <p class='profile'>Активная вода
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['active_water']; ?>" <?php if ($_SESSION['active_water'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['palletizer']) && $_SESSION['palletizer'] == 1): ?>
                                            <p class='profile'>Паллетайзер
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['palletizer']; ?>" <?php if ($_SESSION['palletizer'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['innotech1']) && $_SESSION['innotech1'] == 1): ?>
                                            <p class='profile'>Иннотех 1
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['innotech1']; ?>" <?php if ($_SESSION['innotech1'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (isset($_SESSION['support']) && $_SESSION['support'] == 1): ?>
                                            <p class='profile'>Support
                                                <input onclick='return false;' type="checkbox" class="form-check-input" value="<?php echo $_SESSION['support']; ?>" <?php if ($_SESSION['support'] == 1) { echo "checked"; } ?>>
                                            </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <!--<div class="col-md-6 m-2">
                                    <?php
                                        $id = $_SESSION['id'];
                                        $message = "SELECT * FROM Users_KPI WHERE id = '$id'";
                                        $link->set_charset("utf8");
                                        $results  =  mysqli_query($link, $message);
                                        while($row = mysqli_fetch_assoc($results))
                                        {
                                            $showImg = base64_encode($row['img']);
                                            echo "<img src='data:image/jpeg;base64,$showImg' style='width:100%;' />";
                                        }
                                    ?>
                                    <form method="post" enctype="multipart/form-data" id="image-form">
                                        <input name="image" type="file" accept="image/*" required>
                                        <button id="send" class="btn btn-primary btn-lg" type="button">Сохранить</button>
                                    </form>
                                    <script>
                                    $(document).ready(function() {
                                        $('#send').click(function(e) {
                                            var formData = new FormData($('#image-form')[0]);
                                            var id = "<?php echo $id; ?>";
                                            alert(formData);
                                            $.ajax({
                                                url: 'update-image.php',
                                                type: 'POST',
                                                data: formData,
                                                success: function(response) {
                                                    alert(response);
                                                },
                                                cache: false,
                                                contentType: false,
                                                processData: false
                                            });
                                        });
                                    });
                                    </script>
                                </div>-->

                            </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
        <?php require($_SERVER['DOCUMENT_ROOT'].'/Engels/footer/footer.php'); ?>
    </body>
</html>
