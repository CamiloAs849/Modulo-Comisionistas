<?php
sleep(1);
session_start();
if (empty($_SESSION['UsuarioID'])) {
    header("Location:../index.php");
    exit();
}

session_unset();
session_destroy();

header("Location: ../index.php");
