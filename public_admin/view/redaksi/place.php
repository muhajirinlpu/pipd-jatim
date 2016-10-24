
<div class="form-orange">
    <form action="prcs.php?redaksi&do=add" method="post" enctype="multipart/form-data">
        <h2>Tambahkan tempat</h2>
        <input type="text" name="title" placeholder="nama tempat"> <br>
        <input type="file" name="pics[]" multiple><span class="quote">Foto disini</span><br>
        <select name="geos_id" id="">
            <option value="">--pilih lokasi--</option>
            <?php $prov = _get(_run("SELECT geos_id,name FROM geos WHERE level = 1")); ?>
            <?php foreach($prov AS $val) echo "<option value='{$val['geos_id']}'>{$val['name']}</option>"?>
        </select>
        <input type="number" style="display: none;" name="type" value="1">
        <select name="cat_id" id="">
            <option value="">--pilih kategori--</option>
            <?php $prov = _get(_run("SELECT cat_id,name FROM categories ")); ?>
            <?php foreach($prov AS $val) echo "<option value='{$val['cat_id']}'>{$val['name']}</option>"?>
        </select><br>
        <textarea name="descrip" placeholder="Keterangan disini" id="" cols="110" rows="30"></textarea>
        <input type="submit">
    </form>
</div>