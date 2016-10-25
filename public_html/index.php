<?php require_once "../api/boot.php" ?>
<!DOCTYPE html>
<html>
<head>
    <title>Keliling Jatim</title>
    <link rel="stylesheet" href="<?= _getUrl("public","assets/pipd.css") ?>">
    <script type="text/javascript" src="<?= _getUrl("public","assets/jquery-3.1.0.min.js") ?>"></script>
    <script type="text/javascript" src="<?= _getUrl("public","assets/pipd.js") ?>"></script>
</head>
<body>
    <nav id="nav">
        <img src="" height="50px" alt="">
        <ul class="button-nav">
            <li><a href="./">Home</a></li>
            <li><a class="menu-btn">Menu</a></li>
        </ul>
        <nav id="menu">

        </nav>
    </nav>
    <div id="slider">
        <!--yay nothing here-->
    </div>
    <?php
    if(isset($_GET['p'])){
        switch($_GET['p']){
            case "home":
                include_once "view/hmpg.php";
                break;

            case "":
                _redirect("./?p=home");
                break;
        }
    }else{
        _redirect("./?p=home");
    }
    ?>
<?= _readAlert() ?>
</body>
</html>