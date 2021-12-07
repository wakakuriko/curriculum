<?php

function check_user_login(){
    session_start();

    if(empty($_SESSION["user_name"])){
        header("Location:login.php");
        exit;
    }
}


?>