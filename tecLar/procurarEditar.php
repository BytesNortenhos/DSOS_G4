<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");


$sql = "SELECT U.id AS idUtente, U.nome, M.id AS idMedicamento, M.marca, M.nome AS nomeMed, 
T.dataInicio, MT.dataFim, MT.horario, MT.diasSemana, S.porTomar, MT.isSOS 
from tblUtentes U 
INNER JOIN tblTerapeuticas T ON T.idUtente = U.id 
INNER JOIN tblMedicamentoTerapeutica MT ON MT.idTerapeutica = T.id
INNER JOIN tblMedicamentos M ON M.id = MT.idMedicamento
INNER JOIN tblStocks S ON S.idUtente = U.id AND S.idMedicamento = M.id
WHERE T.id = ?";
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


echo "<script>const dados = " . json_encode(value: $dados) . ";</script>";

$conn->close();
?>