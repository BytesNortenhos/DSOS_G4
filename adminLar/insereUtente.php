<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");

if (empty($_POST['nome']) || empty($_POST['contacto']) || !preg_match('/^\d{9}$/', $_POST['contacto'])) {
    echo "campo vazio";
    exit();
}

$nome = $_POST['nome'];
$contacto = $_POST['contacto'];


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query1 = "SELECT * FROM tblUtentes WHERE nome = ? AND contacto = ?";
$stmt = $conn->prepare($query1);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt->bind_param('ss', $nome, $contacto);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    echo "utente ja existe";
}
else{
    $query2 = "INSERT INTO tblUtentes (nome, contacto, idLar) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query2);
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt->bind_param('sss', $nome, $contacto, $_SESSION['idLar']);
    $stmt->execute();
    echo "sucesso";
}


?>