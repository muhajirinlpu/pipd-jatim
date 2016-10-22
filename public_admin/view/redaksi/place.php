
<div class="form-orange">
    <form action=".?prcs.php&redaksi&do=addPlace" method="post" enctype="multipart/form-data">
        <h2>Tambahkan tempat</h2>
        <input type="text" name="title" placeholder="nama tempat"> <br>
        <input type="file" name="pics" multiple><span class="quote">Foto disini</span><br>
        <select name="geos_id" id="">
            <option value="">--pilih lokasi--</option>
            <option value="1">Surabaya</option>
        </select>
        <select name="cat_id" id="">
            <option value="">--pilih kategori--</option>
            <option value="1">hotel</option>
        </select>
    </form>
</div>