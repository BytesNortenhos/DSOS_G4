<?php
session_start();
if($_SESSION['tecLar'] != true) {
    header('Location: ../index.php');
    exit();
}
else{
    include("nav.php");
    include("main.php");
}
?>