<?php
include("../connection.php");

$idUtente = $_POST['idUtente'];


$sql = "SELECT M.id,M.nome, M.marca FROM tblMedicamentos M 
WHERE M.id NOT IN ( SELECT M2.id FROM tblMedicamentos M2 
INNER JOIN tblMedicamentoTerapeutica MT ON M2.id = MT.idMedicamento 
INNER JOIN tblTerapeuticas T ON MT.idTerapeutica = T.id 
INNER JOIN tblUtentes U ON T.idUtente = U.id 
WHERE T.estado = 1 AND U.id = ? )";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUtente);
$stmt->execute();
$result = $stmt->get_result();

$medicamentos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicamentos[] = $row;
    }
}

echo json_encode($medicamentos);

$conn->close();
?>