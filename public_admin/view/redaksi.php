<?php if(!isset($_SESSION['redaksidata'])) _redirect("./") ?>

<nav id="sidenav">
    <h2>Redaksi dashboard</h2>
    <a href=".?p=place">Konten tempat</a>
    <a href=".?p=news">Konten berita</a>
</nav>
<section id="content-admin">
    <?php
        if(isset($_GET['p'])){
            include_once "redaksi/{$_GET['p']}.php";
        }else{

        }
    ?>
</section>