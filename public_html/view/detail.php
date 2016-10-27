<?php
$content  = _run("SELECT * FROM `contens` WHERE  slug = ?",[$_GET['title']]);
if($content->rowCount() != 1) _redirect("./");
$content = _get($content,1);
_run("UPDATE contens SET hit = hit+1 WHERE contents_id = {$content['contents_id']}");
$_SESSION['TMP']['contents_id'] = $content['contents_id'];
$pictures = _get(_run("SELECT * FROM pictures WHERE contents_id = ?",[$content['contents_id']]));
$date = date_create($content['create_at']);
$rate = _get(_run("SELECT AVG(val) FROM rates WHERE contents_id = ?",[$content['contents_id']]),1)["AVG(val)"];
?>
<style>
    .container{
        margin-right: 350px;
    }
</style>
<script type="text/javascript">
    var users_id = <?= isset($_SESSION['userdata']['users_id']) ? $_SESSION['userdata']['users_id'] :"null" ?> ;
    var contents_id = <?= $content['contents_id'] ?>;
</script>
<div class="container" style="margin-top: 70px">
    <center><h1><?= $content['title'] ?></h1></center>
    <pre class="fun-text">
        <?= $content['descrip'] ?>
    </pre>
    <div class="picture">
        <?php foreach ($pictures AS $val): ?>
            <img src="./assets/pic/<?= $val['pic_name'] ?>" alt="" class="fun-pic">
        <?php endforeach; ?>
    </div>
    <div class="">
        <h2 class="fun-heading">Beri rating</h2>
        <div class="form-orange">
            <form action="./prcs.php?user&do=giveRate" method="post" style="padding: 5px">
                <select name="val" id="">
                    <?php
                    $lonely_rate = _get(_run("SELECT val FROM rates WHERE author = ? AND contents_id = ?",[$_SESSION['userdata']['users_id'],$_SESSION['TMP']['contents_id']]),1)['val'];
                    $kriteria_rate = ["sangat buruk","buruk","biasa","baik","sangat baik"];
                    foreach($kriteria_rate AS $key=>$value){
                        $stat = "";
                        if($lonely_rate == $key+1) $stat = "selected";
                        echo "<option {$stat} value='".($key+1)."'>{$value}</option>";
                    }
                    ?>
                </select>
                <input type="submit">
            </form>
        </div>
        <h2 class="fun-heading">Komentar</h2>
        <div class="form-orange">
            <form action="#">
                <textarea name="content_text" id="komen-txt" cols="50" rows="10" placeholder="beri komentar"></textarea><br>
                <input type="button" name="komen-btn" value="kirim">
            </form>
        </div>
        <div id="komentar-list">
            <?php
                $komen = _get(_run("SELECT comments.*,users.email FROM comments,users WHERE users.users_id = comments.author AND contents_id = ? AND comments.ver_stat = 1",[$content['contents_id']]));
             ?>
            <?php foreach($komen AS $val): ?>
                <div>
                    <h3><?= $val['email'] ?></h3>
                    <h4><?= $val['create_at'] ?></h4>
                    <p><?= $val['text'] ?></p>
                    <?= $val['author'] == @$_SESSION['userdata']['users_id'] ? "<a href=\"./user&do=hapusKomen&id={$val['comments_id']}\">Hapus komentar</a>" : "" ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="right-content">
    <div class="extra-content">
        <p>Di publis pada <?= date_format($date,"D, d F Y ") ?> </p>
        <p>Rating : <?= $rate ?></p>
    </div>
</div>