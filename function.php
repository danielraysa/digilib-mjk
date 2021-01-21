<?php
function check_session($url = null, $dir = null){
    global $root_folder;
    if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == ""){
        if($root_folder == $dir){
            header('location:login.php?redirect='.$url);
            exit;
        }
        header('location:../login.php?redirect='.$url);
        exit;
    }
}
function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>