<?php
require_once "../api/boot.php";
switch(@$_GET['do']){

    case "getPlaces":
        _response(200,_paging(5,"SELECT contens.*,pictures.pic_name
                                 FROM contens,pictures
                                 WHERE type = 1 AND  contens.contents_id = pictures.contents_id AND ver_stat = 1
                                 GROUP BY contens.contents_id
                                 ORDER BY hit DESC"));
        break;


}