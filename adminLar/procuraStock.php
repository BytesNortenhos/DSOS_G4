<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT tblStocks.idMedicamento, SUM(tblStocks.quantidade) AS totalQuantidade, tblMedicamentos.nome, tblMedicamentos.marca
FROM tblStocks
INNER JOIN tblMedicamentos ON tblStocks.idMedicamento = tblMedicamentos.id
INNER JOIN tblUtentes ON tblStocks.idUtente = tblUtentes.id
WHERE tblUtentes.idLar = ?
GROUP BY tblStocks.idMedicamento, tblMedicamentos.nome, tblMedicamentos.marca;";
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
echo "<script>const medicamentos = " . json_encode($medicamentos) . ";</script>";

$stmt->close();
$conn->close();
?>