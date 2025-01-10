<?php
session_start();
if ($_SESSION['tecLar'] != true) {
    header('Location: ../index.php');
    exit();
}  ?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../script/tailwind.js"></script>
  <title>Rodas & Bengalas</title>
</head>
<body class="bg-primary flex justify-top">
  <div class="flex flex-col p-10 justify-end items-end h-screen w-screen" style="background-image: url('../img/indexAdminGerLar.png'); background-repeat: no-repeat;">
  <h1 class="text-secondary text-6xl font-bold">
  RODAS & BENGALAS
  </h1>
  <a class="text-secondary text-xl">Seja bem vindo <?php echo $_SESSION['nome'] ?>! Através deste site poderá gerir todos os medicamentos e terapêuticas do seu lar!</a>
  </div>
</body>
</html>