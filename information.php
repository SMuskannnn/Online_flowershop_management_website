<?php
    session_start();

    if (isset($_SESSION["username"])){
    echo"welcome " .$_SESSION['username'];
    echo'<br>';
    echo 'And your password is '.$_SESSION['password'];
    }else{
        echo 'login again to contnue';
    }
?>