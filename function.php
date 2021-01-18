<?php
function check_session($url = null){
    global $root_folder;
    if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == ""){
        header('location:../login.php?redirect='.$url);
        exit;
    }
}
?>