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
        if(isset($_SESSION['admindata'])){
            include_once "view/admin.php";
        }elseif(isset($_SESSION['redaksidata'])){
            include_once "view/redaksi.php";
        }else {
            include_once "view/login.php";
        }
        ?>
    <?= _readAlert() ?>
    </body>
</html>