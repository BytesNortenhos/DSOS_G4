<?php
$servername = "ctesp.dei.isep.ipp.pt";
$database = "2024_DSOS_Grupo4_F";
$username = "2024_DSOS_Grupo4_F";
$password = "fckRw8765!";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>