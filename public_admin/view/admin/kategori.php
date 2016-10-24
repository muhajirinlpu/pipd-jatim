<div class="form-orange">
    <form action="./prcs.php?admin&do=tambahKategori" method="post" >
        <h2>Tambahkan Kategori</h2>
        <input type="text" name="name" placeholder="Hotel">
        <input type="submit">
    </form>
    <form action="./prcs.php?admin&do=deleteKategori" method="post" style="width: 30%;float: left">
        <h2>Hapus kategori</h2>
        <select name="cat_id" id="">
            <option value="">--pilih kategori--</option>
            <?php $prov = _get(_run("SELECT cat_id,name FROM categories")); ?>
            <?php foreach($prov AS $val) echo "<option value='{$val['cat_id']}'>{$val['name']}</option>"?>
        </select>
        <input type="submit" value="hapus">
    </form>
</div>