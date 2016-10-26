<?php require_once "../api/boot.php" ?>
<?php

if(isset($_GET['admin'])){
    if(empty($_SESSION['admindata'])) _redirect("./");
    switch(@$_GET['do']){
        case 'insertUser':
            $data = [
                "email" => $_GET['email'],
                "pass" => password_hash($_GET['pass'], PASSWORD_DEFAULT),
                "role" => $_GET['role']
            ];
            if (_run_iou("users", $data)) {
                $data = [
                    "users_id" => _lastId(),
                    "ver_code" => sha1($_GET['email'] . $_GET['pass'] . date("ymdHis"))
                ];
                print_r($data);
                if (_run_iou("users", $data)) _alert("vercode = " . sha1($_GET['email'] . $_GET['pass'] . date("ymdHis")));
                _alert("done add {$_GET['email']} as " . $_GET['role'] == 3 ? "admin" : "tim redaksi");
                _redirect("./");
            }
            break;

        case 'tambahProvinsi':
            $_POST['level'] = 2;
            if(_run_iou("geos",$_POST)) _alert("{$_POST['name']} ditambahkan");
            else                        _alert("gagal");
            _redirect("prev");
            break;

        case 'tambahKota':
            $_POST['level'] = 1;
            if(_run_iou("geos",$_POST)) _alert("{$_POST['name']} ditambahkan");
            else                        _alert("gagal");
            _redirect("prev");
            break;

        case "deleteGeos":
            print_r($_POST);
            if(_run("DELETE FROM geos WHERE geos_id=:geos_id",$_POST)) _alert("terhapus");
            _redirect('prev');
            break;

        case 'tambahKategori':
            if(_run_iou("categories",$_POST)) _alert("{$_POST['name']} ditambahkan");
            else                              _alert("gagal");
            _redirect("prev");
            break;

        case "deleteKategori":
            print_r($_POST);
            if(_run("DELETE FROM categories WHERE cat_id=:cat_id",$_POST)) _alert("terhapus");
            _redirect('prev');
            break;

        case "content":
            $a = "gagal";
            if(_run_iou("contens",["contents_id" => $_GET['id'],"ver_stat" => $_GET['val']]))$a = "status diganti";
            _alert($a);
            _redirect("prev");
            break;

        case "comments":
            $a = "gagal";
            if(_run_iou("comments",["comments_id" => $_GET['id'],"ver_stat" => $_GET['val']]))$a = "status diganti";
            _alert($a);
            _redirect("prev");
            break;

    }
}elseif(isset($_GET['redaksi'])){
    if(empty($_SESSION['redaksidata'])) _redirect("./");
    switch(@$_GET['do']){
        case "add":
            $_POST['author'] = $_SESSION['redaksidata']['users_id'];
            $_POST['slug']   = strtolower(str_replace(" ","-",$_POST['title'].date("dis")));
            if(_run_iou("contens",$_POST)) _alert("{$_POST['title']} ditambahkan");
            if(isset($_FILES['pics'])) {
                $id = _lastId();
                foreach($_FILES['pics']['tmp_name'] AS $key=>$val){
                    if(move_uploaded_file($val,_dirPublic("assets/pic/").$_FILES['pics']['name'][$key]))
                        if(_run_iou("pictures",["pic_name"=>$_FILES['pics']['name'][$key],"contents_id"=>$id])) _alert("foto terupload");
                }
            }
            _redirect("prev");
            break;

        case "addNews":

            break;
    }
}else {
    switch (@$_GET['do']) {
        case 'activate':
            if (_run("UPDATE users SET ver_stat = 1 WHERE ver_code = ?", [$_GET['_key']])) _alert("akun diaktivasi");
            else                                                                           _alert("akun gagal diaktivasi");
            _redirect("./");
            break;

        case 'login':
            $stmt = _run("SELECT users_id,email,pass,role,avatar,ver_stat,create_at FROM users WHERE email = ? AND (role = 3 OR role = 2)", [$_POST['email']]);
            if ($stmt->rowCount() == 1) {
                $stmt = _get($stmt, 1);
                if (password_verify($_POST['pass'], $stmt['pass'])) {
                    if($stmt['ver_stat'] == 0) {
                        _alert("akun belum di verifikasi");
                        _redirect("./");
                    }
                    unset($stmt['pass']);
                    if ($stmt['role'] == 3) $_SESSION['admindata'] = $stmt;
                    elseif ($stmt['role'] == 2) $_SESSION['redaksidata'] = $stmt;
                    _alert("hy " . $stmt['email']);
                } else {
                    _alert("wrong email or password");
                }
            } else {
                _alert("wrong email or password");
            }
            _redirect("./");
            break;

        case 'logout':
            unset($_SESSION['admindata']);
            unset($_SESSION['redaksidata']);
            _redirect("./");
            break;

        default:

            break;
    }
}