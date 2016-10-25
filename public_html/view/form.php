<?php if(isset($_SESSION['admindata']) OR isset($_SESSION['redaksidata']) OR isset($_SESSION['userdata'])) _redirect("./") ?>
<?php

    switch($_GET['sp']){
        case "masuk": ?>
            <center>
                <div class="form-orange">
                    <form action="../prcs.php?do=login" method="post" style="width: 200px;margin-top: 100px">
                        <h2>Login...</h2>
                        <input type="text" name="email" placeholder="email"><br>
                        <input type="password" name="pass" placeholder="password"><br>
                        <input type="submit" value="Login">
                    </form>
                </div>
            </center>
        <?php break;
        case "daftar":?>
            <center>
                <div class="form-orange">
                    <form action="../prcs.php?do=register" method="post" style="width: 200px;margin-top: 100px">
                        <h2>Register...</h2>
                        <input type="text" name="email" placeholder="email"><br>
                        <input type="password" name="pass[]" placeholder="password "><br>
                        <input type="password" name="pass[]" placeholder="password verifikasi"><br>
                        <input type="submit" value="Daftar">
                    </form>
                </div>
            </center>
        <?php break;
    }