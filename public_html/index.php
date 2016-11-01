<?php require_once "../api/boot.php";
echo _readAlert();
unset($_SESSION['TMP']);
_run_iou("visitors",["ip"=>$_SERVER['REMOTE_ADDR']]);
?>
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
        <p id="text-logo">Pusat informasi pariwisata daerah</p>
        <ul class="button-nav">
            <li><a href="./" style="background-color: #e15e03">Home</a></li>
            <li><a href="./p=home#places" style="background-color: #ffac04">Pariwisata</a></li>
            <li><a href="./p=home#news" style="background-color: #64c4b8">Berita</a></li>
            <?php if(isset($_SESSION['userdata'])): ?>
                <li><a href="./?p=home&sp=profil" style="background-color: #ff9003">Profil</a></li>
                <li><a href="./prcs.php?do=logout" style="background-color: #ff9003">Logout</a></li>
            <?php else: ?>
                <li><a id="login-btn" style="background-color: #ff9003">Masuk</a></li>
                <div id="login">
                    <div class="form-orange">
                        <form action="../prcs.php?do=login" method="post">
                            <h2>Login...</h2>
                            <input type="text" name="email" placeholder="email"><br>
                            <input type="password" name="pass" placeholder="password"><br>
                            <input type="submit" value="Login">
                            <p>belum punya akun ? <a href="./?p=form&sp=daftar">daftar sekarang</a></p>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </ul>
        <!--<nav id="menu">
            <ul>
                <ol>Akun</ol>

            </ul>
            <ul>
                <ol>Peta situs</ol>
                <li><a href="./">Home</a></li>
            </ul>
            <div style="clear: both;"></div>
        </nav>-->
    </nav>
    <?php
    if(isset($_GET['p'])){
        switch($_GET['p']){
            case "home":
                include_once "view/hmpg.php";
                break;

            case "form":
                include_once "view/form.php";
                break;

            case "detail";
                include_once "view/detail.php";
                break;

            case "":
                _redirect("./?p=home");
                break;
        }
    }else{
        _redirect("./?p=home");
    }
    ?>
</body>
</html>