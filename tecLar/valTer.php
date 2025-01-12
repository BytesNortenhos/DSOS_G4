<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");

$nTomados = $_POST['nTomados'];
$porTomar = $_POST['porTomar'];

$totalNTomados = $porTomar - $nTomados;

$query1 = "SELECT tomados from tblStocks where id = ?";
$stmt1 = $conn->prepare($query1);
if (!$stmt1) {
    die("Statement preparation failed: " . $conn->error);
}
$stmt1->bind_param('s', $_SESSION['idStock']);
if ($stmt1->execute()) {
    $jaTomados = $stmt1->get_result()->fetch_assoc()['tomados'];
    $totalTomados = $jaTomados + $nTomados;
    $query2 = "UPDATE tblStocks set porTomar = ?, tomados = ? where id = ?";
    $stmt2 = $conn->prepare($query2);
    if (!$stmt2) {
        die("Statement preparation failed: " . $conn->error);
    }
    $stmt2->bind_param('iis', $totalNTomados, $totalTomados, $_SESSION['idStock']);
    if ($stmt2->execute()) {
        $query3 = "UPDATE tblTerapeuticas set estado = 2 where id = ?";
        $stmt3 = $conn->prepare($query3);
        if (!$stmt3) {
            die("Statement preparation failed: " . $conn->error);
        }
        $stmt3->bind_param('s', $_SESSION['idTer']);
        if ($stmt3->execute()) {
            echo "sucesso";
        } else {
            echo "Error: " . $stmt3->error;
        }
    } else {
        echo "Error: " . $stmt2->error;
    }
}
?>