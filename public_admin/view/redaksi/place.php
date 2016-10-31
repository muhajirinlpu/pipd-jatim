<div class="form-orange">
    <form action="prcs.php?redaksi&do=add" method="post" enctype="multipart/form-data">
        <?php
        $text = "Tambahkan tempat";
        if(isset($_GET['slug']))
            $edit = _get(_run("SELECT * FROM contens WHERE slug = ?",[$_GET['slug']]),1);
        if(isset($edit) AND sizeof($edit) != 0 AND $edit != null){
            echo "<input type='number' name='contents_id' value='{$edit['contents_id']}' style='display: none'>";
            $text = "Edit ".$edit['title'];
        }
        ?>
        <h2><?= $text ?></h2>
        <input type="text" name="title" placeholder="nama tempat" value="<?= @$edit['title'] ?>"> <br>
        <input type="file" name="pics[]" multiple><span class="quote">Foto disini</span><br>
        <select name="geos_id" id="">
            <option value="">--pilih lokasi--</option>
            <?php $prov = _get(_run("SELECT geos_id,name FROM geos WHERE level = 1")); ?>
            <?php foreach($prov AS $val) {
                $select = "";
                if($val['geos_id'] == $edit['geos_id']) $select = "selected";
                echo "<option value='{$val['geos_id']}' {$select}>{$val['name']}</option>";
            }?>
        </select>
        <input type="number" style="display: none;" name="type" value="1">
        <select name="cat_id" id="">
            <option value="">--pilih kategori--</option>
            <?php $prov = _get(_run("SELECT cat_id,name FROM categories ")); ?>
            <?php foreach($prov AS $val) {
                $select = "";
                if($val['cat_id'] == $edit['cat_id']) $select = "selected";
                echo "<option value='{$val['cat_id']}' {$select}>{$val['name']}</option>";
            }?>
        </select><br>
        <textarea name="descrip" placeholder="Keterangan disini" id="" cols="110" rows="30"><?= @$edit['descrip'] ?></textarea>
        <input type="submit">
    </form>
</div>

<?php $places = _paging(5,"SELECT A.*,B.email FROM `contens` AS A , `users` AS B WHERE A.author = B.users_id GROUP BY A.contents_id ORDER BY ver_stat ASC");?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Type</th>
        <th>Author</th>
        <th>Nama</th>
        <th>deskripsi</th>
        <th>dipos pada</th>
        <th>Aksi</th>
    </tr>
    <?php foreach($places['data'] AS $key=>$val): ?>
        <tr>
            <td><?= $places['start_item']+$key ?></td>
            <td><?= $val['type'] == 1 ? "Wisata" : "berita/artikel" ?></td>
            <td><?= $val['email'] ?></td>
            <td><?= $val['title'] ?></td>
            <td><?= substr($val['descrip'],0,20) ?>...</td>
            <td><?= $val['create_at'] ?></td>
            <td>
                <a href="./?p=place&edit&slug=<?= $val['slug'] ?>">Edit</a>
                <br>
                <a class="confirm" data-msg="yakin ingin menghapus tempat ini ? " data-action="./prcs.php?do=redaksi&deletePlace&id=<?= $val['contents_id'] ?>">Hapus tempat</a>
            </td>
        </tr>
    <?php endforeach; ?>
    <div class="paging" style="position: absolute;top: 130%;right: 10%;">
        <?php
        for($i = 1 ; $i <= $places['total_page'] ; $i++)
            echo "<a href='"._fetchUrl($i)."' >{$i}</a>";
        ?>
    </div>
</table>