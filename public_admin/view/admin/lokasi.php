<div class="form-orange">
    <form action="./prcs.php?admin&do=tambahProvinsi" method="post" style="padding-bottom: 0%">
        <h2>Tambahkan provinsi</h2>
        <input type="text" name="name" placeholder="jawa timur">
        <input type="submit">
    </form>
    <form action="./prcs.php?admin&do=tambahKota" method="post">
        <h2>Tambahkan kota</h2>
        <select name="parent" id="">
            <option value="">--pilih provinsi--</option>
            <?php $prov = _get(_run("SELECT geos_id,name FROM geos WHERE level = 2")); ?>
            <?php foreach($prov AS $val) echo "<option value='{$val['geos_id']}'>{$val['name']}</option>"?>
        </select>
        <input type="text" name="name" placeholder="surabaya">
        <input type="submit">
    </form>
    <form action="./prcs.php?admin&do=deleteGeos&provinsi" method="post" style="width: 30%;float: left">
        <h2>Hapus provinsi</h2>
        <select name="geos_id" id="">
            <option value="">--pilih provinsi--</option>
            <?php $prov = _get(_run("SELECT geos_id,name FROM geos WHERE level = 2")); ?>
            <?php foreach($prov AS $val) echo "<option value='{$val['geos_id']}'>{$val['name']}</option>"?>
        </select>
        <input type="submit" value="hapus">
    </form>
    <form action="./prcs.php?admin&do=deleteGeos&kota" method="post" style="width: 30%;float: left">
        <h2>Hapus kota</h2>
        <select name="geos_id" id="">
            <option value="">--pilih kota--</option>
            <?php $prov = _get(_run("SELECT geos_id,name FROM geos WHERE level = 1")); ?>
            <?php foreach($prov AS $val) echo "<option value='{$val['geos_id']}'>{$val['name']}</option>"?>
        </select>
        <input type="submit" value="hapus">
    </form>

</div>