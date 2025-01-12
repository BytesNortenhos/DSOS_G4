<?php
include("../connection.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$sql = "SELECT S.porTomar, S.id FROM tblStocks as S
INNER JOIN tblMedicamentoTerapeutica AS MT ON S.idMedicamento = MT.idMedicamento
INNER JOIN tblTerapeuticas AS T ON MT.idTerapeutica = T.id
WHERE MT.idTerapeutica = ?
AND T.idUtente = S.idUtente";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['idTer']);
$stmt->execute();

$result = $stmt->get_result();

$dados = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
}
$_SESSION['idStock'] = $dados[0]['id'];

echo "<script>const dados = " . json_encode(value: $dados) . ";</script>";

$stmt->close();
$conn->close();
?>
