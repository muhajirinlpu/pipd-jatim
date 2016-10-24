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
    <div id="content-place">
        <div id="places">
            <center><h1>Tempat yang mungkin anda suka</h1></center>
            <div class="form-orange form-search">
                <form action="" method="get">
                    <input type="text" name="q" placeholder="cari disini">
                    <select name="cat_id" id="">
                        <option value="">--pilh kategori--</option>
                        <?php $prov = _get(_run("SELECT cat_id,name FROM categories")); ?>
                        <?php foreach($prov AS $val) echo "<option value='{$val['cat_id']}'>{$val['name']}</option>"?>
                    </select>
                    <input type="submit" value="cari">
                </form>
            </div>
            <div style="clear: both"></div>
            <div class="places-container">
                <div class="container">
                    <div class="js-parse">
                        <!--somethings here...-->
                    </div>
                </div>
                <div style="clear: both;"></div>
            </div>
            asome
        </div>
    </div>
<?= _readAlert() ?>
</body>
</html>