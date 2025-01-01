<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");

if (empty($_POST['nome']) || empty($_POST['marca']) || empty($_POST['princAtivo']) || empty($_POST['dose']) || empty($_POST['toma'])) {
    echo "campo vazio";
    exit();
}

$nome = $_POST['nome'];
$marca = $_POST['marca'];
$princAtivo = $_POST['princAtivo'];
$dose = $_POST['dose'];
$toma = $_POST['toma'];
$id = $_SESSION['idMed'];


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "UPDATE tblMedicamentos SET dose = ?, principioAtivo = ?, nome = ?, marca = ?, toma = ? WHERE id = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt->bind_param('ssssss', $dose, $princAtivo, $nome, $marca, $toma, $id);
$stmt->execute();
echo "sucesso";



?>