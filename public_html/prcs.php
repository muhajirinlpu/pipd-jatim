<?php require_once "../api/boot.php" ?>
<?php

if(isset($_GET['user'])) {
    if(empty($_SESSION['userdata'])){
        _alert("login dahulu untuk {$_GET['do']}");
        _redirect("prev");
    }
    switch($_GET['do']){
        case "giveRate":
            $data = [
                "author" => $_SESSION['userdata']['users_id'],
                "contents_id" => $_SESSION['TMP']['contents_id'],
                "val"       => $_POST['val']
            ];
            $stmt = _get(_run("SELECT rates_id FROM rates WHERE author = ? AND contents_id = ?",[$_SESSION['userdata']['users_id'],$_SESSION['TMP']['contents_id']]),1)['rates_id'];
            if(sizeof($stmt) == 1)$data['rates_id'] = $stmt ;
            if(_run_iou("rates",$data)) _alert("rating dikirim");
            _redirect("prev");
            break;

        case "giveComment":
            if(_run_iou("comments",$_POST)) _response(200,"tunggu konfirmasi admin untuk menampilkan komentar");
            else _response(200,"gagal oeh");
            break;

        case "hapusKomen":
            if(_run("DELETE FROM comments WHERE comments_id = ? AND author = ?",[$_GET['id'],$_SESSION['userdata']['users_id']])) _alert("komentar dihapus");
            _redirect("prev");
            break;
    }

}


switch(@$_GET['do']){
    case "getSlider":
        _response(200,_get(_run("SELECT contens.*,pictures.pic_name
                                 FROM contens,pictures
                                 WHERE type = 1 AND  contens.contents_id = pictures.contents_id AND ver_stat = 1
                                 GROUP BY contens.contents_id
                                 ORDER BY create_at DESC
                                 LIMIT 5 ")));
        break;

    case "register":
        if($_POST['pass'][0] != $_POST['pass'][1]){
            _alert("password verifikasi salah");
            _redirect("prev");
        } elseif(_run("SELECT users_id FROM users WHERE email = ?",[$_POST['email']])->rowCount() == 1){
            _alert("Email telah digunakan");
            _redirect("prev");
        }
        $data = [
            "email" => $_POST['email'],
            "pass"  =>  password_hash($_POST['pass'][0],PASSWORD_DEFAULT),
            "role"  =>  1,
            "ver_code"=>sha1($_POST['email'].date("dmyHis"))
            ];
        if(_run_iou("users",$data)){
            _alert("registrasi berhasil silakan check email anda :v verifikasi kode ".sha1($_POST['email'].date("dmyHis")));
            _redirect("./?p=form&sp=masuk");
        }
        break;

    case 'activate':
        if (_run("UPDATE users SET ver_stat = 1 WHERE ver_code = ?", [$_GET['_key']])) _alert("akun diaktivasi");
        else                                                                           _alert("akun gagal diaktivasi");
        _redirect("home");
        break;

    case 'login':
        $stmt = _run("SELECT users_id,email,pass,role,avatar,ver_stat,create_at FROM users WHERE email = ? AND role = 1", [$_POST['email']]);
        if ($stmt->rowCount() == 1) {
            $stmt = _get($stmt, 1);
            if (password_verify($_POST['pass'], $stmt['pass'])) {
                if($stmt['ver_stat'] == 0) {
                    _alert("akun belum di verifikasi");
                    _redirect("prev");
                }
                unset($stmt['pass']);
                $_SESSION['userdata'] = $stmt;
                _alert("hy " . $stmt['email']);
                _redirect("home");
            } else {
                _alert("wrong email or password");
                _redirect("prev");
            }
        } else {
            _alert("wrong email or password");
            _redirect("prev");
        }
        break;

    case 'logout':
        unset($_SESSION['userdata']);
        _redirect("home");
        break;

}