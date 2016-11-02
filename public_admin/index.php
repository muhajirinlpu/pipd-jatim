<?php require_once "../api/boot.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Keliling Jatim</title>
        <link rel="stylesheet" href="<?= _getUrl("public","assets/pipd.css") ?>">
        <script type="text/javascript" src="<?= _getUrl("public","assets/jquery-3.1.0.min.js") ?>"></script>
        <script type="text/javascript" src="<?= _getUrl("public","assets/pipd.js") ?>"></script>
        <style>
            nav#nav{
                height: 50px;
                background-color: #424242;
            }
        </style>
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
                <ul>
                    <ol>Akun</ol>
                    <?php if(isset($_SESSION['admindata']) OR isset($_SESSION['redaksidata'])): ?>
                    <li><a href="./prcs.php?do=logout">Logout</a></li>
                    <?php else: ?>
                    <li><a href="./?p=form&sp=masuk">Masuk</a></li>
                    <li><a href="./?p=form&sp=daftar">Daftar</a></li>
                    <?php endif; ?>
                </ul>
                <div style="clear: both;"></div>
                </nav>
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