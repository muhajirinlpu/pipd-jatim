<?php if(!isset($_SESSION['admindata'])) _redirect("./") ?>

<nav id="sidenav">
    <h2>Admin dashboard</h2>
    <a href=".?p=lokasi">Lokasi</a>
    <a href=".?p=kategori">Kategori</a>
    <a href=".?p=places">Konten konfirmasi</a>
    <a href=".?p=comments">Komentar konfirmasi</a>
</nav>
<section id="content-admin">
    <?php
    if(isset($_GET['p']) AND $_GET['p'] != ""){
        include_once "admin/{$_GET['p']}.php";
    }else{
        echo "404 not found";
    }
    ?>
</section>