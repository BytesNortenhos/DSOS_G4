<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");

if (empty($_POST['nome']) || empty($_POST['morada'])) {
    echo "campo vazio";
    exit();
}

$nome = $_POST['nome'];
$morada = $_POST['morada'];


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query1 = "SELECT * FROM tblLares WHERE nome = ?";
$stmt = $conn->prepare($query1);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt->bind_param('s', $nome);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    echo "lar ja existe";
}
else{
    $query2 = "INSERT INTO tblLares (nome, morada) VALUES (?, ?)";
    $stmt = $conn->prepare($query2);
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt->bind_param('ss', $nome, $morada);
    $stmt->execute();
    echo "sucesso";
}


?>