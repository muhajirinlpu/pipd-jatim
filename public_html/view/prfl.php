<?php if(!isset($_SESSION['userdata'])) _redirect("./") ?>

<nav id="sidenav">
    <h2>User dashboard</h2>
    <a href=".?p=place">Tambahkan agen</a>
    <a href=".?p=news"></a>
</nav>
<section id="content-admin">
    <?php
        if(isset($_GET['p'])){
            include_once "prfl/{$_GET['p']}.php";
        }else{

        }
    ?>
</section>