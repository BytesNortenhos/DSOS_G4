<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT s.*, l.nome as nomeLar, l.morada as moradaLar FROM `tblStaff` AS s INNER JOIN `tblLares` AS l ON s.idLar = l.id WHERE s.idTipo = 2 ORDER BY s.email";
$result = $conn->query($sql);

$admins = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
}

// Pass data to JavaScript
echo "<script>const admins = " . json_encode($admins) . ";</script>";

?>