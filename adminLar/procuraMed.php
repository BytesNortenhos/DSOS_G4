<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT * from tblMedicamentos";
$result = $conn->query($sql);

$medicamentos = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicamentos[] = $row;
    }
}
echo "<script>const medicamentos = " . json_encode($medicamentos) . ";</script>";

?>
