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
?>