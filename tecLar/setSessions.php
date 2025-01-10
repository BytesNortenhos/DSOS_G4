<?php
session_start();
if (isset($_POST['idTer'])) {
    $_SESSION['idTer'] = $_POST['idTer'];
}
?>