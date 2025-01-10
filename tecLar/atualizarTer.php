<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");

if (
    !isset($_POST['horario'], $_POST['diasSemana'], $_POST['totalTomar']) ||
    empty($_POST['horario']) ||
    empty($_POST['diasSemana']) ||
    empty($_POST['totalTomar']) ||
    !is_numeric($_POST['totalTomar'])
) {
    echo "campo vazio";
    exit();
}

$idTer = $_SESSION['idTer'];
$dataFim = $_POST['dataFim'];
$horario = $_POST['horario'];
$diasSemana = $_POST['diasSemana'];
$totalTomar = $_POST['totalTomar'];
$isSOS = $_POST['isSOS'];

$query1 = "UPDATE tblTerapeuticas T
INNER JOIN tblMedicamentoTerapeutica MT ON T.id = MT.idTerapeutica
SET MT.dataFim = ?, MT.horario = ?, MT.diasSemana = ?, MT.isSOS = ?
WHERE T.id = ?";
$stmt = $conn->prepare($query1);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt->bind_param('sssss', $dataFim, $horario, $diasSemana, $isSOS, $idTer);
if ($stmt->execute()) {
    $query2= "UPDATE tblTerapeuticas T
    INNER JOIN tblMedicamentoTerapeutica MT ON T.id = MT.idTerapeutica
    INNER JOIN tblStocks S ON T.idUtente = S.idUtente AND MT.idMedicamento = S.idMedicamento
    SET S.porTomar = ?
    WHERE T.id = ?";
    $stmt2 = $conn->prepare($query2);
    if (!$stmt2) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt2->bind_param('ss', $totalTomar, $idTer);
    $stmt2->execute();
    echo "sucesso";
}

?>