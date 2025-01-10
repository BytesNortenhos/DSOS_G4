<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT id, nome FROM tblUtentes WHERE idLar = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['idLar']);
$stmt->execute();
$result = $stmt->get_result();

$utentes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $utentes[] = $row;
    }
}

echo "<script>const utentes = " . json_encode(value: $utentes) . ";</script>";

$conn->close();
?>