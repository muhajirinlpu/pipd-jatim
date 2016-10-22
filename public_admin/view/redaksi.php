<?php if(!isset($_SESSION['redaksidata'])) _redirect("./") ?>
<nav id="nav">
    <img src="" height="50px" alt="">
    <ul class="button-nav">
        <li><a href="./">Home</a></li>
        <li><a class="menu-btn">Menu</a></li>
    </ul>
    <nav id="menu">

    </nav>
</nav>

<nav id="sidenav">
    <h2>Redaksi dashboard</h2>
    <a href=".?p=place">Konten tempat</a>
</nav>
<section id="content-admin">
    <?php
        if(isset($_GET['p'])){
            switch($_GET['p']){
                case 'place':
                    include_once "redaksi/place.php";
                    break;
            }
        }else{

        }
    ?>
</section>