<?php
session_start();
if ($_SESSION['adminLar'] != true) {
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
  <script src="../script/adminLarScript.js"></script>
  <title>StockGeral</title>
</head>

<body class="bg-primary flex justify-top">
  <div class="w-screen flex flex-col p-10">
    <div class="relative">
      <h1 class="text-secondary text-6xl font-bold">STOCK GERAL</h1>
    </div>
    <a class="text-secondary text-xl ml-2">Verifique abaixo o stock geral de medicamentos do seu lar:</a>

    <div id="stock-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
    </div>
    <?php include("procuraStock.php"); ?>
  </div>
</body>
<script>
  const container = document.getElementById('stock-container');

  if (medicamentos.length) {
    medicamentos.forEach(medicamento => {
      const card = document.createElement('div');
      card.className = "bg-secondary shadow-md rounded-lg p-4 text-center mt-5";

      const name = document.createElement('h2');
      name.className = "text-2xl font-bold font-semibold text-primary";
      name.textContent = medicamento.nome;

      const marca = document.createElement('p');
      marca.className = "text-sm text-primary mt-2";
      marca.textContent = "Marca: " + medicamento.marca;

      const quantidade = document.createElement('p');
      quantidade.className = "text-sm text-primary mt-2";
      quantidade.textContent = "Quantidade: " + medicamento.totalQuantidade;

      card.appendChild(name);
      card.appendChild(marca);
      card.appendChild(quantidade);
      container.appendChild(card);
    });
  } else {
    const noMeds = document.createElement('p');
    noMeds.className = "text-redE text-2xl mt-10";
    noMeds.textContent = "Sem medicamentos encontrados!";
    container.appendChild(noMeds);
  }
</script>

</html>