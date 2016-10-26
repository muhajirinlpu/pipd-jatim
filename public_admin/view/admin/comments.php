<?php $places = _paging(5,"SELECT comments.*,users.email,contens.title,contens.slug FROM comments,users,contens WHERE users.users_id = comments.author AND contens.contents_id = comments.contents_id");?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Author</th>
        <th>Judul konten</th>
        <th>komentar</th>
        <th>dipos pada</th>
        <th>Aksi</th>
    </tr>
    <?php foreach($places['data'] AS $key=>$val): ?>
        <tr>
            <td><?= $places['start_item']+$key ?></td>
            <td><?= $val['email'] ?></td>
            <td><?= $val['title'] ?></td>
            <td><?= $val['text'] ?></td>
            <td><?= $val['create_at'] ?></td>
            <td>
                <?= $val['ver_stat'] != 1 ? "<a class=\"confirm\" data-action=\"./prcs.php?admin&do=comments&id={$val['comments_id']}&val=1\" data-msg=\"yakin ingin mengijinkan {$val['title']}\">Ijinkan</a>" : "<a class=\"confirm\" data-action=\"./prcs.php?admin&do=comments&id={$val['comments_id']}&val=0\" data-msg=\"yakin ingin mencabut ijin {$val['title']}\">Cabut Ijin</a>" ?>
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