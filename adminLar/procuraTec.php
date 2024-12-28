<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT * from tblStaff WHERE idTipo = 3";
$result = $conn->query($sql);

$tecnicos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tecnicos[] = $row;
    }
}
echo "<script>const tecnicos = " . json_encode($tecnicos) . ";</script>";

?>
