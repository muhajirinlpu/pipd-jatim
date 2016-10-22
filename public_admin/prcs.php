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

        case '':

            break;
    }
}elseif(isset($_GET['redaksi'])){
    if(empty($_SESSION['redaksidata'])) _redirect("./");
    switch(@$_GET['do']){

    }
}else {
    switch (@$_GET['do']) {

        case 'activate':
            if (_run("UPDATE users SET ver_stat = 1 WHERE ver_code = ?", [$_GET['_key']])) _alert("akun diaktivasi");
            else                                                                           _alert("akun gagal diaktivasi");
            _redirect("./");
            break;

        case 'login':
            $stmt = _run("SELECT users_id,email,pass,role,avatar,ver_stat,create_at FROM users WHERE email = ?", [$_POST['email']]);
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