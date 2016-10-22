<?php

function _run($query,$val=[]){
    try{
        global $conn;
        $stmt = $conn->prepare($query);
        $stmt->execute($val);
        return $stmt;
    }catch(PDOException $e){
        echo $e->getMessage();
        die();
    }
}

function _get($obj,$option = 0){
    if($option == 0) return $obj->fetchAll(PDO::FETCH_ASSOC);
    else             return $obj->fetch(PDO::FETCH_ASSOC);
}

function _run_iou($table,$data){
    $columb = implode(",",array_keys($data));
    $val    = "'".implode("','",array_values($data))."'";
    $update = implode("=?,",array_keys($data))."=?";
    return _run("INSERT INTO {$table}({$columb}) VALUES ({$val}) ON DUPLICATE KEY UPDATE {$update}",array_values($data));
}

function _lastId(){
    global $conn;
    return $conn->lastInsertId();
}

function _paging($limit,$query,$val=[]){
    $page = 1;
    if(isset($_GET['page'])) $page = $_GET['page'];
    $count = ($page-1)*$limit;
    return [
        "start_item"  =>  $count+1,
        "total_page"  =>  ceil(_run($query,$val)->rowCount()/$limit),
        "data"        =>  _get(_run($query." LIMIT $count,$limit".$val))
    ];
}

function _fetchUrl($num_page){
    if($_SERVER["REQUEST_URI"] != "/") return basename(preg_replace("/\d+/u","",str_replace("&page=","",$_SERVER["REQUEST_URI"])))."&page=".$num_page;
    else                               return "./?page=".$num_page;
}

function _alert($message){
    $_SESSION['TMP']['MSG'][] = $message;
}

function _readAlert(){
    $alert = "";
    $tmp = @$_SESSION['TMP']['MSG'];
    if(empty($tmp)) $tmp =[];
    foreach($tmp AS $value) $alert .= "alert('{$value}');";
    unset($_SESSION["TMP"]);
    return "<script>$alert</script>";
}

function _redirect($location){
    header("location:$location");
    exit();
}

function _getUrl($type,$address){
    global $conf;
    return $conf[$type."_url"].$address;
}

function _dirPublic($location){
    return "../public_html/".$location;
}