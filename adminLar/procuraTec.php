<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT * from tblStaff WHERE idLar = ? AND idTipo = 3";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['idLar']);
$stmt->execute();
$result = $stmt->get_result();

$tecnicos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tecnicos[] = $row;
    }
}
echo "<script>const tecnicos = " . json_encode($tecnicos) . ";</script>";

?>
