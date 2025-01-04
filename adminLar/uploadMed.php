<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("../connection.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idLar = isset($_POST['idLar']) ? $_POST['idLar'] : null;
    if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['csvFile']['tmp_name'];
        $fileExtension = pathinfo($_FILES['csvFile']['name'], PATHINFO_EXTENSION);

        if ($fileExtension !== 'csv') {
            echo 'extensao-errada';
            exit;
        } else {
            if (($handle = fopen($fileTmpPath, "r")) !== false) {
                $rowIndex = 0;
                $isValid = true;
                $errors = "erro";
    
                while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                    $rowIndex++;
    
                    if (count($row) !== 5) {
                        $isValid = false;
                        $errors = $errors . "Linha " . $rowIndex . ", ";
                        continue;
                    }
    
                    list($dose, $principioAtivo, $nome, $marca, $toma) = $row;
    
                    if (strlen($dose) > 50 || empty(trim($dose))) {
                        $isValid = false;
                        $errors = $errors . "Linha " . $rowIndex . ", ";
                        continue;
                    }
    
                    if (strlen($principioAtivo) > 255 || empty(trim($principioAtivo))) {
                        $isValid = false;
                        $errors = $errors . "Linha " . $rowIndex . ", ";
                        continue;
                    }
    
                    if (strlen($nome) > 255 || empty(trim($nome))) {
                        $isValid = false;
                        $errors = $errors . "Linha " . $rowIndex . ", ";
                        continue;
                    }
    
                    if (strlen($marca) > 255 || empty(trim($marca))) {
                        $isValid = false;
                        $errors = $errors . "Linha " . $rowIndex . ", ";
                        continue;
                    }
    
                    if (strlen($toma) > 255 || empty(trim($toma))) {
                        $isValid = false;
                        $errors = $errors . "Linha " . $rowIndex . ", ";
                        continue;
                    }

                    // Inserir na base de dados
                    if ($isValid) {
                        $stmt = $conn->prepare("INSERT INTO tblMedicamentos (dose, principioAtivo, nome, marca, toma, idLar) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->execute([$dose, $principioAtivo, $nome, $marca, $toma, $idLar]);
                    }
                }
    
                fclose($handle);
    
                if ($isValid) {
                    echo "sucesso";
                    exit;
                } else {
                    echo $errors;
                    exit;
                }
            } else {
                echo 'sem-ficheiro';
                exit;
            }
        }
    } else {
        echo 'sem-ficheiro';
        exit;
    }
} else {
    echo 'request-errado';
    exit;
}


?>