<?php
    session_start();

    if (!isset($_SESSION['isLogin'])) {
        header('Location: ../pagine/index.php');
    }
?>