<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <script src="https://yastatic.net/s3/passport-sdk/autofill/v1/sdk-suggest-with-polyfills-latest.js"></script>
        <title>Ежедневный мониторинг производства</title>
        <link href="../Engels/signin.css" rel="stylesheet">
        <link href="../Engels/bootstrap/bootstrap.min.css" rel="stylesheet">
        <script src='../Engels/bootstrap/bootstrap.bundle.min.js'></script>
        <link type="image/x-icon" href="https://img.icons8.com/office/80/000000/line-chart.png" width="94" height="94" rel="shortcut icon">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    </head>
    <body class="text-center" style="overflow: hidden; background: rgb(189 210 229);">
        <?php 
            $client_id = $_COOKIE['client_id'];
            $login = $_COOKIE['login'];
       ?>
        <main class="form-signin">
            <form method="post" class="needs-validation">
                <img class="mb-2" src="/Engels/icons/lab_icon.png" width="100%" height="100%">
                <p class="mb-3 fw-normal" style="color:gray;">ПОЖАЛУЙСТА, АВТОРИЗУЙТЕСЬ</p>
                <div class="form-floating">
                    <input name="login" type="text" class="form-control" id="floatingInput" value="<?php echo $login ?>" placeholder="введите логин" required>
                    <label for="floatingInput">Логин</label>
                    <div class="invalid-feedback">Введите логин.</div>
                </div>
                <div class="form-floating mt-1">
                    <input name="password" type="password" class="form-control" id="floatingPassword" value="<?php echo $client_id ?>" placeholder="введите пароль" required>
                    <label for="floatingPassword">Пароль</label>
                    <div class="invalid-feedback">Введите пароль.</div>
                </div>
                <button type="button" value="ВОЙТИ" id="add"  class="w-100 btn btn-outline-secondary mt-2">ВОЙТИ</button>
                <!-- <script>
                let count = 0;

                document.getElementById("add").addEventListener("mouseover", function() {
                if (count < 10) {
                    this.style.position = "relative";
                    this.style.left = Math.random() * 200 + "px";
                    this.style.top = Math.random() * 200 + "px";
                    count++;
                }
                });
                </script> -->
                <!-- <button
                    id="add"
                    style="color:white;  position: relative;
                    width:200px;
                    background-image:
                    linear-gradient(to bottom, #f12828, #a00332, #9f0f31),
                    linear-gradient(to bottom, #ae0034, #6f094c);"
                    type="button"
                    class="button-hat btn m-3"><img style="height:20px; position: absolute; top: -15px; left: -17px; height: 44px;" src="https://assets.codepen.io/4175254/santa-hat-test-9.png">ВОЙТИ
                </button> -->
                <?php
                    $params = array(
                    'client_id'     => '6e2be76588564b71b7140f036d59d6c6',
                    'redirect_uri'  => 'http://10.171.71.50/Engels/login_ya.php',
                    'response_type' => 'code',
                    'state'         => '123'
                    );
                    $url = 'https://oauth.yandex.ru/authorize?' . urldecode(http_build_query($params));
                    echo '<a style="background:black; color:white; font-weight:bold;" class="w-100 btn btn-outline-secondary mt-2 link" type="button" href="' . $url . '"><img style="height:22px; margin:0 6px 2px 0;" class="iconsButtons" src="/Engels/icons/yajpg.jpg" />Войти с Яндекс ID</a>';
                ?>
            </form>
            <style> .btn {text-decoration:none;} </style>
            <div class='alert alert-danger mt-4' style='display:none;'>Неправильный логин или пароль</div>
            <div class='alert alert-danger1 mt-4' style='display:none;'>Ошибка!</div>
        </main>
        <script>
            var button = document.getElementById("add");
            function loginUser() 
            {
                var floatingInput = document.getElementById('floatingInput');
                var floatingPassword = document.getElementById('floatingPassword');
                var btn = $(this);
                $.ajax({
                    type: 'POST',
                    dataType: 'html',
                    url: '../Engels/check_user.php',
                    data: 
                    {
                        login: floatingInput.value,
                        password: floatingPassword.value
                    },
                    success: function(response) 
                    {
                        if (response == "error") 
                        {
                            btn.text('Неправильный логин или пароль').removeClass('btn-outline-primary').addClass('btn-outline-danger').fadeIn(2000).delay(3000).fadeOut(1000, function() {
                                btn.text('ВОЙТИ').removeClass('btn-outline-danger').addClass('btn-outline-primary').fadeIn(2000).delay(9999999).fadeOut(1000);
                            });
                        } 
                        else 
                        {
                            var login = response;
                            $.ajax({
                                url: '../Engels/insert_user.php',
                                type: 'POST',
                                data: {login: login},
                                success: function(response) {
                                    document.location.href='../Engels/index.php';
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) 
                    {
                        $('.alert-danger1').fadeIn(1000).delay(3000).fadeOut(1000);
                    }
                });
            }
            document.addEventListener("keydown", function(event) 
            {
                if (event.keyCode === 13) 
                {
                    loginUser();
                }
            });
            button.addEventListener("click", loginUser);
        </script>
        <footer class="fixed-bottom w-250 mw-100 container-fluid">
            <p class="mb-1"><small class="text-muted">&copy; 2023-2024 LAB Industries</small></p>
            <p class="text-muted"><small>developed for LAB Industries from Suleymanov</small></p>
        </footer>
    </body>
</html>
