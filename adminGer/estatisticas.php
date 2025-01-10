<?php
session_start();
if ($_SESSION['adminGer'] != true) {
  header('Location: ../index.php');
  exit();
} else {
  include("nav.php");
} ?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="../script/tailwind.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../script/adminGerScript.js"></script>
  <title>Estatísticas</title>
  <style>
      .hover\:add-change:hover img {
      content: url('../img/addHover.png'); 
    }
  </style>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col p-10">
    <div class="relative">
      <h1 class="text-secondary text-6xl font-bold">ESTATÍSTICAS</h1>
    </div>
    <a class="text-secondary text-xl ml-2">Verifique algumas estatísticas dos lares:</a>

    <div id="estats-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
        <div class="bg-secondary shadow-md rounded-lg p-4 text-center mt-5">
            <h2 class="text-2xl font-bold font-semibold text-primary" id="valUtenPorLar">
                <img src="../img/loading.svg" alt="Icone de carregamento" class="-mt-4 text-center mx-auto">
            </h2>
            <p class="text-sm text-primary mt-2" id="txtUtenPorLar">Média de Utentes por Lar</p>
        </div>

        <div class="bg-secondary shadow-md rounded-lg p-4 text-center mt-5">
            <h2 class="text-2xl font-bold font-semibold text-primary" id="valNumTolUten">
                <img src="../img/loading.svg" alt="Icone de carregamento" class="-mt-4 text-center mx-auto">
            </h2>
            <p class="text-sm text-primary mt-2" id="txtNumTolUten">Número Total de Utentes</p>
        </div>

        <div class="bg-secondary shadow-md rounded-lg p-4 text-center mt-5">
            <h2 class="text-2xl font-bold font-semibold text-primary" id="valLarMaisUten">
                <img src="../img/loading.svg" alt="Icone de carregamento" class="-mt-4 text-center mx-auto">
            </h2>
            <p class="text-sm text-primary mt-2" id="txtLarMaisUten">Lar com Mais Utentes</p>
        </div>

        <div class="bg-secondary shadow-md rounded-lg p-4 text-center mt-5">
            <h2 class="text-2xl font-bold font-semibold text-primary" id="valMedMaisUsados">
                <img src="../img/loading.svg" alt="Icone de carregamento" class="-mt-4 text-center mx-auto">
            </h2>
            <p class="text-sm text-primary mt-2" id="txtMedMaisUsados">Medicamentos mais Usados</p>
        </div>

        <div class="bg-secondary shadow-md rounded-lg p-4 text-center mt-5">
            <h2 class="text-2xl font-bold font-semibold text-primary" id="valMedMaiorStock">
                <img src="../img/loading.svg" alt="Icone de carregamento" class="-mt-4 text-center mx-auto">
            </h2>
            <p class="text-sm text-primary mt-2" id="txtMedMaiorStock">Medicamentos com Maior Stock</p>
        </div>

        <div class="bg-secondary shadow-md rounded-lg p-4 text-center mt-5">
            <h2 class="text-2xl font-bold font-semibold text-primary" id="valUtenMaisSOS">
                <img src="../img/loading.svg" alt="Icone de carregamento" class="-mt-4 text-center mx-auto">
            </h2>
            <p class="text-sm text-primary mt-2" id="txtUtenMaisSOS">Utentes que consumiram mais Medicamentos SOS diferentes</p>
        </div>

        <?php include("obterStats.php"); ?>
    </div>
  </div>
</body>
</html>