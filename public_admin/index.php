<?php require_once "../api/boot.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Keliling Jatim</title>
        <link rel="stylesheet" href="<?= _getUrl("public","assets/pipd.css") ?>">
        <script type="text/javascript" src="<?= _getUrl("public","assets/jquery-3.1.0.min.js") ?>"></script>
        <script type="text/javascript" src="<?= _getUrl("public","assets/pipd.js") ?>"></script>
    </head>
    <body>
        <?php
        if(isset($_SESSION['admindata']) OR isset($_SESSION['redaksidata'])){?>
            <nav id="nav">
                <img src="" height="50px" alt="">
                <ul class="button-nav">
                    <li><a href="./">Home</a></li>
                    <li><a class="menu-btn">Menu</a></li>
                </ul>
                <nav id="menu">

                </nav>
            </nav>
            <?php
            if(isset($_SESSION['admindata'])) include_once "view/admin.php";
            else include_once "view/redaksi.php";
        }else {
            include_once "view/login.php";
        }
        ?>
    <?= _readAlert() ?>
    </body>
</html>