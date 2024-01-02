<?php
    //sessions()

    session_start();
    $_SESSION["username"] = "Muskan";
    $_SESSION["password"] = "123456";

    echo "session data is saved";
?>