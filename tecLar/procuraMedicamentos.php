<?php
include("../connection.php");

$sql = "SELECT id, nome, marca FROM tblMedicamentos WHERE idLar = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['idLar']);
$stmt->execute();
$result = $stmt->get_result();

$medicamentos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicamentos[] = $row;
    }
}

echo "<script>const medicamentos = " . json_encode(value: $medicamentos) . ";</script>";

$conn->close();
?>