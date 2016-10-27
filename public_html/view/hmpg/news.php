<div id="news">
    <div class="news-container">
        <h1 class="fun-heading">Berita</h1>
        <?php $berita = _get(_run("SELECT * FROM contens WHERE type = 2 AND ver_stat = 1 ORDER BY create_at DESC LIMIT 5")) ?>
        <?php foreach($berita AS $val): ?>
        <div class="news-item">
            <h3 class="fun-heading"><?= $val['title'] ?></h3>
            <p><?= $val['descrip'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="video-container">
        <video src="./assets/video/1.mkv" controls width="720px"></video>
    </div>
    <div style="clear: both"></div>
</div>