<div id="content-place">
    <div id="places">
        <center><h1>Tempat yang mungkin anda suka</h1></center>
        <div id="kota">
        <?php
        $kota = _get(_run("SELECT cat_id,name FROM categories"));
        foreach($kota AS $val){
            echo "<a href='?p=home&q=&geos_id=&cat_id={$val['cat_id']}'>{$val['name']}</a>";
        }
        ?>
        </div>
        <div class="form-orange form-search">
            <form action="" method="get">
                <input type="text" name="p" value="home" style="display: none">
                <input type="text" name="q" placeholder="cari disini" value="<?= @$_GET['q'] ?>">
                <select name="geos_id" id="">
                    <option value="">--pilh kota--</option>
                    <?php $prov = _get(_run("SELECT * FROM geos WHERE level = 1")); ?>
                    <?php
                        foreach($prov AS $val) {
                            $stat = "";
                            @$_GET['geos_id'] == $val['geos_id'] ? $stat = "selected" : $stat = '';
                            echo "<option {$stat} value='{$val['geos_id']}'>{$val['name']}</option>";
                        }
                    ?>
                </select>
                <input type="number" name="cat_id" value="" style="display: none">
                <input type="submit" value="cari">
            </form>
        </div>
        <div style="clear: both"></div>
        <div class="places-container">
            <div class="container">
                <?php
                    if(isset($_GET['q'],$_GET['cat_id'],$_GET['geos_id'])){
                        echo "<script>window.location.hash = 'places'</script>";
                        $query = "SELECT A.`title`, A.`descrip`, A.`slug`,B.pic_name FROM `contens` AS A , `pictures` AS B WHERE A.contents_id = B.contents_id AND ver_stat = 1 AND (title LIKE '%{$_GET['q']}%' OR descrip LIKE '%{$_GET['q']}%') ";
                        if($_GET['cat_id'] != null) $query .= "AND cat_id = {$_GET['cat_id']} ";
                        if($_GET['geos_id'] != null) $query .= "AND geos_id = {$_GET['geos_id']} ";
                        $query .= "GROUP BY A.contents_id ORDER BY hit DESC";
                        $places = _paging(10,$query);
                    }else{
                        $places = _paging(10,"SELECT A.`title`, A.`descrip`, A.`slug`,B.pic_name FROM `contens` AS A , `pictures` AS B WHERE A.contents_id = B.contents_id AND ver_stat = 1 GROUP BY A.contents_id ORDER BY hit DESC");
                    }
                    if(sizeof($places['data']) == 0) echo "Tidak ada hasil";
                ?>
                <?php foreach($places['data'] AS $val): ?>
                <div class="place-contents">
                    <img src="./assets/pic/<?= $val['pic_name'] ?>" style="width: 200px; height: 130px;">
                        <span>
                            <h2><?= $val['title'] ?></h2>
                            <p><?= substr($val['descrip'],0,100) ?></p>
                        </span>
                    <a href="./?p=detail&amp;title=<?= $val['slug'] ?>">Selengkapnya</a>
                </div>
                <?php endforeach; ?>
                <div style="clear: both;"></div>
                <div class="paging">
                <?php
                    for($i = 1 ; $i <= $places['total_page'] ; $i++)
                        echo "<a href='"._fetchUrl($i)."' >{$i}</a>";
                ?>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>