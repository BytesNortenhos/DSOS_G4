<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sqlGetMediaUtentesPorLar = "SELECT AVG(utente_count) AS mediaUtentesPorLar FROM (SELECT l.id AS idLar, COUNT(u.id) AS utente_count FROM tblLares l LEFT JOIN tblUtentes u ON l.id = u.idLar GROUP BY l.id) AS utentes_por_lar;";
$resultGetMediaUtentesPorLar = $conn->query($sqlGetMediaUtentesPorLar);
$mediaUtentesPorLar = 0;
if ($resultGetMediaUtentesPorLar->num_rows > 0) {
    $mediaUtentesPorLar = $resultGetMediaUtentesPorLar->fetch_assoc()["mediaUtentesPorLar"];
} else {
    $mediaUtentesPorLar = 0;
}

$sqlGetNumTotalUtentes = "SELECT COUNT(id) as numTotalUtentes FROM tblUtentes";
$resultGetNumTotalUtentes = $conn->query($sqlGetNumTotalUtentes);
$numTotalUtentes = 0;
if ($resultGetNumTotalUtentes->num_rows > 0) {
    $numTotalUtentes = $resultGetNumTotalUtentes->fetch_assoc()["numTotalUtentes"];
} else {
    $numTotalUtentes = 0;
}

$sqlGetLarMaisUtentes = "SELECT l.nome AS nomeLar, COUNT(u.id) AS totalUtentes FROM tblLares l JOIN tblUtentes u ON l.id = u.idLar GROUP BY l.id ORDER BY totalUtentes DESC LIMIT 1;";
$resultGetLarMaisUtentes = $conn->query($sqlGetLarMaisUtentes);
$larMaisUtentes = "";
if ($resultGetLarMaisUtentes->num_rows > 0) {
    while ($row = $resultGetLarMaisUtentes->fetch_assoc()) {
        $larMaisUtentes = $row["nomeLar"] . " (" . $row["totalUtentes"] . " Utentes)";
    }
} else {
    $larMaisUtentes = "Sem Dados";
}

$sqlGetMedMaisUsados = "SELECT m.nome AS medicamento, COUNT(mt.idMedicamento) AS quantidadeUsada FROM tblMedicamentos m JOIN tblMedicamentoTerapeutica mt ON m.id = mt.idMedicamento GROUP BY m.id ORDER BY quantidadeUsada DESC LIMIT 3;";
$resultGetMedMaisUsados = $conn->query($sqlGetMedMaisUsados);
$medMaisUsados = "";
$cMedMaisUsados = 1;
if ($resultGetMedMaisUsados->num_rows > 0) {
    while ($row = $resultGetMedMaisUsados->fetch_assoc()) {
        $medMaisUsados = $medMaisUsados . $cMedMaisUsados . ". " . $row["medicamento"] . " (" . $row["quantidadeUsada"] . " vezes) <br>";
        $cMedMaisUsados++;
    }
} else {
    $medMaisUsados = "Sem Dados";
}

$sqlGetMedMaiorStock = "SELECT m.nome AS nomeMedicamento, SUM(s.quantidade) AS quantidadeEmStock FROM tblMedicamentos m JOIN tblStocks s ON m.id = s.idMedicamento GROUP BY m.id ORDER BY quantidadeEmStock DESC LIMIT 3;";
$resultGetMedMaiorStock = $conn->query($sqlGetMedMaiorStock);
$medMaiorStock = "";
$cMedMaiorStock = 1;
if($resultGetMedMaiorStock->num_rows > 0) {
    while ($row = $resultGetMedMaiorStock->fetch_assoc()) {
        $medMaiorStock =  $medMaiorStock . $cMedMaiorStock . ". " . $row["nomeMedicamento"] . " (" . $row["quantidadeEmStock"] . " unidades) <br>";
        $cMedMaiorStock++;
    }
} else {
    $medMaiorStock = "Sem Dados";
}


$sqlGetUtenteMaisSOS = "SELECT u.nome AS nomeUtente, COUNT(mt.idMedicamento) AS medicamentos_sos_consumidos FROM tblUtentes u JOIN tblTerapeuticas t ON u.id = t.idUtente JOIN tblMedicamentoTerapeutica mt ON t.id = mt.idTerapeutica WHERE mt.isSOS = 1 GROUP BY u.id ORDER BY medicamentos_sos_consumidos DESC;";
$resultGetUtenteMaisSOS = $conn->query($sqlGetUtenteMaisSOS);
$utenteMaisSOS = "";
$cUtenteMaisSOS = 1;
if ($resultGetUtenteMaisSOS->num_rows > 0) {
    while ($row = $resultGetUtenteMaisSOS->fetch_assoc()) {
        $utenteMaisSOS = $utenteMaisSOS . $cUtenteMaisSOS . ". " . $row["nomeUtente"] . " (" . $row["medicamentos_sos_consumidos"] . " medicamentos) <br>";
        $cUtenteMaisSOS++;
    }
} else {
    $utenteMaisSOS = "Sem Dados";
}

?>

<script>
    document.getElementById("valUtenPorLar").innerHTML = "<?php echo round($mediaUtentesPorLar, 2); ?>";
    document.getElementById("valNumTolUten").innerHTML = "<?php echo $numTotalUtentes; ?>";
    document.getElementById("valLarMaisUten").innerHTML = "<?php echo $larMaisUtentes; ?>";
    document.getElementById("valMedMaisUsados").innerHTML = "<?php echo $medMaisUsados; ?>";
    document.getElementById("valMedMaiorStock").innerHTML = "<?php echo $medMaiorStock; ?>";
    document.getElementById("valUtenMaisSOS").innerHTML = "<?php echo $utenteMaisSOS; ?>";
</script>