<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");

if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_SESSION['idLar']) || strpos($_POST['email'], "@") === false) {
    echo "campo vazio";
    exit();
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$idLar = $_SESSION['idLar'];
$hash = hash('sha256', $hashSalt . $pass);


if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query1 = "SELECT * FROM tblStaff WHERE email = ?";
$stmt = $conn->prepare($query1);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    echo "tec ja existe";
}
else{
    $query2 = "INSERT INTO tblStaff (idTipo, idLar, nome, email, password) VALUES (3, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query2);
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt->bind_param('ssss', $idLar, $nome, $email, $hash);
    $stmt->execute();
    echo "sucesso";
}


?>