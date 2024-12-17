<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("connection.php");

if (empty($_POST['email']) || empty($_POST['pass'])) {
    $_SESSION['nao_autenticado'] = true;
    echo "nao autenticado";
    exit();
}

$user = $_POST['email'];
$pass = $_POST['pass'];

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM tblStaff WHERE email = ? AND password = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}

$stmt->bind_param('ss', $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $userData = $result->fetch_assoc();
    if ($userData['idTipo'] == 1) {
        $_SESSION['adminGer'] = true;
        $_SESSION['nome'] = $userData['nome'];
        echo 'adminGer';
        exit();
    }
} else {
    $_SESSION['nao_autenticado'] = true;
    echo "nao autenticado";
    exit();
}

echo "Unexpected error.";
exit();
?>