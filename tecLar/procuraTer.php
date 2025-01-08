<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT U.nome AS nomeUtente, U.idLar, M.nome AS nomeMedicamento, M.marca, MT.horario, MT.diasSemana,
T.dataInicio, MT.dataFim, S.nome AS nomeStaff
FROM tblTerapeuticas T
INNER JOIN tblUtentes U ON T.idUtente = U.id
INNER JOIN tblMedicamentoTerapeutica MT ON T.id = MT.idTerapeutica
INNER JOIN tblMedicamentos M ON MT.idMedicamento = M.id
INNER JOIN tblStaff S ON T.idStaff = S.id
WHERE U.idLar = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['idLar']);
$stmt->execute();
$result = $stmt->get_result();

$terapeuticas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $terapeuticas[] = $row;
    }
}
echo "<script>const terapeuticas = " . json_encode($terapeuticas) . ";</script>";

?>
