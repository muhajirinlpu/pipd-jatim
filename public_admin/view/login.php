<?php if(isset($_SESSION['admindata']) OR isset($_SESSION['redaksidata'])) _redirect("./") ?>
<center>
    <div class="form-orange">
        <form action="../prcs.php?do=login" method="post">
            <h2>Login...</h2>
            <input type="text" name="email" placeholder="email"><br>
            <input type="password" name="pass" placeholder="password"><br>
            <input type="submit" value="Login">
        </form>
    </div>
</center>