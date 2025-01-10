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
    !is_numeric($_POST['diasSemana']) ||
    !is_numeric($_POST['totalTomar'])
) {
    echo "campo vazio";
    exit();
}

$idUtente = $_POST['idUtente'];
$idMedicamento = $_POST['idMedicamento'];
$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$horario = $_POST['horario'];
$diasSemana = $_POST['diasSemana'];
$totalTomar = $_POST['totalTomar'];
$isSOS = $_POST['isSOS'];

$query1 = "INSERT INTO tblTerapeuticas (idUtente, idStaff, dataInicio) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query1);
if (!$stmt) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt->bind_param('sss', $idUtente, $_SESSION['idStaff'], $dataInicio);

if ($stmt->execute()) {
    $last_id = $conn->insert_id;

    $query2 = "INSERT INTO tblMedicamentoTerapeutica (idTerapeutica, idMedicamento, horario, diasSemana, dataFim, isSOS) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt2 = $conn->prepare($query2);
    if (!$stmt2) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt2->bind_param('ssssss', $last_id, $idMedicamento, $horario, $diasSemana, $dataFim, $isSOS);

    if ($stmt2->execute()) {
        $query3 = "SELECT id FROM tblStocks WHERE idMedicamento = ? AND idUtente = ?";
        $stmt3 = $conn->prepare($query3);
        if (!$stmt3) {
            die("Statement preparation failed: " . $conn->error);
        }
        $stmt3->bind_param('ss', $idMedicamento, $idUtente);

        if ($stmt3->execute()) {
            $stmt3->bind_result($id);
            if ($stmt3->fetch()) {
                $stmt3->close(); 
                $query4 = "UPDATE tblStocks SET porTomar = porTomar + ? WHERE id = ?";
                $stmt4 = $conn->prepare($query4);
                if (!$stmt4) {
                    die("Statement preparation failed: " . $conn->error);
                }
                $stmt4->bind_param('ii', $totalTomar, $id);
                if ($stmt4->execute()) {
                    echo "sucesso";
                } else {
                    echo "Error: " . $stmt4->error;
                }
            } else {
                $stmt3->close(); 
                $query4 = "INSERT INTO tblStocks (idMedicamento, idUtente, porTomar) VALUES (?, ?, ?)";
                $stmt4 = $conn->prepare($query4);
                if (!$stmt4) {
                    die("Statement preparation failed: " . $conn->error);
                }
                $stmt4->bind_param('sss', $idMedicamento, $idUtente, $totalTomar);
                if ($stmt4->execute()) {
                    echo "sucesso";
                } else {
                    echo "Error: " . $stmt4->error;
                }
            }
        } else {
            echo "Error: " . $stmt3->error;
        }
    } else {
        echo "Error: " . $stmt2->error;
    }
}




?>