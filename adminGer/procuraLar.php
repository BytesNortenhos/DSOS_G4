<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../connection.php");

$sql = "SELECT * from tblLares";
$result = $conn->query($sql);

$lares = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $lares[] = $row;
    }
}
echo "<script>const lares = " . json_encode($lares) . ";</script>";

?>
