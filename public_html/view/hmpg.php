<div id="slider">
    <!--yay nothing here-->
</div>
<?php

if(isset($_GET['sp'])){

}else{
    include_once "hmpg/places.php";
    include_once "hmpg/news.php";
}
?>

<div id="footer">
    <h1>&copy; Sejatim developer</h1>
    <?php $visitors = _get(_run("SELECT COUNT(ip) FROM visitors"),1)['COUNT(ip)'] ?>
    <p><?= $visitors ?> Pengunjung</p>
</div>

