<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT M.nome as nomeMed, M.marca, S.porTomar, U.nome, U.contacto FROM tblMedicamentos AS M
INNER JOIN tblStocks AS S ON S.idMedicamento = M.id
INNER JOIN tblUtentes AS U ON U.id = S.idUtente
WHERE M.idLar = ?;";
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