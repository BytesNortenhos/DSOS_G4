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


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query1 = "SELECT * FROM tblMedicamentos WHERE marca = ? AND nome = ?";
$stmt = $conn->prepare($query1);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt->bind_param('ss', $marca, $nome);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    echo "marca ja existe";
}
else{
    $query2 = "INSERT INTO tblMedicamentos (dose, principioAtivo, nome, marca, toma) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query2);
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt->bind_param('sssss', $dose, $princAtivo, $nome, $marca, $toma);
    $stmt->execute();
    echo "sucesso";
}


?>