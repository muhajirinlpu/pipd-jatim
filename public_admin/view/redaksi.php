<?php if(!isset($_SESSION['redaksidata'])) _redirect("./") ?>

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