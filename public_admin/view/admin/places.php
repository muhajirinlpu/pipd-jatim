<?php $places = _paging(5,"SELECT A.*,B.email FROM `contens` AS A , `users` AS B WHERE A.author = B.users_id GROUP BY A.contents_id ORDER BY hit DESC");?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Author</th>
        <th>Nama</th>
        <th>deskripsi</th>
        <th>dipos pada</th>
        <th>Aksi</th>
    </tr>
        <?php foreach($places['data'] AS $key=>$val): ?>
            <tr>
                <td><?= $places['start_item']+$key ?></td>
                <td><?= $val['email'] ?></td>
                <td><?= $val['title'] ?></td>
                <td><?= substr($val['descrip'],0,20) ?>...</td>
                <td><?= $val['create_at'] ?></td>
                <td>
                    <?= $val['ver_stat'] != 1 ? "<a class=\"confirm\" data-action=\"./prcs.php?admin&do=content&id={$val['contents_id']}&val=1\" data-msg=\"yakin ingin mengijinkan {$val['title']}\">Ijinkan</a>" : "<a class=\"confirm\" data-action=\"./prcs.php?admin&do=content&id={$val['contents_id']}&val=0\" data-msg=\"yakin ingin mencabut ijin {$val['title']}\">Cabut Ijin</a>" ?>
                    <br>
                    <a target="_blank" href="<?= _getUrl("public","?p=detail&title=".$val['slug']) ?>">lihat</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <div class="paging" style="position: absolute;top: 180%;right: 10%;">
        <?php
        for($i = 1 ; $i <= $places['total_page'] ; $i++)
            echo "<a href='"._fetchUrl($i)."' >{$i}</a>";
        ?>
    </div>
</table>